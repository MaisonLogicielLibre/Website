<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        La Maison du Logiciel Libre
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
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-ex1-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="<?= $this->Url->build(['controller' => 'pages', 'action' => 'home']); ?>" class="navbar-brand">
                    <?= $this->Html->image('favicon.ico', [
                        'alt' => 'Maison Logiciel Libre', 'width' => '40','style'=>'padding-top:0;margin-top:0' ]); ?>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                </ul>
                <ul class="nav navbar-nav navbar-right top-nav">
                    <a href="https://www.facebook.com/maisonlogiciellibre/" class="navbar-brand navbar-facebook">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-facebook fa-stack-1x icon-facebook"></i>
                        </span>
                    </a>
                    <a href="https://twitter.com/ml2_ets" class="navbar-brand navbar-twitter">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-twitter fa-stack-1x icon-twitter"></i>
                        </span>
                    </a>
                    <a href="https://maisonlogiciellibre.github.io/" class="navbar-brand navbar-github">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-github fa-lg fa-stack-1x icon-github"></i>
                        </span>
                    </a>
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
                                    <span>Français</span>
                                </a>
                            </li>
                            <li id="canada-flag">
                                <a href="<?= $this->Url->build(['controller' => $this->request->Session()->read('controllerRef'), 'action' => $this->request->Session()->read('actionRef'), 'lang' => 'en_CA']); ?>">
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
                                $fn = (!empty($user['firstName']) ? $user['firstName'] . ' ' . $user['lastName'] : (!empty($user['username']) ? $user['username'] : ''));
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
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <?= $this->cell('Sidebar::all'); ?>
    <div id="page-wrapper">
        <div class="container-fluid">

            <?= $this->Flash->render() ?>
            <?= $this->fetch('content'); ?>
        </div>
    </div>
    <footer id="footer" >
        <div class="text-center">
        Copyright © Maison du Logiciel Libre 2015
        - <?= $this->Html->link(__('Contact us'), ['controller' => 'Pages', 'action' => 'contact']); ?>
        </div>
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
<script>
    $(document).ready(function () {
        $('.navbar-toggle').click(function () {
            $("html, body").animate({
                scrollTop: 0
            }, 600);
        });
    });
</script>
</body>
</html>
