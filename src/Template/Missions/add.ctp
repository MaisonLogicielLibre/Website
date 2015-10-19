<div class="missions col-lg-12 col-md-12 columns">
    <?= $this->cell('Sidebar::project', [$projectId]); ?>

    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
    <?= $this->Form->create($mission); ?>
    <fieldset>
        <legend><?= __('Add Mission') ?></legend>
        <?php
            echo $this->Form->input('description');
            echo $this->Form->input('competence');
            echo $this->Form->input('type_missions._ids', ['options' => $typeMissions, 'multiple' => 'checkbox']);
        $sessionOptions =
            [
                0 => __('Not specified'),
                1 => __('Winter'),
                2 => __('Summer'),
                3 => __('Fall')
            ];
        echo $this->Form->input('session', ['options' => $sessionOptions, 'type' => 'select']);
        $lengthOptions =
            [
                0 => __('Not specified'),
                1 => __('1 term'),
                2 => __('2 term'),
                3 => __('3 term')
            ];
        echo $this->Form->input('length', ['options' => $lengthOptions, 'type' => 'select']);
            echo $this->Form->input('mission_levels._ids', ['options' => $missionLevels, 'multiple' => 'checkbox']);
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
<?= $this->Html->script('missions/add.js', ['block' => 'scriptBottom']); ?>
