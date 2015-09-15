<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Projects Users Mission'), ['action' => 'edit', $projectsUsersMission->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Projects Users Mission'), ['action' => 'delete', $projectsUsersMission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectsUsersMission->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Projects Users Missions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Projects Users Mission'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects Users'), ['controller' => 'ProjectsUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Projects User'), ['controller' => 'ProjectsUsers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Missions'), ['controller' => 'Missions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mission'), ['controller' => 'Missions', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="projectsUsersMissions view large-10 medium-9 columns">
    <h2><?= h($projectsUsersMission->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Projects User') ?></h6>
            <p><?= $projectsUsersMission->has('projects_user') ? $this->Html->link($projectsUsersMission->projects_user->id, ['controller' => 'ProjectsUsers', 'action' => 'view', $projectsUsersMission->projects_user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Mission') ?></h6>
            <p><?= $projectsUsersMission->has('mission') ? $this->Html->link($projectsUsersMission->mission->id, ['controller' => 'Missions', 'action' => 'view', $projectsUsersMission->mission->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($projectsUsersMission->id) ?></p>
        </div>
    </div>
</div>
