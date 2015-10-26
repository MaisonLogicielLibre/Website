<div class="row">
    <?= $this->cell('Sidebar::user', [$user->id]); ?>

    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <?= $this->Form->create($user); ?>
        <fieldset>
            <legend><?= __('Change Email') ?></legend>
            <?= $this->Form->input('email', ['value' => "", 'label' => __('Enter your new email'), 'placeholder' => __('Email'), 'autocomplete' => 'off']); ?>
            <?= $this->Form->input('confirm_email', ['label' => __('Confirm your new email'), 'placeholder' => __('Email'), 'autocomplete' => 'off']); ?>
            </br />
            <?= $this->Form->input('old_password', ['type' => 'password', 'label' => __('Confirm your password to confirm the change'), 'placeholder' => __('Password'), 'autocomplete' => 'off']); ?>
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
