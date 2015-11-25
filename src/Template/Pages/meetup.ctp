<div class="row">
	<div class="col-sm-12">
		<div class="col-sm-4 col-sm-offset-2">
			<h2 class="text-center"> <?= __('Join a meetup') ?></h2>
			<p> <?= __('ML2 offers learning opportunities with meetups. Do not be shy, join one and meet other enthusiasts.') ?></p>
		</div>
		<div class="col-sm-4">
			<h2 class="text-center"> <?= __('Post a meetup') ?></h2>
			<p> <?= __('Offering a meetup through ML2 give you an increased visibility throughout our community. Take this oppurtinity and attract new enthusiasts.') ?></p>
			<p class="text-center"><?= $this->Html->link(__('Contact us'), ['controller' => 'Pages', 'action' => 'contact']);?></li></p>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<h2 class="section-heading text-center"><?= __("ML2 Meetups at ÉTS"); ?></h2>
		<?= $this->cell('Meetups::listMeetups'); ?>
	</div>
</div>