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

<?= __('Hello');?> <?= $mentorname ?>,<br/><br/>

<?= $username ?> <?= __('have applied to the mission') ?> <?= $missionname ?></a>.<br/><br/>

<a href="<?= $linkMission ?>"><?= __('Click here to see your mission details') ?></a><br/>
<a href="<?= $linkUser ?>"><?= __("Click here to view the candidate's profile") ?></a><br/><br/>

<a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'contact'], true) ?>"><?= __('Contact us') ?></a> <?= __('to accept this candidate')?>.<br/><br/>

<?= __('Note: You will be able to directly approve the candidate next release') ?>