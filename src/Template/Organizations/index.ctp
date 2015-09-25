<div class="organizations index col-lg-10 col-md-9 columns">
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
                <td><?= $this->html->link($organization->name, ['action' => 'view', $organization->id])?></td>
                <td><a href='<?= $organization->website ?>'><?= __('Website') ?></a></td>
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
