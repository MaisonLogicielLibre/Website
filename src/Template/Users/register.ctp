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
</head>
<body>
<div id="register-wrapper">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-sm-12 col-xs-12">
                <h2><?= __("Who are you?") ?></h2>
            </div>
            <div id="register-alert" class="col-sm-12"><?= $this->Flash->render() ?></div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sg-4 col-xs-4">
                    <a href="<?= $this->Url->build(["controller" => "Users", "action" => "registerIndustry"]); ?>"
                        class=" text-center btn btn-primary register-button" id="industry-button">
                        <i class="fa fa-industry"
                           title="<?= __('Propose a project and find motivated students in our university ecosystem'); ?>"></i>
                        <h4><strong><?= __('Industry'); ?></strong></h4>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sg-4 col-xs-4">
                    <a href="<?= $this->Url->build(["controller" => "Users", "action" => "registerStudent"]); ?>"
                        class=" text-center btn btn-primary register-button" id="student-button">
                        <i class="fa fa-graduation-cap"
                           title="<?= __('Propose a project and find motivated students in our university ecosystem'); ?>"></i>
                        <h4><strong><?= __('Student'); ?></strong></h4>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sg-4 col-xs-4">
                    <a href="<?= $this->Url->build(["controller" => "Users", "action" => "registerProfessor"]); ?>"
                        class=" text-center btn btn-primary register-button" id="professor-button">
                        <i class="fa fa-user"
                           title="<?= __('Propose a project and find motivated students in our university ecosystem'); ?>"></i>
                        <h4><strong><?= __('Professor'); ?></strong></h4>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div id="register-login-link" class="col-sm-12 col-xs-12">
        <?= __('Already have account?'); ?>
        <a href="<?= $this->Url->build(["controller" => "Users", "action" => "login"]); ?>">
            <strong><?= __('Sign In'); ?></strong>
        </a>
    </div>
</div>
<?= $this->Html->script(
    [
        'jquery-2.1.4.min',
        'bootstrap.min',
        'googleAnalytics',
        'bootstrap/bootstrap-switch.min'
    ]
); ?>
<script>
    <?= 'var yesTr="' . __('Yes') . '";'; ?>
    <?= 'var noTr="' . __('No') . '";'; ?>
</script>
<?= $this->Html->script('users/register'); ?>
</body>
</html>
