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
<div id="reset-password-wrapper">
    <div class="panel panel-default">
        <div class="panel-body">
            <?= $this->Form->create($user); ?>
            <div class="col-sm-12">
                <h2><?= __('Recover Password') ?></h2>
            </div>
            <div id="reset-password-alert" class="col-sm-12"><?= $this->Flash->render() ?></div>
            <div class="col-sm-12 col-xs-12">
                <input type="text" value="" style="display:none;"/>
                <?= $this->Form->input('password', ['value' => '', 'label' => false, 'placeholder' => __('Choose a new password')]); ?>
                <?= $this->Form->input('confirm_password', ['value' => '', 'type' => 'password', 'label' => false, 'placeholder' => __('Confirm the new password')]); ?>
                <?= $this->Form->button(__('Submit'), ['class' => 'btn-info']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
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