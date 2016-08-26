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
    <?= $this->Html->css('bootstrap-switch.min'); ?>
    <?= $this->Html->css('bootstrap-markdown.min'); ?>
</head>
<body>
<div id="register-wrapper">
    <div class="panel panel-default">
        <div class="panel-body">
            <?= $this->Form->create($user, ['class' => 'form-horizontal', 'type' => 'post']) ?>
            <h3 class="header-title"><?= __('Request to be a member of an organization'); ?></h3>
            <div class="col-sm-12 col-md-12 col-xs-12">
                <fieldset>
                    <legend><?= __('Organization info'); ?> </legend>
                    <?php
                    $options[] = ['value' => '', 'text' => __('Please select your organization'), 'disabled' => true, 'selected' => true];
                    foreach ($organizations as $i => $organization) {
                        $options[] = ['value' => $organization->id, 'text' => $organization->name];
                    }
                    $options[] = ['value' => '0', 'text' => __('None')];
                    ?>
                    <?= $this->Form->input(
                        'organization_id', [
                        'type' => 'select',
                        'label' => false,
                        'options' => $options,
                        'required' => true,
                        'class' => 'form-control',
                        ]
                    ); ?>
                </fieldset>
            </div>
            <?= $this->Form->button(__('Make the request'), ['class' => 'btn btn-info']); ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
    <div id="register-login-link" class="col-sm-12 col-xs-12">
        <?= __('Don\'t have time?'); ?>
        <a href="<?= $this->Url->build(["controller" => "Users", "action" => "login"]); ?>">
            <strong><?= __('Go to login directly'); ?></strong>
        </a>
    </div>
</div>
<?= $this->Html->script(
                [
                'jquery-2.1.4.min',
                'bootstrap.min',
                'googleAnalytics',
                'bootstrap-tokenfield',
                'typeahead.min',
                'markdown/markdown',
                'markdown/to-markdown',
                'bootstrap/bootstrap-markdown',
                ]
); ?>
<?php
if ($this->request->session()->read('lang') == 'fr_CA') {
    echo $this->Html->script('locale/bootstrap-markdown.fr');
}
?>
</body>
</html>
