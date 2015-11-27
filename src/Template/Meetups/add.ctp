<?php $Parsedown = new Parsedown(); ?>
<div class="row">
    <?= $this->cell('Sidebar::meetupAction'); ?>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <?= $this->Form->create($meetup) ?>
        <fieldset>
            <legend><?= __('Add Meetup') ?></legend>
            <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description', ['type' => 'textarea']);
            echo $this->Form->input('link');
            echo $this->Form->input('date');
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>