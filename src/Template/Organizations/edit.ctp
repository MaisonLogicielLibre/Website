<div class="row">
    <?= $this->cell('Sidebar::organization', [$organization->id]); ?>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <?= $this->Form->create($organization); ?>
        <fieldset>
            <legend><?= __('Edit Organization') ?></legend>
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