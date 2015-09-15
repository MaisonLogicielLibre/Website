<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Svn User'), ['action' => 'edit', $svnUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Svn User'), ['action' => 'delete', $svnUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $svnUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Svn Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Svn User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Svns'), ['controller' => 'Svns', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Svn'), ['controller' => 'Svns', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="svnUsers view large-10 medium-9 columns">
    <h2><?= h($svnUser->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Pseudo') ?></h6>
            <p><?= h($svnUser->pseudo) ?></p>
            <h6 class="subheader"><?= __('Svn') ?></h6>
            <p><?= $svnUser->has('svn') ? $this->Html->link($svnUser->svn->name, ['controller' => 'Svns', 'action' => 'view', $svnUser->svn->id]) : '' ?></p>
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $svnUser->has('user') ? $this->Html->link($svnUser->user->id, ['controller' => 'Users', 'action' => 'view', $svnUser->user->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($svnUser->id) ?></p>
        </div>
    </div>
</div>
