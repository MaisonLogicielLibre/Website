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

echo __('Hello') . ' ' . (!is_null($application->getUser()->getName()) ? $application->getUser()->getName() : $application->getUser()->getUsername()) . ',\r\n\r\n';

echo __('You\'ve been selected by {0} to participate in {1}', $application->getMission()->getMentor()->getName(), $application->getMission()->getName()) . '.\r\n\r\n';

echo __('The mentor will contact you with further information') . '.';