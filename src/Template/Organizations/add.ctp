<div class="users form col-lg-12 col-md-12 columns">
    <?= $this->cell('Sidebar::organizationAction'); ?>

    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <?= $this->Form->create($organization); ?>
        <div class="alert alert-info" role="alert"><?= __("After the organization has been created, you will be redirect on the organization's page to create some projects."); ?></div>
        <fieldset>
            <legend><?= __('Add Organization') ?></legend>
            <?php
                echo $this->Form->input('name');
                echo $this->Form->input('website', ['placeholder' => __("http(s)://website.com")]);
                echo $this->Form->input('logo');
                echo $this->Form->input('description');
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>