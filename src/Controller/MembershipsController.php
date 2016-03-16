<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\MailerAwareTrait;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Memberships Controller
 *
 * @property \App\Model\Table\MembershipsTable $Memberships
 */
class MembershipsController extends AppController
{
    use MailerAwareTrait;

    private $_permissions = [
        'add' => [],
        'accept' => ['edit_user', 'edit_users'],
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
     * Add extra parameters to load
     *
     * @param Event $event the event before
     *
     * @return void
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(
            [
                'add',
                'accept',
            ]
        );
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
        $this->loadComponent('Hash');
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout(false);
        $userId = $this->request->session()->read('user')['id'];
        $this->loadModel('Users');
        $user = $this->Users->get($userId);
        $organization_id = $this->request->data['organization_id'];
        $organizations = $this->loadModel("Organizations");
        $organization = $organizations->get($organization_id, ['contain' => ['Owners', 'Members']]);

        if ($this->request->is('post')) {
            $this->createMembership($userId, $organization);
            return $this->redirect(['action' => 'login']);
        }

        $this->set(compact(['user', 'organizations']));
        $this->set('_serialize', ['user', 'organizations']);
   }

   private function createMembership($userId, $organization)
    {
        $data = [
            'user_id' => $userId,
            'organization_id' => $organization['id'],
            'archived' => false
        ];
        $memberships = $this->Memberships;
        $membership = $memberships->newEntity($data);
        $memberships->save($membership);

        $this->sendNotificationToOwners($userId, $organization);
    }

    private function sendNotificationToOwners($requesterId, $organization)
    {
        $owners = $organization['owners'];
        foreach($owners as $owner) {
            $notifications = $this->loadModel("Notifications");
            $notification = $notifications->newEntity();
            $notification->editName(__("A user has asked to be part of your organization"));
            $notification->editLink('memberships/accept/' . $requesterId);
            $notification->editUser($owner);
            $notifications->save($notification);
        }
    }
}
