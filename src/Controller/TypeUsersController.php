<?php
/**
 * TypeUsers controller
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
 * TypeUsers controller
 *
 * @category Controller
 * @package  Website
 * @author   CakePHP <cakephp@email.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://cakephp.org CakePHP(tm) Project
 */
class TypeUsersController extends AppController
{
    private $_permissions = [
        'index' => ['Administrator'],
        'add' => ['Administrator'],
        'edit' => ['Administrator'],
        'view' => ['Administrator'],
        'delete' => ['Administrator']
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
        $this->set('typeUsers', $this->paginate($this->TypeUsers));
        $this->set('_serialize', ['typeUsers']);
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
        $typeUser = $this->TypeUsers->get(
            $id,
            [
                'contain' => []
            ]
        );
        $this->set('typeUser', $typeUser);
        $this->set('_serialize', ['typeUser']);
    }
    /**
     * Add method
     *
     * @return redirect
     */
    public function add()
    {
        $typeUser = $this->TypeUsers->newEntity();
        if ($this->request->is('post')) {
            $typeUser = $this->TypeUsers->patchEntity($typeUser, $this->request->data);
            if ($this->TypeUsers->save($typeUser)) {
                $this->Flash->success(__('The type user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The type user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('typeUser'));
        $this->set('_serialize', ['typeUser']);
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
        $typeUser = $this->TypeUsers->get(
            $id,
            [
                'contain' => []
            ]
        );
        if ($this->request->is(['patch', 'post', 'put'])) {
            $typeUser = $this->TypeUsers->patchEntity($typeUser, $this->request->data);
            if ($this->TypeUsers->save($typeUser)) {
                $this->Flash->success(__('The type user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The type user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('typeUser'));
        $this->set('_serialize', ['typeUser']);
    }
    /**
     * Delete method
     *
     * @param string $id id
     *
     * @return redirect
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $typeUser = $this->TypeUsers->get($id);
        if ($this->TypeUsers->delete($typeUser)) {
            $this->Flash->success(__('The type user has been deleted.'));
        } else {
            $this->Flash->error(__('The type user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
