<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?= $this->Form->create() ?>
        <fieldset>
            <legend><?= __("Enter your username and password") ?></legend>
            <?= $this->Form->input('username') ?>
            <?= $this->Form->input('password') ?>
        </fieldset>
        <?= $this->Form->button(__('Connect'), ['class' => 'btn btn-success']); ?> -
        <a href="<?= $this->Url->build(["controller" => "Users", "action" => "register"]);?>"><?= __('Register an account');?></a>
        <?= $this->Form->end() ?>
    </div>
</div>

