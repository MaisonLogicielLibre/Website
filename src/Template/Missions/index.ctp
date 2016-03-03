<?php
$typeApplications = [
    1 => __('Accepted Applications'),
    2 => __('Rejected Applications'),
    3 => __('Unprocessed Applications'),
    4 => __('No Student has applied yet')
];
$sessionOptions = [
    0 => __('Anytime'),
    1 => __('Winter'),
    2 => __('Summer'),
    3 => __('Fall')
];
$paginatorParams = $this->Paginator->params();
?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h1 class="page-header"><?= __('Software enginnering missions'); ?> <?= $this->Wiki->addHelper('Missions'); ?></h1>
        <?php
        $this->Html->addCrumb(__('Home'), '/');
        $this->Html->addCrumb(__('Missions'), '/Missions');
        $this->Html->addCrumb(__('List of missions'));

        echo $this->Html->getCrumbList(); ?>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-body">
        <?= $this->Form->create($missions) ?>
        <div style="padding-left: 10px;" class="row">
            <div class="col-sm-offset-1 col-sm-3">
                <?php echo $this->Form->input('mission_select',
                    array('empty' => __('<All Missions Types>'), 'label' => false, 'options' => $typeOptions)); ?>
            </div>
            <div class="col-sm-3">
                <?php echo $this->Form->input('org_select',
                    array('empty' => __('<All Organizations>'), 'label' => false, 'options' => $organizations)); ?>
            </div>
            <div class="col-sm-3">
                <?php echo $this->Form->input('session_select',
                    array('empty' => __('<All Sessions>'), 'label' => false, 'options' => $sessionOptions)); ?>
            </div>
        </div>
        <div style="padding-left: 10px;" class="row">
            <div class="col-sm-offset-1 col-sm-4 shadegrey">
                <h4><?= __('Filter Missions by student applications'); ?></h4>
                <?php echo $this->Form->input('applicationState',
                    array('empty' => __('<All>'), 'label' => false, 'options' => $typeApplications)); ?>
                <div id="studentByU" style="display: none;">
                    <?php echo $this->Form->input('studentUniversity',
                        array('empty' => __('<Any>'), 'label' => 'Students by Univeristy', 'options' => $universities)); ?>
                </div>
            </div>
            <div class="col-sm-offset-1 col-sm-4 shadegrey">
                <h4>Filter Missions by professor</h4>
                <?= $this->Form->radio(
                    'profFilter',
                    [
                        ['value' => 'none', 'text' => __('no filter')],
                        ['value' => 'hasProfessor', 'text' => __('has a Professor?')],
                        ['value' => 'needsProfessor', 'text' => __('needs a Professor?')],
                    ]
                ); ?>
                <div id="profByU" style="display: none;">
                    <?php echo $this->Form->input('professorUniversity',
                        array('empty' => __('<Any>'), 'label' => __('Professors by Univeristy'), 'options' => $universities)); ?>
                </div>
            </div>
        </div>
        <br>
        <div style="padding-left: 10px;" class="row">
            <div class="col-sm-offset-1 col-sm-1">
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3 class="header-title"><?= __('List of missions'); ?></h3>
                <?php if ($paginatorParams['count'] == 0): ?>
                    <span style="color:red">There are no missions that match your filter selection. Try again</span>
                <?php else : ?>
                    <div class="table-responsive">
                        <table id="missions" class="table table-striped table-bordered dataTable">
                            <thead>
                            <tr>
                                <th><?= __('Organization'); ?></th>
                                <th><?= $this->Paginator->sort('project_id', __('Project')) ?></th>
                                <th><?= $this->Paginator->sort('name', __('Mission')) ?></th>
                                <th><?= $this->Paginator->sort('mentor_id', __('Mentor')) ?></th>
                                <th><?= $this->Paginator->sort('type_mission', __('Mission type')) ?></th>
                                <th><?= $this->Paginator->sort('session', __('Session')) ?></th>
                                <th><?= $this->Paginator->sort('modified', __('Last Modified')) ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($missions as $mission): ?>
                                <tr>
                                    <td>
                                        <?php foreach ($mission->project->organizations as $org): ?>
                                            <?php if ($org !== reset($mission->project->organizations)) echo ','; ?>
                                            <?php echo $org['name']; ?>
                                        <?php endforeach; ?>
                                    </td>
                                    <td><?= $mission->has('project') ? $this->Html->link($mission->project->name, ['controller' => 'Projects', 'action' => 'view', $mission->project->id]) : '' ?></td>
                                    <td><?= $this->Html->link($mission->name, ['controller' => 'Missions', 'action' => 'view', $mission->id]); ?></td>
                                    <td><?= $mission->has('user') ? $this->Html->link($mission->user->lastName, ['controller' => 'Users', 'action' => 'view', $mission->user->id]) : '' ?></td>
                                    <td><?= __($mission->type_mission['name']) ?></td>
                                    <td><?= $sessionOptions[$mission->session] ?></td>
                                    <td><?= date('Y-m-d', strtotime($mission->modified)); ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
<?= $this->Html->script(
    [
        'jquery-2.1.4.min.js',
        'bootstrap.min.js',
        'jquery-ui-1.14.1.min.js'
    ]);
?>
<script>
$(document).ready(function () {
    if ($('input[type=radio][name=profFilter]:checked').val() == "hasProfessor") {
        $('#profByU').show();
    }
    $('input[type=radio][name=profFilter]').change(function () {
         if (this.value == 'hasProfessor') {
            $('#profByU').show();
        }
        else {
            $('#profByU').hide();
        }
    });
    applicationVal = $('#applicationstate').val();
    if (applicationVal >= 1 && applicationVal <= 3) {
        $('#studentByU').show();
    }
    $('#applicationstate').on('change', function () {
        if (this.value >= 1 && this.value <= 3) {
            $('#studentByU').show();
        }
        else {
            $('#studentByU').hide();
        }
    });
});
</script>
