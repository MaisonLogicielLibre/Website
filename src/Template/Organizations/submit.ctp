<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('List Organizations'), ['action' => 'index']) ?></li>
        <li class="active disabled"><?= $this->Html->link(__('Submit organization'), ['action' => 'submit']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Submit project'), ['controller' => 'Projects', 'action' => 'submit']) ?> </li>
    </ul>
</div>
<div class="organizations form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($organization); ?>
    <fieldset>
        <legend><?= __('Submit Organization') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('website');
            echo $this->Form->input('logo');
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
