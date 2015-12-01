<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= __('Home') ?>
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
<div id="wrapper-home">
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
            <li>
                <?= $this->Html->link(__('Go to dashboard'), ['controller' => 'Pages', 'action' => 'news']); ?>
            </li>
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
    <div id="page-wrapper">
        <div id="carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                <li data-target="#carousel" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <?= $this->Html->image('carousel/1.jpg'); ?>
                </div>
                <div class="item">
                    <?= $this->Html->image('carousel/2.jpg'); ?>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row" id="welcome-row">
                <div class="col-xs-offset-2 col-xs-8">
                    <h1><?= __("Welcome to maison du logiciel libre (ML2)"); ?></h1>

                    <h3><?= __('Ici nous brassons du code!') ?></h3>

                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <h4><strong><?= __('Student'); ?></strong></h4>
                                    <p><?= __('Improve your skill and C.V. by working on open source industry projects'); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <i class="fa fa-exchange fa-5x"></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <h4><strong><?= __('ML2'); ?></strong></h4>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <i class="fa fa-user-md  fa-5x"></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <h4><strong><?= __('Industry'); ?></strong></h4>
                                    <p><?= __('Propose a project and find motivated students in our university ecosystem'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="stats-row">
                <div class="col-xs-offset-2 col-xs-8">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-center stats-cell">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 home-stats-desc-title">
                                    <h1 class="home-stats-title"><strong><?= __('We have') ?></strong></h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 home-stats-desc">
                                    <?= __('{0} and learn from our teaching assistants and collaborate with students.', '<strong class="text-info">' . __('Register now') . '</strong>'); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <?= $this->Html->link(__('Sign Up'), ['controller' => 'Users', 'action' => 'register'], ['class' => 'btn btn-info']); ?>
                                    <?= $this->Html->link(__('Sign In'), ['controller' => 'Users', 'action' => 'register'], ['class' => 'btn btn-default']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-center stats-cell">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <span class="home-stats"><?= $numberStudents ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <span class="home-stats-info"><?= __('Registered students'); ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <i class="fa fa-graduation-cap fa-5x"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-center stats-cell">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <span class="home-stats"><?= $numberProjects ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <span class="home-stats-info"><?= __('Ongoing projects'); ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <i class="fa fa-cubes fa-5x"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-center stats-cell">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <span class="home-stats"><?= $numberMissions ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <span class="home-stats-info"><?= __('Available missions'); ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <i class="fa fa-file-text-o fa-5x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="partners-row">
                <div class="col-xs-offset-2 col-xs-8">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 text-center sponsors-cell">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h1>
                                        <?= __("Our founding partners"); ?>
                                    </h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-offset-2 col-sm-8">
                                    <a href="http://www.google.com"><?php echo $this->Html->image('google.svg', ['alt' => 'Google', 'id' => 'google-logo', 'class' => 'img-responsive']) ?></a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-offset-2 col-sm-6">
                                    <a href="http://www.etsmtl.ca"><?php echo $this->Html->image('ets.svg', ['class' => 'img-responsive']) ?></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center sponsors-cell">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h1>
                                        <?= __("Our sponsors"); ?>
                                    </h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-offset-1 col-xs-10" style="margin-bottom:10px;">
                                    <?= $this->Html->image('montreal.svg', ['class' => 'img-responsive']); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col-xs-6">
                                    <?= $this->Html->image('savoirfairelinux.svg', ['class' => 'img-responsive']); ?>
                                </div>
                                <div class="col-xs-5">
                                    <?= $this->Html->image('facil.png', ['class' => 'img-responsive']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-center sponsors-cell">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h1><?= __('Become a sponsor'); ?></h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="text-left">
                                        <?= __("Get visibility and access to over") ?>
                                        <strong> <?= __("5000 software engineering and computer science students.") ?> </strong>
                                        <?= __("Create partnerships with professors in our university network. Form strategic alliances with our industry and government partners.") ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <?= $this->Html->link(__('Contact us'), ['controller' => 'Pages', 'action' => 'contact'], ['class' => 'btn btn-info']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="sub-info-row">
                <div class="col-xs-offset-2 col-xs-8">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <h1>
                                        <?= __("Are you a university student?"); ?>
                                    </h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <h4><?= __("Take our survey and help us serve you better"); ?> <i
                                            class="fa fa-arrow-right"></i></h4>
                                    <?= $this->Html->link(__("Take the survey"), ['controller' => 'Pages', 'action' => 'survey'], ['class' => 'btn btn-default']); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <h4><?= __("Apply to work on an open source project"); ?> <i
                                            class="fa fa-arrow-right"></i></h4>
                                    <?= $this->Html->link(__("Our projects list"), ['controller' => 'Pages', 'action' => 'survey'], ['class' => 'btn btn-default']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <h1>
                                        <?= __("Hire interns, graduates, and capstone."); ?>
                                    </h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <ul>
                                        <li>
                                            <strong><?= __("Industry and Government: "); ?></strong><?= __("Develop open source features in your products, tools and dependencies. Promote your company in our open source community"); ?>
                                        </li>
                                        <br>
                                        <li>
                                            <strong><?= __("University professors: "); ?></strong><?= __("Lighten the work load of posting & finding projects and monitoring student progress. Leverage our teaching assistants and dev-ops infrastructure."); ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="contact-row">
                <div class="col-xs-offset-4 col-xs-4">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                            <p>Copyright © Maison du Logiciel Libre 2015</p>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <?= $this->Html->link(__('Contact us'), ['controller' => 'Pages', 'action' => 'contact']); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <?= $this->Html->link(__('About us'), ['controller' => 'Pages', 'action' => 'mission']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

<?php //Do not move this line before a manual import of script! ?>
<?= $this->fetch('scriptBottom'); ?>
</body>
</html>