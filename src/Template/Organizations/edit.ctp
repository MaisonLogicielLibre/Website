<div class="users form col-lg-12 col-md-12 columns">
    <?= $this->cell('Sidebar::organization', [$organization->id]); ?>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <?= $this->Form->create($organization); ?>
        <fieldset>
            <legend><?= __('Edit Organization') ?></legend>
            <?php
                echo $this->Form->input('name');
                echo $this->Form->input('website');
                echo $this->Form->input('logo');
                echo $this->Form->input('description');
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>