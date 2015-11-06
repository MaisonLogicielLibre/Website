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

echo __('Hello') . ' ' . $username . ',' . "\r\n\r\n";

echo __('We have received a password reset request from your account') . '.' . "\r\n\r\n";

echo __('Click here to reset your password') . ' : ' . "\r\n";
echo  $link . "\r\n\r\n";

echo  __("Ignore this email if you did not request this password reset. Don't worry! Your account is safe!");
