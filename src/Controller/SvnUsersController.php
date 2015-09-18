<?php
/**
 * SvnUsers controller
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
 * SvnUsers controller
 *
 * @category Controller
 * @package  Website
 * @author   CakePHP <cakephp@email.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://cakephp.org CakePHP(tm) Project
 */
class SvnUsersController extends AppController
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
        $this->set('svnUsers', $this->paginate($this->SvnUsers));
        $this->set('_serialize', ['svnUsers']);
    }

    /**
     * View method
     * @param string $id id
     * @return void
     */
    public function view($id = null)
    {
        $svnUser = $this->SvnUsers->get(
            $id,
            [
            'contain' => []
            ]
        );
        $this->set('svnUser', $svnUser);
        $this->set('_serialize', ['svnUser']);
    }

    /**
     * Add method
     * @return redirect
     */
    public function add()
    {
        $svnUser = $this->SvnUsers->newEntity();
        if ($this->request->is('post')) {
            $svnUser = $this->SvnUsers->patchEntity($svnUser, $this->request->data);
            if ($this->SvnUsers->save($svnUser)) {
                $this->Flash->success(__('The svn user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The svn user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('svnUser'));
        $this->set('_serialize', ['svnUser']);
    }

    /**
     * Edit method
     * @param string $id id
     * @return redirect
     */
    public function edit($id = null)
    {
        $svnUser = $this->SvnUsers->get(
            $id,
            [
            'contain' => []
            ]
        );
        if ($this->request->is(['patch', 'post', 'put'])) {
            $svnUser = $this->SvnUsers->patchEntity($svnUser, $this->request->data);
            if ($this->SvnUsers->save($svnUser)) {
                $this->Flash->success(__('The svn user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The svn user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('svnUser'));
        $this->set('_serialize', ['svnUser']);
    }

    /**
     * Delete method
     * @param string $id id
     * @return redirect
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $svnUser = $this->SvnUsers->get($id);
        if ($this->SvnUsers->delete($svnUser)) {
            $this->Flash->success(__('The svn user has been deleted.'));
        } else {
            $this->Flash->error(__('The svn user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
