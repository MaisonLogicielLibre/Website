<div class="row">
    <?= $this->cell('Sidebar::projectAction'); ?>

    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <?= $this->Form->create($project); ?>
        <fieldset>
            <legend><?= __('Submit Project') ?></legend>
            <div class="alert alert-info" role="alert"><?= __("After submit the project, you will be redirect on the project's page to create some missions."); ?></div>
            <?php
                echo $this->Form->input('name', ['label' => __('Name of the project')]);
                echo $this->Form->input('link', ['label' => __('Website of the project'), 'placeholder' => __("http(s)://website.com")]);
                echo $this->Form->input('description', ['label' => __('Description of the project')]);

            if (empty($organizations->toArray())) : ?>
                <p>
                    <?= $this->Html->link(__('You\'re not part of an organization. Add yours now!'), ['controller' => 'Organizations', 'action' => 'submit']); ?>
                </p>
           <?php else : ?>
                <?= $this->Form->input('organizations._ids', ['options' => $organizations, 'label' => __('Select organizations associated with the project. Leave blank if no organizations')]); ?>
                <p>
                    <?= __('Or you can add a new organizations ') . $this->Html->link(__('here.'), ['controller' => 'Organizations', 'action' => 'submit']) ?>
                </p>
            <?php endif; ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>