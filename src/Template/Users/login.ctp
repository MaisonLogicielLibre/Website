<div class="users form">
<?= $this->Flash->render('auth') ?>
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