<div class="row">
    <?= $this->cell('Sidebar::mission', [$mission->getId()]); ?>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <fieldset>
            <legend><?= __('Apply on the mission') ?></legend>
            <p> <?= __('Are you sure you want to apply on this mission?') ?> </p>
		<?php echo $this->Form->create($mission); ?>
        </fieldset>
        <?= $this->Form->button(__('Yes'), ['class' => 'btn-success']) ?>
        <?= $this->Form->button(__('No'), [
            'type' => 'button',
            'class' => 'btn btn-default',
            'onclick' => 'location.href=\'' . $this->url->build([
                    'controller' => 'Missions',
                    'action' => 'view',
                    $mission->getId()
                ]) . '\''
        ]); ?>
    </div>
</div>
