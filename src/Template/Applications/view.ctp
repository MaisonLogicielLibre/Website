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
			<div class="col-sm-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row col-sm-12">
							<h3 class="header-title"> <?= __('Application information') ?></h3>
						</div>
						<div class="row col-sm-12">
							<?= __('User :') ?> <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'view', $application->user->id]); ?>"><?= $application->user->getName()?></a>
						</div>
						<div class="row col-sm-12 top-buffer">
							<?= __('Email :') ?> <a href="mailto:<?=$application->getEmail()?>"><?=$application->getEmail()?></a>
						</div>
						<?php if ($application->getText() != '') { ?>
							<div class="row col-sm-12 top-buffer">
								<h3 class="header-title"><?= __('Extra information') ?></h3>
								<?= $Parsedown->text($application->getText()) ?>
							</div>
						<?php } ?>

						<?php if(!($application->accepted)) : ?>
							<div class="row col-sm-12 top-buffer">
								<input class="btn-success btn" type="button" onclick="location.href='<?=$this->url->build(['controller' => 'Applications','action' => 'accepted',$application->id])?>';" value="<?=__('Approved')?>"/>
								<input  class="btn-danger btn" type="button" onclick="location.href='<?=$this->url->build(['controller' => 'Applications','action' => 'rejected',$application->id])?>';" value="<?=__('Rejected')?>"/>
							</div>
						<?php endif ; ?>
					</div>
				</div>
			</div>
        </div>
    </div>
</div>
<?= $this->Html->script(['initial.min'], ['block' => 'scriptBottom']); ?>
