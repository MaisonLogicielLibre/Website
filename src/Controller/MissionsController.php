<?php
/**
 * Missions controller
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
 * Missions controller
 *
 * @category Controller
 * @package  Website
 * @author   CakePHP <cakephp@email.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://cakephp.org CakePHP(tm) Project
 */
class MissionsController extends AppController
{

    private $_permissions = [
        'index' => ['list_missions_all'],
        'add' => ['add_mission'],
        'submit' => ['submit_mission'],
        'edit' => ['edit_mission', 'edit_missions'],
        'view' => ['view_mission', 'view_missions'],
        'delete' => ['delete_mission', 'delete_missions']
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
        $this->Auth->allow(['view']);
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Projects']
        ];
        $this->set('missions', $this->paginate($this->Missions));
        $this->set('_serialize', ['missions']);
    }

    /**
     * View method
     *
     * @param string|null $id Mission id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mission = $this->Missions->get($id, [
            'contain' => ['Projects', 'MissionLevels', 'TypeMissions']
        ]);
        $this->set('mission', $mission);
        $this->set('_serialize', ['mission']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add($projectId = null)
    {
        if (!is_null($projectId)) {
            $user = $this->Users->findById($this->request->session()->read('Auth.User.id'))->first();
            // Get the project object
            $this->loadModel('Projects');
            $project = $this->Projects->get($projectId, [
                'contain' => ['Mentors']
            ]);

            // Check if your a mentor on this project
            if ($user->isMentorOf($projectId)) {

                $mission = $this->Missions->newEntity();
                if ($this->request->is('post')) {
                    $mission = $this->Missions->patchEntity($mission, $this->request->data);

                    $mission->editProjectId($projectId);
                    $mission->editMentorId($user->getId());

                    if ($this->Missions->save($mission)) {
                        $this->Flash->success(__('The mission has been saved.'));
                        return $this->redirect(['controller' => 'Projects', 'action' => 'view', $projectId]);
                    } else {
                        $this->Flash->error(__('The mission could not be saved. Please, try again.'));
                    }
                }
                $projects = $this->Missions->Projects->find('list', ['limit' => 200]);
                $missionLevels = $this->Missions->MissionLevels->find('list', ['limit' => 200]);
                $typeMissions = $this->Missions->TypeMissions->find('list', ['limit' => 200]);
                $this->set(compact('mission', 'projects', 'missionLevels', 'typeMissions', 'projectId'));
                $this->set('_serialize', ['mission']);
            } else {
                return $this->redirect(['controller' => 'projects', 'action' => 'index']);
            }
        } else {
            return $this->redirect(['controller' => 'projects', 'action' => 'index']);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Mission id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mission = $this->Missions->get($id, [
            'contain' => ['MissionLevels', 'TypeMissions']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mission = $this->Missions->patchEntity($mission, $this->request->data);
            if ($this->Missions->save($mission)) {
                $this->Flash->success(__('The mission has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The mission could not be saved. Please, try again.'));
            }
        }
        $projects = $this->Missions->Projects->find('list', ['limit' => 200]);
        $missionLevels = $this->Missions->MissionLevels->find('list', ['limit' => 200]);
        $typeMissions = $this->Missions->TypeMissions->find('list', ['limit' => 200]);
        $this->set(compact('mission', 'projects', 'missionLevels', 'typeMissions'));
        $this->set('_serialize', ['mission']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Mission id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mission = $this->Missions->get($id);
        if ($this->Missions->delete($mission)) {
            $this->Flash->success(__('The mission has been deleted.'));
        } else {
            $this->Flash->error(__('The mission could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
