<div class="users form col-lg-12 col-md-12 columns">
    <?= $this->cell('Sidebar::projectAction'); ?>

    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <?= $this->Form->create($project); ?>
        <fieldset>
            <legend><?= __('Submit Project') ?></legend>
            <?php
                echo $this->Form->input('name', ['label' => __('Name of the project')]);
                echo $this->Form->input('link', ['label' => __('Website of the project')]);
                echo $this->Form->input('description', ['label' => __('Description of the project')]);
                echo $this->Form->input('organizations._ids', ['options' => $organizations, 'label' => __('Select organizations associated with the project. Leave blank if no organizations')]);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>