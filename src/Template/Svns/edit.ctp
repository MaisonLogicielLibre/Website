<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li class="active disabled"><?= $this->Html->link(__('Edit Svn'), ['action' => 'edit', $svn->id]) ?> </li>
        <li><?= $this->Form->postLink(
            __('Delete'),
            ['action' => 'delete', $svn->id],
            ['confirm' => __('Are you sure you want to delete # {0}?', $svn->id), 'class' => 'btn-danger']
        )
        ?></li>
        <li><?= $this->Html->link(__('New Svn'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Svns'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Svn Users'), ['controller' => 'SvnUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Svn User'), ['controller' => 'SvnUsers', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="svns form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($svn); ?>
    <fieldset>
        <legend><?= __('Edit Svn') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
