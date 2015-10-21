<?= $this->Html->css('dataTables.bootstrap.min', ['block' => 'cssTop']); ?>
<div class="users form col-lg-12 col-md-12 columns">
    <div class="row">
        <?= $this->cell('Sidebar::project', [$project->id]); ?>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <h2>
                    <?= $project->getName(); ?>
                </h2>
            </div>
            <div class="col-lg-8 col-md-8">
                <div style="min-height:200px">
                    <p><?= $project->getDescription(); ?></p>
                </div>
            </div>
            <?php if (!empty($project->contributors)): ?>
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
            <?php endif; ?>
            <?php if (!empty($project->mentors)): ?>
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
            <?php endif; ?>
            <?php if (!empty($project->organizations)): ?>
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
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title"><?= __('Missions'); ?></h3>
            </div>
            <div class="table-responsive">
                <table id="projects" class="table table-striped table-bordered table-hover dataTable">
                    <thead>
                    <tr>
                        <th></th>
                        <th><?= __('Name'); ?></th>
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
    ],
    ['block' => 'scriptBottom']);
?>
<?php
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
            'name' => 'User',
            'data' => 'user',
            'searchable' => true
        ],
    ],
    'lengthMenu' => ''
])->draw('.dataTable');
echo 'var missionsUrl="' . $this->Url->Build(['controller' => 'Missions', 'action' => 'view']) . '";';
$this->Html->scriptEnd();
?>
<?= $this->Html->script('projects/view.js', ['block' => 'scriptBottom']); ?>