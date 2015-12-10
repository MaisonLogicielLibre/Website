<?php
/**
 * Applications controller
 *
 * @category Controller
 * @package  Website
 * @author   CakePHP <cakephp@email.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://cakephp.org CakePHP(tm) Project
 */
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\MailerAwareTrait;

/**
 * Applications controller
 *
 * @category Controller
 * @package  Website
 * @author   CakePHP <cakephp@email.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://cakephp.org CakePHP(tm) Project
 */
class ApplicationsController extends AppController
{

    use MailerAwareTrait;

    private $_permissions = [
        'accepted' => ['edit_mission', 'edit_missions'],
        'rejected' => ['edit_mission', 'edit_missions'],
        'view' => ['edit_mission', 'edit_missions']
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
    }

    /**
     * Accepted method
     * @param int|null $application application
     * @return \Cake\Network\Response|null
     */
    public function accepted($application = null)
    {
        if (is_null($application)) {
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        }

        $user = $this->Users->findById($this->request->session()->read('Auth.User.id'))->first();
        $application = $this->Applications->get(
            $application,
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
                    $this->loadModel('ProjectsContributors');
                    $contributor = $this->ProjectsContributors->newEntity(['user_id' => $application->getUserId(), 'project_id' => $application->getMission()->getProject()->getId()]);
                    $this->ProjectsContributors->save($contributor);

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

    /**
     * Rejected method
     * @param int|null $application application
     * @return \Cake\Network\Response|null
     */
    public function rejected($application = null)
    {
        if (is_null($application)) {
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        }

        $user = $this->Users->findById($this->request->session()->read('Auth.User.id'))->first();
        $application = $this->Applications->get(
            $application,
            [
                'contain' =>
                    [
                        'Missions' => ['Projects'],
                        'Users'
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
                    $this->getMailer('Application')->send('rejectedOnApplication', [$application]);
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
    
    /**
     * View method
     * @param int|null $id id
     * @return \Cake\Network\Response|null
     */
    public function view($id = null)
    {
        $application = $this->Applications->get(
            $id,
            [
                'contain' => ['Users', 'Missions', 'TypeMissions']
            ]
        );

        $this->set(compact('application'));
        $this->set('_serialize', ['application']);
    }
}
