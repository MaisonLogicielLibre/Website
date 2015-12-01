<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h1 class="page-header"><?= __('Contact'); ?> <?= $this->Wiki->addHelper('Organizations'); ?></h1>
        <?php
        $this->Html->addCrumb(__('Home'), '/');
        $this->Html->addCrumb(__('Contact'));

        echo $this->Html->getCrumbList(); ?>
    </div>
</div>
<div class="row">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2796.774480405772!2d-73.564640684164!3d45.49448593944259!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc91a60aa839707%3A0xb732a719a45c45f6!2s%C3%89cole+de+technologie+sup%C3%A9rieure+-+%C3%89TS!5e0!3m2!1sfr!2sca!4v1448979738908" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<br>
<div class="row">
	<div class="panel panel-default col-sm-6 col-sm-offset-3">
		<div class="panel-body row">
			<div class="col-sm-8 col-sm-offset-3">
				<h3> <i class="fa fa-user"></i> Ted Hill
				<h3> <i class="fa fa-home"></i> <?= __('1100, rue Notre-Dame Ouest') ?>
				<h3> <i class="fa fa-phone"></i><a href="tel:15143968799"> (514) 396-8799</a></h3>
				<h3> <i class="fa fa-envelope"></i><a href="mailto:maisonlogiciellibre@etsmtl.net"> maisonlogiciellibre@etsmtl.net</a></h3>
			</div>
		</div>
	</div>
</div>