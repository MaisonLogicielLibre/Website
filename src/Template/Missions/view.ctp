<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Mission'), ['action' => 'edit', $mission->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Mission'), ['action' => 'delete', $mission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mission->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Missions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mission'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects Users'), ['controller' => 'ProjectsUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Projects User'), ['controller' => 'ProjectsUsers', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="missions view col-lg-10 col-md-9 columns">
    <h2><?= h($mission->id) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Project') ?></h6>
                    <p><?= $mission->has('project') ? $this->Html->link($mission->project->name, ['controller' => 'Projects', 'action' => 'view', $mission->project->id]) : '' ?></p>
                    <h6 class="subheader"><?= __('Role') ?></h6>
                    <p><?= h($mission->role) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($mission->id) ?></p>
                    <h6 class="subheader"><?= __('Active') ?></h6>
                    <p><?= $this->Number->format($mission->active) ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row texts">
        <div class="columns col-lg-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Mission') ?></h6>
                    <?= $this->Text->autoParagraph(h($mission->mission)); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related ProjectsUsers') ?></h4>
    <?php if (!empty($mission->projects_users)): ?>
    <div class="table-responsive">
        <table class="table">
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
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'ProjectsUsers', 'action' => 'view', $projectsUsers->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'ProjectsUsers', 'action' => 'edit', $projectsUsers->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'ProjectsUsers', 'action' => 'delete', $projectsUsers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectsUsers->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php endif; ?>
    </div>
</div>
