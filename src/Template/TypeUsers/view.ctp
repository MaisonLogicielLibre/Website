<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Type User'), ['action' => 'edit', $typeUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Type User'), ['action' => 'delete', $typeUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $typeUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Type Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Type User'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="typeUsers view large-10 medium-9 columns">
    <h2><?= h($typeUser->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($typeUser->name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($typeUser->id) ?></p>
        </div>
    </div>
</div>
