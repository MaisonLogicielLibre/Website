<?php
/**
 * ProjectsUsers controller
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
 * ProjectsUsers controller
 *
 * @category Controller
 * @package  Website
 * @author   CakePHP <cakephp@email.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://cakephp.org CakePHP(tm) Project
 */
class ProjectsUsersController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('projectsUsers', $this->paginate($this->ProjectsUsers));
        $this->set('_serialize', ['projectsUsers']);
    }

    /**
     * View method
     * @param string $id id
     * @return void
     */
    public function view($id = null)
    {
        $projectsUser = $this->ProjectsUsers->get(
            $id,
            [
            'contain' => []
            ]
        );
        $this->set('projectsUser', $projectsUser);
        $this->set('_serialize', ['projectsUser']);
    }

    /**
     * Add method
     * @return redirect
     */
    public function add()
    {
        $projectsUser = $this->ProjectsUsers->newEntity();
        if ($this->request->is('post')) {
            $projectsUser = $this->ProjectsUsers->patchEntity($projectsUser, $this->request->data);
            if ($this->ProjectsUsers->save($projectsUser)) {
                $this->Flash->success(__('The projects user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The projects user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('projectsUser'));
        $this->set('_serialize', ['projectsUser']);
    }

    /**
     * Edit method
     * @param string $id id
     * @return redirect
     */
    public function edit($id = null)
    {
        $projectsUser = $this->ProjectsUsers->get(
            $id,
            [
            'contain' => []
            ]
        );
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projectsUser = $this->ProjectsUsers->patchEntity($projectsUser, $this->request->data);
            if ($this->ProjectsUsers->save($projectsUser)) {
                $this->Flash->success(__('The projects user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The projects user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('projectsUser'));
        $this->set('_serialize', ['projectsUser']);
    }

    /**
     * Delete method
     * @param string $id id
     * @return redirect
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projectsUser = $this->ProjectsUsers->get($id);
        if ($this->ProjectsUsers->delete($projectsUser)) {
            $this->Flash->success(__('The projects user has been deleted.'));
        } else {
            $this->Flash->error(__('The projects user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
