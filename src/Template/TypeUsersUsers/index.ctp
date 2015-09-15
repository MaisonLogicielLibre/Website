<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Type Users User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Type Users'), ['controller' => 'TypeUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Type User'), ['controller' => 'TypeUsers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="typeUsersUsers index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('type_user_id') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($typeUsersUsers as $typeUsersUser): ?>
        <tr>
            <td><?= $this->Number->format($typeUsersUser->id) ?></td>
            <td>
                <?= $typeUsersUser->has('type_user') ? $this->Html->link($typeUsersUser->type_user->name, ['controller' => 'TypeUsers', 'action' => 'view', $typeUsersUser->type_user->id]) : '' ?>
            </td>
            <td>
                <?= $typeUsersUser->has('user') ? $this->Html->link($typeUsersUser->user->id, ['controller' => 'Users', 'action' => 'view', $typeUsersUser->user->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $typeUsersUser->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $typeUsersUser->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $typeUsersUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $typeUsersUser->id)]) ?>
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
