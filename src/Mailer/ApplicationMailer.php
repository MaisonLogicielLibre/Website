<?php
namespace App\Mailer;

use App\Controller\AppController;
use Cake\Mailer\Mailer;

/**
 * Application mailer.
 */
class ApplicationMailer extends Mailer
{

    /**
    * Mailer's name.
    *
    * @var string
    */
    static public $name = 'Application';

    public function newApplication($user, $mentor, $mission, $linkMission, $linkUser)
    {
        $this
            ->transport('main')
            ->emailFormat('both')
            ->from(['maisonlogiciellibre@etsmtl.net' => 'Maison du Logiciel Libre'])
            ->to($mentor->getEmail())
            ->subject(__('New application'))
            ->set([
                   'mentorname' => $mentor->getUsername(),
                   'username' => $user->getUsername(),
                   'linkUser' => $linkUser,
                   'missionname' => $mission->getName(),
                   'linkMission' => $linkMission
                 ]);
    }

    public function acceptedOnApplication($application)
    {
        $this
            ->transport('main')
            ->emailFormat('both')
            ->from(['maisonlogiciellibre@etsmtl.net' => 'Maison du Logiciel Libre'])
            ->to($application->getUser()->getEmail())
            ->subject(__('You\'ve been selected for {0}', $application->getMission()->getName()))
            ->set(compact('application'));
    }

    public function rejectNoMorePosition($application)
    {
        $this
            ->transport('main')
            ->emailFormat('both')
            ->from(['maisonlogiciellibre@etsmtl.net' => 'Maison du Logiciel Libre'])
            ->to($application->getUser()->getEmail())
            ->subject(__('All positions available for {0} have been filled', $application->getMission()->getName()))
            ->set(compact('application'));
    }

    public function rejectedOnApplication($application)
    {
        $this
            ->transport('main')
            ->emailFormat('both')
            ->from(['maisonlogiciellibre@etsmtl.net' => 'Maison du Logiciel Libre'])
            ->to($application->getUser()->getEmail())
            ->subject(__('You\'ve been rejected for {0}', $application->getMission()->getName()))
            ->set(compact('application'));
    }
}
