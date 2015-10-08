<div class="organizations form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($organization); ?>
    <fieldset>
        <legend><?= __('Submit Organization') ?></legend>
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
