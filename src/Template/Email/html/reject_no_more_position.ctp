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
?>

<?= __('Hello');?> <?= (!is_null($application->getUser()->getName()) ? $application->getUser()->getName() : $application->getUser()->getUsername()) ?>,<br/><br/>

<?= __('Your application for {0} on the project {1} has been automatically rejected because all available positions have been filled', $application->getMission()->getName(), $application->getMission()->getProject()->getName()); ?>.<br/><br/>