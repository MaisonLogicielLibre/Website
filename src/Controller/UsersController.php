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
    private $_permissions = [
        'index' => ['Student', 'Mentor', 'Administrator'],
        'add' => ['Administrator'],
        'edit' => ['Student', 'Mentor', 'Administrator'],
        'email' => ['Student', 'Mentor', 'Administrator'],
        'password' => ['Student', 'Mentor', 'Administrator'],
        'view' => ['Student', 'Mentor', 'Administrator'],
        'delete' => ['Administrator']
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
            if ($user->hasRoleName($this->_permissions[$this->request->action])) {
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
        $this->Auth->allow(['register', 'logout', 'login', 'index', 'view']);
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('users', $this->paginate($this->Users));
        $this->set('_serialize', ['users']);
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

                return $this->redirect(['action' => 'view', $user['id']]);
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
        
        $typeUser = $this->Users->TypeUsers->findByName('Student')->first();
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

        if ($you) {
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

        if ($you) {
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

        if ($you) {
            if ($this->request->is(['patch', 'post', 'put'])) {
                $user = $this->Users->patchEntity($user, $this->request->data);

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
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);

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
        return $this->redirect(['action' => 'index']);
    }
}
