<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Type Users User'), ['action' => 'edit', $typeUsersUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Type Users User'), ['action' => 'delete', $typeUsersUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $typeUsersUser->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Type Users Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Type Users User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Type Users'), ['controller' => 'TypeUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Type User'), ['controller' => 'TypeUsers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="typeUsersUsers view col-lg-10 col-md-9 columns">
    <h2><?= h($typeUsersUser->id) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Type User') ?></h6>
                    <p><?= $typeUsersUser->has('type_user') ? $this->Html->link($typeUsersUser->type_user->name, ['controller' => 'TypeUsers', 'action' => 'view', $typeUsersUser->type_user->id]) : '' ?></p>
                    <h6 class="subheader"><?= __('User') ?></h6>
                    <p><?= $typeUsersUser->has('user') ? $this->Html->link($typeUsersUser->user->id, ['controller' => 'Users', 'action' => 'view', $typeUsersUser->user->id]) : '' ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($typeUsersUser->id) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
