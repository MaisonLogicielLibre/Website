<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h1 class="page-header"><?= __('Meetup'); ?></h1>
        <?php
        $this->Html->addCrumb(__('Home'), '/');
        $this->Html->addCrumb(__('Meetup'));

        echo $this->Html->getCrumbList(); ?>
    </div>
</div>
<div class="row">
	<div class="panel panel-danger col-sm-6 col-sm-offset-3">
		<div class="panel-body">
			<div class="row">
				<div class="panel-title">
					<?= __('Post a meetup') ?>
				</div>
			</div>
			<br>
			<div class="row">	
				<div class="col-sm-12">
					<p> <?= __('Offering a meetup through ML2 give you an increased visibility throughout our community. Take this oppurtinity and attract new enthusiasts.') ?></p>
					<p class="text-center"><?= $this->Html->link(__('Contact us'), ['controller' => 'Pages', 'action' => 'contact']);?></li></p>
				</div>
			</div>
		</div>
	</div>
</div>
<?= $this->cell('Meetups::listMeetups'); ?>