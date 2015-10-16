<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Mission'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Mission Levels'), ['controller' => 'MissionLevels', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Mission Level'), ['controller' => 'MissionLevels', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Type Missions'), ['controller' => 'TypeMissions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Type Mission'), ['controller' => 'TypeMissions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="missions index large-9 medium-8 columns content">
    <h3><?= __('Missions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('session') ?></th>
                <th><?= $this->Paginator->sort('length') ?></th>
                <th><?= $this->Paginator->sort('mentor_id') ?></th>
                <th><?= $this->Paginator->sort('type_mission') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($missions as $mission): ?>
            <tr>
                <td><?= $this->Number->format($mission->id) ?></td>
                <td><?= $this->Number->format($mission->session) ?></td>
                <td><?= $this->Number->format($mission->length) ?></td>
                <td><?= $this->Number->format($mission->mentor_id) ?></td>
                <td><?= $this->Number->format($mission->type_mission) ?></td>
                <td><?= h($mission->created) ?></td>
                <td><?= h($mission->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mission->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mission->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mission->id)]) ?>
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
