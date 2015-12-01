<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h1 class="page-header"><?= __('Government'); ?> <?= $this->Wiki->addHelper('Organizations'); ?></h1>
        <?php
        $this->Html->addCrumb(__('Home'), '/');
        $this->Html->addCrumb(__('Government'));

        echo $this->Html->getCrumbList(); ?>
    </div>
</div>
<div class="row">
	<div class="panel panel-info col-sm-6 col-sm-offset-3">
		<div class="panel-body">
			<div class="row">
				<div style="float:left">
					<?php echo $this->Html->image('montreal.png', ['alt' => 'Montreal', 'width' => '64px', 'height' => '64px', 'class' => 'img-responsive']) ?>
				</div>
				<div class="col-sm-10">
					<h4><a href="http://ville.montreal.qc.ca"> Montréal </a></h4>
				</div>
			</div>
			<div class="row">	
				<div class="col-sm-11 col-sm-offset-1">
					<p> Montréal est la deuxième plus grande ville du Canada et se situe dans le Sud de la province du Québec, dont elle est la principale métropole. Elle est la ville francophone la plus peuplée d'Amérique et aussi l'une des plus grandes villes francophones du monde. </p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="panel panel-danger col-sm-6 col-sm-offset-3">
		<div class="panel-body">
			<div class="row">
				<div class="col-sm-11 col-sm-offset-1">
					<h4><a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'contact']); ?>"> <?= __('Become a sponsor') ?> </a></h4>
				</div>
			</div>
			<div class="row">	
				<div class="col-sm-11 col-sm-offset-1">
					<p> <?= __("Get visibility and access to over") ?>
                <strong> <?= __("5000 software engineering and computer science students.") ?> </strong>
                <?= __("Create partnerships with professors in our university network. Form strategic alliances with our industry and government partners.") ?> </p>
				</div>
			</div>
		</div>
	</div>
</div>