<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->Html->css('font-awesome.min') ?>
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,600' rel='stylesheet' type='text/css'>

    <?= $this->Less->less('less/styles.less'); ?>
</head>
<body>
<div id="recover-password-wrapper">
    <div class="panel panel-default">
        <div class="panel-body">
            <?php
            if (isset($user) and $user):
            ?>
            <div class="col-sm-12 col-xs-12">
                <h2><?= __("Reset my account"); ?></h2>
            </div>
                <div id="recover-password-alert" class="col-sm-12 col-xs-12"><?= $this->Flash->render() ?></div>
                <div id="recover-password-avatar" class="col-xs-offset-4 col-xs-4">
                    <img src="<?= $user->getAvatar() ?>" alt="<?= $user->getAvatar() ?>" class="img-responsive img-circle img-thumbnail" />
                </div>
                <div class="col-sm-12 col-xs-12 text-center">
                    <h4><?= $user->getName() ?></h4>
                </div>
            <div class="col-sm-12 col-xs-12">
                <span class="recover-password-info"><strong><?= __('Username'); ?> :</strong> <?= $user->getUsername() ?></span>

                <span class="recover-password-info"><strong><?= __('Email'); ?> :</strong> <?= $user->getCensoredEmail() ?></span>

                <a class="btn btn-info" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'recoverPassword', $user->id]);?>"><?= ('Send link by email'); ?></a>
            </div>
            <?php else: ?>
            <?= $this->Form->create() ?>
            <div class="col-sm-12 col-xs-12">
                <h2><?= __("Reset my account"); ?></h2>
            </div>
            <div class="col-sm-12 col-xs-12">
                <div role="alert" class="alert alert-dismissible fade in alert-info">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <?= __("Please enter your email address, phone numer or username, to enable us to retrieve your account."); ?>
                </div>
            </div>
            <div id="recover-password-alert" class="col-sm-12 col-xs-12"><?= $this->Flash->render() ?></div>
            <div class="col-sm-12 col-xs-12">
                <?= $this->Form->input('Information', ['label' => false, 'placeholder' => __('Information')]); ?>
                <?= $this->Form->button(__('Search'), ['class' => 'btn btn-info']); ?>
            </div>
            <?= $this->Form->end(); ?>
            <?php endif; ?>
        </div>
    </div>
    <?php if (isset($user) and $user): ?>
    <div id="recover-password-search-link" class="col-sm-12">
        <?= __('Not your account?'); ?>
        <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'recoverPassword']); ?>">
            <strong><?= __('Search again'); ?></strong>
        </a>
    </div>
    <?php endif; ?>
</div>

<?= $this->Html->script(
    [
        'jquery-2.1.4.min',
        'bootstrap.min',
        'googleAnalytics',
    ]
); ?>
</body>
</html>
