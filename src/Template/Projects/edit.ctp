<?= $this->Html->css('bootstrap-markdown.min', ['block' => 'cssTop']); ?>
    <div class="row">
        <?= $this->cell('Sidebar::project', [$project->id]); ?>

        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <?= $this->Form->create($project); ?>
            <fieldset>
                <legend><?= __('Edit Project') ?></legend>
                <?php
                echo $this->Form->input('name');
                echo $this->Form->input('link', ['placeholder' => __("http(s)://website.com")]);
                echo $this->Form->input('description',
                    [
                        'data-provide' => 'markdown',
                        'data-iconlibrary' => 'fa',
                        'data-hidden-buttons' => 'cmdImage',
                        'data-language' => ($this->request->session()->read('lang') == 'fr_CA' ? 'fr' : '')
                    ]
                );
                echo $this->Form->input('organizations._ids', ['options' => $organizations]);
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