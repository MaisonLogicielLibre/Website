<br><br>

<div class="container">
	<div class="row">
		<div class="col-lg-5 col-sm-6">
			<div class="clearfix"></div>
			<h2 class="section-heading"><?=__("Join the community");?> :<br><?=__("Sign up");?></h2>
			<h4 class="text-justify"><?=__("Join MLL to join a community established in 7 universities of Montreal to share with industries in the world of free software and / or open-source.");?></h4>
			<a class="btn btn-success" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'register']);?>"><?=__("Register");?></a>
			<a class="btn btn-primary" href="<?= $this->Url->build(['controller' => 'Projects', 'action' => 'index']);?>"><?=__("View projects");?></a>
		</div>
		<div class="col-lg-6 col-lg-offset-1 col-sm-6">
			<?= $this->Html->image('banner.png', ['alt' => 'ML2', 'class' => 'img-responsive']) ?>
		</div>
	</div>
</div><br><br>
<!-- /.container -->

<div class="container">
	<div class="row">
		<div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
			<hr class="section-heading-spacer">
			<div class="clearfix"></div>
			<h2 class="section-heading"><?=__("Hire for your projects");?></h2>
			<h4 class="text-justify"><?=__("Whether you are an industrial or academic representative, just submit your project to the community and meet our students looking for a project.");?></h4>
			<a class="btn btn-success" href="<?= $this->Url->build(['controller' => 'Projects', 'action' => 'submit']);?>"><?= __('Submit a project');?></a>
			<a class="btn btn-primary" href="<?= $this->Url->build(['controller' => 'Organizations', 'action' => 'submit']);?>"><?=__('Create an organization');?></a>
		</div>
		<div class="col-lg-4 col-sm-pull-6  col-sm-6">
			<?= $this->Html->image('bitbucket_github.png', ['alt' => 'ML2', 'class' => 'img-responsive']) ?>
		</div>
	</div>
</div><br><br>
<!-- /.container -->

<div class="container">
	<div class="row">
		<div class="col-lg-5 col-sm-6">
			<hr class="section-heading-spacer">
			<div class="clearfix"></div>
			<h2 class="section-heading"><?= __("Discover MLL and help us to evolve");?></h2>
			<h4 class="text-justify"><?= __("Discover MLL and it's mission, but do not forget that we primarily need you to evolve!");?> </h4>
			<a class="btn btn-info" href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'contest']);?>"><?= __('Logo contest');?></a>
		</div>
		<div class="col-lg-5 col-lg-offset-2 col-sm-6">
			<br>
			<?= $this->Html->image('logohere.png', ['alt' => 'ML2', 'class' => 'img-responsive']) ?>
		</div>
	</div>
</div><br><br>

<div class="container">
	<div class="row">
		<div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
			<hr class="section-heading-spacer">
			<div class="clearfix"></div>
			<h2 class="section-heading"><?=__("Participate in meetups");?></h2>
			<h4 class="text-justify"><?=__("Meet the community and improve your knowledge in our meetups at the École de Technologie Supérieure.");?></h4>
		</div>
		<div class="col-lg-4 col-sm-pull-6  col-sm-6">
		</div>
	</div>
</div><br><br>
<!-- /.container -->