<div class="row">
    <?= $this->cell('Sidebar::mission', [$mission->getId()]); ?>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <fieldset>
            <legend><?= __('Apply on the mission') ?> <i class="fa fa-user-secret"></i></legend>
            <p>
                <?= __('As always, should you encounter a bug, we will disavow any knowledge of your actions.') ?>
                <br/><br/>
                <?= __('This page will self-destruct on the press of a button. Good luck..') ?>
            </p>
		<?php echo $this->Form->create($mission); ?>
        </fieldset>
        <?= $this->Form->button(__('Apply'), ['class' => 'btn-success']) ?>
        <?= $this->Form->button(__('Cancel'), [
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
