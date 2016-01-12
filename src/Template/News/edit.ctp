<?= $this->Html->css(['bootstrap-switch.min', 'bootstrap-markdown.min'], ['block' => 'cssTop']); ?>
<?php $Parsedown = new ParsedownNoImage(); ?>
<div class="row">
    <?= $this->cell('Sidebar::newAction'); ?>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="page-header"><?= __('Edit new'); ?></h1>
                <?php
                $this->Html->addCrumb(__('Home'), '/');
                $this->Html->addCrumb(__('Administration'), '/Pages/administration');
                $this->Html->addCrumb(__('News'), '/News');
                $this->Html->addCrumb(__('Edit'));

                echo $this->Html->getCrumbList(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="header-title"><?= __('Edit new') ?></h3>
                        <?= $this->Form->create($news) ?>
                        <fieldset>
                            <?php
                            echo $this->Form->input('name');
                            echo $this->Form->input('description',
                            [
                                'label' => __('Description'),
                                'data-provide' => 'markdown',
                                'data-iconlibrary' => 'fa',
                                'data-hidden-buttons' => 'cmdImage',
                                'data-language' => ($this->request->session()->read('lang') == 'fr_CA' ? 'fr' : ''),
                                'data-footer' => '<a target="_blank" href="https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet">' . __('Markdown Cheatsheet') . '</a>'
                            ]
                        ); 
                            echo $this->Form->input('link');
                            echo $this->Form->input('date');
                            ?>
                        </fieldset>
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Html->script([
    'bootstrap/bootstrap-switch.min',
    'bootstrap-tokenfield',
    'typeahead.min',
    'markdown/markdown',
    'markdown/to-markdown',
    'bootstrap/bootstrap-markdown',
], ['block' => 'scriptBottom']);
if ($this->request->session()->read('lang') == 'fr_CA')
    echo $this->Html->script('locale/bootstrap-markdown.fr', ['block' => 'scriptBottom']);
?>
