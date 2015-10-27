<div class="container">
    <div class="row">
        <div class="col-sm-12 text-center">
            <h1><?= __("Welcome to Maison Logiciel Libre (ML2)");?></h1>

            <h3><?= __("Our mission is to improve university students software development skills and hiring potential through
                practical experience on free and open source software projects");?></h3>
        </div>
    </div>
    <div class="row home-row">
        <div class="col-sm-6" align="center">
            <h4>
                <b><a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'register']); ?>"><?= __("Register") ?></a></b>
                <?= __("to join our growing community of "); ?>
                <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'academic']); ?>"><?= __("university professors and students") ?></a> <?= __(","); ?>
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
    <div class="row home-row">
        <div class="col-sm-6 ml2_box_height" align="center">
           <hr class="hr-black" />
            <h2 class="section-heading"><?= __("Our university Network"); ?></h2>
            <?= $this->Html->image('banner.png', ['alt' => 'ML2', 'class' => 'img-responsive'], array('max-height' => '350px')) ?>
            <br>
            <div class="bottom_align">
                <a class="btn btn-primary"
                   href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'contact']); ?>"><?= __('Join our network'); ?></a>
            </div>
        </div>
        <div class="col-sm-6 ml2_box_height home-block" align="center">
            <hr class="hr-black" />
            <h2 class="section-heading"><?= __("Our generous sponsors"); ?></h2>
            <div>
                <a href="http://www.google.com"><?php echo $this->Html->image('google.svg', ['alt' => 'Google', 'width' => '50%', 'height' => 'auto', 'class' => 'img-responsive']) ?></a>
            </div>
            <div>
                <a href="https://www.savoirfairelinux.com"><?php echo $this->Html->image('savoirfairelinux.svg', ['alt' => 'Savoirfairelinux', 'width' => '50%', 'height' => 'auto', 'class' => 'img-responsive']) ?></a>
            </div>
            <?= __("Get visibility and access to over") ?> <b> <?= __("5000 software engineering and computer science students.") ?> </b> 
			<?= __("Create partnerships with professors in our university network. Form strategic alliances with our industry and government partners.") ?>
            <div class="bottom_align">
                <a class="btn btn-primary"
                   href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'contact']); ?>"><?= __('Become a sponsor '); ?></a>
                <br>
            </div>
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
            <?php echo $this->element('News/news-table'); ?>
        </div>
		<div class="col-sm-6">
			<hr class="hr-black" />
			<?php echo $this->element('Meetup/meetup-table'); ?>
		</div>
    </div>
</div>