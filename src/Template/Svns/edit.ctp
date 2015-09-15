<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $svn->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $svn->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Svns'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Svn Users'), ['controller' => 'SvnUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Svn User'), ['controller' => 'SvnUsers', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="svns form large-10 medium-9 columns">
    <?= $this->Form->create($svn) ?>
    <fieldset>
        <legend><?= __('Edit Svn') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
