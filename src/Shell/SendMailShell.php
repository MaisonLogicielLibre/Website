<?php
namespace App\Shell;

use Cake\Console\Shell;
use Cake\I18n\Time;
use Cake\Routing\Router;
use Cake\Mailer\Email;

class SendMailShell extends Shell
{

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Users');
        $this->loadModel('UsersTypeMissions');
        $this->loadModel('Missions');
    }

    public function sendNewMissionsToInterestedUsers($nbrDays = 7)
    {
        $created = Time::now()->subDays($nbrDays);
        $missions = $this->Missions->find('all', [
            'conditions' => ['Missions.created >=' => $created]
        ])->toArray();

        $newMissions = [];
        foreach($missions as $mission) {
            $users = $this->Users->find('all')->toArray();

            foreach($users as $user) {
                $usersTypeMissions = $this->UsersTypeMissions->findByUserId($user['id'])->toArray();
                foreach($usersTypeMissions as $userTypeMissions) {
                    if($userTypeMissions['type_mission_id'] == $mission['type_mission_id']) {
                        $mission['link'] = Router::url(['controller' => 'Missions', 'action' => 'view', $mission['id']]);
                        $mission['user_email'] = $user['email'];
                        array_push($newMissions, $mission);
                    }
                }
            }
        }

        debug("Sending a mail to " .  $user['email']);
        $email = new Email();
        $email->domain('maisonlogiciellibre.org');
        $email->to($user['email']);
        $email->subject('New missions available at ML2');
        $email->template('new_missions');
        $email->emailFormat('both');
        $email->viewVars(['missions' => $newMissions]);
        $email->send();
    }
}
?>
