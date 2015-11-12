<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\MailerAwareTrait;

/**
 * Applications Controller
 *
 * @property \App\Model\Table\ApplicationsTable $Applications
 */
class ApplicationsController extends AppController
{

    use MailerAwareTrait;

    private $_permissions = [
        'accepted' => ['edit_mission', 'edit_missions'],
        'rejected' => ['edit_mission', 'edit_missions']
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
     * Filter preparation
     * @param Event $event event
     * @return void
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->loadModel("Users");
        $this->Auth->allow(['view']);
    }

    public function accepted($application = null)
    {
        if (is_null($application)) {
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        }

        $user = $this->Users->findById($this->request->session()->read('Auth.User.id'))->first();
        $application = $this->Applications->get($application,
            [
                'contain' =>
                    [
                        'Users',
                        'Missions' =>
                            [
                                'Users',
                                'Projects',
                                'Applications' =>
                                    [
                                        'Users',
                                        'Missions' =>
                                            [
                                                'Projects'
                                            ]
                                    ]
                            ]
                    ]
            ]
        );

        // Check if the application has already been accepted or rejected
        if ($application->getAccepted() || $application->getRejected()) {
            $this->Flash->error(__('This application has already been {0}', ($application->getAccepted() ? __('accepted') : __('rejected'))) . '.');
            return $this->redirect(['controller' => 'Missions', 'action' => 'view', $application->getMission()->id]);
        }

        // Check if the logged user is the mission mentor
        if ($application->getMission()->getMentorId() != $user->getId()) {
            $this->Flash->error(__('You\'re not the mentor on this mission.'));
            return $this->redirect(['controller' => 'Missions', 'action' => 'view', $application->getMission()->id]);
        }

        if ($this->request->is('post')) {
            // Check the user password
            $user = $this->Users->patchEntity($user, $this->request->data);
            if (!$user->errors()) {

                if ($application->getMission()->getRemainingPlaces() === 1) {
                    foreach ($application->getMission()->getApplications() as $app) {
                        if (!$app->getAccepted() && !$app->getRejected() && $app->id != $application->id) {
                            $app->editRejected(true);
                            $this->Applications->save($app);
                            $this->getMailer('Application')->send('rejectNoMorePosition', [$app]);
                        }
                    }
                }
                $application->editAccepted(true);
                if ($this->Applications->save($application)) {
                    $this->getMailer('Application')->send('acceptedOnApplication', [$application]);
                    $this->Flash->success(__('The application has been saved.'));
                    return $this->redirect(['controller' => 'Missions', 'action' => 'view', $application->getMission()->id]);
                } else {
                    $this->Flash->error(__('The application could not be saved. Please, try again.'));
                }
            } else {
                $this->Flash->error(__(' Old password isn\'t valid'));
            }
        }

        $this->set(['mission' => $application->getMission(), 'application' => $application]);
    }

    public function rejected($application = null)
    {
        if (is_null($application)) {
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        }

        $user = $this->Users->findById($this->request->session()->read('Auth.User.id'))->first();
        $application = $this->Applications->get($application,
            [
                'contain' =>
                    [
                        'Mission'
                    ]
            ]
        );

        // Check if the application has already been accepted or rejected
        if ($application->getAccepted() || $application->getRejected()) {
            $this->Flash->error(__('This application has already been {0}', ($application->getAccepted() ? __('accepted') : __('rejected'))) . '.');
            return $this->redirect(['controller' => 'Missions', 'action' => 'view', $application->getMission()->id]);
        }

        // Check if the logged user is the mission mentor
        if ($application->getMission()->getMentorId() != $user->getId()) {
            $this->Flash->error(__('You\'re not the mentor on this mission.'));
            return $this->redirect(['controller' => 'Missions', 'action' => 'view', $application->getMission()->id]);
        }

        if ($this->request->is('post')) {
            // Check the user password
            $user = $this->Users->patchEntity($user, $this->request->data);
            if (!$user->errors()) {

                $application->editRejected(true);
                if ($this->Applications->save($application)) {
                    $this->getMailer('Application')->send('.dkjfghjkdhfghdsgfkjdh', [$application]);
                    $this->Flash->success(__('The application has been saved.'));
                    return $this->redirect(['controller' => 'Missions', 'action' => 'view', $application->getMission()->id]);
                } else {
                    $this->Flash->error(__('The application could not be saved. Please, try again.'));
                }
            } else {
                $this->Flash->error(__(' Old password isn\'t valid'));
            }
        }

        $this->set(['mission' => $application->getMission(), 'application' => $application]);
    }
}
