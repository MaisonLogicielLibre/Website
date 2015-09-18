<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Organizations Project'), ['action' => 'edit', $organizationsProject->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Organizations Project'), ['action' => 'delete', $organizationsProject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $organizationsProject->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Organizations Projects'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Organizations Project'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Organizations'), ['controller' => 'Organizations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Organization'), ['controller' => 'Organizations', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="organizationsProjects view col-lg-10 col-md-9 columns">
    <h2><?= h($organizationsProject->id) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Project') ?></h6>
                    <p><?= $organizationsProject->has('project') ? $this->Html->link($organizationsProject->project->name, ['controller' => 'Projects', 'action' => 'view', $organizationsProject->project->id]) : '' ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($organizationsProject->id) ?></p>
                    <h6 class="subheader"><?= __('Organization') ?></h6>
                    <p><?= $this->Number->format($organizationsProject->organization) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
