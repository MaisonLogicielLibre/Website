<div class="users form col-lg-12 col-md-12 columns">
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

