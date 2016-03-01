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
        'editProfessor' => ['edit_mission', 'edit_missions'],
        'editAccepted' => ['edit_mission', 'edit_missions'],
        'editArchived' => ['edit_mission', 'edit_missions'],
        'editApplicationStatus' => ['edit_mission', 'edit_missions'],
        'view' => ['view_mission', 'view_missions'],
        'delete' => ['delete_mission', 'delete_missions'],
        'apply' => ['apply_mission']
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
     * SetFilter method
     *
     * @param string $key   key
     * @param string $value value
     *
     * @return void
     */
    private function _setFilter($key, $value)
    {
        if (!empty($value)) {
            $this->request->session()->write('filter.mission.' . $key, $value);
        } else {
            $this->request->session()->delete('filter.mission.' . $key);
        }
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $session = $this->request->session();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->setFilter('mission_select', $this->request->data['mission_select']);
            $this->setFilter('org_select', $this->request->data['org_select']);
            $this->setFilter('applicationState', $this->request->data['applicationState']);
            $this->setFilter('studentUniversity', $this->request->data['studentUniversity']);
            $this->setFilter('profFilter', $this->request->data['profFilter']);
            $this->setFilter('session_select', $this->request->data['session_select']);
            $this->setFilter('studentUniversity', $this->request->data['studentUniversity']);
            $this->setFilter('professorUniversity', $this->request->data['professorUniversity']);
        }
        // query builder
        $query = $this->Missions->find()->contain(['Projects', 'Projects.Organizations', 'Applications', 'TypeMissions', 'Users', 'Professors']);
        if (!empty($tmp = $this->request->session()->read('filter.mission.mission_select'))) {
            $query->where(['TypeMissions.id' => $tmp]);
        }
        if (!empty($tmp = $session->read('filter.mission.org_select'))) {
            $filterView['org_select'] = $tmp;
            $query->matching(
                'Projects.Organizations',
                function ($q) use ($tmp) {
                    return $q->where(['Organizations.id' => $tmp]);
                }
            );
        }
        if (!empty($tmp = $this->request->session()->read('filter.mission.session_select'))) {
            $query->where(['Missions.session' => $tmp]);
        }
        $chooseStudentUniversity = false;
        if (!empty($tmp = $this->request->session()->read('filter.mission.applicationState'))) {
            // @codingStandardsIgnoreStart
            switch ($tmp) {
                case 1: // accepted
                    $query->matching(
                        'Applications',
                        function ($q) {
                            return $q->where(['Applications.accepted' => true]);
                        }
                    );
                    $chooseStudentUniversity = true;
                    break;
                case 2: // rejected
                    $query->matching(
                        'Applications',
                        function ($q) {
                                return $q->where(['Applications.rejected' => true]);
                        }
                    );
                    $chooseStudentUniversity = true;
                    break;
                case 3: // unprocessed
                    $query->matching(
                        'Applications',
                        function ($q) {
                                return $q->where(['Applications.accepted' => false, 'Applications.rejected' => false]);
                        }
                    );
                    $chooseStudentUniversity = true;
                    break;
            }
            // @codingStandardsIgnoreEnd
        }
        if ($chooseStudentUniversity && !empty($tmp = $this->request->session()->read('filter.mission.studentUniversity'))) {
            $query->matching(
                'Applications.Students.Universities',
                function ($q) use ($tmp) {
                    return $q->where(['Universities.id' => $tmp]);
                }
            );
        }
        $chooseProfUniversity = false;
        if (!empty($tmp = $this->request->session()->read('filter.mission.profFilter'))) {
            //@codingStandardsIgnoreStart
            switch ($tmp) {
                case "hasProfessor":
                    $query->where(['Missions.professor_id !=' => 0]);
                    $chooseProfUniversity = true;
                    break;
                case "needsProfessor":
                    $query->where(['Missions.professor_id' => 0, 'OR' => [['TypeMissions.id' => 3], ['TypeMissions.id' => 4]]]);
                    $chooseProfUniversity = true;
                    break;
            }
            //@codingStandardsIgnoreEnd
        }
        if ($chooseProfUniversity && !empty($tmp = $this->request->session()->read('filter.mission.professorUniversity'))) {
            $query->matching(
                'Professors.Universities',
                function ($q) use ($tmp) {
                    return $q->where(['Universities.id' => $tmp]);
                }
            );
        }
        $query->order(['Missions.modified' => 'DESC']);

        $organizations = $this->Missions->Projects->Organizations->find('list')->orderAsc('name')->toArray();
        $universities = $this->Missions->Users->Universities->find('list')->orderAsc('name')->toArray();
        $professors = $this->Missions->Professors->find('list')->orderAsc('lastName')->toArray();
        $typeMissions = $this->Missions->TypeMissions->find('list')->orderAsc('name')->toArray();
        $missionLevels = $this->Missions->MissionLevels->find('list')->orderAsc('name')->toArray();

        $missions = $this->paginate($query);

        $this->set(compact('missions', 'filterView', 'organizations', 'universities', 'professors', 'typeMissions', 'missionLevels'));
        $this->set('_serialize', ['missions']);
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
                    'Projects' => [
                        'Organizations'
                    ],
                    'MissionLevels',
                    'TypeMissions',
                    'Users',
                    'Professors',
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
                    $mission->editTypeId($this->request->data['type_mission']);
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
     *
     * @param string $id id
     *
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
                $data = $this->request->data;
                $internNbr = (isset($data['internNbr']) ? $data['internNbr'] : null);
                $mission->editInternNbr($internNbr);
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
     *
     * @param string $id id
     *
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
     *
     * @param int $id id
     *
     * @return redirect
     */
    public function apply($id)
    {
        $mission = $this->Missions->get(
            $id,
            [
                'contain' => ['Users', 'Applications', 'Projects', 'TypeMissions']
            ]
        );

        $userId = $this->request->session()->read('Auth.User.id');
        $user = TableRegistry::get('Users')->get($userId, ['contain' => 'Universities']);

        $userEmail = $user->getEmailPublic;
        $isProfessor = $user->isProfessor();
        $isStudent = $user->isStudent();

        if ($mission->project->isAccepted() && !$mission->project->isArchived()) {
            if ($user->id != $mission->mentor_id) {
                if ($mission->getRemainingPlaces() > 0) {
                    $applications = TableRegistry::get('Applications');

                    $professor = false;
                    $student = false;
                    if ($mission->getType() == 'Professor') {
                        $professor = true;
                    } else {
                        $student = true;
                    }

                    if (($user->isStudent() && $student) || ($user->isProfessor() && $professor)) {
                        if ($user->getFirstname() && $user->getLastname() && $user->getUniversity() && !is_null($user->getGender()) && $user->getBiography()) {
                            if (!$applications->findByUserId($userId)->where('Applications.mission_id = ' . $mission->getId())->ToArray()) {
                                if ($this->request->is(['patch', 'post', 'put'])) {
                                    $application = $applications->newEntity();

                                    $data = $this->request->data;
                                    $data['rejected'] = false;
                                    $data['accepted'] = false;
                                    $data['user_id'] = $userId;
                                    $data['mission_id'] = $mission->getId();

                                    $application = $applications->patchEntity($application, $data);

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
                        $this->Flash->error(__("This mission is not seeking someone matching your profile"));
                        return $this->redirect(['action' => 'view', $id]);
                    }
                    $this->set(compact('mission'));
                    $this->set('_serialize', ['mission']);
                } else {
                    $this->Flash->error(__('No more position available') . '.');
                    return $this->redirect(['action' => 'view', $id]);
                }
                $this->set(compact('mission', 'userEmail', 'isProfessor', 'isStudent'));
                $this->set('_serialize', ['mission']);
            } else {
                $this->Flash->error(__("You can't apply on your mission, you are the mentor") . '.');
                return $this->redirect(['action' => 'view', $id]);
            }
        } else {
            $this->Flash->error(__("You don't have permission to access this page."));
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        }
    }

    /**
     * EditMentor method
     *
     * @param int $id id
     *
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

    /**
     * EditProfessor method
     *
     * @param int $id id
     *
     * @return redirect
     */
    public function editProfessor($id = null)
    {
        $mission = $this->Missions->get(
            $id,
            [
                'contain' =>
                    [
                        'Projects',
                        'Professors'
                    ]
            ]
        );

        $professors = $this->Users->find('all', ['conditions' => ['isProfessor' => true]]);
        $currentProfessorId = $mission->getProfessorId();

        if ($this->request->is(['patch', 'post', 'put'])) {
            if (count($this->request->data)) {
                $professorId = $this->request->data['users'];

                $mission->editProfessorId($professorId[0]);

                if ($this->Missions->save($mission)) {
                    $this->Flash->success(__('The professor have been modified.'));
                    return $this->redirect(['action' => 'view', $mission->id]);
                } else {
                    $this->Flash->error(__('The professor could not be modified. Please,try again.'));
                }
            } else {
                $this->Flash->error(__('There must be at least one professor'));
            }
        }

        $this->set(compact('currentProfessorId', 'professors', 'mission'));
        $this->set('_serialize', ['mission']);
    }
}
