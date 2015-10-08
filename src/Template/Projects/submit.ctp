<div class="projects form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($project); ?>
    <fieldset>
        <legend><?= __('Submit Project') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('link');
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
