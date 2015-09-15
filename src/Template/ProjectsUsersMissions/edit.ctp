<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $projectsUsersMission->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $projectsUsersMission->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Projects Users Missions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Projects Users'), ['controller' => 'ProjectsUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Projects User'), ['controller' => 'ProjectsUsers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Missions'), ['controller' => 'Missions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Mission'), ['controller' => 'Missions', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="projectsUsersMissions form large-10 medium-9 columns">
    <?= $this->Form->create($projectsUsersMission) ?>
    <fieldset>
        <legend><?= __('Edit Projects Users Mission') ?></legend>
        <?php
            echo $this->Form->input('projects_user_id', ['options' => $projectsUsers]);
            echo $this->Form->input('mission_id', ['options' => $missions]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
