<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $organizationsProject->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $organizationsProject->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Organizations Projects'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="organizationsProjects form large-10 medium-9 columns">
    <?= $this->Form->create($organizationsProject) ?>
    <fieldset>
        <legend><?= __('Edit Organizations Project') ?></legend>
        <?php
            echo $this->Form->input('project_id', ['options' => $projects]);
            echo $this->Form->input('organization');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
