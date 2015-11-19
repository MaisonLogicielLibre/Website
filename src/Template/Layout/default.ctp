
<!DOCTYPE html>
<html>
<head>
	<?= $this->Html->charset() ?>
	<meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		<?= $this->fetch('title') ?>
	</title>
	<?= $this->Html->meta('icon') ?>

	<?= $this->fetch('meta') ?>
	<?= $this->fetch('css') ?>
	<?= $this->Html->css('font-awesome.min') ?>
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,600' rel='stylesheet' type='text/css'>

	<?= $this->Less->less('less/styles.less'); ?>
</head>
<body>
<nav id="top-menu" class="navbar navbar-default no-margin">
	<div class="navbar-header fixed-brand">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" id="menu-toggle">
			<i class="fa fa-th-large" aria-hidden="true"></i>
		</button>
		<a href="<?= $this->Url->build(['controller' => 'pages', 'action' => 'home']); ?>" class="navbar-brand">
		<?= $this->Html->image('logo-navbar.png'); ?>
			<span><?= __('ML2') ?></span>
		</a>
	</div>
	<div class="collapse navbar-collapse">
		<ul class="nav navbar-nav">
			<li class="active">
				<button class="navbar-toggle collapse in" data-toggle="collapse" id="menu-toggle-2">
					<i class="fa fa-th-large" aria-hidden="true"></i>
				</button>
			</li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
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
						<li><?= $this->Html->link(__('My Organizations'), ['controller' => 'Organizations', 'action' => 'myOrganizations']); ?></li>
						<li><?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']);?></li>
					</ul>
				</li>
			<?php else : ?>
				<li id="navbar-register"><?= $this->Html->link(__('Register'), ['controller' => 'Users', 'action' => 'register']); ?></li>
				<li id="navbar-login"><?= $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login']); ?></li>
			<?php endif; ?>
		</ul>
	</div>
</nav>
<div id="wrapper">
	<?= $this->cell('Sidebar::all'); ?>
	<div id="page-content-wrapper">
		<div class="container-fluid xyz">
			<?= $this->fetch('content'); ?>
		</div>
		<footer id="footer">

		</footer>
	</div>
</div>
<?= $this->Html->script(
	[
		'jquery-2.1.4.min',
		'bootstrap.min',
		'googleAnalytics',
		'main'
	]
); ?>

<!-- WARNING :  Do not move this line before a manual import of script! -->
<?=$this->fetch('scriptBottom'); ?>
</body>
</html>