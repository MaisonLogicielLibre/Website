<?= $this->Html->css('bootstrap-markdown.min', ['block' => 'cssTop']); ?>
<div class="row">
    <?= $this->cell('Sidebar::projectAction'); ?>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <ul id="formTab" class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#project-tab" aria-controls="project" data-toggle="tab"><?= __('Project') ?> <i class="fa"></i></a></li>
            <li><a id="newMission" href="#mission-tab-0" class="mission-0" aria-controls="mission-0" data-toggle="tab"><?= __('Add a mission') ?> <i class="fa fa-plus"></i></a></li>
        </ul>
        <br/>
        <?= $this->Form->create($project); ?>
        <div class="tab-content">
            <div class="tab-pane active" id="project-tab">
                <?php
                echo $this->Form->input('name', ['label' => __('Name of the project')]);
                echo $this->Form->input('link', ['label' => __('Website of the project'), 'placeholder' => __("http(s)://website.com")]);
                echo $this->Form->input('description', ['label' => __('Description of the project'), 'data-provide' => 'markdown', 'data-iconlibrary' => 'fa', 'data-hidden-buttons' => 'cmdImage', 'data-language' => 'fr']);
                if (empty($organizations->toArray())) : ?>
                    <p>
                        <?= $this->Html->link(__('You\'re not part of an organization. Add yours now!'), ['controller' => 'Organizations', 'action' => 'submit']); ?>
                    </p>
                <?php else : ?>
                    <?= $this->Form->input('organizations._ids', ['options' => $organizations, 'label' => __('Select organizations associated with the project. Leave blank if no organizations')]); ?>
                    <p>
                        <?= __('Or you can add a new organizations ') . $this->Html->link(__('here.'), ['controller' => 'Organizations', 'action' => 'submit']) ?>
                    </p>
                <?php endif; ?>                ?>
            </div>
            <div class="tab-pane" id="mission-tab-0">
                <div class="clearfix">
                    <button class="deleteMission pull-right btn btn-danger"><?= __('Delete the mission') ?></button>
                </div>
                <?php
                echo $this->element('Missions/addForm');
                echo $this->fetch('form');
                ?>
            </div>
        </div>
        <?= $this->Form->button(__('Submit the project'), ['class' => 'btn-success ']) ?>
        <a id="addMission" href="#"><?= __('Or add a mission'); ?></a>
        <?= $this->Form->end() ?>
    </div>
</div>
<?php echo $this->Html->script(
    [
        'bootstrap/locale/bootstrap-markdown.fr',
        'bootstrap/bootstrap-markdown',
        'bootstrap.min',
        'projects/submit'
    ],
    ['block' => 'scriptBottom']);

$this->Html->scriptStart(['block' => 'scriptBottom']);
echo 'var btnSubmitTxt="' . __('Submit the project') . '";';
$this->Html->scriptEnd();
?>