<div class="row welcome-row">
    <div class=" col-sm-12 col-xs-12 text-center">
        <h1 style="margin:1px"><?= __("La Maison du Logiciel Libre"); ?></h1>
        <h3 style="margin:1px"><?= __('Ici nous brassons du code !') ?></h3>
    </div>
</div>
<hr class="hrmain">
<div id="carousel-mobile">
    <div class="row welcome-row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <?= $this->Html->image('1-mobile.jpg', ['class' => 'img-responsive stretch']); ?>
        </div>
    </div>
</div>
<div class="row welcome-row">
    <div id="carousel-container">
        <div id="carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
				<li data-target="#carousel" data-slide-to="1" class="active"></li>
				<li data-target="#carousel" data-slide-to="2"></li>

            </ol>
            <div class="carousel-inner" role="listbox">
				<div class="item active">
                    <div class="fillBackground">
                        <img src="<?= $this->request->webroot . 'img/carousel/2.jpg'; ?>" class="stretch" alt=""/>
                    </div>
                </div>

                <div class="item">
                    <div class="fillBackground">
                        <img src="<?= $this->request->webroot . 'img/carousel/tv4.png'; ?>" class="stretch" alt=""/>
                    </div>
                    <div class="bloc-link-event pull-right">
                        <a href="https://www.youtube.com/channel/UCI65aeAJA9jf6AmUNQ6UayQ" class="btn btn-primary"><?= __('more'); ?></a>
                    </div>
                </div>
            </div>
            <!-- Controls -->
              <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only"><?= __('previous'); ?></span>
              </a>
              <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only"><?= __('next'); ?></span>
              </a>
        </div>
    </div>
</div>
<hr class="hrmain">

<?php //Do not move this line before a manual import of script! ?>
<?= $this->fetch('scriptBottom'); ?>
</body>
</html>
<hr class="hrmain">
<div class="row" id="stats-row">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-center stats-cell">
        <div class="home-stats-desc">
            <?= __(
                '{0} and learn from our teaching assistants and collaborate with students.',
                '<strong class="text-info">' . __('Register now') . '</strong>'
            ); ?>
        </div>
        <?= $this->Html->link(__('Sign Up'), ['controller' => 'Users', 'action' => 'register'], ['class' => 'btn btn-info']); ?>
        <br><br>
        <?= $this->Html->link(__('Sign In'), ['controller' => 'Users', 'action' => 'login'], ['class' => 'btn btn-default']); ?>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-center stats-cell">
        <h2 style="margin:1px"><b><?= $this->Html->link(
            $numberStudents, ['controller' => 'Pages',
            'action' => 'statistics']
        ); ?></b></h2>
        <span class="home-stats-info"><?= __('Registered students'); ?></span>
        <i class="fa fa-graduation-cap fa-5x"></i>

    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-center stats-cell">
        <h2 style="margin:1px"><b><?= $this->Html->link(
            $numberProjects, ['controller' => 'Projects',
            'action' => 'index']
        ); ?></b></h2>
        <span class="home-stats-info"><?= __('Ongoing projects'); ?></span>
        <i class="fa fa-cubes fa-5x"></i>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-center stats-cell">
        <h2 style="margin:1px"><b><?= $this->Html->link(
            $numberMissions, ['controller' => 'Missions',
            'action' => 'index']
        ); ?></b></h2>
        <span class="home-stats-info"><?= __('Available missions'); ?></span>
        <i class="fa fa-file-text-o fa-5x"></i>
    </div>
</div>
<hr class="hrmain">
<div class="row" id="partners-row">
    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 text-center sponsors-cell">
        <h1>
            <?= __("Our founding partners"); ?>
        </h1>
        <a href="http://www.google.com"><?php echo $this->Html->image('google.svg', ['alt' => 'Google', 'id' => 'google-logo', 'class' => 'img-responsive founder-image']) ?></a>
        <a href="http://www.etsmtl.ca"><?php echo $this->Html->image('ets.svg', ['class' => 'img-responsive founder-image']) ?></a>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center sponsors-cell">
        <h1>
            <?= __("Our sponsors"); ?>
        </h1>
        <a href="http://ville.montreal.qc.ca/portal/page?_pageid=5798,85041649&_dad=portal&_schema=PORTAL">
            <?= $this->Html->image('montreal.svg', ['class' => 'img-responsive sponsor-image']); ?>
        </a>
        <a href="https://www.savoirfairelinux.com/">
            <?= $this->Html->image('savoirfairelinux.svg', ['class' => 'img-responsive sponsor sponsor-image']); ?>
        </a>
        <a href="https://www.redhat.com/">
            <?= $this->Html->image('RedHat.png', ['class' => 'img-responsive sponsor sponsor-image']); ?>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-center sponsors-cell">
        <h1><?= __('Become a sponsor'); ?></h1>
        <p>
            <?= __("Get visibility and access to over") ?>
            <strong> <?= __("5000 software engineering and computer science students.") ?> </strong>
            <?= __("Create partnerships with professors in our university network. Form strategic alliances with our industry and government partners.") ?>
        </p>
        <?= $this->Html->link(__('Contact us'), ['controller' => 'Pages', 'action' => 'contact'], ['class' => 'btn btn-info']); ?>
    </div>
</div>
<hr class="hrmain">
<div class="row" id="sub-info-row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center">
        <h1>
            <?= __("Are you a university student?"); ?>
        </h1>
        <h4><?= __("Take our survey and help us serve you better"); ?> <i
                class="fa fa-arrow-right"></i></h4>
        <?= $this->Html->link(__("Take the survey"), ['controller' => 'Pages', 'action' => 'survey'], ['class' => 'btn btn-default']); ?>
        <h4><?= __("Apply to work on an open source project"); ?> <i
                class="fa fa-arrow-right"></i></h4>
        <?= $this->Html->link(__("Our projects list"), ['controller' => 'Projects', 'action' => 'index'], ['class' => 'btn btn-default']); ?>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center">
        <h1>
            <?= __("Hire interns, graduates, and capstone."); ?>
        </h1>

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
    <div class="text-center">
        <?= $this->Html->link(__("Add project"), ['controller' => 'Projects', 'action' => 'submit'], ['class' => 'btn btn-default']); ?>
    </div>
</div>
<?= $this->Html->script(['carousel']); ?>
