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
    ];

    /**
     * Check if the user has the rights to see the page
     * @param array $user user's informations
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
        $notifications = $this->Notifications->findByUserId($this->request->session()->read('Auth.User.id'));
        $this->set('notifications', $notifications);
        $this->set('_serialize', ['notifications']);
    }
}
