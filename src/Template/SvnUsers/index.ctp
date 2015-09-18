<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('New Svn User'), ['action' => 'add']) ?></li>
        <li class="active disabled"><?= $this->Html->link(__('List Svn Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Svns'), ['controller' => 'Svns', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Svn'), ['controller' => 'Svns', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="svnUsers index col-lg-10 col-md-9 columns">
    <div class="table-responsive">
        <table class="table table-striped">
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
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['action' => 'view', $svnUser->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'edit', $svnUser->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['action' => 'delete', $svnUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $svnUser->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
                </td>
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
