<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Svn'), ['action' => 'edit', $svn->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Svn'), ['action' => 'delete', $svn->id], ['confirm' => __('Are you sure you want to delete # {0}?', $svn->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Svns'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Svn'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Svn Users'), ['controller' => 'SvnUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Svn User'), ['controller' => 'SvnUsers', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="svns view large-10 medium-9 columns">
    <h2><?= h($svn->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($svn->name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($svn->id) ?></p>
        </div>
    </div>
</div>
<div class="related">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Svn Users') ?></h4>
    <?php if (!empty($svn->svn_users)): ?>
    <table cellpadding="0" cellspacing="0">
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
                <?= $this->Html->link(__('View'), ['controller' => 'SvnUsers', 'action' => 'view', $svnUsers->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'SvnUsers', 'action' => 'edit', $svnUsers->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'SvnUsers', 'action' => 'delete', $svnUsers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $svnUsers->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
