<?= $this->Html->css('bootstrap-markdown.min', ['block' => 'cssTop']); ?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?=__("An organization owner or member submits a project to Maison Logiciel Libre. Each project must have member(s), and project mission(s) that can accept applications from registered university students. The project mentor is responsible for accepting or rejecting mission applicants.")?>
        </div>
        <div class="alert alert-warning" role="alert"><?= __("You will be redirected to your organization page to create projects once you submit your organization."); ?></div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body">
            <h3 class="header-title"><?= __('Submit Organization'); ?></h3>
            <?= $this->Form->create($organization); ?>
            <fieldset>
                <?php
                    echo $this->Form->input('name');
                    echo $this->Form->input('website', ['placeholder' => __("http(s)://website.com")]);
                    echo $this->Form->input('description',
                        [
                            'data-provide' => 'markdown',
                            'data-iconlibrary' => 'fa',
                            'data-hidden-buttons' => 'cmdImage',
                            'data-language' => ($this->request->session()->read('lang') == 'fr_CA' ? 'fr' : ''),
                            'data-footer' => '<a target="_blank" href="https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet">' . __('Markdown Cheatsheet') . '</a>'
                        ]
                    );
                    ?>
                </fieldset>
                <?= $this->Form->button(__('Submit'), ['class' => 'btn-info']) ?>
                <?= $this->Form->end() ?>
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