<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Svn User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Svns'), ['controller' => 'Svns', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Svn'), ['controller' => 'Svns', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="svnUsers index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('pseudo') ?></th>
            <th><?= $this->Paginator->sort('svn_id') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($svnUsers as $svnUser): ?>
        <tr>
            <td><?= $this->Number->format($svnUser->id) ?></td>
            <td><?= h($svnUser->pseudo) ?></td>
            <td>
                <?= $svnUser->has('svn') ? $this->Html->link($svnUser->svn->name, ['controller' => 'Svns', 'action' => 'view', $svnUser->svn->id]) : '' ?>
            </td>
            <td>
                <?= $svnUser->has('user') ? $this->Html->link($svnUser->user->id, ['controller' => 'Users', 'action' => 'view', $svnUser->user->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $svnUser->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $svnUser->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $svnUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $svnUser->id)]) ?>
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
