<?php
/**
 * Missions controller
 *
 * @category Controller
 * @package  Website
 * @author   Noël Rignon <rignon.noel@openmailbox.org>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://cakephp.org CakePHP(tm) Project
 */
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Missions controller
 *
 * @category Controller
 * @package  Website
 * @author   Noël Rignon <rignon.noel@openmailbox.org>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://cakephp.org CakePHP(tm) Project
 */
class NotificationsController extends AppController
{
    private $_permissions = [
        'index' => [],
        'markAsRead' => [],
        'markAllAsRead' => [],
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
        $user = $this->Users->findById($user['id'])->first();

        if (isset($this->_permissions[$this->request->action])) {
            if ($user->hasPermissionName($this->_permissions[$this->request->action])) {
                return true;
            }
        }
    }

    /**
     * Add the RequestHandler component
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    /**
     * Filter preparation
     *
     * @param Event $event event
     *
     * @return void
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->loadModel("Users");
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $notifications = $this->Notifications->find('all', ['conditions' => ['isRead' => false, 'user_id' => $this->request->session()->read('Auth.User.id')]])->toArray();
        $this->set('notifications', $notifications);
        $this->set('_serialize', ['notifications']);
    }

    /**
     * MarkAsRead method
     *
     * @param int $notificationId notificationId
     *
     * @return redirect
     */
    public function markAsRead($notificationId)
    {
        $this->autoRender = false;
        $user = TableRegistry::get('Users')->get($this->request->session()->read('Auth.User.id'));
        $notification = $this->Notifications->get($notificationId, ['contain' => 'Users']);

        if ($notification->user->id == $user->id) {
            $notification->isRead = true;
            if ($this->Notifications->save($notification)) {
                $this->Flash->success(__('The notification has been mark as read.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The notification could not be mark as read. Please, try again.'));
                return $this->redirect(['action' => 'index']);
            }
        }
    }

    /**
     * MarkAllAsRead method
     *
     * @return redirect
     */
    public function markAllAsRead()
    {
        $this->autoRender = false;
        $user = TableRegistry::get('Users')->get($this->request->session()->read('Auth.User.id'));
        $notifications = $this->Notifications->find('all', ['condition' => ['isRead' => false, 'userId' => $user->id]]);

        foreach ($notifications as $notification) {
            $notification->isRead = true;
            if (!$this->Notifications->save($notification)) {
                $this->Flash->error(__('The notification could not be mark as read. Please, try again.'));
                return $this->redirect(['action' => 'index']);
            }
        }

        $this->Flash->success(__('All notifications has been mark as read.'));
        return $this->redirect(['action' => 'index']);
    }
}
