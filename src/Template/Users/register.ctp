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
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,600' rel='stylesheet' type='text/css'>

    <?= $this->Less->less('less/styles.less'); ?>
    <?= $this->Html->css('bootstrap-switch.min'); ?>
</head>
<body>
<div id="register-wrapper">
    <div class="panel panel-default">
        <div class="panel-body">
            <?= $this->Form->create($user, ['class' => 'form-horizontal']) ?>
            <div class="col-sm-12 col-xs-12">
                <h2><?= __("Sign Up to {0}", '<strong>' . __('ML2') . '</strong>') ?></h2>
            </div>
            <div id="register-alert" class="col-sm-12"><?= $this->Flash->render() ?></div>
            <div class="col-sm-5 col-xs-12">
                <fieldset>
                    <legend><?= __('Personal info') ?> <span class="sub"><?= __('(required)'); ?></span></legend>
                    <?= $this->Form->input('firstName', ['label' => false, 'placeholder' => __('Enter your firstname'), 'autocomplete' => 'off']); ?>
                    <?= $this->Form->input('lastName', ['label' => false, 'placeholder' => __('Enter your lastname'), 'autocomplete' => 'off']); ?>
                </fieldset>
            </div>
            <div class="col-sm-offset-1 col-sm-6 col-xs-12">
                <fieldset>
                    <legend><?= __('Account info') ?> <span class="sub"><?= __('(required)'); ?></span></legend>
                    <?= $this->Form->input('username', ['pattern' => '[a-zA-Z0-9_.-]{3,16}', 'title' => __('Letters (a-z), numbers, periods, underscore, and between 3 and 16 characters'), 'label' => false, 'placeholder' => __('Choose your username'), 'autocomplete' => 'off']); ?>
                    <?= $this->Form->input('password', ['label' => false, 'placeholder' => __('Choose a password'), 'autocomplete' => 'off']); ?>
                    <?= $this->Form->input('confirm_password', ['label' => false, 'type' => 'password', 'placeholder' => __('Confirm password'), 'autocomplete' => 'off']); ?>
                </fieldset>
            </div>
            <div class="col-sm-5 col-xs-12">
                <fieldset>
                    <legend><?= __('Contact info') ?> <span class="sub"><?= __('(required)'); ?></span></legend>
                    <?= $this->Form->input('email', ['label' => false, 'placeholder' => __('Email adress'), 'autocomplete' => 'off']); ?>
                    <?= $this->Form->input('confirm_email', ['label' => false, 'placeholder' => __('Confirm email adress'), 'autocomplete' => 'off']); ?>
                </fieldset>
            </div>
            <div class="col-sm-offset-1 col-sm-6 col-xs-12">
                <fieldset>
                    <legend><?= __('University info'); ?> </legend>
                    <p class="register-university-info"><?= __('If you\'re a student please select yes and then select your university. If not, let the case be.'); ?></p>
                    <?= $this->Form->input('isStudent', ['label' => false, 'class' => 'form-control']); ?>
                    <p class="register-university-info"><?= __('P.S.: Only university students will be able to apply to projects.'); ?></p>
                    <?php
                    $options[] = ['value' => '', 'text' => __('Please select your university'), 'disabled' => true, 'selected' => true];
                    foreach ($universities as $i => $university) {
                        $options[] = ['value' => $i, 'text' => $university];
                    }
                    $options[] = ['value' => '0', 'text' => __('Not specified')];
                    ?>
                    <?= $this->Form->input('universitie_id', [
                        'type' => 'select',
                        'label' => false,
                        'options' => $options,
                        'required' => true,
                        'class' => 'form-control',
                    ]); ?>
                </fieldset>
            </div>
            <div class="col-sm-12 col-xs-12">
                <div class="checkbox">
                    <input name="remember" value="0" type="hidden">
                    <label for="remember">
                        <input name="remember" value="0" id="remember" type="checkbox" required>
                        <?= __('I accept {0}', $this->Html->link(__('Terms and Conditions'), ['controller' => 'Pages', 'action' => 'terms'])); ?>
                    </label>
                </div>
            </div>
            <?= $this->Form->button(__('Sign Up'), ['class' => 'btn btn-info']); ?>
            <?= $this->Form->end() ?>
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
