<div class="row">
    <?= $this->cell('Sidebar::user', [$user->id]); ?>

    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <?= $this->Form->create($user); ?>
        <fieldset>
            <legend><?= __('Change Password') ?></legend>
            <?= $this->Form->input('password', ['value' => '', 'label' => __('Choose a new password'), 'placeholder' => __('Password')]); ?>
            <?= $this->Form->input('confirm_password', ['value' => '', 'type' => 'password', 'label' => __('Confirm the new password'), 'placeholder' => __('Password')]); ?>
            </br />
            <?= $this->Form->input('old_password', ['value' => '', 'type' => 'password', 'label' => __('Confirm your current password to confirm the change'), 'placeholder' => __('Password')]); ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
        <?= $this->Form->button(__('Cancel'), [
            'type' => 'button',
            'class' => 'btn btn-default',
            'onclick' => 'location.href=\'' . $this->url->build([
                    'controller' => 'Users',
                    'action' => 'view',
                    $user->id
                ]) . '\''
        ]); ?>
        <?= $this->Form->end() ?>
    </div>
</div>
