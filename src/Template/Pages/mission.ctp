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
				<p>
					<?php echo __('This initiative is born from a meeting between the ÉTS director and Google
					Montreal director. Seeing the difficulty that students have to hone their
					habilities to develop complex software and show the end product (code) to
					recruiters, they decided to establish the Maison du Logiciel Libre (ML2)') ?>
				</p>

				<p>
					<?php echo __('The foremost mission of ML2 is to offer a place of meeting and sharing in
					Montreal allowing the students to participate in open source software
					projects. This initiative try to reach students across of Montreal
					universities and to include the largest possible community, thus allowing
					the students to meet participants from multiple horizons with varied
					academic and professional experiences.') ?>
				</p>

				<p>
					<?php echo __('The mission of ML2 is an educational mission. Multiple activities will be
					eventually offered : free development, graduation projects, internships,
					mastering projects, … All of these activities will gravitate around open
					source projects. These projects will be proposed by : students, teachers ,
					universities or organisations wanting to invest in students formation.
					Seminars will complete this educational component.') ?>
				</p>

				<p>
					<?php echo __('By participating in ML2 activities, the students will be able to (i)
					discover the open source software world with its codes and objectives; (ii)
					hone their habilities to analyse, design and develop complex tasks ; (iii)
					build a portfolio with their open source achievements ; (iv) obtain
					recognitions from their university.') ?>
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
				<li class="list-group-item"><?php echo __('24/7 access to ML2 location on the RC of ETS Pavilion A') ?></li>
			</ul>
		</div>
	</div>
</div>