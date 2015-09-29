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
        $user = $this->loadModel("Users")->findById($user['id'])->first();

        if (isset($this->_permissions[$this->request->action])) {
            if ($user->hasRoleName($this->_permissions[$this->request->action])) {
                return true;
            }
        }
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
        $user = $this->Users->findById($this->request->session()->read('Auth.User.id'))->first();
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
                return $this->redirect(['action' => 'view', $application->project->id]);
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
