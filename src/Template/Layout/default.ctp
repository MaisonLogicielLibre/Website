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

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('bootstrap.min'); ?>
    <?= $this->Html->css('font-awesome.min.css'); ?>
    <?= $this->Html->css('ML2-styles'); ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('cssTop'); ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">ML2</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><?= $this->Html->link('home', ['controller' => 'Pages', 'action' => 'home']);?></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
                <li><?= $this->Html->link('login', ['controller' => 'Users', 'action' => 'login']);?></li>

            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>
<div id="container">
    <div class="row">
        <div class="col-xs-12">
            <div id="content">
                <?= $this->Flash->render() ?>

                <div class="row setHeight">
                    <?= $this->fetch('content') ?>
                </div>
            </div>
            <!-- Footer -->
        </div>
    </div>
</div>
<footer>
    <div class="container">
        <div class="row">
            <div class="text-center">
                <h4><strong><?php echo __('Maison du Logiciel Libre') ?></strong></h4>
                400 <?php echo __('Montfort street') ?><br><?php echo __('Montreal') ?>, QC, H3C 4J9
                <br><i class="fa fa-phone-square"></i> (514) 396-8552
                <br>Copyright &copy; <?php echo __('Maison du Logiciel Libre') ?> 2015</p>
            </div>
        </div>
    </div>
</footer>
<!-- jQuery -->
<?= $this->Html->script('jquery-2.1.4.min'); ?>
<!-- Bootstrap Core JavaScript -->
<?= $this->Html->script('bootstrap.min'); ?>
<!-- Google Analytics -->
<?= $this->Html->script('googleAnalytics'); ?>

<!-- WARNING :  Do not move this line before a manual import of script! -->
<?=$this->fetch('scriptBottom'); ?>
</body>
</html>
