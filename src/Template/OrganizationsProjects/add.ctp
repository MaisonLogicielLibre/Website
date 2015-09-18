<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li class="active disabled"><?= $this->Html->link(__('New Organizations Project'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Organizations Projects'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Organizations'), ['controller' => 'Organizations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Organization'), ['controller' => 'Organizations', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="organizationsProjects form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($organizationsProject); ?>
    <fieldset>
        <legend><?= __('Add Organizations Project') ?></legend>
        <?php
            echo $this->Form->input('project_id', ['options' => $projects]);
            echo $this->Form->input('organization');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
