<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New University'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="universities index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($universities as $university): ?>
        <tr>
            <td><?= $this->Number->format($university->id) ?></td>
            <td><?= h($university->name) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $university->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $university->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $university->id], ['confirm' => __('Are you sure you want to delete # {0}?', $university->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
