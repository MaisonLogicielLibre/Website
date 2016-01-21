<?= $this->Html->css('bootstrap-markdown.min', ['block' => 'cssTop']); ?>
    <div class="row">
        <?= $this->cell('Sidebar::mission', [$mission->id]); ?>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="page-header"><?= __('Edit Mission'); ?></h1>
                    <?php
                    $this->Html->addCrumb(__('Home'), '/');
                    $this->Html->addCrumb(__('Projects'), '/Projects');
                    $this->Html->addCrumb($mission->project->getName(), '/Projects/view/'.$mission->project->id);
                    $this->Html->addCrumb(__('Edit Mission'));

                    echo $this->Html->getCrumbList(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3 class="header-title"><?= __('Edit Mission'); ?></h3>
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
                                echo $this->Form->input('type_mission_id', ['label' => __('What type of student(s) are you looking for?'), 'options' => $typeOptions, 'type' => 'select', 'disabled' => !$isEditable]);
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
                            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
                            <a href="<?= $this->Url->build(['controller' => 'Missions', 'action' => 'view', $mission->id]); ?>"
                               class="btn btn-default"><?= __('Cancel'); ?></a>
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
        'initial.min',
        'missions/edit'
    ],
    ['block' => 'scriptBottom']);
if ($this->request->session()->read('lang') == 'fr_CA')
    echo $this->Html->script('locale/bootstrap-markdown.fr', ['block' => 'scriptBottom']);
$this->Html->scriptStart(['block' => 'scriptBottom']);
echo 'var infoIntern="' . __('By selecting an intern, you acknowledge that you will pay for your intern (typically $12000 to $14000 per semester). We will then forward your posting to the CO-OP department of all our university partners.') . '";';
echo 'var infoMaster="' . __('This project type requires a professor and student(s) from the same university. Ensure the project is sufficiently complex for a graduate student (guidelines coming in 2016).') . '";';
echo 'var infoCapstone=\'' . __('A PFE/Capstone project requires a professor and student(s) from the same university. The length is 1 to 2 sessions, depending on the university. For example guidelines see here: (guidelines coming in 2016). {0} for more information', $this->Html->link(__('Contact us'), ['controller' => 'Pages', 'action' => 'contact'])) . '\';';
$this->Html->scriptEnd();
?>
