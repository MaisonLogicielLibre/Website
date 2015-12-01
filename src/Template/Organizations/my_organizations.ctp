<?= $this->Html->css('dataTables.bootstrap.min', ['block' => 'cssTop']); ?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h1 class="page-header"><?= __('My organizations'); ?> <?= $this->Wiki->addHelper('Organizations'); ?></h1>
        <?php
        $this->Html->addCrumb(__('Home'), '/');
        $this->Html->addCrumb(__('Organizations'), '/Organizations');
        $this->Html->addCrumb(__('My organizations'));

        echo $this->Html->getCrumbList(); ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3 class="header-title"><?= __('My organizations'); ?></h3>
                <div class="table-responsive">
                    <table id="organizations" class="table table-striped table-bordered dataTable">
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
        'url' => $this->Url->build(['action' => 'myOrganizations']),
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
echo 'var ownerTxt="' . __('Owner') . '";';
$this->Html->scriptEnd(); ?>
<?= $this->Html->script('organizations/myOrganizations', ['block' => 'scriptBottom']); ?>

