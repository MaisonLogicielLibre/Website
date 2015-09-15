<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Projects Users Mission'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projects Users'), ['controller' => 'ProjectsUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Projects User'), ['controller' => 'ProjectsUsers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Missions'), ['controller' => 'Missions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Mission'), ['controller' => 'Missions', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="projectsUsersMissions index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('projects_user_id') ?></th>
            <th><?= $this->Paginator->sort('mission_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($projectsUsersMissions as $projectsUsersMission): ?>
        <tr>
            <td><?= $this->Number->format($projectsUsersMission->id) ?></td>
            <td>
                <?= $projectsUsersMission->has('projects_user') ? $this->Html->link($projectsUsersMission->projects_user->id, ['controller' => 'ProjectsUsers', 'action' => 'view', $projectsUsersMission->projects_user->id]) : '' ?>
            </td>
            <td>
                <?= $projectsUsersMission->has('mission') ? $this->Html->link($projectsUsersMission->mission->id, ['controller' => 'Missions', 'action' => 'view', $projectsUsersMission->mission->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $projectsUsersMission->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $projectsUsersMission->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $projectsUsersMission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectsUsersMission->id)]) ?>
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
