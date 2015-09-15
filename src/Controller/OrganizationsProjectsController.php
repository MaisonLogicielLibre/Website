<?php
/**
 * OrganizationsProjects controller
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
 * OrganizationsProjects controller
 *
 * @category Controller
 * @package  Website
 * @author   CakePHP <cakephp@email.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://cakephp.org CakePHP(tm) Project
 */
class OrganizationsProjectsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('organizationsProjects', $this->paginate($this->OrganizationsProjects));
        $this->set('_serialize', ['organizationsProjects']);
    }

    /**
     * View method
     * @param string $id id
     * @return void
     */
    public function view($id = null)
    {
        $organizationsProject = $this->OrganizationsProjects->get(
            $id,
            [
            'contain' => []
            ]
        );
        $this->set('organizationsProject', $organizationsProject);
        $this->set('_serialize', ['organizationsProject']);
    }

    /**
     * Add method
     * @return redirect
     */
    public function add()
    {
        $organizationsProject = $this->OrganizationsProjects->newEntity();
        if ($this->request->is('post')) {
            $organizationsProject = $this->OrganizationsProjects->patchEntity($organizationsProject, $this->request->data);
            if ($this->OrganizationsProjects->save($organizationsProject)) {
                $this->Flash->success(__('The organizations project has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The organizations project could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('organizationsProject'));
        $this->set('_serialize', ['organizationsProject']);
    }

    /**
     * Edit method
     * @param string $id id
     * @return redirect
     */
    public function edit($id = null)
    {
        $organizationsProject = $this->OrganizationsProjects->get(
            $id,
            [
            'contain' => []
            ]
        );
        if ($this->request->is(['patch', 'post', 'put'])) {
            $organizationsProject = $this->OrganizationsProjects->patchEntity($organizationsProject, $this->request->data);
            if ($this->OrganizationsProjects->save($organizationsProject)) {
                $this->Flash->success(__('The organizations project has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The organizations project could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('organizationsProject'));
        $this->set('_serialize', ['organizationsProject']);
    }

    /**
     * Delete method
     * @param string $id id
     * @return redirect
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $organizationsProject = $this->OrganizationsProjects->get($id);
        if ($this->OrganizationsProjects->delete($organizationsProject)) {
            $this->Flash->success(__('The organizations project has been deleted.'));
        } else {
            $this->Flash->error(__('The organizations project could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
