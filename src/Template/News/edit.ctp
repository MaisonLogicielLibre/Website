<?php $Parsedown = new Parsedown(); ?>
<div class="row">
    <?= $this->cell('Sidebar::newAction'); ?>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <?= $this->Form->create($news) ?>
        <fieldset>
            <legend><?= __('Edit new') ?></legend>
            <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('link');
            echo $this->Form->input('date');
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>