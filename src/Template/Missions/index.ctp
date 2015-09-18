<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('New Mission'), ['action' => 'add']) ?></li>
        <li class="active disabled"><?= $this->Html->link(__('List Missions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects Users'), ['controller' => 'ProjectsUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Projects User'), ['controller' => 'ProjectsUsers', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="missions index col-lg-10 col-md-9 columns">
    <div class="table-responsive">
        <table class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('project_id') ?></th>
                <th><?= $this->Paginator->sort('role') ?></th>
                <th><?= $this->Paginator->sort('active') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($missions as $mission): ?>
            <tr>
                <td><?= $this->Number->format($mission->id) ?></td>
                <td>
                    <?= $mission->has('project') ? $this->Html->link($mission->project->name, ['controller' => 'Projects', 'action' => 'view', $mission->project->id]) : '' ?>
                </td>
            <td><?= h($mission->role) ?></td>
                    <td><?= $this->Number->format($mission->active) ?></td>
                    <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['action' => 'view', $mission->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'edit', $mission->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['action' => 'delete', $mission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mission->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
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
