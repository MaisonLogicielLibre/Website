<?= $this->Html->css('dataTables.bootstrap.min', ['block' => 'cssTop']); ?>
<?php $Parsedown = new Parsedown(); ?>
    <div class="row">
        <?= $this->cell('Sidebar::project', [$project->id]); ?>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <h2>
                <?= $project->getName(); ?>
            </h2>

            <div class="bs-callout bs-callout-info" style="min-height:200px">
                <p><?= $Parsedown->text($project->getDescription()); ?></p>
            </div>
        </div>
    </div>
<?php if (!empty($project->contributors)): ?>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= __('Contributors') ?></h3>
                </div>
                <table class="table table-striped">
                    <?php foreach ($project->contributors as $contributor): ?>
                        <tr>
                            <td><?= $this->html->link($contributor->getName(), ['controller' => 'Users', 'action' => 'view', $contributor->id]) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if (!empty($project->mentors)): ?>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= __('Mentors') ?></h3>
                </div>
                <table class="table table-striped">
                    <?php foreach ($project->mentors as $mentor): ?>
                        <tr>
                            <td><?= $this->html->link($mentor->getName(), ['controller' => 'Users', 'action' => 'view', $mentor->id]) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if (!empty($project->organizations)): ?>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= __('Organizations') ?></h3>
                </div>
                <table class="table table-striped">
                    <?php foreach ($project->organizations as $organization): ?>
                        <tr>
                            <td><?= $this->html->link($organization->getName(), ['controller' => 'Organizations', 'action' => 'view', $organization->id]) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
<?php endif; ?>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= __('Missions'); ?></h3>
                </div>
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
        0 => __('Not specified'),
        1 => __('1 term'),
        2 => __('2 terms'),
        3 => __('3 terms')
    ];
$sessionOptions =
    [
        0 => __('Not specified'),
        1 => __('Winter'),
        2 => __('Summer'),
        3 => __('Fall')
    ];
$typeMissionsOption =
    [
        0 => __('Intern'),
        1 => __('Volunteer'),
        2 => __('Master'),
        3 => __('Capstone')
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
            'data' => 'type_missions',
            'searchable' => true
        ],
        [
            'name' => 'User',
            'data' => 'user',
            'searchable' => true
        ],
    ],
    'lengthMenu' => ''
])->draw('.dataTable');
echo 'var missionsUrl="' . $this->Url->Build(['controller' => 'Missions', 'action' => 'view']) . '";';
echo 'var lengthTr=' . json_encode($lengthOptions) . ';';
echo 'var sessionTr=' . json_encode($sessionOptions) . ';';
echo 'var typeMissionsTr=' . json_encode($typeMissionsOption) . ';';
echo 'var validationTr="' . __('Archived') . '";';
$this->Html->scriptEnd();
?>
<?= $this->Html->script('projects/view.js', ['block' => 'scriptBottom']); ?>