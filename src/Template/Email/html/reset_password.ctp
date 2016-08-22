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
?>

<?= __('Hello {0}', $username) ?>,<br/><br/>

<?= __('We have received a password reset request from your account'); ?>.<br/><br/>

<a href="<?= $link ?>"><?= __('Click here to reset your password'); ?></a><br/><br/>

<?= __("Ignore this email if you did not request this password reset. Don't worry! Your account is safe!"); ?>.
