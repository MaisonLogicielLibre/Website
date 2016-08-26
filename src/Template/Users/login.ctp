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
<div id="login-wrapper">
    <div class="panel panel-default">
        <div class="panel-body">
            <?= $this->Form->create() ?>
            <div class="col-sm-12">
                <h2><?= __("Sign In to {0}", '<strong>'.__('ML2').'</strong>') ?></h2>
            </div>
            <div id="login-alert" class="col-sm-12"><?= $this->Flash->render() ?></div>
            <div class="col-sm-12">
                <?= $this->Form->input('username', ['label' => false, 'placeholder' => __('username')]); ?>
                <?= $this->Form->input('password', ['label' => false, 'placeholder' => __('password')]) ?>
                <?= $this->Form->input('remember', ['label' => __('Remember me'), 'type' => 'checkbox']) ?>
                <?= $this->Form->button(__('Log In'), ['class' => 'btn btn-info']); ?>
            </div>
            <?= $this->Form->end() ?>

            <div class="col-sm-12">
                <a href="<?= $this->Url->build(["controller" => "Users", "action" => "recoverPassword"]); ?>">
                    <i class="fa fa-lock"></i>
                    <?= __('Forgot your password?'); ?>
                </a>
            </div>
        </div>
    </div>
    <div id="login-register-link" class="col-sm-12">
        <?= __('Don\'t have an account?'); ?>
        <a href="<?= $this->Url->build(["controller" => "Users", "action" => "register"]); ?>">
            <strong><?= __('Sign Up'); ?></strong>
        </a>
    </div>
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