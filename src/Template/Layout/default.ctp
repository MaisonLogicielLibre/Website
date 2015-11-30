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
    <?= $this->fetch('cssTop'); ?>
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="<?= $this->Url->build(['controller' => 'pages', 'action' => 'home']); ?>" class="navbar-brand">
                <strong><?= __('ML2') ?></strong>
            </a>
        </div>
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-lg fa-globe"></i>
                        <span id="badge-lang" class="badge badge-xs">
                            <?= ($this->request->session()->read('lang') == 'fr_CA' ? 'FR' : 'EN'); ?>
                        </span>
                </a>
                <ul class="dropdown-menu">
                    <li id="quebec-flag">
                        <a href="<?= $this->Url->build(['controller' => $this->request->Session()->read('controllerRef'), 'action' => $this->request->Session()->read('actionRef'), 'lang' => 'fr_CA']); ?>">
                            <?= $this->Html->image('flags/quebec.svg'); ?>
                            <span>Français</span>
                        </a>
                    </li>
                    <li id="canada-flag">
                        <a href="<?= $this->Url->build(['controller' => $this->request->Session()->read('controllerRef'), 'action' => $this->request->Session()->read('actionRef'), 'lang' => 'en_CA']); ?>">
                            <?= $this->Html->image('flags/canada.svg'); ?>
                            <span>English</span>
                        </a>
                    </li>
                </ul>
            </li>
            <?php
            $user = $this->request->session()->read('Auth.User');
            if ($user) : ?>
                <li class="dropdown">
                    <a href="<?= $this->Url->build(['controller' => 'Notifications', 'action' => 'index']) ?>">
                        <i class="fa fa-bell-o fa-lg"></i>
                        <?php if ($this->request->session()->read('numberOfNotifications')): ?>
                        <span id="badge-notif" class="badge badge-xs"><?= $this->request->session()->read('numberOfNotifications') ?></span>
                        <?php endif; ?>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?= $this->Html->image('http://www.gravatar.com/avatar/' . (!empty($user['email']) ? md5($user['email']) : md5('no@email.com')) . '?s=24', ['id' => 'nav-avatar', 'class' => 'fa img-circle']); ?>
                        <?php
                        $fn = (!empty($user['firstName']) ? $user['firstName'] . ' ' . $user['lastName'] : $user['username']);
                        echo strlen($fn) > 25 ? substr($fn, 0, 25) . "..." : $fn;
                        ?>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'view', $user['id']]); ?>">
                                <i class="fa fa-fw fa-user"></i>
                                <?= __('My profile'); ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?= $this->Url->build(['controller' => 'Projects', 'action' => 'myProjects']); ?>">
                                <i class="fa fa-fw fa-cubes"></i>
                                <?= __('My projects'); ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?= $this->Url->build(['controller' => 'Organizations', 'action' => 'myOrganizations']); ?>">
                                <i class="fa fa-fw fa-suitcase"></i>
                                <?= __('My organizations'); ?>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'logout']); ?>">
                                <i class="fa fa-fw fa-sign-out"></i>
                                <?= __('Logout'); ?>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php else : ?>
                <li>
                    <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'register']); ?>">
                        <i class="fa fa-lg fa-share-square-o"></i>
                        <?= __('Sign Up'); ?>
                    </a>
                </li>
                <li>
                    <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'login']); ?>">
                        <i class="fa fa-lg fa-sign-in"></i>
                        <?= __('Sign In'); ?>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
    <?= $this->cell('Sidebar::all'); ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <?= $this->fetch('content'); ?>
        </div>
    </div>
    <footer id="footer">
        Copyright © Maison du Logiciel Libre 2015
        - <?= $this->Html->link(__('Contact us'), ['controller' => 'Pages', 'action' => 'contact']); ?>
        - <?= $this->Html->link(__('About us'), ['controller' => 'Pages', 'action' => 'mission']); ?>
    </footer>
</div>
<?= $this->Html->script(
    [
        'jquery-2.1.4.min',
        'bootstrap.min',
        'googleAnalytics',
        'main'
    ]
); ?>

<?php //Do not move this line before a manual import of script! ?>
<?= $this->fetch('scriptBottom'); ?>
</body>
</html>