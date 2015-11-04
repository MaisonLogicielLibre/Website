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
			->subject('New application')
			->set([
				   'mentorname' => $mentor->getName(), 
			       'username' => $user->getName(), 
				   'linkUser' => $linkUser,
				   'missionname' => $mission->getName(),
				   'linkMission' => $linkMission
				 ]);
	}
}