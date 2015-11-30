<?= $this->Html->script(['organizations/add-member.js', 'duallistbox/dual-list-box.min.js', 'initial.min'], ['block' => 'scriptBottom']); ?>
<div class="row">
    <?= $this->cell('Sidebar::organization', [$organization->id]); ?>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="page-header"><?= __('Quit the organization'); ?></h1>
                <?php
                $this->Html->addCrumb(__('Home'), '/');
                $this->Html->addCrumb(__('Organizations'), '/Organizations');
                $this->Html->addCrumb($organization->getName(), '/Organizations/view/'.$organization->id);
                $this->Html->addCrumb(__('Quit the organization'));

                echo $this->Html->getCrumbList(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="header-title"><?= __('Quit the organization'); ?></h3>
                        <fieldset>
                            <p> <?= __('Are you sure you want to quit the organization?') ?> </p>
                            <?php if (count($organization->getOwners()) == 1 && $user->isOwnerOf($organization->getId())) { ?>
                                <p> <?= __('You are the last owner, this will delete the organization') ?> </p>
                            <?php }
                            echo $this->Form->create($organization); ?>
                        </fieldset>
                        <?= $this->Form->button(__('Quit the organization'), ['class' => 'btn-danger']) ?>
                        <?= $this->Form->button(__('Cancel'), [
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
            </div>
        </div>
    </div>
</div>
