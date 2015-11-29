<?= $this->Html->css('dataTables.bootstrap.min', ['block' => 'cssTop']); ?>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="page-header"><?= __('List Users'); ?> <?= $this->Wiki->addHelper('Projects'); ?></h1>
            <?php
            $this->Html->addCrumb(__('Home'), '/');
            $this->Html->addCrumb(__('Users'), '/users');
            $this->Html->addCrumb(__('List Users'));

            echo $this->Html->getCrumbList(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="header-title"><?= __('List Users'); ?></h3>

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
    'lengthMenu' => '',
    'pageLength' => 50
])->draw('.dataTable');
echo 'var userUrl="' . $this->Url->Build(['action' => 'view']) . '";';
$this->Html->scriptEnd(); ?>
<?= $this->Html->script('users/index.js', ['block' => 'scriptBottom']); ?>