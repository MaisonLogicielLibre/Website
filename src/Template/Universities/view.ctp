<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit University'), ['action' => 'edit', $university->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete University'), ['action' => 'delete', $university->id], ['confirm' => __('Are you sure you want to delete # {0}?', $university->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Universities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New University'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="universities view col-lg-10 col-md-9 columns">
    <h2><?= h($university->name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Name') ?></h6>
                    <p><?= h($university->name) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($university->id) ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row texts">
        <div class="columns col-lg-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Website') ?></h6>
                    <?= $this->Text->autoParagraph(h($university->website)); ?>
                </div>
            </div>
        </div>
    </div>
</div>
