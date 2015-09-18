<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Svn'), ['action' => 'edit', $svn->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Svn'), ['action' => 'delete', $svn->id], ['confirm' => __('Are you sure you want to delete # {0}?', $svn->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Svns'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Svn'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Svn Users'), ['controller' => 'SvnUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Svn User'), ['controller' => 'SvnUsers', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="svns view col-lg-10 col-md-9 columns">
    <h2><?= h($svn->name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Name') ?></h6>
                    <p><?= h($svn->name) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($svn->id) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related SvnUsers') ?></h4>
    <?php if (!empty($svn->svn_users)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Pseudo') ?></th>
                <th><?= __('Svn Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($svn->svn_users as $svnUsers): ?>
            <tr>
                <td><?= h($svnUsers->id) ?></td>
                <td><?= h($svnUsers->pseudo) ?></td>
                <td><?= h($svnUsers->svn_id) ?></td>
                <td><?= h($svnUsers->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'SvnUsers', 'action' => 'view', $svnUsers->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'SvnUsers', 'action' => 'edit', $svnUsers->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'SvnUsers', 'action' => 'delete', $svnUsers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $svnUsers->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php endif; ?>
    </div>
</div>
