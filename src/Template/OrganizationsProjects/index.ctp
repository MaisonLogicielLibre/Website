<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Organizations Project'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="organizationsProjects index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('project_id') ?></th>
            <th><?= $this->Paginator->sort('organization') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($organizationsProjects as $organizationsProject): ?>
        <tr>
            <td><?= $this->Number->format($organizationsProject->id) ?></td>
            <td>
                <?= $organizationsProject->has('project') ? $this->Html->link($organizationsProject->project->name, ['controller' => 'Projects', 'action' => 'view', $organizationsProject->project->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($organizationsProject->organization) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $organizationsProject->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $organizationsProject->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $organizationsProject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $organizationsProject->id)]) ?>
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
