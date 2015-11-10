<?php
namespace App\Mailer;

use App\Controller\AppController;
use Cake\Mailer\Mailer;

/**
 * Project mailer.
 */
class ProjectMailer extends Mailer
{

    /**
     * Mailer's name.
     *
     * @var string
     */
    static public $name = 'Project';

    public function approveProject($project, $user)
    {
        $this
            ->transport('main')
            ->emailFormat('both')
            ->from(['maisonlogiciellibre@etsmtl.net' => 'Maison du Logiciel Libre'])
            ->to($user->getEmail())
            ->subject(__('Your project has been approved'))
            ->set(['user' => $user, 'project' => $project]);
    }

    public function archiveProject($project, $user)
    {
        $this
            ->transport('main')
            ->emailFormat('both')
            ->from(['maisonlogiciellibre@etsmtl.net' => 'Maison du Logiciel Libre'])
            ->to($user->getEmail())
            ->subject(__('Your project has been archived'))
            ->set(['user' => $user, 'project' => $project]);
    }

    public function unarchiveProject($project, $user)
    {
        $this
            ->transport('main')
            ->emailFormat('both')
            ->from(['maisonlogiciellibre@etsmtl.net' => 'Maison du Logiciel Libre'])
            ->to($user->getEmail())
            ->subject(__('Your project has been unarchived'))
            ->set(['user' => $user, 'project' => $project]);
    }
}
