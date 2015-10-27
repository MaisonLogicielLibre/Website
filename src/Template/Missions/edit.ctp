<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $mission->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $mission->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Missions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Mission Levels'), ['controller' => 'MissionLevels', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Mission Level'), ['controller' => 'MissionLevels', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Type Missions'), ['controller' => 'TypeMissions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Type Mission'), ['controller' => 'TypeMissions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="missions form large-9 medium-8 columns content">
    <?= $this->Form->create($mission) ?>
    <fieldset>
        <legend><?= __('Edit Mission') ?></legend>
        <?php
            echo $this->Form->input('session');
            echo $this->Form->input('length');
            echo $this->Form->input('description');
            echo $this->Form->input('competence');
            echo $this->Form->input('mentor_id');
            echo $this->Form->input('type_mission');
            echo $this->Form->input('mission_levels._ids', ['options' => $missionLevels]);
            echo $this->Form->input('type_missions._ids', ['options' => $typeMissions]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
