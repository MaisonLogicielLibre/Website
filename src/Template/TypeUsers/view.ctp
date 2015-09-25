<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Type User'), ['action' => 'edit', $typeUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Type User'), ['action' => 'delete', $typeUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $typeUser->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Type Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Type User'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="typeUsers view col-lg-10 col-md-9 columns">
    <h2><?= h($typeUser->name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Name') ?></h6>
                    <p><?= h($typeUser->name) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($typeUser->id) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
