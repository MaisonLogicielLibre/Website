<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li class="active disabled"><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Universities'), ['controller' => 'Universities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New University'), ['controller' => 'Universities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Type Users'), ['controller' => 'TypeUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Type User'), ['controller' => 'TypeUsers', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="users form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($user); ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->input('firstName');
            echo $this->Form->input('lastName');
            echo $this->Form->input('biography');
            echo $this->Form->input('portfolio', ['placeholder' => __("http(s)://website.com")]);
            echo $this->Form->input('email');
            echo $this->Form->input('phone');
            echo $this->Form->input('gender');
            echo $this->Form->input('password');
            echo $this->Form->input('username');
            echo $this->Form->input('universitie_id', ['options' => $universities]);
            echo $this->Form->input('projects._ids', ['options' => $projects]);
            echo $this->Form->input('type_users._ids', ['options' => $typeUsers]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
