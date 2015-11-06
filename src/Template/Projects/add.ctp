<?= $this->Html->css('bootstrap-markdown.min', ['block' => 'cssTop']); ?>
<div class="row">
    <?= $this->cell('Sidebar::projectAction'); ?>

    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <?= $this->Form->create($project); ?>
        <fieldset>
            <legend><?= __('Add Project') ?></legend>
            <div class="alert alert-info" role="alert"><?= __("After the project has been created, you will be redirect on the project's page to create some missions."); ?></div>
            <?php
            echo $this->Form->input('name', ['label' => __('Name of the project')]);
            echo $this->Form->input('link', ['label' => __('Website of the project'), 'placeholder' => __("http(s)://website.com")]);
            echo $this->Form->input('description',
                [
                    'label' => __('Description of the project'),
                    'data-provide' => 'markdown',
                    'data-iconlibrary' => 'fa',
                    'data-hidden-buttons' => 'cmdImage',
                    'data-language' => ($this->request->session()->read('lang') == 'fr_CA' ? 'fr' : ''),
                    'data-footer' => '<a target="_blank" href="https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet">' . __('Markdown Cheatsheet') . '</a>'
                ]
            );
            echo $this->Form->input('organizations._ids', ['options' => $organizations, 'label' => __('Select organizations associated with the project. Leave blank if no organizations')]);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
<?php
echo $this->Html->script(
    [
        'markdown/markdown',
        'markdown/to-markdown',
        'bootstrap/bootstrap-markdown',
    ],
    ['block' => 'scriptBottom']);
if ($this->request->session()->read('lang') == 'fr_CA')
    echo $this->Html->script('locale/bootstrap-markdown.fr', ['block' => 'scriptBottom']);
?>