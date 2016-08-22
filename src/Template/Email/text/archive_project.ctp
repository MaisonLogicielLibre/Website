<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

    echo __('Hello {0}', $user->username) . ",\r\n\r\n";

    echo __('Your project {0} has been archived', $project->getName()) . ".\r\n\r\n";

    echo __("Click here to see your project's details") . ' : ' . $this->Url->build(['controller' => 'Projects', 'action' => 'view', $project->id], true) . "\r\n\r\n";