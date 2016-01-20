<?php
/**
 * Meetups controller
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
use Cake\ORM\TableRegistry;

/**
 * Meetups controller
 *
 * @category Controller
 * @package  Website
 * @author   CakePHP <cakephp@email.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://cakephp.org CakePHP(tm) Project
 */
class MeetupsController extends AppController
{
    private $_permissions = [
        'index' => ['list_meetups'],
        'add' => ['add_meetups'],
        'edit' => ['edit_meetups'],
        'view' => ['view_meetups'],
        'delete' => ['delete_meetups']
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
        $this->set('meetups', $this->paginate($this->Meetups));
        $this->set('_serialize', ['meetups']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $meetup = $this->Meetups->newEntity();
        if ($this->request->is('post')) {
            $meetup = $this->Meetups->patchEntity($meetup, $this->request->data);
            if ($this->Meetups->save($meetup)) {
                $this->Flash->success(__('The meetup has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The meetup could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('meetup'));
        $this->set('_serialize', ['meetup']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Meetup id.
     *
     * @return void Redirects on successful edit, renders view otherwise.
     *
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $meetup = $this->Meetups->get(
            $id,
            [
            'contain' => []
            ]
        );
        if ($this->request->is(['patch', 'post', 'put'])) {
            $meetup = $this->Meetups->patchEntity($meetup, $this->request->data);
            if ($this->Meetups->save($meetup)) {
                $this->Flash->success(__('The meetup has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The meetup could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('meetup'));
        $this->set('_serialize', ['meetup']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Meetup id.
     *
     * @return \Cake\Network\Response|null Redirects to index.
     *
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $meetup = $this->Meetups->get($id);
        if ($this->Meetups->delete($meetup)) {
            $this->Flash->success(__('The meetup has been deleted.'));
        } else {
            $this->Flash->error(__('The meetup could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
