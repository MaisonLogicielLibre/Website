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
        <legend><?= __('Register') ?></legend>
        <?= $this->Form->input('username', ['label' => __('Choose your username'), 'placeholder' => __('Username') ]); ?>
        <?= $this->Form->input('password', ['label' => __('Choose a password'), 'placeholder' => __('Password') ]); ?>
        <?= $this->Form->input('confirm_password', ['type' => 'password', 'label' => __('Confirm password'), 'placeholder' => __('Password') ]); ?>
        <?= $this->Form->input('email', ['label' => __('Email adress'), 'placeholder' => __('Email') ]); ?>
        <?= $this->Form->input('confirm_email', ['label' => __('Confirm email adress'), 'placeholder' => __('Email') ]); ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>

