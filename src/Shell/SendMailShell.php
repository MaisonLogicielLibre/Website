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
                    // Check if the current mission has the same type has the current userType mission
                    if($userTypeMissions['type_mission_id'] == $mission['type_mission_id']) {
                        // Add a new mission to the list of missions to send
                        if(isset($newMissions[$user['email']])) {
                            $newMission = [];
                            $newMission['link'] = Router::url(['controller' => 'Missions', 'action' => 'view', $mission['id']]);
                            $newMission['name'] = $mission['name'];
                            //print("Mission " . $newMission['name'] . " added to user " . $user['email'] . "\n");
                            array_push($newMissions[$user['email']], $newMission);
                        } else {
                            //print("Creating mission list for user " . $user['email'] . "\n");
                            $newMissions[$user['email']] = [];
                            $newMission = [];
                            $newMission['link'] = Router::url(['controller' => 'Missions', 'action' => 'view', $mission['id']]);
                            $newMission['name'] = $mission['name'];
                            //print("Mission " . $newMission['name'] . " added to user " . $user['email'] . "\n");
                            array_push($newMissions[$user['email']], $newMission);
                        }
                    }
                }
            }
        }

        // For each user send their associated list of missions
        foreach($newMissions as $userEmail => $missionsToSend) {
            $email = new Email();
            $email->domain('maisonlogiciellibre.org');
            $email->to($userEmail);
            $email->subject('New missions available at ML2');
            $email->template('new_missions');
            $email->emailFormat('both');
            $email->viewVars(['missions' => $missionsToSend]);
            $email->send();
        }
    }
}
?>
