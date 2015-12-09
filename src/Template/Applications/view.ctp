<?php $Parsedown = new ParsedownNoImage(); ?>
<div class="row">
    <?= $this->cell('Sidebar::mission', [$application->mission->id]); ?>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="page-header"><?= __('Application'); ?></h1>
                <?php
                $this->Html->addCrumb(__('Home'), '/');
                $this->Html->addCrumb(__('Missions'), '/Missions');
                $this->Html->addCrumb($application->mission->name, '/Missions/view/'.$application->mission->id);
                $this->Html->addCrumb(__('Application'));

                echo $this->Html->getCrumbList(); ?>
            </div>
        </div>
        <div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row col-sm-12">
							<?= __('User :') ?> <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'view', $application->user->id]); ?>"><?= $application->user->getName()?></a>
						</div>
						<div class="row col-sm-12 top-buffer">
							<?= __('Email :') ?> <a href="mailto:<?=$application->getEmail()?>"><?=$application->getEmail()?></a>
						</div>
						<div class="row col-sm-12 top-buffer">
							<?= __('Type :') ?> <?= __($application->type_mission->name) ?>
						</div>
						<div class="row col-sm-12 top-buffer">
							<strong><?= __('Extra information') ?></strong>
							<?= $Parsedown->text($application->getText()) ?>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
</div>
<?= $this->Html->script(['initial.min'], ['block' => 'scriptBottom']); ?>
