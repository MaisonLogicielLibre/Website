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

<h2><?= __('New missions added this week');?></h2>

<ul>
<?php
    foreach($missions as $mission) {
        echo "<li><a href=\"https://maisonlogiciellibre.org" . $mission['link'] . "\">" . $mission['name'] . "</a></li>";
    }
?>
</ul>
