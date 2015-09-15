<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Mission'), ['action' => 'edit', $mission->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Mission'), ['action' => 'delete', $mission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mission->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Missions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mission'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects Users'), ['controller' => 'ProjectsUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Projects User'), ['controller' => 'ProjectsUsers', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="missions view large-10 medium-9 columns">
    <h2><?= h($mission->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Project') ?></h6>
            <p><?= $mission->has('project') ? $this->Html->link($mission->project->name, ['controller' => 'Projects', 'action' => 'view', $mission->project->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Role') ?></h6>
            <p><?= h($mission->role) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($mission->id) ?></p>
            <h6 class="subheader"><?= __('Active') ?></h6>
            <p><?= $this->Number->format($mission->active) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Mission') ?></h6>
            <?= $this->Text->autoParagraph(h($mission->mission)) ?>
        </div>
    </div>
</div>
<div class="related">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Projects Users') ?></h4>
    <?php if (!empty($mission->projects_users)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Project Id') ?></th>
            <th><?= __('Cv') ?></th>
            <th><?= __('Description') ?></th>
            <th><?= __('Presentation') ?></th>
            <th><?= __('Accepted') ?></th>
            <th><?= __('Is Mentor') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($mission->projects_users as $projectsUsers): ?>
        <tr>
            <td><?= h($projectsUsers->id) ?></td>
            <td><?= h($projectsUsers->user_id) ?></td>
            <td><?= h($projectsUsers->project_id) ?></td>
            <td><?= h($projectsUsers->cv) ?></td>
            <td><?= h($projectsUsers->description) ?></td>
            <td><?= h($projectsUsers->presentation) ?></td>
            <td><?= h($projectsUsers->accepted) ?></td>
            <td><?= h($projectsUsers->is_mentor) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'ProjectsUsers', 'action' => 'view', $projectsUsers->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'ProjectsUsers', 'action' => 'edit', $projectsUsers->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProjectsUsers', 'action' => 'delete', $projectsUsers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectsUsers->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
