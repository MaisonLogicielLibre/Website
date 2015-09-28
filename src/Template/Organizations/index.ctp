<div class="organizations index col-lg-12 col-md-12 col-sm-12 col-xs-12 columns">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?= __('Organizations list'); ?></h3>
        </div>
        <div class="panel-content">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('name') ?></th>
                        <th><?= $this->Paginator->sort('website') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($organizations as $organization): ?>
                        <tr>
                            <td><?= $this->html->link($organization->name, ['action' => 'view', $organization->id]) ?></td>
                            <td><a href='<?= $organization->website ?>'><?= __('Website') ?></a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="paginator" style="margin:0 0 0 10px;">
                <ul class="pagination">
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                </ul>
                <p><?= $this->Paginator->counter() ?></p>
            </div>
        </div>
    </div>
</div>
