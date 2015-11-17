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
        <?= $title ?>
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
<div class="wrapper">
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
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><?= $this->Html->link(__('ML2'), ['controller' => 'Pages', 'action' => 'home']);?></li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?= __('Language') ?><span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><?= $this->Html->link(__('FR'), ['controller' => $this->request->Session()->read('controllerRef'), 'action' => $this->request->Session()->read('actionRef'), 'lang' => 'fr_CA']);?></li>
							<li><?= $this->Html->link(__('EN'), ['controller' => $this->request->Session()->read('controllerRef'), 'action' => $this->request->Session()->read('actionRef'), 'lang' => 'en_US']);?></li>                    
						</ul>
					</li>				
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?= __('Projects') ?><span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><?= $this->Html->link(__('List of organizations'), ['controller' => 'Organizations', 'action' => 'index']);?></li>
							<li><?= $this->Html->link(__('Submit an organization'), ['controller' => 'Organizations', 'action' => 'submit']);?></li>
							<li><?= $this->Html->link(__('List of projects'), ['controller' => 'Projects', 'action' => 'index']);?></li> 
							<li><?= $this->Html->link(__('Submit a project'), ['controller' => 'Projects', 'action' => 'submit']);?></li>
						</ul>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?= __('Activities') ?><span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><?= $this->Html->link(__('Meetup'), ['controller' => 'Pages', 'action' => 'meetup']);?></li>
							<li><?= $this->Html->link(__('Survey'), ['controller' => 'Pages', 'action' => 'survey']);?></li>							
						</ul>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?= __('Partners') ?><span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><?= $this->Html->link(__('Industry'), ['controller' => 'Pages', 'action' => 'industry']);?></li>
							<li><?= $this->Html->link(__('Academic'), ['controller' => 'Pages', 'action' => 'academic']);?></li>
							<li><?= $this->Html->link(__('Associations'), ['controller' => 'Pages', 'action' => 'aso']);?></li>
						</ul>
					</li>
					<?php
					$user = $this->request->session()->read('Auth.User');
					if ($user) :?>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<?= $this->Html->image('http://www.gravatar.com/avatar/' . (!empty($user['email']) ? md5($user['email']) : md5('no@email.com')) . '?s=24', ['class' => 'img-circle']); ?>
							<?php
							$fn = (!empty($user['firstName']) ? $user['firstName'] . ' ' . $user['lastName'] : $user['username']);
							echo strlen($fn) > 25 ? substr($fn, 0, 25) . "..." : $fn;
							?>
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><?= $this->Html->link(__('My profile'), ['controller' => 'Users', 'action' => 'view', $user['id']]) ?></li>
							<li><?= $this->Html->link(__('My projects'), ['controller' => 'Projects', 'action' => 'myProjects']) ?></li>
							<li><?= $this->Html->link(__('My Organizations'), ['controller' => 'Organizations', 'action' => 'myOrg']); ?></li>
							<li><?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']);?></li>
						</ul>
					</li>
					<?php else : ?>
						<li><?= $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login']); ?></li>
						<li><?= $this->Html->link(__('Register'), ['controller' => 'Users', 'action' => 'register']); ?></li>
					<?php endif; ?>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</nav>
	<div id="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<?= $this->Flash->render() ?>
			</div>
		</div>
		<?= $this->fetch('content') ?>
	</div>
</div>
<!-- Footer -->
<footer>
	<div class="container">
		<div class="row">
			<div class="text-center">
				<h4><strong><?php echo __('Maison du Logiciel Libre') ?></strong></h4>
				<p><?= $this->Html->link(__('About us'), ['controller' => 'Pages', 'action' => 'mission']);?></li></p>
				<p><?= $this->Html->link(__('Contact us'), ['controller' => 'Pages', 'action' => 'contact']);?>
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
