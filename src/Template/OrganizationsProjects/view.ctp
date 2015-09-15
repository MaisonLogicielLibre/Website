<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Organizations Project'), ['action' => 'edit', $organizationsProject->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Organizations Project'), ['action' => 'delete', $organizationsProject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $organizationsProject->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Organizations Projects'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Organizations Project'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="organizationsProjects view large-10 medium-9 columns">
    <h2><?= h($organizationsProject->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Project') ?></h6>
            <p><?= $organizationsProject->has('project') ? $this->Html->link($organizationsProject->project->name, ['controller' => 'Projects', 'action' => 'view', $organizationsProject->project->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($organizationsProject->id) ?></p>
            <h6 class="subheader"><?= __('Organization') ?></h6>
            <p><?= $this->Number->format($organizationsProject->organization) ?></p>
        </div>
    </div>
</div>
