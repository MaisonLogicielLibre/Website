<div class="breadcrumb">
    <div class="row">
        <div class="col-sm-5 col-sm-offset-1">
            <?= __('We have') . ' <strong>' . $numberProjects . '</strong> ' . __('projects with') . ' <strong>' . $numberMissions . '</strong> ' . __('missions') ?>
        </div>
        <div class="col-sm-5 text-right">
            <?= __('There are') . ' <strong>' . $numberUsers . '</strong> ' . __('registered users, including') . ' <strong>' . $numberStudents . '</strong> ' . __('confirmed students') ?><br/>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12 text-center">
            <h1><?= __("Welcome to maison du logiciel libre (ML2)");?></h1>

            <h3><?= __("Our mission is to improve university students software development skills and hiring potential through
                practical experience on free and open source software projects");?></h3>
        </div>
    </div>
    <div class="row home-row">
        <div class="col-sm-6" align="center">
            <h4>
                <b><a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'register']); ?>"><?= __("Register") ?></a></b>
                <?= __("to join our growing community of "); ?>
                <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'academic']); ?>"><?= __("university professors and students") ?></a>
                <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'industry']); ?>"><?= __("industry partners") ?></a> <?= __("and"); ?>
				<a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'aso']); ?>"><?= __("associations") ?></a> <?= __("in Quebec."); ?>
            </h4>
        </div>
        <div class="col-sm-6" align="center">
            <h4>
                <a class="btn btn-primary"
                   href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'mission']); ?>"> 
				   <i class="fa fa-arrow-right"></i> </a> <?= __("Discover the benefits of joining ML2") ?>
            </h4>
        </div>
    </div>
    <div id="link-partners" class="row home-row">
        <div class="col-sm-6">
            <hr class="hr-black"/>
            <h2 class="section-heading"><?= __("Our university Network"); ?></h2>
            <?= $this->Html->image('banner.png', ['alt' => 'ML2', 'class' => 'img-responsive'], array('max-height' => '350px')) ?>
            <a class="btn btn-primary"
               href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'contact']); ?>"><?= __('Join our network'); ?></a>
        </div>
        <div class="col-sm-6">
            <hr class="hr-black"/>
            <h2 class="section-heading"><?= __("Our founding partners"); ?></h2>
            <a href="http://www.google.com"><?php echo $this->Html->image('google.svg', ['alt' => 'Google', 'id' => 'google-logo', 'class' => 'img-responsive']) ?></a>

            <h2 class="section-heading"><?= __("Our sponsors"); ?></h2>
            <div id="list-sponsors" class="row">
                <div class="col-sm-6">
                    <a href=https://www.savoirfairelinux.com"><?php echo $this->Html->image('savoirfairelinux.svg', ['alt' => 'Savoirfairelinux', 'id' => 'sfl-logo', 'class' => 'img-responsive']) ?></a>
                </div>
                <div class="col-sm-6">
                    <a href="https://facil.qc.ca/"><?php echo $this->Html->image('facil.png', ['alt' => 'FACIL', 'id' => 'facil-logo', 'class' => 'img-responsive']) ?></a>
                </div>
            </div>
            <p>
                <?= __("Get visibility and access to over") ?>
                <strong> <?= __("5000 software engineering and computer science students.") ?> </strong>
                <?= __("Create partnerships with professors in our university network. Form strategic alliances with our industry and government partners.") ?>
            </p>
                <a class="btn btn-primary"
               href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'contact']); ?>"><?= __('Become a sponsor '); ?></a>
        </div>
    </div>
    <div class="row home-row">
        <div class="col-sm-6">
            <hr class="hr-black" />
            <h2 class="section-heading"><i class="fa fa-graduation-cap"></i><?= __("Are you a university student?"); ?></h2>
            <h4><?= __("Take our survey and help us serve you better"); ?> <i class="fa fa-arrow-right"></i></h4>
			<div align=center>
				<a class="btn btn-primary pretty_mobile_button" 
				href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'survey']); ?>"><?= __("Take the survey") ?></a>
			</div>
            <h4><?= __("Apply to work on an open source project"); ?> <i class="fa fa-arrow-right"></i></h4>

            <div align="center">
                <a class="btn btn-primary pretty_mobile_button"
                   href="<?= $this->Url->build(['controller' => 'Projects', 'action' => 'index']); ?>"><?= __("Intern projects"); ?></a>
                <a class="btn btn-primary pretty_mobile_button"
                   href="<?= $this->Url->build(['controller' => 'Projects', 'action' => 'index']); ?>"><?= __("Graduate projects"); ?></a>
                <a class="btn btn-primary pretty_mobile_button"
                   href="<?= $this->Url->build(['controller' => 'Projects', 'action' => 'index']); ?>"><?= __("Capstone projects"); ?></a>
            </div>
            <h4><?= __("Are you new to Free Software and Open Source?"); ?></h4>
            <ul>
                <li>
                    <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'register']); ?>"><?= __("Register2") ?></a>
                <?= __("and learn from our teaching assistants and Collaborate with students."); ?></h4></li>
                <li> <?= __("Visit our") ?> <a
                        href="http://wiki.maisonlogiciellibre.org"><?= __("Wiki") ?></a>
                <?= __("to learn about open source coding practices"); ?>
                </li> 
            </ul>
        </div>
        <div class="col-sm-6">
            <hr class="hr-black" />
            <h2 class="section-heading"><i
                    class="fa fa-hand-o-right "></i> <?= __("Hire interns, graduates, and capstone."); ?></h2>
            <ul>
                <li><b><?= __("Industry and Government: "); ?></b><?= __("Develop open source features in your products, tools and
                    dependencies. Promote your company in our open source community"); ?>
                </li>
				<br>
                <li><b><?= __("University professors: "); ?></b><?= __("Lighten the work load of posting & finding projects and monitoring student progress. Leverage our teaching assistants and
                    dev-ops infrastructure."); ?>
                </li>
            </ul>
            <div align="center">
                <a class="btn btn-primary"
                   href="<?= $this->Url->build(['controller' => 'Projects', 'action' => 'submit']); ?>"><?= __('Submit a project'); ?></a>
            </div>
        </div>
    </div>
    <div class="row home-row">
        <div class="col-sm-6">
			<hr class="hr-black" />
            <?= $this->cell('News::listNews'); ?>
        </div>
		<div class="col-sm-6">
			<hr class="hr-black" />
            <?= $this->cell('Meetups::listMeetups'); ?>
		</div>
    </div>
</div>