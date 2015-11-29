<?= $this->Html->css('bootstrap-markdown.min', ['block' => 'cssTop']); ?>
    <div class="row">
        <?= $this->cell('Sidebar::project', [$project->id]); ?>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="page-header"><?= __('Change my email'); ?></h1>
                    <?php
                    $this->Html->addCrumb(__('Home'), '/');
                    $this->Html->addCrumb(__('Projects'), '/Projects');
                    $this->Html->addCrumb($project->getName(), '/projects/view/' . $project->id);
                    $this->Html->addCrumb(__('Edit Project'));

                    echo $this->Html->getCrumbList(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3 class="header-title"><?= __('Edit Project') ?></h3>
                            <?= $this->Form->create($project); ?>
                            <fieldset>
                                <?php
                                echo $this->Form->input('name');
                                echo $this->Form->input('link', ['placeholder' => __("http(s)://website.com")]);
                                echo $this->Form->input('description',
                                    [
                                        'data-provide' => 'markdown',
                                        'data-iconlibrary' => 'fa',
                                        'data-hidden-buttons' => 'cmdImage',
                                        'data-language' => ($this->request->session()->read('lang') == 'fr_CA' ? 'fr' : ''),
                                        'data-footer' => '<a target="_blank" href="https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet">' . __('Markdown Cheatsheet') . '</a>'
                                    ]
                                );
                                echo $this->Form->input('organizations._ids', ['options' => $organizations]);
                                ?>
                            </fieldset>
                            <?= $this->Form->button(__('Submit'), ['class' => 'btn-info']) ?>
                            <?= $this->Form->button(__('Cancel'), [
                                'type' => 'button',
                                'class' => 'btn btn-default',
                                'onclick' => 'location.href=\'' . $this->url->build([
                                        'controller' => 'Projects',
                                        'action' => 'view',
                                        $project->id
                                    ]) . '\''
                            ]); ?>
                            <?= $this->Form->end() ?>
                        </div>
                    </div>
                </div>
            </div>
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
<?= $this->Html->script(['initial.min'], ['block' => 'scriptBottom']); ?>