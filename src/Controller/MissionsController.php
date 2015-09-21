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
        $this->set('missions', $this->paginate($this->Missions));
        $this->set('_serialize', ['missions']);
    }
    
    /**
     * View method
     * @param string $id id
     * @return void
     */
    public function view($id = null)
    {
        $mission = $this->Missions->get(
            $id,
            [
            'contain' => []
            ]
        );
        $this->set('mission', $mission);
        $this->set('_serialize', ['mission']);
    }

    /**
     * Add method
     * @return redirect
     */
    public function add()
    {
        $mission = $this->Missions->newEntity();
        if ($this->request->is('post')) {
            $mission = $this->Missions->patchEntity($mission, $this->request->data);
            if ($this->Missions->save($mission)) {
                $this->Flash->success(__('The mission has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The mission could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('mission'));
        $this->set('_serialize', ['mission']);
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
            'contain' => []
            ]
        );
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mission = $this->Missions->patchEntity($mission, $this->request->data);
            if ($this->Missions->save($mission)) {
                $this->Flash->success(__('The mission has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The mission could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('mission'));
        $this->set('_serialize', ['mission']);
    }

    /**
     * Delete method
     * @param string $id id
     * @return redirect
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mission = $this->Missions->get($id);
        if ($this->Missions->delete($mission)) {
            $this->Flash->success(__('The mission has been deleted.'));
        } else {
            $this->Flash->error(__('The mission could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
