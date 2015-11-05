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
use Cake\Mailer\MailerAwareTrait;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;

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
    use MailerAwareTrait;

    private $_permissions = [
        'index' => ['list_missions_all'],
        'add' => ['add_mission'],
        'submit' => ['submit_mission'],
        'edit' => ['edit_mission', 'edit_missions'],
        'editAccepted' => ['edit_mission', 'edit_missions'],
        'editArchived' => ['edit_mission', 'edit_missions'],
    'editApplicationStatus' => ['edit_mission', 'edit_missions'],
        'view' => ['view_mission', 'view_missions'],
        'delete' => ['delete_mission', 'delete_missions'],
    'apply' => ['apply_mission']
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
     * View method
     *
     * @param string|null $id Mission id.
     *
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mission = $this->Missions->get(
            $id,
            [
            'contain' => [
                'Projects' => ['Organizations'],
                'MissionLevels',
                'TypeMissions',
                'Users'
            ]
            ]
        );
        
        $data = $this->DataTables->find(
            'applications',
            [
            'contain' => ['Users']
            ]
        );
        
        $user = $this->Users->findById($this->request->session()->read('Auth.User.id'))->first();
        
        $projectId = $mission->getProjectId();
        $this->set(compact('mission', 'projectId', 'user'));
        $this->set(
            [
                'data' => $data,
                '_serialize' => array_merge($this->viewVars['_serialize'], ['data', 'mission'])
            ]
        );
    }

    /**
     * Add method
     *
     * @param int $projectId Project id.
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add($projectId = null)
    {
        if (!is_null($projectId)) {
            $user = $this->Users->findById($this->request->session()->read('Auth.User.id'))->first();
            // Get the project object
            $this->loadModel('Projects');
            $project = $this->Projects->get(
                $projectId,
                [
                'contain' => ['Mentors']
                ]
            );

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
                $missionLevels = $this->Missions->MissionLevels->find('all')->toArray();
                $typeMissions = $this->Missions->TypeMissions->find('all')->toArray();
                $this->set(compact('mission', 'missionLevels', 'typeMissions', 'projectId'));
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
     * @param string $id id
     * @return redirect
     */
    public function edit($id = null)
    {
        $mission = $this->Missions->get(
            $id,
            [
                'contain' => ['Projects', 'TypeMissions', 'MissionLevels']
            ]
        );
        if ($this->request->is(['patch', 'post', 'put'])) {
            $project = $this->Missions->patchEntity($mission, $this->request->data);
            if ($this->Missions->save($mission)) {
                $this->Flash->success(__('The mission has been edited.'));
                return $this->redirect(['action' => 'view', $mission->id]);
            } else {
                $this->Flash->error(__('The mission could not be edited. Please, try again.'));
            }
        }
        $missionLevels = $this->Missions->MissionLevels->find('all')->toArray();
        $typeMissions = $this->Missions->TypeMissions->find('all')->toArray();
        $this->set(compact('mission', 'typeMissions', 'missionLevels'));
        $this->set('_serialize', ['mission']);
    }

    /**
     * Edit archived method
     * @param string $id id
     * @return redirect
     */
    public function editArchived($id)
    {
        $this->autoRender = false;
        $mission = $this->Missions->get($id);
        $mission->editArchived(!($mission->isArchived()));
        if ($this->Missions->save($mission)) {
            if ($mission->archived) {
                $this->Flash->success(__('The mission has been archived.'));
            } else {
                $this->Flash->success(__('The mission has been restored.'));
            }
            return $this->redirect(['action' => 'view', $id]);
        } else {
            $this->Flash->error(__('The mission could not be archived. Please, try again.'));
            return $this->redirect(['action' => 'view', $id]);
        }
    }
    
    /**
     * Apply method
     * @param int $id id
     * @return redirect
     */
    public function apply($id)
    {
        $mission = $this->Missions->get(
            $id,
            [
                'contain' => ['Users']
            ]
        );
		
		$applications = TableRegistry::get('Applications');
		$userId = $this->request->session()->read('Auth.User.id');
		
        if(!$applications->findByUserId($userId)->where('Applications.mission_id = ' . $mission->getId())->ToArray()) {
			if ($this->request->is(['patch', 'post', 'put'])) {

				$application = $applications->newEntity();
				
				$application->editMissionId($mission->getId());
				$application->editUserId($userId);
				$application->editAccepted(false);
				$application->editRejected(false);
			
				if ($applications->save($application)) {
					$this->Flash->success(__('You have applied on the mission'));
					$user = $this->Users->get($userId);
					$mentor = $mission->getMentor();
					
					$linkMission = Router::url(['controller' => 'Missions', 'action' => 'view', $mission->getId(), '_full' => true]);
					$linkUser = Router::url(['controller' => 'Users', 'action' => 'view', $userId, '_full' => true]);
					$this->getMailer('Application')->send('newApplication', [$user, $mentor, $mission, $linkMission, $linkUser]);
			
					return $this->redirect(['action' => 'view', $id]);
					
				} else {
					$this->Flash->error(__('There was an error. Please, try again.'));
				}
			}
		} else {
			$this->Flash->error(__('You have already applied on this mission.'));
			return $this->redirect(['action' => 'view', $id]);
		}
        
        $this->set(compact('mission'));
        $this->set('_serialize', ['mission']);
    }
}
