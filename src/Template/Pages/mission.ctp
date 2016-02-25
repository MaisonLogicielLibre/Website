<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h1 class="page-header"><?= __('Associations'); ?> <?= $this->Wiki->addHelper('Organizations'); ?></h1>
        <?php
        $this->Html->addCrumb(__('Home'), '/');
        $this->Html->addCrumb(__('Mission'));

        echo $this->Html->getCrumbList(); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 col-sm-offset-3">
        <div class="panel">
            <div class="panel-body text-justify">
                <h3><?php echo __('Our Mission') ?></h3>
                <h4>
                    <b><?php echo __('ML2 will improve University students’ '.
                        'software development skills and hiring potential through practical experience on '.
                        'free and open-source software projects.') ?></b>
                </h4>

                <p>
                    <b><?php echo __('The primary mission for ML2 is educational.') ?></b>
                </p>

                <p>
                    <?php echo __('Students will improve their skills by developing software under mentorship'.
                        ' and coaching of professors, industry mentors, teaching assistants, and fellow students who '.
                        'demonstrate coding prowess. This inclusive initiative seeks to blend students from the widest'.
                        ' possible University community; enabling students from varied backgrounds, academic standing,'.
                        ' and professional experience to mix and collaborate under expert guidance.') ?>
                </p>

                <p>
                    <?php echo __('ML2 will host projects, seminars, meetups and events from industry, academia and'.
                        ' government. Seminars and meetups compliment projects for the educational component. Meetups'.
                        ' and events enhance networking and promote industry sponsors and partners. The ML2 operating'.
                        ' model is based on elements of Google’s summer-of-code Project-Mentor model. Online project'.
                        ' contribution metrics and mentor testimonials will provide unbiased assessment of a student’s'.
                        ' hiring potential.') ?>
                </p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6 col-sm-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h3><?php echo __('Value proposition for industry') ?></h3>
            </div>
            <ul class="list-group">
                <li class="list-group-item"><?php echo __('Access to potential new hires in our logicel libre developer community') ?></li>
                <li class="list-group-item"><?php echo __('Develop new open source features faster and cheaper in your products and dependencies') ?></li>
                <li class="list-group-item"><?php echo __('Promote your company and create networks across the software engineering and computer science departments of 7 universities') ?></li>
                <li class="list-group-item"><?php echo __('Create Goodwill in the University and open source communities') ?></li>
            </ul>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 col-sm-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h3><?php echo __('Value proposition for universities and students') ?></h3>
            </div>

            <ul class="list-group">
                <li class="list-group-item"><?php echo __('Match Interns with Industry and Academic funded open source projects') ?></li>
                <li class="list-group-item"><?php echo __('Match Capstone students with Industry and Academic sponsored open source projects') ?></li>
                <li class="list-group-item"><?php echo __('Support for graduate students working on open source projects') ?></li>
                <li class="list-group-item"><?php echo __('Project mentorship (each submitted project must have a mentor)') ?></li>
                <li class="list-group-item"><?php echo __('Teaching assistant (TAs) access') ?></li>
                <li class="list-group-item"><?php echo __('Additional mentor access from ML2 staff') ?></li>
                <li class="list-group-item"><?php echo __('Networking with ML2 members: students from 7 universities, open source community, mentors, and industry') ?></li>
                <li class="list-group-item"><?php echo __('Promotion of projects and students on the ML2 website') ?></li>
                <li class="list-group-item"><?php echo __('CV Portfolio testimonial plugin (testimonials from TAs & mentors)') ?></li>
                <li class="list-group-item"><?php echo __('CV Portfolio open source code summary plugin (key performance indicators on open source repo contributions)') ?></li>
                <li class="list-group-item"><?php echo __('Access to ML2 academic and industry conferences and seminars') ?></li>
                <li class="list-group-item"><?php echo __('access from 9:00 to 12:00 and 1:30PM to 5:30PM to ML2 location on the RC of ETS Pavilion A') ?></li>
            </ul>
        </div>
    </div>
</div>
