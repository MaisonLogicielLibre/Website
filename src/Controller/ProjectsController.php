<?php
/**
 * Projects controller
 *
 * @category Controller
 * @package  Website
 * @author   CakePHP <cakephp@email.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://cakephp.org CakePHP(tm) Project
 */
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;

/**
 * Projects controller
 *
 * @category Controller
 * @package  Website
 * @author   CakePHP <cakephp@email.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://cakephp.org CakePHP(tm) Project
 */
class ProjectsController extends AppController
{
    private $_permissions = [
        'index' => ['Student', 'Mentor', 'Administrator'],
        'add' => ['Administrator'],
        'submit' => ['Administrator'],
        'edit' => ['Administrator'],
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
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'finder' => [
                'show' => true
            ]
        ];
        $this->set('projects', $this->paginate($this->Projects));
        $this->set('_serialize', ['projects']);
    }

    /**
     * View method
     * @param string $id id
     * @return void
     */
    public function view($id = null)
    {
        $project = $this->Projects->get(
            $id,
            [
                'contain' => ['Contributors', 'Mentors', 'Organizations']
            ]
        );

        if(null != $this->request->session()->read('Auth.User.id')){
            $user = $this->Users->findById($this->request->session()->read('Auth.User.id'))->first();
        }
        else{
            $user = null;
        }

        $this->set(compact('project', 'user'));
        $this->set('_serialize', ['project']);
    }

    /**
     * Add method
     * @return redirect
     */
    public function add()
    {
        $project = $this->Projects->newEntity();

        $project->editAccepted(true);
        $project->editArchived(false);

        if ($this->request->is('post')) {
            $project = $this->Projects->patchEntity($project, $this->request->data);
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The project could not be saved. Please, try again.'));
            }
        }

        $organizations = $this->Projects->Organizations->find('list', ['limit' => 200]);
        $this->set(compact('project', 'organizations'));
        $this->set('_serialize', ['project']);
    }

    /**
     * Edit method
     * @param string $id id
     * @return redirect
     */
    public function edit($id = null)
    {
        $project = $this->Projects->get(
            $id,
            [
            'contain' => ['Organizations']
            ]
        );
        if ($this->request->is(['patch', 'post', 'put'])) {
            $project = $this->Projects->patchEntity($project, $this->request->data);
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));
                return $this->redirect(['action' => 'view', $project->id]);
            } else {
                $this->Flash->error(__('The project could not be saved. Please, try again.'));
            }
        }
        $organizations = $this->Projects->Organizations->find('list', ['limit' => 200]);
        $this->set(compact('project', 'organizations'));
        $this->set('_serialize', ['project']);
    }

    /**
     * Delete method
     * @param string $id id
     * @return redirect
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $project = $this->Projects->get($id);
        if ($this->Projects->delete($project)) {
            $this->Flash->success(__('The project has been deleted.'));
        } else {
            $this->Flash->error(__('The project could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
