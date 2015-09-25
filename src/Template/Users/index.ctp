<div class="users index col-lg-12 col-md-12 col-sm-12 col-xs-12 columns">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">
                <?= __('List Users'); ?>
            </h3>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('username') ?></th>
                    <th><?= $this->Paginator->sort('firstName') ?></th>
                    <th><?= $this->Paginator->sort('lastName') ?></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $this->Html->link(
                            $user->getUsername(),
                            ['controller' => 'Users', 'action' => 'view', $user->id]
                        ); ?>
                    </td>
                    <td><?= h($user->getFirstName()) ?></td>
                    <td><?= h($user->getLastName()) ?></td>
                </tr>

            <?php endforeach; ?>
            </tbody>
            </table>
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
</div>
