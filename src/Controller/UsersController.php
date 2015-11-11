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
 * @link     https://github.com/MaisonLogicielLibre/site_mll
 */

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\MailerAwareTrait;
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
 * @link     https://github.com/MaisonLogicielLibre/site_mll
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
        'delete' => ['delete_user', 'delete_users']
    ];

    /**
     * Check if the user has the rights to see the page
     * @param array $user user's informations
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
        $this->Auth->allow(['register', 'logout', 'login', 'index', 'view', 'recoverPassword', 'resetPassword']);
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
        $data = $this->DataTables->find('users', ['fields' => ['id', 'username', 'firstName', 'lastName']]);

        $this->set(
            [
                'data' => $data,
                '_serialize' => array_merge($this->viewVars['_serialize'], ['data'])
            ]
        );
    }

    /**
     * Login method
     *
     * @return \Cake\Network\Response|void
     */
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);

                if ($this->request->Session()->read('actionRef') && $this->request->Session()->read('controllerRef') && !in_array($this->request->Session()->read('actionRef'), ['register/', 'recoverPassword/'])) {
                    return $this->redirect(['controller' => $this->request->Session()->read('controllerRef'), 'action' => $this->request->Session()->read('actionRef')]);
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
        $user = $this->Users->get(
            $id,
            [
                'contain' => ['TypeUsers', 'Universities', 'Projects', 'Comments']
            ]
        );
        $you = $this->request->session()->read('Auth.User.id') === $user->getId() ? true : false;
        $this->set(compact('user', 'you'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return redirect
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(
                    __(
                        'The new email could not be saved. Please,
                try again.'
                    )
                );
            }
        }
        $typeUsers = $this->Users->TypeUsers->find('list', ['limit' => 200]);
        $universities = $this->Users->Universities->find('list', ['limit' => 200]);
        $projects = $this->Users->Projects->find('list', ['limit' => 200]);
        $this->set(compact('user', 'typeUsers', 'universities', 'projects'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Register method
     *
     * @return redirect
     */
    public function register()
    {
        $user = $this->Users->newEntity();

        $typeUser = $this->Users->TypeUsers->findByName('User')->first();
        $user->type_users = [$typeUser];

        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);

            $user->password = $user->editPassword($this->request->data['password']);

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
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

        $universities = $this->Users->Universities->find('list', ['limit' => 200]);
        $this->set(compact('user', 'universities'));
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
            if ($this->request->is(['patch', 'post', 'put'])) {
                $user = $this->Users->patchEntity($user, $this->request->data);

                // Force to put null on gender if its not specified
                $user->editGender($this->request->data['gender']);

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
            $universities = $this->Users->Universities->find('list', ['limit' => 200]);
            $this->set(compact('user', 'universities', 'you'));
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
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
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
     * RecoverPassword method
     *
     * @param int $id idOfUser
     *
     * @return \Cake\Network\Response|void
     */
    public function recoverPassword($id = null)
    {
        if ($id) { //Send mail to the user to reset password
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
}
