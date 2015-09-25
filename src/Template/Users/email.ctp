<div class="row">
    <div class="users form col-lg-12 col-md-12 columns">
        <?php
        $this->element('Users/sidebar');
        if ($you)
            echo $this->fetch('sidebarYou');
        else
            echo $this->fetch('sidebar');
        ?>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <?= $this->Form->create($user); ?>
            <fieldset>
                <legend><?= __('Change Email') ?></legend>
                <?= $this->Form->input('email', ['label' => __('Enter your new email'), 'placeholder' => __('Email'), 'value' => '' ]); ?>
                <?= $this->Form->input('confirm_email', ['label' => __('Confirm your new email'), 'placeholder' => __('Email') ]); ?>
                </br />
                <?= $this->Form->input('old_password', ['label' => __('Confirm your password to confirm the change'), 'placeholder' => __('Password') ]); ?>
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
</div>
