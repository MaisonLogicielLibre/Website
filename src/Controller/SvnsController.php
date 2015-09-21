<?php
/**
 * Svns controller
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
 * Svns controller
 *
 * @category Controller
 * @package  Website
 * @author   CakePHP <cakephp@email.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://cakephp.org CakePHP(tm) Project
 */
class SvnsController extends AppController
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
        $this->set('svns', $this->paginate($this->Svns));
        $this->set('_serialize', ['svns']);
    }

    /**
     * View method
     * @param string $id id
     * @return void
     */
    public function view($id = null)
    {
        $svn = $this->Svns->get(
            $id,
            [
            'contain' => []
            ]
        );
        $this->set('svn', $svn);
        $this->set('_serialize', ['svn']);
    }

    /**
     * Add method
     * @return redirect
     */
    public function add()
    {
        $svn = $this->Svns->newEntity();
        if ($this->request->is('post')) {
            $svn = $this->Svns->patchEntity($svn, $this->request->data);
            if ($this->Svns->save($svn)) {
                $this->Flash->success(__('The svn has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The svn could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('svn'));
        $this->set('_serialize', ['svn']);
    }

    /**
     * Edit method
     * @param string $id id
     * @return redirect
     */
    public function edit($id = null)
    {
        $svn = $this->Svns->get(
            $id,
            [
            'contain' => []
            ]
        );
        if ($this->request->is(['patch', 'post', 'put'])) {
            $svn = $this->Svns->patchEntity($svn, $this->request->data);
            if ($this->Svns->save($svn)) {
                $this->Flash->success(__('The svn has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The svn could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('svn'));
        $this->set('_serialize', ['svn']);
    }

    /**
     * Delete method
     * @param string $id id
     * @return redirect
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $svn = $this->Svns->get($id);
        if ($this->Svns->delete($svn)) {
            $this->Flash->success(__('The svn has been deleted.'));
        } else {
            $this->Flash->error(__('The svn could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
