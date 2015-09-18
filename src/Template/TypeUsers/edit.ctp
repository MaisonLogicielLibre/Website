<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li class="active disabled"><?= $this->Html->link(__('Edit Type User'), ['action' => 'edit', $typeUser->id]) ?> </li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $typeUser->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $typeUser->id), 'class' => 'btn-danger']
            )
        ?></li>
        <li><?= $this->Html->link(__('New Type User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Type Users'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="typeUsers form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($typeUser); ?>
    <fieldset>
        <legend><?= __('Edit Type User') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
