<?= $this->Html->css('dataTables.bootstrap.min', ['block' => 'cssTop']); ?>
<div class="row">
    <?= $this->cell('Sidebar::projectAction'); ?>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
		<div class="alert alert-warning alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<?=__("A project can be of development or system administration and it can be owned by zero, one or more organizations. It may provide mission to students.")?>
		</div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><?= __('List of projects'); ?> <?= $this->Wiki->addHelper('Projects');?></h3>
            </div>
            <div class="table-responsive">
                <table id="projects" class="table table-striped table-bordered table-hover dataTable">
                    <thead>
                    <tr>
                        <th></th>
                        <th><?= __('Name'); ?></th>
                        <th><?= __('Link'); ?></th>
                        <th><?= __('Organizations'); ?> <?= $this->Wiki->addHelper('Organizations');?></th>
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
                        <td>
                            <select class="form-control">
                                <option value="">-----</option>
                                <?php
                                foreach ($orgs as $org) {
                                    echo '<option value="' . $org . '">' . $org . '</option>';
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    </tfoot>
                </table>
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
echo $this->DataTables->init([
    'ajax' => [
        'url' => $this->Url->build(['action' => 'index']),
    ],
    'deferLoading' => $recordsTotal,
    'delay' => 600,
    "sDom" => "<'row'<'col-xs-6'l>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
    'columns' => [
        [
            'name' => 'Projects.id',
            'data' => 'id',
            'searchable' => false,
            'visible' => false
        ],
        [
            'name' => 'Projects.name',
            'data' => 'name',
            'searchable' => true
        ],
        [
            'name' => 'Projects.link',
            'data' => 'link',
            'searchable' => true
        ],
        [
            'name' => 'Organizations.name',
            'data' => 'organizations',
            'searchable' => true
        ]
    ],
    'lengthMenu' => '',
    'pageLength' => 50
])->draw('.dataTable');
echo 'var orgUrl="' . $this->Url->Build(['controller' => 'organizations', 'action' => 'view']) . '";';
echo 'var projectUrl="' . $this->Url->Build(['action' => 'view']) . '";';
echo 'var validationTxt="' . __('Pending Validation') . '";';
$this->Html->scriptEnd();
?>
<?= $this->Html->script('projects/index.js', ['block' => 'scriptBottom']); ?>
