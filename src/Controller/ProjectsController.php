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
        'view' => ['Student', 'Mentor', 'Administrator'],
        'view_admin' => ['Administrator'],
		'delete' => ['Administrator']
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
            'contain' => []
            ]
        );
        $this->set('project', $project);
        $this->set('_serialize', ['project']);
    }

    /**
     * Add method
     * @return redirect
     */
    public function add()
    {
        $project = $this->Projects->newEntity();
        if ($this->request->is('post')) {
            $project = $this->Projects->patchEntity($project, $this->request->data);
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The project could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('project'));
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
            'contain' => []
            ]
        );
        if ($this->request->is(['patch', 'post', 'put'])) {
            $project = $this->Projects->patchEntity($project, $this->request->data);
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The project could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('project'));
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
