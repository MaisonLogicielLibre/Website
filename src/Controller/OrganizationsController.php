<?php
/**
 * Organizations controller
 *
 * @category Controller
 * @package  Website
 * @author   CakePHP <cakephp@email.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://cakephp.org CakePHP(tm) Project
 */
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Organizations controller
 *
 * @category Controller
 * @package  Website
 * @author   CakePHP <cakephp@email.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://cakephp.org CakePHP(tm) Project
 */
class OrganizationsController extends AppController
{
    private $_permissions = [
        'index' => ['Student', 'Mentor', 'Administrator'],
        'editStatus' => ['Administrator'],
        'add' => ['Administrator'],
        'submit' => ['Student', 'Mentor', 'Administrator'],
        'edit' => ['Administrator'],
        'editValidated' => ['Administrator'],
        'editRejected' => ['Administrator'],
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
     * Filter preparation
     *
     * @param Event $event event
     *
     * @return void
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->loadModel("Users");
        $this->Auth->allow(['index', 'view']);
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
    }


    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $user = $this->loadModel("Users")->findById($this->request->session()->read('Auth.User.id'))->first();

        if (!is_null($user) && $user->hasRoleName(['Administrator'])) {
            $this->adminIndex();
        } else {
            $data = $this->DataTables
                ->find(
                    'organizations',
                    [
                    'conditions' =>
                        [
                           'isValidated' => true,
                            'isRejected' => false
                        ]
                    ]
                );

            $this->set(
                [
                'data' => $data,
                '_serialize' => array_merge($this->viewVars['_serialize'], ['data'])
                ]
            );
        }
    }

    /**
     * Admin index method
     *
     * @return void
     */
    public function adminIndex()
    {
        $data = $this->DataTables->find(
            'organizations',
            [
            'contain' => []
            ]
        );

        $this->set(
            [
            'data' => $data,
            '_serialize' => array_merge($this->viewVars['_serialize'], ['data'])
            ]
        );
        $this->render('adminIndex');
    }

    /**
     * View method
     * @param string $id id
     * @return void
     */
    public function view($id = null)
    {
        $organization = $this->Organizations->get(
            $id,
            [
            'contain' => ['Projects']
            ]
        );
        $user = $this->Users->findById($this->request->session()->read('Auth.User.id'))->first();
        $this->set(compact('organization', 'user'));
        $this->set('_serialize', ['organization']);
    }

    /**
     * Add method
     * @return redirect
     */
    public function add()
    {
        $organization = $this->Organizations->newEntity();

        $organization->editIsValidated(true);
        $organization->editIsRejected(false);

        if ($this->request->is('post')) {
            $organization = $this->Organizations->patchEntity($organization, $this->request->data);
            if ($this->Organizations->save($organization)) {
                $this->Flash->success(__('The organization has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The organization could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('organization'));
        $this->set('_serialize', ['organization']);
    }

    /**
     * Submit method
     * @return redirect
     */
    public function submit()
    {
        $organization = $this->Organizations->newEntity();

        $organization->editIsValidated(false);
        $organization->editIsRejected(false);

        if ($this->request->is('post')) {
            $organization = $this->Organizations->patchEntity($organization, $this->request->data);
            if ($this->Organizations->save($organization)) {
                $this->Flash->success(__('The organization has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The organization could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('organization'));
        $this->set('_serialize', ['organization']);
    }

    /**
     * Edit method
     * @param string $id id
     * @return redirect
     */
    public function edit($id = null)
    {
        $organization = $this->Organizations->get(
            $id,
            [
            'contain' => []
            ]
        );
        if ($this->request->is(['patch', 'post', 'put'])) {
            $organization = $this->Organizations->patchEntity($organization, $this->request->data);
            if ($this->Organizations->save($organization)) {
                $this->Flash->success(__('The organization has been saved.'));
                return $this->redirect(['action' => 'view', $organization->id]);
            } else {
                $this->Flash->error(__('The organization could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('organization'));
        $this->set('_serialize', ['organization']);
    }

    /**
     * Edit state method
     * @return void
     */
    public function editStatus()
    {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $data = $this->request->data;
            $organization = $this->Organizations->get(intval($data['id']));
            if ($data['state'] == '3') {
                $organization->editIsRejected($data['stateValue']);
            } elseif ($data['state'] == '2') {
                if (!$organization->getIsValidated()) {
                    $organization->editIsValidated($data['stateValue']);
                }
            } else {
                echo json_encode(['error', __('Cannot perform the change.')]);
            }
            echo json_encode(['success', __('Your change has been saved')]);
            $this->Organizations->save($organization);
        } else {
            $this->Flash->error(__('Not an AJAX Query', true));
            $this->redirect(['action' => 'index']);
        }
    }

    /**
     * Edit approved method
     * @param string $id id
     * @return redirect
     */
    public function editValidated($id)
    {
        $this->autoRender = false;
        $organization = $this->Organizations->get($id);
        $organization->editIsValidated(1);
        if ($this->Organizations->save($organization)) {
            $this->Flash->success(__('The organization has been approved.'));
            return $this->redirect(['action' => 'view', $id]);
        } else {
            $this->Flash->error(__('The organization could not be saved. Please, try again.'));
        }
    }

    /**
     * Edit rejected method
     * @param string $id id
     * @return redirect
     */
    public function editRejected($id)
    {
        $this->autoRender = false;
        $organization = $this->Organizations->get($id);
        $organization->editIsRejected(!($organization->getIsRejected()));
        if ($this->Organizations->save($organization)) {
            $this->Flash->success(__('The organization has been saved.'));
            return $this->redirect(['action' => 'view', $id]);
        } else {
            $this->Flash->error(__('The organization could not be saved. Please, try again.'));
        }
    }

    /**
     * Delete method
     * @param string $id id
     * @return redirect
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $organization = $this->Organizations->get($id);
        if ($this->Organizations->delete($organization)) {
            $this->Flash->success(__('The organization has been deleted.'));
        } else {
            $this->Flash->error(__('The organization could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
