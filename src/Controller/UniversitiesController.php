<?php
/**
 * Universities controller
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
 * Universities controller
 *
 * @category Controller
 * @package  Website
 * @author   CakePHP <cakephp@email.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://cakephp.org CakePHP(tm) Project
 */
class UniversitiesController extends AppController
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
        $this->set('universities', $this->paginate($this->Universities));
        $this->set('_serialize', ['universities']);
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
        $university = $this->Universities->get(
            $id,
            [
            'contain' => []
            ]
        );
        $this->set('university', $university);
        $this->set('_serialize', ['university']);
    }

    /**
     * Add method
     *
     * @return redirect
     */
    public function add()
    {
        $university = $this->Universities->newEntity();
        if ($this->request->is('post')) {
            $university = $this->Universities->patchEntity($university, $this->request->data);
            if ($this->Universities->save($university)) {
                $this->Flash->success(__('The university has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The university could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('university'));
        $this->set('_serialize', ['university']);
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
        $university = $this->Universities->get(
            $id,
            [
            'contain' => []
            ]
        );
        if ($this->request->is(['patch', 'post', 'put'])) {
            $university = $this->Universities->patchEntity($university, $this->request->data);
            if ($this->Universities->save($university)) {
                $this->Flash->success(__('The university has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The university could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('university'));
        $this->set('_serialize', ['university']);
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
        $university = $this->Universities->get($id);
        if ($this->Universities->delete($university)) {
            $this->Flash->success(__('The university has been deleted.'));
        } else {
            $this->Flash->error(__('The university could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
