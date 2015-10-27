<?= $this->Html->script(['organizations/add-member.js', 'duallistbox/dual-list-box.min.js'], ['block' => 'scriptBottom']); ?>
<div class="row">
    <?= $this->cell('Sidebar::organization', [$organization->id]); ?>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <fieldset>
            <legend><?= __('Quit the organization') ?></legend>
            <p> <?= __('Are you sure you want to quit the organization?') ?> </p>
            <?php if (count($organization->getOwners()) == 1 && $user->isOwnerOf($organization->getId())) { ?>
                <p> <?= __('You are the last owner, this will delete the organization') ?> </p>
            <?php }
            echo $this->Form->create($organization); ?>
        </fieldset>
        <?= $this->Form->button(__('Yes'), ['class' => 'btn-success']) ?>
        <?= $this->Form->button(__('No'), [
            'type' => 'button',
            'class' => 'btn btn-default',
            'onclick' => 'location.href=\'' . $this->url->build([
                    'controller' => 'Organizations',
                    'action' => 'view',
                    $organization->id
                ]) . '\''
        ]); ?>
    </div>
</div>
