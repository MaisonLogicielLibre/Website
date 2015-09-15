<?php
/**
 * ProjectsUsersMissions controller
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
 * ProjectsUsersMissions controller
 *
 * @category Controller
 * @package  Website
 * @author   CakePHP <cakephp@email.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://cakephp.org CakePHP(tm) Project
 */
class ProjectsUsersMissionsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('projectsUsersMissions', $this->paginate($this->ProjectsUsersMissions));
        $this->set('_serialize', ['projectsUsersMissions']);
    }

    /**
     * View method
     * @param string $id id
     * @return void
     */
    public function view($id = null)
    {
        $projectsUsersMission = $this->ProjectsUsersMissions->get(
            $id,
            [
            'contain' => []
            ]
        );
        $this->set('projectsUsersMission', $projectsUsersMission);
        $this->set('_serialize', ['projectsUsersMission']);
    }

    /**
     * Add method
     * @return redirect
     */
    public function add()
    {
        $projectsUsersMission = $this->ProjectsUsersMissions->newEntity();
        if ($this->request->is('post')) {
            $projectsUsersMission = $this->ProjectsUsersMissions->patchEntity($projectsUsersMission, $this->request->data);
            if ($this->ProjectsUsersMissions->save($projectsUsersMission)) {
                $this->Flash->success(__('The projects users mission has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The projects users mission could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('projectsUsersMission'));
        $this->set('_serialize', ['projectsUsersMission']);
    }

    /**
     * Edit method
     * @param string $id id
     * @return redirect
     */
    public function edit($id = null)
    {
        $projectsUsersMission = $this->ProjectsUsersMissions->get(
            $id,
            [
            'contain' => []
            ]
        );
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projectsUsersMission = $this->ProjectsUsersMissions->patchEntity($projectsUsersMission, $this->request->data);
            if ($this->ProjectsUsersMissions->save($projectsUsersMission)) {
                $this->Flash->success(__('The projects users mission has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The projects users mission could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('projectsUsersMission'));
        $this->set('_serialize', ['projectsUsersMission']);
    }

    /**
     * Delete method
     * @param string $id id
     * @return redirect
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projectsUsersMission = $this->ProjectsUsersMissions->get($id);
        if ($this->ProjectsUsersMissions->delete($projectsUsersMission)) {
            $this->Flash->success(__('The projects users mission has been deleted.'));
        } else {
            $this->Flash->error(__('The projects users mission could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
