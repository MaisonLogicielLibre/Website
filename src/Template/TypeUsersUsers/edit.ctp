<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li class="active disabled"><?= $this->Html->link(__('Edit Type Users User'), ['action' => 'edit', $typeUsersUser->id]) ?> </li>
        <li><?= $this->Form->postLink(
            __('Delete'),
            ['action' => 'delete', $typeUsersUser->id],
            ['confirm' => __('Are you sure you want to delete # {0}?', $typeUsersUser->id), 'class' => 'btn-danger']
        )
        ?></li>
        <li><?= $this->Html->link(__('New Type Users User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Type Users Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Type Users'), ['controller' => 'TypeUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Type User'), ['controller' => 'TypeUsers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="typeUsersUsers form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($typeUsersUser); ?>
    <fieldset>
        <legend><?= __('Edit Type Users User') ?></legend>
        <?php
            echo $this->Form->input('type_user_id', ['options' => $typeUsers]);
            echo $this->Form->input('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
