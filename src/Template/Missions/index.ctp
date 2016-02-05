<?= $this->Html->css('dataTables.bootstrap.min', ['block' => 'cssTop']); ?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h1 class="page-header"><?= __('List of missions'); ?> <?= $this->Wiki->addHelper('Missions'); ?></h1>
        <?php
        $this->Html->addCrumb(__('Home'), '/');
        $this->Html->addCrumb(__('Missions'), '/Missions');
        $this->Html->addCrumb(__('List of missions'));

        echo $this->Html->getCrumbList(); ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3 class="header-title"><?= __('List of missions'); ?></h3>
                <div class="table-responsive">
                    <table id="missions" class="table table-striped table-bordered dataTable">
                        <thead>
                            <tr>
                                <th></th>
                                <th><?= __('Title'); ?></th>
                                <th><?= __('Student'); ?></th>
                                <th><?= __('Session'); ?></th>
                                <th><?= __('Organizations'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr class="table-search info">
                                <td></td>
                                <td>
                                    <input type="text" placeholder="<?= __('Search ...'); ?>"
                                         class="form-control input-sm input-block-level"/></td>
                                <td>
                                    <select class="form-control" id="typeDrop">
                                      <option value="">-----</option>
                                      <?php
                                        foreach ($types as $type) {
                                          echo '<option value="' . $type . '">' . __($type) . '</option>';
                                        }
                                      ?>
                                    </select>
                                </td>
                                <td>
                                </td>
                                 <td>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Add DataTables scripts -->
<?= $this->Html->script(
    [
        'datatables/jquery.dataTables.min',
        'datatables/dataTables.bootstrap.min',
        'DataTables.cakephp.dataTables',
    ],
    ['block' => 'scriptBottom']);
?>
<?php
$sessionOptions = [
    0 => __('Anytime'),
    1 => __('Winter'),
    2 => __('Summer'),
    3 => __('Fall')
];
$typeMissionsOption = [
    0 => __('Intern'),
    1 => __('Volunteer'),
    2 => __('Master'),
    3 => __('Capstone'),
    4 => __('Professor')
];
$this->Html->scriptStart(['block' => 'scriptBottom']);
echo $this->DataTables->init([
    'ajax' => [
        'url' => $this->Url->build(['action' => 'index']),
    ],
    'deferLoading' => $recordsTotal,
    'delay' => 600,
    "sDom" => "<'row'<'col-xs-6'l>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
    "autoWidth" => false,
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
            'name' => 'TypeMissions.name',
            'data' => 'type_mission',
            'searchable' => true
        ],
        [
            'name' => 'Mission.session',
            'data' => 'session',
        ],
        [
            'name' => 'Organization.name',
            'data' => 'project',
        ]
    ],
    'pageLength' => 50
])->draw('.dataTable');
echo 'var orgUrl="' . $this->Url->Build(['controller' => 'organizations', 'action' => 'view']) . '";';
echo 'var missionUrl="' . $this->Url->Build(['controller' => 'missions', 'action' => 'view']) . '";';
echo 'var sessionTr=' . json_encode($sessionOptions) . ';';
echo 'var typeMissionsTr=' . json_encode($typeMissionsOption) . ';';
$this->Html->scriptEnd();
?>
<?= $this->Html->script('missions/index.js', ['block' => 'scriptBottom']); ?>
