<?php
/**
 * Organizations controller
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
 * Organizations controller
 *
 * @category Controller
 * @package  Website
 * @author   CakePHP <cakephp@email.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://cakephp.org CakePHP(tm) Project
 */
class OrganizationsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('organizations', $this->paginate($this->Organizations));
        $this->set('_serialize', ['organizations']);
    }

    /**
     * View method
     * @param string $id id
     * @return void
     */
    public function view($id = null)
    {
        $organization = $this->Organizations->get(
            $id,
            [
            'contain' => []
            ]
        );
        $this->set('organization', $organization);
        $this->set('_serialize', ['organization']);
    }

    /**
     * Add method
     * @return redirect
     */
    public function add()
    {
        $organization = $this->Organizations->newEntity();
        if ($this->request->is('post')) {
            $organization = $this->Organizations->patchEntity($organization, $this->request->data);
            if ($this->Organizations->save($organization)) {
                $this->Flash->success(__('The organization has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The organization could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('organization'));
        $this->set('_serialize', ['organization']);
    }

    /**
     * Edit method
     * @param string $id id
     * @return redirect
     */
    public function edit($id = null)
    {
        $organization = $this->Organizations->get(
            $id,
            [
            'contain' => []
            ]
        );
        if ($this->request->is(['patch', 'post', 'put'])) {
            $organization = $this->Organizations->patchEntity($organization, $this->request->data);
            if ($this->Organizations->save($organization)) {
                $this->Flash->success(__('The organization has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The organization could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('organization'));
        $this->set('_serialize', ['organization']);
    }

    /**
     * Delete method
     * @param string $id id
     * @return redirect
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $organization = $this->Organizations->get($id);
        if ($this->Organizations->delete($organization)) {
            $this->Flash->success(__('The organization has been deleted.'));
        } else {
            $this->Flash->error(__('The organization could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
