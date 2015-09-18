<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li class="active disabled"><?= $this->Html->link(__('Edit Organization'), ['action' => 'edit', $organization->id]) ?> </li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $organization->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $organization->id), 'class' => 'btn-danger']
            )
        ?></li>
        <li><?= $this->Html->link(__('New Organization'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Organizations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="organizations form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($organization); ?>
    <fieldset>
        <legend><?= __('Edit Organization') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('website');
            echo $this->Form->input('logo');
            echo $this->Form->input('description');
            echo $this->Form->input('projects._ids', ['options' => $projects]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
