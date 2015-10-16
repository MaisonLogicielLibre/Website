<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Mission'), ['action' => 'edit', $mission->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Mission'), ['action' => 'delete', $mission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mission->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Missions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mission'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Mission Levels'), ['controller' => 'MissionLevels', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mission Level'), ['controller' => 'MissionLevels', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Type Missions'), ['controller' => 'TypeMissions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Type Mission'), ['controller' => 'TypeMissions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="missions view large-9 medium-8 columns content">
    <h3><?= h($mission->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($mission->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Session') ?></th>
            <td><?= $this->Number->format($mission->session) ?></td>
        </tr>
        <tr>
            <th><?= __('Length') ?></th>
            <td><?= $this->Number->format($mission->length) ?></td>
        </tr>
        <tr>
            <th><?= __('Mentor Id') ?></th>
            <td><?= $this->Number->format($mission->mentor_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Type Mission') ?></th>
            <td><?= $this->Number->format($mission->type_mission) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($mission->created) ?></tr>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($mission->modified) ?></tr>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($mission->description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Competence') ?></h4>
        <?= $this->Text->autoParagraph(h($mission->competence)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Mission Levels') ?></h4>
        <?php if (!empty($mission->mission_levels)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Level') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($mission->mission_levels as $missionLevels): ?>
            <tr>
                <td><?= h($missionLevels->id) ?></td>
                <td><?= h($missionLevels->level) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MissionLevels', 'action' => 'view', $missionLevels->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'MissionLevels', 'action' => 'edit', $missionLevels->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MissionLevels', 'action' => 'delete', $missionLevels->id], ['confirm' => __('Are you sure you want to delete # {0}?', $missionLevels->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Type Missions') ?></h4>
        <?php if (!empty($mission->type_missions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($mission->type_missions as $typeMissions): ?>
            <tr>
                <td><?= h($typeMissions->id) ?></td>
                <td><?= h($typeMissions->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'TypeMissions', 'action' => 'view', $typeMissions->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'TypeMissions', 'action' => 'edit', $typeMissions->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'TypeMissions', 'action' => 'delete', $typeMissions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $typeMissions->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
