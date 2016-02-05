<?= $this->Html->css('dataTables.bootstrap.min', ['block' => 'cssTop']); ?>
<?php $Parsedown = new ParsedownNoImage(); ?>
    <div class="row">
        <?= $this->cell('Sidebar::organization', [$organization->id]); ?>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="panel special-panel profile-panel">
                        <div class="panel-heading">
                            <?= (!(empty($organization->getDescription())) ? $Parsedown->text($organization->getDescription()) : __('Description')) ?>
                        </div>
                        <div class="panel-body">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive">
                                    <h3 class="header-title"><?= __('Projects') ?> <a
                                            href="<?= $this->Wiki->buildLink('Projects'); ?>"><i
                                                class="fa fa-question-circle"></i></a></h3>
                                    <?php if (!empty($organization->projects)): ?>
                                        <table class="table borderless table-striped">
                                            <?php foreach ($organization->projects as $project): ?>
                                                <tr>
                                                    <?php if($project->isArchived()) :
                                                            if($user && $user->isMemberOf($organization->getId())) : ?>
                                                                <td>
                                                                    <?= $this->html->link($project->getName(), ['controller' => 'Projects', 'action' => 'view', $project->id]) ?>
                                                                    <span class="label label-warning label-as-badge"><?= __('Archived'); ?></span>
                                                                </td>
                                                            <?php else : ?>
                                                                <td>
                                                                    <?= $project->getName() ?>
                                                                    <span class="label label-warning label-as-badge"><?= __('Archived'); ?></span>
                                                                </td>
                                                            <?php endif ; ?>
                                                    <?php else : ?>
                                                        <td>
                                                        <?= $this->html->link($project->getName(), ['controller' => 'Projects', 'action' => 'view', $project->id]) ?>
                                                        </td>
                                                    <?php endif ; ?>
                                                </tr>
                                            <?php endforeach; ?>
                                        </table>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="table-responsive">
                                    <h3 class="header-title"><?= __('Owners') ?></h3>
                                    <?php if (!empty($organization->owners)): ?>
                                        <table class="table borderless table-striped">
                                            <?php foreach ($organization->owners as $owner): ?>
                                                <tr>
                                                    <td><?= $this->html->link($owner->getName(), ['controller' => 'Users', 'action' => 'view', $owner->id]) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </table>

                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="table-responsive">
                                    <h3 class="header-title"><?= __('Members') ?></h3>
                                    <?php if (!empty($organization->members)): ?>
                                        <table class="table borderless table-striped">
                                            <?php foreach ($organization->members as $member):
                                                if (!$member->isOwnerOf($organization->id)): ?>
                                                <tr>
                                                    <td><?= $this->html->link($member->getName(), ['controller' => 'Users', 'action' => 'view', $member->id]) ?></td>
                                                </tr>
                                            <?php endif;
                                            endforeach; ?>
                                        </table>
                                    <?php endif; ?>
                                </div>
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
        3 => __('Capstone')
    ];
$this->Html->scriptStart(['block' => 'scriptBottom']);
echo $this->DataTables->init([
    'ajax' => [
        'url' => $this->Url->build(['action' => 'view', $project->id]),
    ],
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
