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
use Cake\Event\Event;
use Cake\Mailer\MailerAwareTrait;
use Cake\ORM\TableRegistry;

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
    use MailerAwareTrait;

    private $_permissions = [
        'add' => ['add_project'],
        'submit' => ['submit_project'],
        'edit' => ['edit_project', 'edit_projects'],
        'editMentor' => ['edit_project', 'edit_projects'],
        'editState' => ['edit_project', 'edit_projects'],
        'editAccepted' => ['edit_project', 'edit_projects'],
        'editArchived' => ['edit_project', 'edit_projects'],
        'delete' => ['delete_project', 'delete_projects'],
        'apply' => ['add_application'],
        'myProjects' => [],
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

        $orgUser = (!is_null($user) ? array_map(
            function ($o) {
                return $o->getId();
            },
            $user->getOrganizationsJoined()
        ) : []);

        if (!is_null($user) && $user->hasPermissionName(['list_projects_all'])) {
            $this->adminIndex();
        } else {
            $data = $this->DataTables
                ->find(
                    'Projects',
                    [
                        'contain' => [
                            'Organizations' =>
                                [
                                    'fields' =>
                                        [
                                            'id', 'name', 'OrganizationsProjects.project_id'
                                        ]
                                ]
                        ],
                        'fields' =>
                            [
                                'id', 'name', 'link', 'accepted'
                            ],
                            'join' =>
                            [
                                [
                                    'table' => 'projects_mentors',
                                    'alias' => 'm',
                                    'type' => 'LEFT',
                                    'conditions' => 'm.project_id = Projects.id'
                                ],
                                [
                                    'table' => 'projects_contributors',
                                    'alias' => 'c',
                                    'type' => 'LEFT',
                                    'conditions' => 'c.project_id = Projects.id'
                                ],
                                [
                                    'table' => 'organizations_projects',
                                    'alias' => 'o',
                                    'type' => 'LEFT',
                                    'conditions' => 'o.project_id = Projects.id'
                                ]
                            ],
                            'conditions' =>
                            [
                                'OR' =>
                                    [
                                        [
                                            'archived' => 0,
                                            'accepted' => 1,
                                        ],
                                        [
                                            'archived' => 0,
                                            'm.user_id' => (!is_null($user) ? $user->getId() : ' '),
                                        ],
                                        [
                                            'archived' => 0,
                                            'o.organization_id IN' => (!empty($orgUser) ? $orgUser : ' ')
                                        ]
                                    ]
                            ],
                            'group' => 'Projects.id'
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
     * MyProjects method
     *
     * @return redirect
     */
    public function myProjects()
    {
        $orgs = $this->Projects->Organizations->find('list', ['limit' => 200]);
        $this->set(compact('orgs'));
        $user = $this->request->session()->read('Auth.User');

        $data = $this->DataTables
            ->find(
                'Projects',
                [
                    'contain' => [
                        'Organizations' => [
                            'fields' => [
                                'id', 'name', 'OrganizationsProjects.project_id'
                            ]
                        ]
                    ],
                    'fields' => [
                        'id', 'name', 'link', 'accepted'
                    ],
                    'join' =>
                        [
                            [
                                'table' => 'projects_mentors',
                                'alias' => 'm',
                                'type' => 'LEFT',
                                'conditions' => 'm.project_id = Projects.id'
                            ],
                            [
                                'table' => 'projects_contributors',
                                'alias' => 'c',
                                'type' => 'LEFT',
                                'conditions' => 'c.project_id = Projects.id'
                            ]
                        ],
                        'conditions' =>
                        [
                            'OR' => [
                                [
                                    'm.user_id' => $user['id'],
                                ],
                                [
                                    'c.user_id' => $user['id'],
                                ]
                            ]
                        ],
                        'group' => 'Projects.id'
                ]
            );

        $this->set(
            [
                'data' => $data,
                '_serialize' => array_merge($this->viewVars['_serialize'], ['data']),
                compact('org')
            ]
        );
    }

    /**
     * Submit method
     *
     * @return redirect
     */
    public function submit()
    {
        $this->loadModel('Missions');

        $project = $this->Projects->newEntity();
        $mission = $this->Missions->newEntity();

        $project->editAccepted(false);
        $project->editArchived(false);
        $mentor = $this->Projects->Mentors->findById($this->request->session()->read('Auth.User.id'))->first();
        $project->mentors = [$mentor];

        if ($this->request->is('post')) {
            $post = $this->request->data;
            $project = $this->Projects->patchEntity($project, $post);

            $missions = $this->_constructMission($project->id, $mentor->getId(), $post);
            $project = $this->_addErrorsMissionPost($project, $missions);

            if (!is_null($mission)) {
                $project->editMissions($missions);
            }

            if ($this->Projects->save(
                $project,
                [
                    'associated' =>
                        [
                            'Mentors',
                            'Organizations',
                            'Missions' =>
                                [
                                    'associated' =>
                                        [
                                            'MissionLevels',
                                            'TypeMissions'
                                        ]
                                ]
                        ]
                ]
            )
            ) {
                $this->Flash->success(__('The project has been saved.'));
                return $this->redirect(['action' => 'view', $project->id]);
            } else {
                $this->Flash->error(__('The project could not be saved. Please, try again.'));
            }
        }

        $organizations = $this->Projects->Organizations->find('list')
            ->join(
                [
                    'table' => 'organizations_members',
                    'alias' => 'm',
                    'type' => 'LEFT',
                    'conditions' => 'm.organization_id = Organizations.id'
                ]
            )->where(
                [
                    'm.user_id' => $mentor->getId()
                ]
            );

        $missionLevels = $this->Missions->MissionLevels->find('all')->toArray();
        $typeMissions = $this->Missions->TypeMissions->find('all')->toArray();
        $this->set(compact('mission', 'missionLevels', 'typeMissions', 'project', 'organizations'));
        $this->set('_serialize', ['project', 'mission']);
    }

    /**
     * Admin index method
     *
     * @return void
     */
    protected function adminIndex()
    {
        $data = $this->DataTables->find(
            'Projects',
            [
                'contain' => ['Organizations']
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
     *
     * @param string $id id
     *
     * @return void
     */
    public function view($id = null)
    {
        $user = $this->loadModel("Users")->findById($this->request->session()->read('Auth.User.id'))->first();

        $project = $this->Projects->get(
            $id,
            [
                'contain' => ['Contributors', 'Mentors', 'Organizations']
            ]
        );

        if ($user) {
            $userOrgs = array_map(
                function ($o) {
                    return $o->getId();
                },
                $user->getOrganizationsJoined()
            );
            $projectOrgs = array_map(
                function ($o) {
                    return $o->getId();
                },
                $project->getOrganizations()
            );
            $projectContrib = array_map(
                function ($o) {
                    return $o->getId();
                },
                $project->getContributors()
            );
            $projectMentors = array_map(
                function ($o) {
                    return $o->getId();
                },
                $project->getMentors()
            );
        }

        if ($project->isAccepted() || $user && (count(array_intersect($projectOrgs, $userOrgs)) > 0 || in_array($user->getId(), $projectContrib) || in_array($user->getId(), $projectMentors)) || ($user && $user->hasRoleName(['Administrator']))) {
            $data = $this->DataTables->find(
                'Missions',
                [
                    'contain' => [
                        'TypeMissions' => [
                            'fields' => [
                                'id', 'name'
                            ]
                        ],
                        'Users'
                    ],

                    'conditions' => ['project_id' => $id],
                    'fields' => [
                      'Missions.id', 'Missions.name', 'Missions.session',
                      'Missions.length', 'Users.firstName', 'Users.lastName',
                      'Missions.archived'
                    ]
                ]
            );

            if (null != $this->request->session()->read('Auth.User.id')) {
                $user = $this->Users->findById($this->request->session()->read('Auth.User.id'))->first();
            } else {
                $user = null;
            }

            $this->set(compact('project', 'user'));
            $this->set(
                [
                    'data' => $data,
                    '_serialize' => array_merge($this->viewVars['_serialize'], ['data'])
                ]
            );
        } else {
            return $this->redirect(['action' => 'index']);
        }
    }

    /**
     * Add method
     *
     * @return redirect
     */
    public function add()
    {
        $project = $this->Projects->newEntity();

        $project->editAccepted(true);
        $project->editArchived(false);
        $mentor = $this->Projects->Mentors->findById($this->request->session()->read('Auth.User.id'))->first();
        $project->mentors = [$mentor];

        if ($this->request->is('post')) {
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
     * Edit method
     *
     * @param string $id id
     *
     * @return redirect
     */
    public function edit($id = null)
    {
        $project = $this->Projects->get(
            $id,
            [
                'contain' => ['Contributors', 'Mentors', 'Organizations']
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
        $user = $this->Users->get($this->request->session()->read('Auth.User.id'));
        if ($user->hasRoleName(['Administrator'])) {
            $organizations = $this->Projects->Organizations->find('list')
                ->join(
                    [
                        'table' => 'organizations_members',
                        'alias' => 'm',
                        'type' => 'LEFT',
                        'conditions' => 'm.organization_id = Organizations.id'
                    ]
                );
            $this->set(compact('project', 'organizations'));
            $this->set('_serialize', ['project']);
        } else {
            $organizations = $this->Projects->Organizations->find('list')
                ->join(
                    [
                        'table' => 'organizations_members',
                        'alias' => 'm',
                        'type' => 'LEFT',
                        'conditions' => 'm.organization_id = Organizations.id'
                    ]
                )->where(
                    [
                        'm.user_id' => $this->request->session()->read('Auth.User.id')
                    ]
                );
            $this->set(compact('project', 'organizations'));
            $this->set('_serialize', ['project']);
        }
    }

    /**
     * Edit state method
     *
     * @return void
     */
    public function editState()
    {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $data = $this->request->data;
            $project = $this->Projects->get(intval($data['id']), ['contain' => ['Mentors']]);
            if ($data['state'] == '4') { // Archived
                $project->editArchived($data['stateValue']);
                foreach ($project->getMentors() as $mentor) {
                    if ($data['stateValue']) {
                        $this->getMailer('Project')->send('archiveProject', [$project, $mentor]);

                        $notifications = $this->loadModel("Notifications");
                        $notification = $notifications->newEntity();
                        $notification->editName(__("Your project has been archived"));
                        $notification->editLink('projects/view/' . $project->id);
                        $notification->editUser($mentor);
                        $notifications->save($notification);
                    } else {
                        $this->getMailer('Project')->send('unarchiveProject', [$project, $mentor]);

                        $notifications = $this->loadModel("Notifications");
                        $notification = $notifications->newEntity();
                        $notification->editName(__("Your project has been unarchived"));
                        $notification->editLink('projects/view/' . $project->id);
                        $notification->editUser($mentor);
                        $notifications->save($notification);
                    }
                }
            } elseif ($data['state'] == '3') { // Approved
                if (!$project->isAccepted()) {
                    $project->editAccepted($data['stateValue']);
                    foreach ($project->getMentors() as $mentor) {
                        $this->getMailer('Project')->send('approveProject', [$project, $mentor]);

                        $notifications = $this->loadModel("Notifications");
                        $notification = $notifications->newEntity();
                        $notification->editName(__("Your project has been approved"));
                        $notification->editLink('projects/view/' . $project->id);
                        $notification->editUser($mentor);
                        $notifications->save($notification);
                    }
                }
            } else {
                $this->response->type('application/json');
                $json = json_encode(['error', __('Cannot perform the change.')]);
                $this->response->body($json);

                return $this->response;
            }
            $this->Projects->save($project);

            $this->response->type('application/json');
            $json = json_encode(['success', __('Your change has been saved')]);
            $this->response->body($json);

            return $this->response;
        } else {
            $this->Flash->error(__('Not an AJAX Query', true));
            $this->redirect(['action' => 'index']);
        }
    }

    /**
     * Edit accepted method
     *
     * @param string $id id
     *
     * @return redirect
     */
    public function editAccepted($id)
    {
        $this->autoRender = false;
        $project = $this->Projects->get($id, ['contain' => ['Mentors']]);
        $project->editAccepted(1);
        if ($this->Projects->save($project)) {
            foreach ($project->getMentors() as $mentor) {
                $this->getMailer('Project')->send('approveProject', [$project, $mentor]);
                $notifications = $this->loadModel("Notifications");
                $notification = $notifications->newEntity();
                $notification->editName(__("Your project has been accepted"));
                $notification->editLink('projects/view/' . $project->id);
                $notification->editUser($mentor);
                $notifications->save($notification);
            }
            $this->Flash->success(__('The project has been accepted.'));
            return $this->redirect(['action' => 'view', $id]);
        } else {
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
            return $this->redirect(['action' => 'view', $id]);
        }
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
        $project = $this->Projects->get($id, ['contain' => ['Mentors']]);
        $project->editArchived(!($project->isArchived()));
        if ($this->Projects->save($project)) {
            foreach ($project->getMentors() as $mentor) {
                if ($project->isArchived()) {
                    $this->getMailer('Project')->send('archiveProject', [$project, $mentor]);

                    $notifications = $this->loadModel("Notifications");
                    $notification = $notifications->newEntity();
                    $notification->editName(__("Your project has been archived"));
                    $notification->editLink('projects/view/' . $project->id);
                    $notification->editUser($mentor);
                    $notifications->save($notification);
                } else {
                    $this->getMailer('Project')->send('unarchiveProject', [$project, $mentor]);

                    $notifications = $this->loadModel("Notifications");
                    $notification = $notifications->newEntity();
                    $notification->editName(__("Your project has been unarchived"));
                    $notification->editLink('projects/view/' . $project->id);
                    $notification->editUser($mentor);
                    $notifications->save($notification);
                }
            }
            $this->Flash->success(__('The project has been saved.'));
            return $this->redirect(['action' => 'view', $id]);
        } else {
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
            return $this->redirect(['action' => 'view', $id]);
        }
    }

    /**
     * Delete method
     *
     * @param int $id id
     *
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

    /**
     * Apply method
     *
     * @param int $id id
     *
     * @return redirect
     */
    public function apply($id = null)
    {
        $project = $this->Projects->get(
            $id,
            [
                'contain' => []
            ]
        );
        $application = TableRegistry::get('Applications')->newEntity();

        $application->editAccepted(false);
        $application->editArchived(false);
        $application->editUserId($this->request->session()->read('Auth.User.id'));
        $application->editProjectId($project->id);

        if ($this->request->is('post')) {
            $application = TableRegistry::get('Applications')->patchEntity($application, $this->request->data);
            if (TableRegistry::get('Applications')->save($application)) {
                $this->Flash->success(__('The application has been saved.'));
                return $this->redirect(['action' => 'view', $project->id]);
            } else {
                $this->Flash->error(__('The application could not be saved. Please, try again.'));
            }
        }
        $user = $this->Users->findById($this->request->session()->read('Auth.User.id'))->first();
        $typeApplications = $this->Projects->Applications->TypeApplications->find('list', ['limit' => 200]);
        $this->set(compact('application', 'project', 'user', 'typeApplications'));
        $this->set('_serialize', ['application']);
    }

    /**
     * Build missions object from json post
     *
     * @param int   $projectId projectId
     * @param int   $mentorId  mentorId
     * @param array $post      post
     *
     * @return array|null
     */
    private function _constructMission($projectId, $mentorId, $post)
    {
        $missions = null;

        // Get only mission-* key from the array
        $missionsPost = array_intersect_key($post, array_flip(preg_grep('/^mission-/', array_keys($post))));

        foreach ($missionsPost as $missionPost) {
            $missionPost = json_decode($missionPost, true);
            $mission = $this->Missions->newEntity();
            $temp = [];
            foreach ($missionPost as $m) {
                if ($m['name'] == 'type_missions[_ids][]') {
                    $temp['type_missions']['_ids'][] = $m['value'];
                } elseif ($m['name'] == 'mission_levels[_ids][]') {
                    $temp['mission_levels']['_ids'][] = $m['value'];
                } else {
                    $temp[$m['name']] = $m['value'];
                }
            }
            $mission = $this->Missions->patchEntity($mission, $temp);

            $mission->editProjectId($projectId);
            $mission->editMentorId($mentorId);
            $missions[] = $mission;
        }

        return $missions;
    }

    /**
     * Add backend error in missionpost for the view
     *
     * @param array $post     post
     * @param array $missions missions
     *
     * @return array
     */
    private function _addErrorsMissionPost($post, $missions)
    {
        if (!is_null($missions)) {
            foreach ($missions as $key => $mission) {
                $parseErrors = [];
                foreach ($mission->errors() as $fieldName => $errors) {
                    while (is_array($errors)) {
                        $errors = array_pop($errors);
                    }
                    $parseErrors[$fieldName] = $errors;
                }
                $temp = json_decode($post['mission-' . $key]);
                $temp[] = [$parseErrors];
                $post['mission-' . $key] = json_encode($temp);
            }
        }
        return $post;
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
        $project = $this->Projects->get(
            $id,
            [
            'contain' => ['Organizations', 'Mentors', 'Missions']
            ]
        );

        $organizations = TableRegistry::get('Organizations');
        $users = TableRegistry::get('Users');
        $mentors = $project->getMentors();


        $members = [];

        foreach ($project->getOrganizations() as $organization) {
            $organization = $organizations->get($organization->getId(), ['contain' => ['Members']]);

            foreach ($organization->getMembers() as $member) {
                $members[] = $users->get($member->getId());
            }
        }

        $members = array_unique($members);

        if ($this->request->is(['patch', 'post', 'put'])) {
            if (count($this->request->data)) {
                $usersSelected = $this->request->data['users'];
                $project->modifyMentors($usersSelected);

                $mentorless = $project->checkMentorless();

                if (!count($mentorless)) {
                    $missions = TableRegistry::get('Missions');
                    foreach ($project->getMissions() as $mission) {
                        $missions->save($mission);
                    }

                    if ($this->Projects->save($project)) {
                        $this->Flash->success(__('The mentors have been modified.'));
                        return $this->redirect(['action' => 'view', $project->id]);
                    } else {
                        $this->Flash->error(__('The mentors could not be modified. Please,try again.'));
                    }
                } else {
                    $mentorMessage = "";
                    $missionMessage = "";
                    $mentorsId = [];
                    $mentorsId[] = 0;
                    foreach ($mentorless as $mission) {
                        $missionMessage = $missionMessage . $mission->getName() . ", ";
                        if (!array_search($mission->getMentorId(), $mentorsId)) {
                            $mentorsId[] = $mission->getMentorId();
                            $mentor = $this->Users->findById($mission->getMentorId())->first();
                            $mentorMessage = $mentorMessage . $mentor->getName() . ", ";
                        }
                    }

                    $mentorMessage = substr($mentorMessage, 0, -2);
                    $missionMessage = substr($missionMessage, 0, -2);

                    $this->Flash->error($mentorMessage . " " . __('would cause') . " " . $missionMessage . " " . __('to become mentorless'));
                }
            } else {
                $this->Flash->error(__('There must be at least one mentor'));
            }
        }

        $this->set(compact('project', 'members', 'mentors'));
        $this->set('_serialize', ['project']);
    }
}
