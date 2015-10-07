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
            <?= $this->Form->create($user, ['type' => 'post', 'action' => 'delete']); ?>
            <fieldset>
                <legend><?= __('Delete your account') ?></legend>
                <p><?= __('You are about to unsubscribe from "Maison du Logiciel Libre". Here are the implications of this action who can not be undone:') ?></p>

                <ul>
                    <li><?= __('All your participation will be anonymized.') ?></li>
                    <li><?= __('Your email address') ?> (<?= $user->getEmail() ?>) <?= __('will be deleted from the system') ?>.</li>
                    <li><?= __('Your username') ?> (<?= $user->getUsername() ?>) <?= __('will be released and used by another member') ?> ;</li>
                </ul>

                <p><?= __('If you wish to continue your unsubscribe, click the button "Unsubscribe" below. Otherwise it is not yet too late ...') ?></p>
            </fieldset>
            <?= $this->Form->button(__('Unsubscribe'), ['class' => 'btn-danger']) ?>
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