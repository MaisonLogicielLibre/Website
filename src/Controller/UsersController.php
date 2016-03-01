<?php
/**
 * Users Controller
 *
 * PHP version 5
 *
 * @category Website
 * @package  Website
 * @author   Simon Bégin <simon.begin.1@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\MailerAwareTrait;
use Cake\Network\Http\Client;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\Utility\Hash;

/**
 * Users Controller
 *
 * @category Website
 * @package  Website
 * @author   Simon Bégin <simon.begin.1@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    use MailerAwareTrait;

    private $_permissions = [
        'add' => [],
        'edit' => ['edit_user', 'edit_users'],
        'email' => ['edit_user', 'edit_users'],
        'password' => ['edit_user', 'edit_users'],
        'delete' => ['delete_user', 'delete_users'],
        'svn' => ['edit_user', 'edit_users'],
        'svnCallback' => ['edit_user', 'edit_users'],
        'svnRemove' => ['edit_user', 'edit_users'],
        'index' => ['list_users']
    ];

    /**
     * Check if the user has the rights to see the page
     *
     * @param array $user user's informations
     *
     * @return bool
     */
    public function isAuthorized($user)
    {
        $user = $this->Users->findById($user['id'])->first();
        if (isset($this->_permissions[$this->request->action])) {
            if ($user->hasPermissionName($this->_permissions[$this->request->action])) {
                return true;
            }
        }
    }

    /**
     * Add extra parameters to load
     *
     * @param Event $event the event before
     *
     * @return void
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(
            [
                'register',
                'logout',
                'login',
                'view',
                'recoverPassword',
                'resetPassword',
                'registerStudent',
                'registerStudentOptional',
                'registerIndustry',
                'registerProfessor'
            ]
        );
    }

    /**
     * Add the RequestHandler component
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Hash');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $data = $this->DataTables->find(
            'Users',
            [
                'contain' =>
                    [
                        'Universities' =>
                            [
                                'fields' =>
                                [
                                    'id',
                                    'name'
                                ]
                            ],
                            'Owners' =>
                            [
                            'fields' =>
                            [
                                'OrganizationsOwners.user_id',
                                'id',
                                'name'
                            ]
                            ]
                    ],
                    'fields' =>
                    [
                        'id',
                        'username',
                        'firstName',
                        'lastName',
                        'isStudent',
                        'universitie_id'
                    ]
            ]
        );
        $this->set(
            [
                'data' => $data,
                'universities' => $this->Users->Universities->find('list', ['limit' => 200]),
                'orgs' => $this->loadModel('Organizations')->find('list', ['limit' => 200, 'conditions' => ['isRejected' => 0, 'isValidated' => 1]]),
                '_serialize' => array_merge($this->viewVars['_serialize'], ['data'])
            ]
        );
    }

    /**
     * RecordVisit record the visit of a user
     *
     * @param object $user user
     *
     * @return \Cake\Network\Response|void
     */
    private function _recordVisit($user)
    {
        $this->Visits = $this->loadModel('Visits');
        $visit = $this->Visits->newEntity();

        $visit->user_id = $user['id'];

        $res = $this->Visits->save($visit);
    }

    /**
     * Login method
     *
     * @return \Cake\Network\Response|void
     */
    public function login()
    {
        $this->viewBuilder()->layout(false);
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                $lang = $this->Users->get($user['id'])->getLanguage();
                $this->request->session()->write('lang', $lang);
                $this->_recordVisit($user);

                $actionRefs = [
                    'register/',
                    'recoverPassword/',
                    'registerStudentOptional/',
                    'registerStudent/',
                    'registerIndustry/',
                    'registerProfessor/'
                ];

                if ($this->request->Session()->read('actionRef') && $this->request->Session()->read('controllerRef') &&
                    !in_array($this->request->Session()->read('actionRef'), $actionRefs)
                    ) {
                    return $this->redirect(['controller' => $this->request->Session()->read('controllerRef'), 'action' => $this->request->Session()->read('actionRef')]);
                } elseif ($this->request->Session()->read('actionRef') == 'registerIndustry/') {
                    return $this->redirect(['controller' => 'Organizations', 'action' => 'submit']);
                } else {
                    return $this->redirect(['controller' => 'Users', 'action' => 'view/' . $user['id']]);
                }
            }
            $this->Flash->error(
                __(
                    "Username or password incorrect, try again."
                )
            );
        }
    }

    /**
     * Logout method
     *
     * @return \Cake\Network\Response|void
     */
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * View method
     *
     * @param string $id User id.
     *
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userSelected = $this->Users->get(
            $id,
            [
                'contain' => [
                    'TypeUsers',
                    'Universities',
                    'Projects',
                    'SvnUsers' => [
                        'Svns'
                    ],
                    'TypeMissions' => [
                        'fields' => [
                            'id', 'name', 'UsersTypeMissions.user_id'
                        ]
                    ]
                ],
            ]
        );

        $data = $this->DataTables->find(
            'Applications',
            [
                'contain' => [
                    'Missions'
                ],
                'conditions' => [
                    'AND' => [
                        'user_id' => $id,
                        'Applications.archived' => 0,
                        'Applications.accepted' => 0,
                        'Applications.rejected' => 0
                    ]
                ],
                'fields' => [
                    'Missions.id',
                    'Missions.name',
                    'Applications.id',
                ]
            ]
        );

        $user = $this->Users->findById($this->request->session()->read('Auth.User.id'))->first();
        $this->set(compact('userSelected', 'user'));
        $this->set(
            [
                'data' => $data,
                '_serialize' => array_merge($this->viewVars['_serialize'], ['data'])
            ]
        );
    }

    /**
     * Register method
     *
     * @return redirect
     */
    public function register()
    {
        $this->viewBuilder()->layout(false);
    }

    /**
     * RegisterStudent method
     *
     * @return redirect
     */
    public function registerProfessor()
    {
        $this->viewBuilder()->layout(false);
        $user = $this->Users->newEntity();

        $typeUser = $this->Users->TypeUsers->findByName('User')->first();
        $user->type_users = [$typeUser];

        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            $user->isProfessor = true;

            if ($user->errors()) {
                $this->Flash->error(__('Your informations are invalid. Please try again later or contact us if the problem persists'));
            } else {
                $user->editPassword($this->request->data['password']);
                $user->editEmailPublic($this->request->data['email']);
                $user->editMailingList(true);

                if ($this->Users->save($user)) {
                    // Redirect to optional information page
                    $this->request->session()->write('user', $user);
                    return $this->redirect(['action' => 'login']);
                } else {
                    $this->Flash->error(
                        __(
                            'The user could not be saved. Please,
                     try again.'
                        )
                    );
                }
            }
        }

        $universities = $this->Users->Universities->find('list', ['limit' => 200]);
        $this->set(compact('user', 'universities'));
        $this->set('_serialize', ['user']);
    }

    /**
     * RegisterStudent method
     *
     * @return redirect
     */
    public function registerIndustry()
    {
        $this->viewBuilder()->layout(false);
        $user = $this->Users->newEntity();

        $typeUser = $this->Users->TypeUsers->findByName('User')->first();
        $user->type_users = [$typeUser];

        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            $user->university_id = 0;

            if ($user->errors()) {
                $this->Flash->error(__('Your informations are invalid. Please try again later or contact us if the problem persists'));
            } else {
                $user->editPassword($this->request->data['password']);
                $user->editEmailPublic($this->request->data['email']);
                $user->editMailingList(true);

                if ($this->Users->save($user)) {
                    // Redirect to optional information page
                    $this->request->session()->write('user', $user);
                    return $this->redirect(['action' => 'login']);
                } else {
                    $this->Flash->error(
                        __(
                            'The user could not be saved. Please,
                     try again.'
                        )
                    );
                }
            }
        }

        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * RegisterStudent method
     *
     * @return redirect
     */
    public function registerStudent()
    {
        $this->viewBuilder()->layout(false);
        $user = $this->Users->newEntity();

        $typeUser = $this->Users->TypeUsers->findByName('User')->first();
        $user->type_users = [$typeUser];

        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);

            if ($user->errors()) {
                $this->Flash->error(__('Your informations are invalid. Please try again later or contact us if the problem persists'));
            } else {
                $user->editPassword($this->request->data['password']);
                $user->editEmailPublic($this->request->data['email']);
                $user->editMailingList(true);
                $user->isStudent = true;

                if ($this->Users->save($user)) {
                    // Redirect to optional information page
                    $this->request->session()->write('user', $user);
                    return $this->redirect(['action' => 'registerStudentOptional']);
                } else {
                    $this->Flash->error(
                        __(
                            'The user could not be saved. Please,
                     try again.'
                        )
                    );
                }
            }
        }

        $universities = $this->Users->Universities->find('list', ['limit' => 200]);
        $this->set(compact('user', 'universities'));
        $this->set('_serialize', ['user']);
    }

    /**
     * RegisterStudentOptional method
     *
     * @return redirect
     */
    public function registerStudentOptional()
    {
        $this->viewBuilder()->layout(false);
        $userId = $this->request->session()->read('user')['id'];
        $user = $this->Users->get($userId);

        $this->loadModel('UsersTypeMissions');
        $typeMissions = $this->Users->TypeMissions->find('all')->toArray();
        $selectedTypeMissions = $this->UsersTypeMissions->findByUserId($user['id'])->toArray();

        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);

            if ($user->errors()) {
                $this->Flash->error(__('Your informations are invalid. Please try again later or contact us if the problem persists'));
            } else {

                if ($this->Users->save($user)) {
                    return $this->redirect(['action' => 'login']);
                } else {
                    $this->Flash->error(
                        __(
                            'The user could not be saved. Please,
                     try again.'
                        )
                    );
                }
            }
        }

        $this->set(compact('user', 'typeMissions', 'selectedTypeMissions'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     *
     * @return redirect
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get(
            $id,
            [
                'contain' => ['Projects']
            ]
        );

        $you = $this->request->session()->read('Auth.User.id') === $user->getId() ? true : false;
        $hasPermission = $this->Users->get($this->request->session()->read('Auth.User.id'))->hasPermissionName(['edit_users']);

        if ($you || $hasPermission) {
            $typeMissions = $this->Users->TypeMissions->find('all')->toArray();
            $this->loadModel('UsersTypeMissions');
            $selectedTypeMissions = $this->UsersTypeMissions->findByUserId($id)->toArray();

            if ($this->request->is(['patch', 'post', 'put'])) {
                $user = $this->Users->patchEntity($user, $this->request->data);

                if ($this->Users->save($user)) {
                    //Update the language
                    $this->request->session()->write('lang', $user->getLanguage());
                    $this->checkLanguage();
                    $this->Flash->success(__('Your profile has been updated successfully'));
                    return $this->redirect(['action' => 'view', $user->id]);
                } else {
                    $this->Flash->error(
                        __(
                            'The user could not be saved. Please,
                     try again.'
                        )
                    );
                }
            }
            $universities = $this->Users->Universities->find('list', ['limit' => 200]);
            $this->set(compact('user', 'universities', 'you', 'typeMissions', 'selectedTypeMissions'));
            $this->set('_serialize', ['user']);
        } else {
            return $this->redirect(['action' => 'edit', $this->request->session()->read('Auth.User.id')]);
        }
    }

    /**
     * Change email method
     *
     * @param string|null $id User id.
     *
     * @return redirect
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function email($id = null)
    {
        $user = $this->Users->get($id);

        $you = $this->request->session()->read('Auth.User.id') === $user->getId() ? true : false;
        $hasPermission = $this->Users->get($this->request->session()->read('Auth.User.id'))->hasPermissionName(['edit_users']);

        if ($you || $hasPermission) {
            if ($this->request->is(['patch', 'post', 'put'])) {
                $user = $this->Users->patchEntity($user, $this->request->data);

                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The user has been saved.'));
                    return $this->redirect(['action' => 'view', $user->id]);
                } else {
                    $this->Flash->error(
                        __(
                            'The user could not be saved. Please,
                     try again.'
                        )
                    );
                }
            }
            $this->set(compact('user', 'you'));
            $this->set('_serialize', ['user']);
        } else {
            return $this->redirect(['action' => 'email', $this->request->session()->read('Auth.User.id')]);
        }
    }

    /**
     * Change password method
     *
     * @param string|null $id User id.
     *
     * @return redirect
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function password($id = null)
    {
        $user = $this->Users->get($id);

        $you = $this->request->session()->read('Auth.User.id') === $user->getId() ? true : false;
        $hasPermission = $this->Users->get($this->request->session()->read('Auth.User.id'))->hasPermissionName(['edit_users']);

        if ($you || $hasPermission) {
            if ($this->request->is(['patch', 'post', 'put'])) {
                $user = $this->Users->patchEntity($user, $this->request->data);
                $user->password = $user->editPassword($this->request->data['password']);

                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The user has been saved.'));
                    return $this->redirect(['action' => 'view', $user->id]);
                } else {
                    $this->Flash->error(
                        __(
                            'The password could not be saved. Please,
                     try again.'
                        )
                    );
                }
            }
            $this->set(compact('user', 'you'));
            $this->set('_serialize', ['user']);
        } else {
            return $this->redirect(['action' => 'password', $this->request->session()->read('Auth.User.id')]);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     *
     * @return redirect
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['get', 'post', 'delete']);
        $user = $this->Users->get($id);

        $you = $this->request->session()->read('Auth.User.id') === $user->getId() ? true : false;
        $hasPermission = $this->Users->get($this->request->session()->read('Auth.User.id'))->hasPermissionName(['edit_users']);

        if ($you || $hasPermission) {
            if ($this->request->is(['post'])) {
                if ($this->Users->delete($user)) {
                    $this->Flash->success(__('The user has been deleted.'));
                } else {
                    $this->Flash->error(
                        __(
                            'The user could not be deleted. Please,
                     try again.'
                        )
                    );
                }
                return $this->redirect($this->Auth->logout());
            }
            $this->set(compact('user', 'you'));
            $this->set('_serialize', ['user']);
        } else {
            return $this->redirect(['action' => 'delete', $this->request->session()->read('Auth.User.id')]);
        }
    }

    /**
     * ResetPassword method
     *
     * @param string $url url
     *
     * @return \Cake\Network\Response|void
     */
    public function resetPassword($url)
    {
        $this->viewBuilder()->layout(false);
        $hash = $this->Hash->hash($url);
        $hash = TableRegistry::get('hashes')->findByHash($hash)->first();

        if ($hash) {
            $user = $this->Users->get($hash->getUserId());
        } else {
            $this->Flash->error(
                __("This link seems corrupted. Please contact the administration team.")
            );
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        }

        if ($this->request->is(['patch', 'post', 'put'])) { //Search account
            $user = $this->Users->patchEntity($user, $this->request->data);

            $user->password = $user->editPassword($this->request->data['password']);

            if ($this->Users->save($user)) {
                $hash->setUsed(true);
                $this->loadModel("Hashes");
                $this->Hashes->save($hash);
                $this->Flash->success(__('Your password was modified.'));
                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            } else {
                $this->Flash->error(
                    __(
                        'The user could not be saved. Please,
                 try again.'
                    )
                );
            }
        } else {
            $type = TableRegistry::get('hashTypes');
            $typeId = $type->findByName("resetPassword")->first()->id;

            if ($hash->getTypeId() == $typeId) {
                if (!$hash->isUsed()) {
                    if (!$hash->isExpired()) {
                        $this->set(compact('user'));
                    } else {
                        $this->Flash->error(
                            __("This link is expired. Please request a new link.")
                        );
                        return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
                    }
                } else {
                    $this->Flash->error(
                        __("This link was already used. Please request a new link.")
                    );
                    return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
                }
            } else {
                $this->Flash->error(
                    __("This link seems corrupted. Please contact the administration team.")
                );
                return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
            }
        }
    }

    /**
     * SendResetPasswordEmail method
     *
     * @param int $id idOfUser
     *
     * @return \Cake\Network\Response|void
     */
    private function _sendResetPasswordEmail($id)
    {
        try {
            $user = $this->Users->get($id);

            //Generate the url to reset password
            $url = $this->Hash->generateRandomString();

            //Create the hash to reset password
            $hash = TableRegistry::get('hashes')->newEntity();
            $hash->setHash($this->Hash->hash($url));
            $hash->setUser($user);
            $hash->time = 86400;

            $type = TableRegistry::get('hashTypes');
            $type = $type->findByName("resetPassword")->first();
            $hash->setType($type);

            $this->Users->Hashes->save($hash);
            $link = Router::url(['controller' => 'Users', 'action' => 'resetPassword', $url, '_full' => true]);

            //Send the mail
            $this->getMailer('User')->send('resetPassword', [$user, $link]);

             $this->Flash->success(__("The email has been send."));
        } catch (Exception $e) {
            $this->Flash->error(__("Error in sending email, please try again."));
        }

        return $this->redirect(['action' => 'recoverPassword']);
    }

    /**
     * RecoverPassword method
     *
     * @param int $id idOfUser
     *
     * @return \Cake\Network\Response|void
     */
    public function recoverPassword($id = null)
    {
        $this->viewBuilder()->layout(false);
        if ($id) { //Send mail to the user to reset password
            return $this->_sendResetPasswordEmail($id);
        } elseif ($this->request->is('post')) { //Search account
            $user = null;

            //By Email
            if ($this->request->data['Information']) {
                $user = $this->Users->findByEmail($this->request->data['Information'])->first();
            }
            if ($this->request->data['Information'] && !$user) {
                $user = $this->Users->findByUsername($this->request->data['Information'])->first();
            }
            if ($this->request->data['Information'] && !$user) {
                $user = $this->Users->findByPhone($this->request->data['Information'])->first();
            }

            //Return a user if we found an account
            $this->set(compact('user'));

            if (!$user) {
                $this->Flash->error(
                    __("No account associated with this information, try again.")
                );
            } else {
                $this->Flash->success(
                    __("An account was found!")
                );
            }
        }
    }

    /**
     * Svn method
     *
     * @param int $id user id
     *
     * @return void
     */
    public function svn($id)
    {
        $user = $this->Users->get($id);
        $svnsUsers = TableRegistry::get('svn_users');
        $pseudos = $svnsUsers->findByUserId($id)->toArray();

        $code = $this->request->query('code');

        if ($code) {
            $http = new Client();

            $result = $http->post(
                'https://github.com/login/oauth/access_token',
                [
                    'client_id' => GITHUBID,
                    'client_secret' => GITHUBKEY,
                    'code' => $code,
                ]
            );

            $tmp = explode('&', $result->body)[0];
            $token = explode('=', $tmp)[1];

            if ($token != "bad_verification_code") {
                $result = $http->get(
                    'https://api.github.com/user',
                    [
                    'access_token' => $token
                       ]
                );

                $res = json_decode($result->body, true);

                if (!$svnsUsers->findByPseudo($res['login'])->toArray()) {
                    $svnUser = $svnsUsers->newEntity();
                    $svnUser->editPseudo($res['login']);
                    $svnUser->editSvnId(1);
                    $svnUser->edituserId($id);

                    if ($svnsUsers->save($svnUser)) {
                          $this->Flash->success(__('The account have been added'));
                          return $this->redirect(['controller' => 'Users', 'action' => 'svn', $id]);
                    } else {
                        $this->Flash->error(__('Error in adding the account, please try again.'));
                    }
                } else {
                    $this->Flash->error(__('This account have already been added'));
                }
            }
        }

        $this->set(compact('user', 'pseudos'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Svn method used for token callback
     *
     * @return void
     */
    public function svnCallback()
    {
        $userId = $this->Users->get($this->Auth->user('id'))->getId();
        $code = $this->request->query('code');

        return $this->redirect(['controller' => 'Users', 'action' => 'svn', $userId, '?' => ['code' => $code]]);
    }

    /**
     * Svn method used to remove account
     *
     * @param int $id user_id
     *
     * @return void
     */
    public function svnRemove($id)
    {
        $svnsUsers = TableRegistry::get('svn_users');

        $pseudo = $this->request->query('pseudo');
        $account = $svnsUsers->findByPseudo($pseudo)->first();

        if ($svnsUsers->delete($account)) {
            $this->Flash->success(__('The account has been deleted.'));
        } else {
            $this->Flash->error(__('The account could not be deleted. Please try again.'));
        }

        return $this->redirect(['controller' => 'Users', 'action' => 'svn', $id]);
    }
}
