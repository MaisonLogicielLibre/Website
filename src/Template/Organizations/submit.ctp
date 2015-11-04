<div class="row">
    <?= $this->cell('Sidebar::organizationAction'); ?>

    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <?= $this->Form->create($organization); ?>
        <div class="alert alert-info" role="alert"><?= __("After submit the organization, you will be redirect on the organization's page to create some projects."); ?></div>
        <fieldset>
            <legend><?= __('Submit Organization') ?> <?= $this->Wiki->addHelper('organizations:submit');?></legend>
            <?php
                echo $this->Form->input('name');
                echo $this->Form->input('website', ['placeholder' => __("http(s)://website.com")]);
                echo $this->Form->input('description');
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>