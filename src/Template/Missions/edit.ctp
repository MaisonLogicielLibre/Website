<?= $this->Html->css('bootstrap-markdown.min', ['block' => 'cssTop']); ?>
<div class="row">
    <div class="missions col-lg-12 col-md-12 columns">
        <?= $this->cell('Sidebar::mission', [$mission->id]); ?>

        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <?= $this->Form->create($mission) ?>
            <?php
            if (!$isEditable):
                ?>
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <?= __("This mission has contributor(s) who has been accepted, some informations are disabled.") ?>
                </div>
                <?php
            endif;
            ?>
            <fieldset>
                <legend><?= __('Edit Mission') ?></legend>
                <?php
                echo $this->Form->input('name', ['label' => __('Position title'), 'disabled' => !$isEditable]);
                echo $this->Form->input('description',
                    ['type' => 'textarea',
                        'required' => true,
                        'label' => __('Describe your mission'),
                        'data-provide' => 'markdown',
                        'data-iconlibrary' => 'fa',
                        'data-hidden-buttons' => 'cmdImage',
                        'data-language' => ($this->request->session()->read('lang') == 'fr_CA' ? 'fr' : ''),
                        'data-footer' => '<a target="_blank" href="https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet">' . __('Markdown Cheatsheet') . '</a>',
                        'disabled' => !$isEditable
                    ]
                );
                echo $this->Form->input('competence',
                    [
                        'type' => 'textarea',
                        'required' => true,
                        'label' => __('What are the student requirements to work on the project?'),
                        'placeholder' => __(' e.g. "must know Python" or "easier project good for a student with more limited experience with C++."'),
                        'data-provide' => 'markdown',
                        'data-iconlibrary' => 'fa',
                        'data-hidden-buttons' => 'cmdImage',
                        'data-language' => ($this->request->session()->read('lang') == 'fr_CA' ? 'fr' : ''),
                        'data-footer' => '<a target="_blank" href="https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet">' . __('Markdown Cheatsheet') . '</a>',
                        'disabled' => !$isEditable
                    ]
                );
                $typeOptions = [];
                foreach ($typeMissions as $type) {
                    $typeOptions[$type->id] = $type->getName();
                }
                echo $this->Form->input('type_missions._ids', ['label' => __('What type of student(s) are you looking for?'), 'options' => $typeOptions, 'multiple' => 'checkbox', 'disabled' => !$isEditable]);
                $sessionOptions =
                    [
                        0 => __('Not specified'),
                        1 => __('Winter'),
                        2 => __('Summer'),
                        3 => __('Fall')
                    ];
                echo $this->Form->input('session', ['label' => __('Term'), 'options' => $sessionOptions, 'type' => 'select', 'disabled' => !$isEditable]);
                $lengthOptions =
                    [
                        0 => __('Not specified'),
                        1 => __('1 term'),
                        2 => __('2 terms'),
                        3 => __('3 terms')
                    ];
                echo $this->Form->input('length', ['label' => __('Length'), 'options' => $lengthOptions, 'type' => 'select', 'disabled' => !$isEditable]);
                $levelsOptions = [];
                foreach ($missionLevels as $level) {
                    $levelsOptions[$level->id] = $level->getName();
                }
                echo $this->Form->input('mission_levels._ids', ['label' => __('School year'), 'options' => $levelsOptions, 'multiple' => 'checkbox', 'disabled' => !$isEditable]);
                echo $this->Form->input('internNbr', ['label' => __('Places available'), 'min' => $minInternNbr, 'max' => 100]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
            <a href="<?= $this->Url->build(['controller' => 'Missions', 'action' => 'view', $mission->id]); ?>"
               class="btn btn-default"><?= __('Cancel'); ?></a>
            <?= $this->Form->end() ?>
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
