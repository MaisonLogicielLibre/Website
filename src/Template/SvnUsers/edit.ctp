<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li class="active disabled"><?= $this->Html->link(__('Edit Svn User'), ['action' => 'edit', $svnUser->id]) ?> </li>
        <li><?= $this->Form->postLink(
            __('Delete'),
            ['action' => 'delete', $svnUser->id],
            ['confirm' => __('Are you sure you want to delete # {0}?', $svnUser->id), 'class' => 'btn-danger']
        )
        ?></li>
        <li><?= $this->Html->link(__('New Svn User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Svn Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Svns'), ['controller' => 'Svns', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Svn'), ['controller' => 'Svns', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="svnUsers form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($svnUser); ?>
    <fieldset>
        <legend><?= __('Edit Svn User') ?></legend>
        <?php
            echo $this->Form->input('pseudo');
            echo $this->Form->input('svn_id', ['options' => $svns]);
            echo $this->Form->input('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
