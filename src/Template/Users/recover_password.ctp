<?php
if (isset($user) and $user):
?>
    <div class="row">
        <div class="col-xs-4">
            <img src="<?= $user->getAvatar() ?>" alt="<?= $user->getAvatar() ?>" class="img-responsive center-block" width="200px" />
        </div>
        <div class="col-xs-8">
            <?= __('Username'); ?> : <?= $user->username ?><br/><br/>

            <?= __('Firstname'); ?> : <?= $user->firstName ?><br/>
            <?= __('Lastname'); ?> : <?= $user->lastName ?><br/><br/>

            <?= __('Email'); ?> : <?= $user->getCensoredEmail() ?><br/><br/><br/><br/>

            <a class="btn btn-success" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'recoverPassword', $user->id]);?>"><?= ('Send link by email'); ?></a>
            <a class="btn btn-danger" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'recoverPassword']);?>"><?= ('Search again'); ?></a>
        </div>
    </div>
<?php
else:
?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?= $this->Form->create() ?>
        <fieldset>
            <legend><?= __("Reset my account"); ?></legend>
            <p><?= __("To reset your password, we will send you a recovery email. Please enter your email address, phone numer or username, to enable us to retrieve your account."); ?></p>
            <?= $this->Form->input('Information') ?>
        </fieldset>
        <?= $this->Form->button(__('Search'), ['class' => 'btn btn-success']); ?>
        <?= $this->Form->end() ?>
    </div>
</div>
<?php
endif;
?>
