<?php
namespace App\Mailer;

use App\Controller\AppController;
use Cake\Mailer\Mailer;

/**
 * User mailer.
 */
class UserMailer extends Mailer
{

    /**
     * Mailer's name.
     *
     * @var string
     */
    static public $name = 'User';

    public function resetPassword($user, $link)
    {
        $this
            ->transport('main')
            ->emailFormat('both')
            ->from(['maisonlogiciellibre@etsmtl.net' => 'Maison du Logiciel Libre'])
            ->to($user->getEmail())
            ->subject(__('Reset password'))
            ->set(['username' => $user->username, 'link' => $link]);
    }
}
