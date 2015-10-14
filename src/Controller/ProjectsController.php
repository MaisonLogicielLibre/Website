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
    private $_permissions = [
        'index' => ['Student', 'Mentor', 'Administrator'],
        'add' => ['Administrator'],
        'submit' => ['Student', 'Mentor', 'Administrator'],
        'edit' => ['Administrator'],
        'editState' => ['Administrator'],
        'editAccepted' => ['Administrator'],
        'editArchived' => ['Administrator'],
        'view' => ['Student', 'Mentor', 'Administrator'],
        'delete' => ['Administrator'],
        'apply' => ['Student', 'Administrator', 'Mentor']
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
        $orgs = $this->Projects->Organizations->find('list', ['limit' => 200]);
        $this->set(compact('orgs'));

        $user = $this->loadModel("Users")->findById($this->request->session()->read('Auth.User.id'))->first();

        if (!is_null($user) && $user->hasRoleName(['Administrator'])) {
            $this->adminIndex();
        } else {
            $data = $this->DataTables
                ->find(
                    'Projects',
                    [
                        'contain' => ['Organizations'],
                        'conditions' =>
                            [
                                'accepted' => true,
                                'archived' => false
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
     * Submit method
     * @return redirect
     */
    public function submit()
    {
        $project = $this->Projects->newEntity();

        $project->editAccepted(false);
        $project->editArchived(false);
        $mentor = $this->Projects->Mentors->findById($this->request->session()->read('Auth.User.id'))->first();
        $project->mentors = [$mentor];

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
     * Admin index method
     *
     * @return void
     */
    public function adminIndex()
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

        if (null != $this->request->session()->read('Auth.User.id')) {
            $user = $this->Users->findById($this->request->session()->read('Auth.User.id'))->first();
        } else {
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
        $mentor = $this->Projects->Mentors->findById($this->request->session()->read('Auth.User.id'))->first();
        $project->mentors = [$mentor];

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
     * Edit state method
     * @return void
     */
    public function editState()
    {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $data = $this->request->data;
            $projects = $this->Projects->get(intval($data['id']));
            if ($data['state'] == '4') { // Archived
                $projects->editArchived($data['stateValue']);
            } elseif ($data['state'] == '3') { // Approved
                if (!$projects->isAccepted()) {
                    $projects->editAccepted($data['stateValue']);
                }
            } else {
                echo json_encode(['error', __('Cannot perform the change.')]);
            }
            echo json_encode(['success', __('Your change has been saved')]);
            $this->Projects->save($projects);
        } else {
            $this->Flash->error(__('Not an AJAX Query', true));
            $this->redirect(['action' => 'index']);
        }
    }

    /**
     * Edit accepted method
     * @param string $id id
     * @return redirect
     */
    public function editAccepted($id)
    {
        $this->autoRender = false;
        $project = $this->Projects->get($id);
        $project->editAccepted(1);
        if ($this->Projects->save($project)) {
            $this->Flash->success(__('The project has been accepted.'));
            return $this->redirect(['action' => 'view', $id]);
        } else {
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
            return $this->redirect(['action' => 'view', $id]);
        }
    }

    /**
     * Edit archived method
     * @param string $id id
     * @return redirect
     */
    public function editArchived($id)
    {
        $this->autoRender = false;
        $project = $this->Projects->get($id);
        $project->editArchived(!($project->isArchived()));
        if ($this->Projects->save($project)) {
            $this->Flash->success(__('The project has been saved.'));
            return $this->redirect(['action' => 'view', $id]);
        } else {
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
            return $this->redirect(['action' => 'view', $id]);
        }
    }

    /**
     * Delete method
     * @param int $id id
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
     * @param int $id id
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
}
