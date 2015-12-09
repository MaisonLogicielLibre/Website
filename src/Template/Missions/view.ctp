<?= $this->Html->css('dataTables.bootstrap.min', ['block' => 'cssTop']); ?>
<?php $Parsedown = new ParsedownNoImage(); ?>
    <div class="row">
        <?= $this->cell('Sidebar::mission', [$mission->id]); ?>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="page-header"><?= $mission->getName() ?></h1>
                    <?php
                    $this->Html->addCrumb(__('Home'), '/');
                    $this->Html->addCrumb(__('Projects'), '/Projects');
                    $this->Html->addCrumb($mission->project->getName(), '/projects/view/' . $mission->project->id);
                    $this->Html->addCrumb($mission->getName());

                    echo $this->Html->getCrumbList(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="panel special-panel">
                        <div class="panel-heading">
                            <?= $Parsedown->text($mission->getDescription()); ?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <h3 class="header-title"><?= __('Your mission, should you choose to accept it, ...') ?></h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="table-responsive">
                                        <table class="profile-table">
                                            <tr>
                                                <td><?= __('Term:'); ?></td>
                                                <td><?= $mission->getSession(); ?></td>
                                            </tr>
                                            <tr>
                                                <td><?= __('Length:'); ?></td>
                                                <td><?= $mission->getLength(); ?></td>
                                            </tr>
                                            <tr>
                                                <td><?= __('Places available:'); ?></td>
                                                <td><?= $mission->getInternNbr(); ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="table-responsive">
                                        <table class="profile-table">
                                            <tr>
                                                <td><?= __('School year:'); ?></td>
                                                <td><?= implode(', ', array_map(function ($v) {
                                                        return $v->getName();
                                                    }, $mission->getLevels())) ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><?= __('Looking for:'); ?></td>
                                                <td><?= implode(', ', array_map(function ($v) {
                                                        return $v->getName();
                                                    }, $mission->getType())) ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><?= __('Mentor:'); ?></td>
                                                <td>
                                                    <a href="<?= $this->Url->Build(['controller' => 'users', 'action' => 'view', $mission->getMentorId()]); ?>"><?= $mission->getMentor()->getName(); ?></a>
                                                </td>
                                            </tr>
                                            <?php if ($mission->getProfessor()): ?>
                                                <tr>
                                                    <td><?= __('Professor:'); ?></td>
                                                    <td><a href="<?= $this->Url->Build(['controller' => 'users', 'action' => 'view', $mission->getProfessorId()]); ?>"><?= $mission->getProfessor()->getName(); ?></a></td>
                                                </tr>
                                            <?php endif; ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            </br>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <h3 class="header-title"><?= __('Skills'); ?></h3>
                                        <div>
                                            <?= $Parsedown->text($mission->getCompetence()); ?>
                                        </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <?php if ($mission->getRemainingPlaces() > 0) : ?>
                                        <a href="<?= $this->Url->build(['controller' => 'Missions', 'action' => 'apply', $mission->getId()]); ?>">
                                            <h2 class="btn btn-danger pull-right"><?= __('I accept the mission!'); ?></h2></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php if ($recordsTotal) : ?>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h3 class="header-title">
                                    <?php if ($user && (($user->hasPermissionName(['edit_mission']) && $isMentor) || $user->hasPermissionName(['edit_missions'])))
                                        echo __('List of applications');
                                    else
                                        echo __('Contributors');
                                    ?>
                                </h3>

                                <div class="table-responsive">
                                    <table id="applications"
                                           class="table table-striped table-bordered table-hover dataTable">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th><?= __('Name'); ?></th>
                                            <?php
                                            if ($user && (($user->hasPermissionName(['edit_mission']) && $isMentor) || $user->hasPermissionName(['edit_missions']))) : ?>
                                                <th><?= __('Approved'); ?></th>
                                                <th><?= __('Rejected'); ?></th>
                                                <?php
                                            endif;
                                            ?>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
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
$this->Html->scriptStart(['block' => 'scriptBottom']);
if ($user && (($user->hasPermissionName(['edit_mission']) && $isMentor) || $user->hasPermissionName(['edit_missions']))) {
    echo $this->DataTables->init([
        'ajax' => [
            'url' => $this->Url->build(['action' => 'view', $mission->getId()]),
        ],
        'deferLoading' => $recordsTotal,
        'delay' => 600,
        "sDom" => "<'row'<'col-xs-6'l>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
        'columns' => [
            [
                'name' => 'Applications.id',
                'data' => 'id',
                'visible' => false
            ],
            [
                'name' => 'Users',
                'data' => 'user',
                'searchable' => false
            ],
            [
                'name' => 'Applications.accepted',
                'data' => 'accepted',
                'searchable' => false
            ],
            [
                'name' => 'Applications.rejected',
                'data' => 'rejected',
                'searchable' => false
            ]
        ],
        'lengthMenu' => '',
        'pageLength' => 25
    ])->draw('.dataTable');
} else {
    echo $this->DataTables->init([
        'ajax' => [
            'url' => $this->Url->build(['action' => 'view', $mission->getId()]),
        ],
        'deferLoading' => $recordsTotal,
        'delay' => 600,
        "sDom" => "<'row'<'col-xs-6'l>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
        'columns' => [
            [
                'name' => 'Applications.id',
                'data' => 'id',
                'visible' => false
            ],
            [
                'name' => 'Users',
                'data' => 'user',
                'searchable' => false
            ],
        ],
        'lengthMenu' => '',
        'pageLength' => 25
    ])->draw('.dataTable');
}
echo 'var userUrl="' . $this->Url->Build(['controller' => 'Users', 'action' => 'view']) . '";';
echo 'var rejectUrl="' . $this->Url->Build(['controller' => 'Applications', 'action' => 'rejected']) . '";';
echo 'var acceptUrl="' . $this->Url->Build(['controller' => 'Applications', 'action' => 'accepted']) . '";';
echo 'var rejectCandidateTr="' . __('Reject the candidate') . '";';
echo 'var acceptCandidateTr="' . __('Accept the candidate') . '";';
$this->Html->scriptEnd();
if ($user && $user->hasPermissionName(['edit_mission', 'edit_missions'])) {
    echo $this->Html->script(['initial.min', 'missions/viewMentor.js'], ['block' => 'scriptBottom']);
} else {
    echo $this->Html->script(['initial.min', 'missions/view.js'], ['block' => 'scriptBottom']);
}
?>