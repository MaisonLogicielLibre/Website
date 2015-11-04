<div class="row">
    <?= $this->cell('Sidebar::project', [$projectId]); ?>

    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <?= $this->Form->create($mission); ?>
        <fieldset>
            <legend><?= __('Add Mission') ?> <?= $this->Wiki->addHelper('missions:add');?></legend>
            <?php
            echo $this->element('Missions/addForm');
            echo $this->fetch('form');
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
        <?= $this->Form->button(__('Cancel'), [
            'type' => 'button',
            'class' => 'btn btn-default',
            'onclick' => 'location.href=\'' . $this->url->build([
                    'controller' => 'Projects',
                    'action' => 'view',
                    $projectId
                ]) . '\''
        ]); ?>
        <?= $this->Form->end() ?>
    </div>
