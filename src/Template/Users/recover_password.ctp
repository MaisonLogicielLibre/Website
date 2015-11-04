<?php
if (isset($user) and $user):
?>
    <div class="row">
        <div class="col-xs-4">
            <img src="<?= $user->getAvatar() ?>" alt="<?= $user->getAvatar() ?>" class="img-responsive center-block" width="200px" />
        </div>
        <div class="col-xs-8">
            Username: <?= $user->username ?><br/><br/>

            Firstname: <?= $user->firstName ?><br/>
            Lastname : <?= $user->lastName ?><br/><br/>

            Email : <?= $user->getCensoredEmail() ?><br/><br/><br/><br/>

            <a class="btn btn-success" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'recoverPassword', $user->id]);?>">Send link by email</a>
            <a class="btn btn-danger" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'recoverPassword']);?>">Search again</a>
        </div>
    </div>
<?php
else:
?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?= $this->Form->create() ?>
        <fieldset>
            <legend><?= __("Recover my account"); ?></legend>
            <p><?= __("For recover your account we need information about it. Enter your email, phone or username."); ?></p>
            <?= $this->Form->input('Information') ?>
        </fieldset>
        <?= $this->Form->button(__('Recover my account'), ['class' => 'btn btn-success']); ?>
        <?= $this->Form->end() ?>
    </div>
</div>
<?php
endif;
?>

