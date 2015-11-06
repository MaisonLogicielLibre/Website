<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?= $this->Form->create($user); ?>
        <fieldset>
            <legend><?= __('Recover Password') ?></legend>
            <?= $this->Form->input('password', ['value' => '', 'label' => __('Choose a new password'), 'placeholder' => __('Password')]); ?>
            <?= $this->Form->input('confirm_password', ['value' => '', 'type' => 'password', 'label' => __('Confirm the new password'), 'placeholder' => __('Password')]); ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
