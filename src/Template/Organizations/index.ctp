<?= $this->Html->css('dataTables.bootstrap.min', ['block' => 'cssTop']); ?>
<div class="row">
    <?= $this->cell('Sidebar::organizationAction'); ?>

    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><?= __('List of organizations'); ?></h3>
            </div>s
            <div class="table-responsive">
                <table id="organizations" class="table table-striped table-bordered table-hover dataTable">
                    <thead>
                    <tr>
                        <th><?= __('Name'); ?></th>
                        <th><?= __('Website'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                    <tr class="table-search info">
                        <td><input type="text" placeholder="<?= __('Search ...') ?>" class="form-control input-sm input-block-level"/>
                        </td>
                        <td><input type="text" placeholder="<?= __('Search ...') ?>" class="form-control input-sm input-block-level"/>
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
            'name' => 'Organizations.name',
            'data' => 'name',
            'searchable' => true
        ],
        [
            'name' => 'Organizations.website',
            'data' => 'website',
            'searchable' => true
        ],
    ],
    'lengthMenu' => ''
])->draw('.dataTable');
echo 'var orgUrl="' . $this->Url->Build(['action' => 'view']) . '";';
echo 'var validationTxt="' . __('Pending Validation') . '";';
$this->Html->scriptEnd(); ?>
<?= $this->Html->script('organizations/index.js', ['block' => 'scriptBottom']); ?>

