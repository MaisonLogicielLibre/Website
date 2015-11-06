<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

    echo __('Hello') . ' ' . $mentorname . ",\r\n\r\n";

    echo $username . ' ' . __('have applied to the mission') . ' ' . $missionname . ".\r\n\r\n";

    echo __('Click here to see your mission details') . ' : ' . $linkMission . "\r\n";
    echo __("Click here to view the candidate's profile") . ' : ' . $linkUser . "\r\n\r\n";

    echo __('Contact us to accept this candidate') . ' : ' . $this->Url->build(['controller' => 'Pages', 'action' => 'contact'], true) . "\r\n\r\n";

    echo __('Note: You will be able to directly approve the candidate next release');
