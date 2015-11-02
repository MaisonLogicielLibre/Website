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

<?= __('Hello');?> <?= $username ?>,<?= "\r\n\r\n"; ?>

<?= __('We have received a password reset request for your account'); ?>.<?= "\r\n\r\n"; ?>

<?= __('Here is the link to reset your password'); ?> :<?= "\r\n"; ?>
<?= $link ?><?= "\r\n\r\n"; ?>

<?= __('If it is not you who is asking Reset all this password, please do not consider this e-mail and delete it'); ?>.
