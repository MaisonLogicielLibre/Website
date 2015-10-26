<div class="users index col-lg-12 col-md-12 col-sm-12 col-xs-12 columns">
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __("Enter your username and password") ?></legend>
        <?= $this->Form->input('username') ?>
        <?= $this->Form->input('password') ?>
    </fieldset>
<?= $this->Form->button(__('Connect'), ['class' => 'btn btn-success']); ?>
    <a class="btn btn-primary" href="<?= $this->Url->build(["controller" => "Users", "action" => "register"]);?>"><?= __('Register');?></a>
<?= $this->Form->end() ?>
</div>