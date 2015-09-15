<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit University'), ['action' => 'edit', $university->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete University'), ['action' => 'delete', $university->id], ['confirm' => __('Are you sure you want to delete # {0}?', $university->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Universities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New University'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="universities view large-10 medium-9 columns">
    <h2><?= h($university->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($university->name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($university->id) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Website') ?></h6>
            <?= $this->Text->autoParagraph(h($university->website)) ?>
        </div>
    </div>
</div>
