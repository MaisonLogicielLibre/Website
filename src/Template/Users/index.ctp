<?= $this->Html->css('dataTables.bootstrap.min', ['block' => 'cssTop']); ?>
    <div class="row">
        <div class="users index col-lg-12 col-md-12 col-sm-12 col-xs-12 columns">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= __('List Users'); ?></h3>
                </div>
                <div class="table-responsive">
                    <table id="users" class="table table-striped table-bordered table-hover dataTable">
                        <thead>
                        <tr>
                            <th><?= __('Username'); ?></th>
                            <th><?= __('First name'); ?></th>
                            <th><?= __('Last name'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                        <tr class="table-search info">
                            <td><input type="text" placeholder="<?= __('Search ...') ?>"
                                       class="form-control input-sm input-block-level"/>
                            </td>
                            <td><input type="text" placeholder="<?= __('Search ...') ?>"
                                       class="form-control input-sm input-block-level"/>
                            </td>
                            <td><input type="text" placeholder="<?= __('Search ...') ?>"
                                       class="form-control input-sm input-block-level"/>
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
            'name' => 'users.username',
            'data' => 'username',
            'searchable' => true
        ],
        [
            'name' => 'users.firstName',
            'data' => 'firstName',
            'searchable' => true
        ],
        [
            'name' => 'users.lastName',
            'data' => 'lastName',
            'searchable' => true
        ]
    ],
    'lengthMenu' => ''
])->draw('.dataTable');
echo 'var userUrl="' . $this->Url->Build(['action' => 'view']) . '";';
$this->Html->scriptEnd(); ?>
<?= $this->Html->script('users/index.js', ['block' => 'scriptBottom']); ?>