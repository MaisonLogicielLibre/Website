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

    public function accept($id)
    {
        $user = $this->Memberships->Users->findById($this->request->session()->read('Auth.User.id'))->first();
        $membership = $this->Memberships->get($id);
        $organization = $this->Memberships->Organizations->get($membership['organization_id'], ['contain' => ['Owners', 'Members']]);
        if($this->request->is('post')) {
            $memberId = $membership->user_id;
            $organization->addMember($memberId);
            $this->Memberships->Organizations->save($organization);

            $this->redirect(['controller' => 'Organizations', 'action' => 'view', $membership['organization_id']]);
        }
        $this->set(compact(['organization', 'user', 'membership']));
        $this->set('_serialize', ['organization', 'user', 'membership']);
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
        $organizations = $this->Memberships->Organizations->find('all')->toArray();

        if ($this->request->is('post')) {
            $organization_id = $this->request->data['organization_id'];
            $organization = $this->Memberships->Organizations->get($organization_id, ['contain' => ['Owners', 'Members']]);
            $this->createMembership($userId, $organization);
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
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

        $this->sendNotificationToOwners($userId, $organization, $membership);
    }

    private function sendNotificationToOwners($requesterId, $organization, $membership)
    {
        $owners = $organization['owners'];
        foreach($owners as $owner) {
            $notifications = $this->loadModel("Notifications");
            $notification = $notifications->newEntity();
            $notification->editName(__("A user has asked to be part of your organization"));
            $notification->editLink('memberships/accept/' . $membership['id']);
            $notification->editUser($owner);
            $notifications->save($notification);
        }
    }
}
