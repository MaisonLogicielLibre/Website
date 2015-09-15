<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Type User'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="typeUsers index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($typeUsers as $typeUser): ?>
        <tr>
            <td><?= $this->Number->format($typeUser->id) ?></td>
            <td><?= h($typeUser->name) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $typeUser->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $typeUser->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $typeUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $typeUser->id)]) ?>
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
