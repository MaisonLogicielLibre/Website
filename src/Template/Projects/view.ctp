<?= $this->Html->css('dataTables.bootstrap.min', ['block' => 'cssTop']); ?>
<?php $Parsedown = new ParsedownNoImage(); ?>
    <div class="row">
        <?= $this->cell('Sidebar::project', [$project->id]); ?>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="panel special-panel profile-panel">
                        <div class="panel-heading">
                            <?= (!(empty($project->getDescription())) ? $Parsedown->text($project->getDescription()) : __('Description')) ?>
                        </div>
                        <div class="panel-body">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive">
                                    <h3 class="header-title"><?= __('Organization') ?>: <a
                                            href="<?= $this->Wiki->buildLink(''); ?>"><i
                                                class="fa fa-question-circle"></i></a>
                                        <?=$this->Html->link($project->organization['name'],
                                            ['controller' => 'Organizations', 'action' => 'view',
                                                $project->organization['id']]);?></h3>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="table-responsive">
                                    <h3 class="header-title"><?= __('Contributors') ?></h3>
                                    <?php if (!empty($project->contributors)): ?>
                                        <table class="table borderless table-striped">
                                            <?php foreach ($project->contributors as $contributor): ?>
                                                <tr>
                                                    <td><?= $this->html->link($contributor->getName(), ['controller' => 'Users', 'action' => 'view', $contributor->id]) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </table>

                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="table-responsive">
                                    <h3 class="header-title"><?= __('Mentors') ?></h3>
                                    <?php if (!empty($project->mentors)): ?>
                                        <table class="table borderless table-striped">
                                            <?php foreach ($project->mentors as $mentor): ?>
                                                <tr>
                                                    <td><?= $this->html->link($mentor->getName(), ['controller' => 'Users', 'action' => 'view', $mentor->id]) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </table>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3 class="header-title"><?= __('Missions'); ?> <?= $this->Wiki->addHelper('Missions'); ?></h3>
                            <div class="table-responsive">
                                <table id="projects" class="table table-striped table-bordered table-hover dataTable">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th><?= __('Position'); ?></th>
                                        <th><?= __('Session'); ?></th>
                                        <th><?= __('Length'); ?></th>
                                        <th><?= __('Type'); ?></th>
                                        <th><?= __('Mentor'); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                    <tr class="table-search info">
                                        <td></td>
                                        <td><input type="text" placeholder="<?= __('Search ...'); ?>"
                                                   class="form-control input-sm input-block-level"/></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><input type="text" placeholder="<?= __('Search ...'); ?>"
                                                   class="form-control input-sm input-block-level"/></td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->Html->script(
    [
        'datatables/jquery.dataTables.min',
        'datatables/dataTables.bootstrap.min',
        'DataTables.cakephp.dataTables',
        'markdown/markdown'
    ],
    ['block' => 'scriptBottom']);
?>
<?php
$lengthOptions =
    [
        0 => __('Anytime'),
        1 => __('1 term'),
        2 => __('2 terms'),
        3 => __('3 terms')
    ];
$sessionOptions =
    [
        0 => __('Anytime'),
        1 => __('Winter'),
        2 => __('Summer'),
        3 => __('Fall')
    ];
$typeMissionsOption =
    [
        0 => __('Intern'),
        1 => __('Volunteer'),
        2 => __('Master'),
        3 => __('Capstone'),
        4 => __('Professor')
    ];
$this->Html->scriptStart(['block' => 'scriptBottom']);
echo $this->DataTables->init([
    'ajax' => [
        'url' => $this->Url->build(['action' => 'view', $project->id]),
    ],
    'deferLoading' => $recordsTotal,
    'delay' => 600,
    "sDom" => "<'row'<'col-xs-6'l>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
    'columns' => [
        [
            'name' => 'Missions.id',
            'data' => 'id',
            'searchable' => false,
            'visible' => false
        ],
        [
            'name' => 'Missions.name',
            'data' => 'name',
            'searchable' => true
        ],
        [
            'name' => 'Mission.session',
            'data' => 'session',
            'searchable' => true
        ],
        [
            'name' => 'Mission.length',
            'data' => 'length',
            'searchable' => true
        ],
        [
            'name' => 'TypeMissions.name',
            'data' => 'type_mission',
            'searchable' => true
        ],
        [
            'name' => 'User',
            'data' => 'user',
            'searchable' => true
        ],
    ],
    'lengthMenu' => '',
    'pageLength' => 25
])->draw('.dataTable');
echo 'var missionsUrl="' . $this->Url->Build(['controller' => 'Missions', 'action' => 'view']) . '";';
echo 'var lengthTr=' . json_encode($lengthOptions) . ';';
echo 'var sessionTr=' . json_encode($sessionOptions) . ';';
echo 'var typeMissionsTr=' . json_encode($typeMissionsOption) . ';';
echo 'var validationTr="' . __('Archived') . '";';
$this->Html->scriptEnd();
?>
<?= $this->Html->script(['initial.min', 'projects/view.js'], ['block' => 'scriptBottom']); ?>
