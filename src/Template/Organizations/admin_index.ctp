<?= $this->Html->css('dataTables.bootstrap.min', ['block' => 'cssTop']); ?>
<?= $this->Html->css('bootstrap-switch.min', ['block' => 'cssTop']); ?>
<?php
$this->element('Organizations/actionSidebar');
echo $this->fetch('actionSidebar');
?>
<div class="organizations index col-lg-9 col-md-9 col-sm-9 col-xs-12 columns">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?= __('List of organizations'); ?></h3>
        </div>
        <div class="table-responsive">
            <table id="organizations" class="table table-striped table-bordered table-hover dataTable">
                <thead>
                <tr>
                    <th></th>
                    <th><?= __('Name'); ?></th>
                    <th><?= __('Website'); ?></th>
                    <th><?= __('Approved'); ?></th>
                    <th><?= __('Rejected'); ?></th>
                </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                <tr class="table-search info">
                    <td></td>
                    <td><input type="text" placeholder="Search ..." class="form-control input-sm input-block-level"/>
                    </td>
                    <td><input type="text" placeholder="Search ..." class="form-control input-sm input-block-level"/>
                    </td>
                    <td>
                        <select class="form-control">
                            <option value="">-----</option>
                            <option value="0"><?= __('Not approved'); ?></option>
                            <option value="1"><?= __('Approved'); ?></option>
                        </select>
                    </td>
                    <td>
                        <select class="form-control">
                            <option value="">-----</option>
                            <option value="0"><?= __('Not rejected'); ?></option>
                            <option value="1"><?= __('Rejected'); ?></option>
                        </select>
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- Add DataTables scripts -->
    <?= $this->Html->script(
        [
            'datatables/jquery.dataTables.min',
            'datatables/dataTables.bootstrap.min',
            'DataTables.cakephp.dataTables',
            'bootstrap/bootstrap-switch.min'
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
                'name' => 'organizations.id',
                'data' => 'name',
                'searchable' => false,
                'visible' => false
            ],
            [
                'name' => 'organizations.name',
                'data' => 'name',
                'searchable' => true
            ],
            [
                'name' => 'organizations.website',
                'data' => 'website',
                'searchable' => true
            ],
            [
                'name' => 'organizations.isValidated',
                'data' => 'isValidated',
                'searchable' => true,
            ],
            [
                'name' => 'organizations.isRejected',
                'data' => 'isRejected',
                'searchable' => true
            ]
        ],
        'lengthMenu' => ''
    ])->draw('.dataTable');
    echo 'var ajaxUrl="' . $this->Url->Build(['action' => 'editStatus']) . '";';
    echo 'var orgUrl="' . $this->Url->Build(['action' => 'view']) . '";';
    $this->Html->scriptEnd();
    ?>
    <?= $this->Html->script('organizations/index.js', ['block' => 'scriptBottom']); ?>
