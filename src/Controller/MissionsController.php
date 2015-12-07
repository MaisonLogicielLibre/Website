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
        'editMentor' => ['edit_mission', 'edit_missions'],
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
        $this->Auth->allow(['view', 'index']);
    }
	
	/**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $types = $this->loadModel("TypeMissions")->find('list', ['limit' => 200]);
        $this->set(compact('types'));
		
		$orgs = $this->loadModel("Organizations")->find('list', ['limit' => 200]);
        $this->set(compact('orgs'));
		
        $user = $this->loadModel("Users")->findById($this->request->session()->read('Auth.User.id'))->first();

		$data = $this->DataTables->find (
			'Missions',
			[
				'contain' => [
					'Projects' => [
						'Organizations'	=> [
							'fields' => [
								'id', 'name', 'OrganizationsProjects.project_id'
							]
						],
						'fields' => [
								'id', 'name'
						]
					],
					'TypeMissions' => [
						'fields' =>
							[
								'id', 'name', 'MissionsTypeMissions.mission_id'
							]
					],
				],
				'fields' =>[
					'id', 'name', 'session'
				],
				'conditions' =>[
					'AND' => [
						[
							'Projects.archived' => 0,
							'Projects.accepted' => 1
						],
						[
							'Missions.archived' => 0
						]
					]
				],
			]
		);

		$this->set(
			[
				'data' => $data,
				'_serialize' => array_merge($this->viewVars['_serialize'], ['data'])
			]
		);
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
                'Users',
                'Applications'
            ]
            ]
        );

        $user = $this->Users->findById($this->request->session()->read('Auth.User.id'))->first();
        $isMentor = false;
        if ($user && ($user->id == $mission->mentor_id)) {
            $isMentor = true;
        }

        if ($user && (($user->hasPermissionName(['edit_mission']) && $isMentor) || $user->hasPermissionName(['edit_missions']))) {
            $data = $this->DataTables->find(
                'Applications',
                [
                    'contain' => [
                        'Users' => [
                            'fields' => [
                                'id', 'firstName', 'lastName'
                            ],
                        ]
                    ],
                    'fields' => [
                        'id', 'accepted', 'rejected'
                    ],
                    'conditions' => ['mission_id' => $id]
                ]
            );
        } else {
            $data = $this->DataTables->find(
                'Applications',
                [
                    'contain' => [
                        'Users' => [
                            'fields' => [
                                'id', 'firstName', 'lastName'
                            ],
                        ]
                    ],
                    'fields' => [
                        'id',
                    ],
                    'conditions' => ['mission_id' => $id, 'accepted' => true]
                ]
            );
        }
        
        $projectId = $mission->getProjectId();
        $this->set(compact('mission', 'projectId', 'user', 'isMentor'));
        $this->set(
            [
                'data' => $data,
                '_serialize' => array_merge($this->viewVars['_serialize'], ['data'])
            ]
        );
    }
    
    /**
     * Add method
     *
     * @param int $projectId Project id.
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
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
                $this->set(compact('mission', 'missionLevels', 'typeMissions', 'project'));
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
                'contain' => ['Projects', 'TypeMissions', 'MissionLevels', 'Applications']
            ]
        );
        
        $applications = TableRegistry::get('Applications');
        
        $isEditable = true;
        $minInternNbr = 0;
        foreach ($mission->applications as $application) {
            $isEditable = false;
            if ($application->accepted == true) {
                $minInternNbr++;
            }
        }
        if ($minInternNbr == 0) {
            $minInternNbr = 1;
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            if ($isEditable) {
                $this->Missions->patchEntity($mission, $this->request->data);
                if ($minInternNbr === $mission->getInternNbr()) {
                    foreach ($mission->applications as $application) {
                        if ($application->accepted != true) {
                            $application->editRejected(true);
                            $applications->save($application);
                        }
                    }
                }
            } else {
                $mission->internNbr = $this->request->data['internNbr'];
            }

            if ($this->Missions->save($mission)) {
                $this->Flash->success(__('The mission has been edited.'));
                return $this->redirect(['action' => 'view', $mission->id]);
            } else {
                $this->Flash->error(__('The mission could not be edited. Please, try again.'));
            }

        }
        $missionLevels = $this->Missions->MissionLevels->find('all')->toArray();
        $typeMissions = $this->Missions->TypeMissions->find('all')->toArray();
        $this->set(compact('mission', 'typeMissions', 'missionLevels', 'isEditable', 'minInternNbr'));
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
                'contain' => ['Users', 'Applications', 'Projects']
            ]
        );

        if ($mission->project->isAccepted() && !$mission->project->isArchived()) {
            if ($mission->getRemainingPlaces() > 0) {
                $applications = TableRegistry::get('Applications');
                $userId = $this->request->session()->read('Auth.User.id');

                $user = TableRegistry::get('Users')->get($userId, ['contain' => 'Universities']);
                if ($user->isStudent()) {
                    if ($user->getFirstname() && $user->getLastname() && $user->getUniversity() && $user->getGender() && $user->getBiography()) {
                        if (!$applications->findByUserId($userId)->where('Applications.mission_id = ' . $mission->getId())->ToArray()) {
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
                    } else {
                        $this->Flash->error(__('You need to fill your profile before apply on this mission.'));
                        return $this->redirect(['action' => 'view', $id]);
                    }
                } else {
                    $this->Flash->error(__("Only students can apply on missions. If you are a student, please fill your profile."));
                    return $this->redirect(['action' => 'view', $id]);
                }
                $this->set(compact('mission'));
                $this->set('_serialize', ['mission']);
            } else {
                $this->Flash->error(__('No more position available') . '.');
                return $this->redirect(['action' => 'view', $id]);
            }
        } else {
            $this->Flash->error(__("You don't have permission to access this page."));
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        }
    }

    /**
     * EditMentor method
     * @param int $id id
     * @return redirect
     */
    public function editMentor($id = null)
    {
        $mission = $this->Missions->get(
            $id,
            [
            'contain' =>
                [
                    'Projects' =>
                        [
                            'Mentors'
                        ]
                ]
            ]
        );
        
        $mentors = $mission->getProject()->getMentors();
        $currentMentorId = $mission->getMentorId();
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            if (count($this->request->data)) {
                $mentorId = $this->request->data['users'];
                            
                $mission->editMentorId($mentorId[0]);
                
                if ($this->Missions->save($mission)) {
                    $this->Flash->success(__('The mentor have been modified.'));
                    return $this->redirect(['action' => 'view', $mission->id]);
                } else {
                    $this->Flash->error(__('The mentor could not be modified. Please,try again.'));
                }
            } else {
                $this->Flash->error(__('There must be at least one mentor'));
            }
        }
       
        $this->set(compact('currentMentorId', 'mentors', 'mission'));
        $this->set('_serialize', ['mission']);
    }
}
