<?= $this->Html->css('dataTables.bootstrap.min', ['block' => 'cssTop']); ?>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="page-header"><?= __('List Users'); ?></h1>
            <?php
            $this->Html->addCrumb(__('Home'), '/');
            $this->Html->addCrumb(__('Projects'), '/Users');
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
                                <th><?= __('University'); ?></th>
                                <th><?= __('Organizations'); ?></th>
                                <th><?= __('Student'); ?></th>
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
                                <td>
                                    <select class="form-control">
                                        <option value="">-----</option>
                                        <?php
                                        foreach ($universities as $i => $university) {
                                            echo '<option value="' . $university . '">' . $university . '</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
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
                                <td>
                                    <select class="form-control">
                                        <option value="">-----</option>
                                        <option value="1"><?= __('Yes'); ?></option>
                                        <option value="0"><?= __('No'); ?></option>
                                    </select>
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
            'name' => 'Users.username',
            'data' => 'username',
            'searchable' => true
        ],
        [
            'name' => 'Users.firstName',
            'data' => 'firstName',
            'searchable' => true
        ],
        [
            'name' => 'Users.lastName',
            'data' => 'lastName',
            'searchable' => true
        ],
        [
            'name' => 'Universities.name',
            'data' => 'university',
            'searchable' => true
        ],
        [
            'name' => 'Owners.name',
            'data' => 'owners',
            'searchable' => true
        ],
        [
            'name' => 'Users.isStudent',
            'data' => 'isStudent',
            'searchable' => true
        ]
    ],
    'lengthMenu' => '',
    'pageLength' => 50
])->draw('.dataTable');
echo 'var userUrl="' . $this->Url->Build(['action' => 'view']) . '";';
echo 'var universityUrl="' . $this->Url->Build(['controller' => 'Universities', 'action' => 'view']) . '";';
echo 'var orgUrl="' . $this->Url->Build(['controller' => 'Organizations', 'action' => 'view']) . '";';
echo 'var notSpecifiedTr="' . __('Not specified') . '";';
echo 'var yesTr="' . __('Yes') . '";';
echo 'var noTr="' . __('No') . '";';
$this->Html->scriptEnd(); ?>
<?= $this->Html->script('users/index.js', ['block' => 'scriptBottom']); ?>