<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Type Users'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="typeUsers form large-10 medium-9 columns">
    <?= $this->Form->create($typeUser) ?>
    <fieldset>
        <legend><?= __('Add Type User') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
