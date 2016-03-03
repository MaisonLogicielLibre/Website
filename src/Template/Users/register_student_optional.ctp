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
            <h3 class="header-title"><?= __('Additional informations'); ?></h3>
            <div class="col-md-12 col-xs-12">
                <?php
                $selected = [];
                foreach($selectedTypeMissions as $selectedTypeMission) {
                    array_push($selected, $selectedTypeMission['type_mission_id']);
                }
                echo $this->Form->input('type_missions._ids', ['label' => __('What kind of mission are you looking for?'), 'multiple' => 'checkbox', 'options' => $typeOptions, 'val' => $selected]);
                ?>
            </div>
            <div class="col-md-12 col-xs-12" id="bloodhound">
                <?= $this->Form->input('skills', ['type' => 'text', 'disabled' => true, 'placeholder' => __('Enter and select your skills')]); ?>
            </div>
            <div class="col-md-12 col-xs-12">
                <?= $this->Form->input('interest',
                    [
                        'label' => __('What are your interests'),
                        'data-provide' => 'markdown',
                        'data-iconlibrary' => 'fa',
                        'data-hidden-buttons' => 'cmdImage',
                        'data-language' => ($this->request->session()->read('lang') == 'fr_CA' ? 'fr' : ''),
                        'data-footer' => '<a target="_blank" href="https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet">' . __('Markdown Cheatsheet') . '</a>'
                    ]
                ); ?>
            </div>
            <?= $this->Form->button(__('Update the informations'), ['class' => 'btn btn-info']); ?>
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
<script type="text/javascript">
    <?= 'var urlUsersSkills="' . $this->request->webroot . 'json/UsersSkills.json";'; ?>
</script>
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
        'users/registerStudentOptional'
    ]
); ?>
<?php
if ($this->request->session()->read('lang') == 'fr_CA') {
    echo $this->Html->script('locale/bootstrap-markdown.fr');
}
?>
</body>
</html>
