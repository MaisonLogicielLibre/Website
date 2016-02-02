<div class="row">
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="page-header"><?= __('Delete application') ?></h1>
                <?php
                $this->Html->addCrumb(__('Home'), '/');
                $this->Html->addCrumb(__('Users'), '/Applications');
                $this->Html->addCrumb(__('My profile'), '/users/view/'.$user->id);
                $this->Html->addCrumb(__('Delete an application'));

                echo $this->Html->getCrumbList(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="header-title"><?= __('Information') ?></h3>
                        <?= $this->Form->create($application, ['type' => 'post', 'url' => ['action' => 'editArchived']]); ?>
                        <fieldset>
                            <p><?= __('You are about to delete the application: ') . $application['mission']->getName() . '. ' . __('This implies that:') ?></p>

                            <ul>
                                <li><?= __('The mentor of the mission will not be able to contact you through ML2.') ?></li>
                            </ul>

                            <p><?= __('If you wish to confirm your deletion, press the Remove button below.') ?></p>
                        </fieldset>
                        <?= $this->Form->button(__('Remove'), ['class' => 'btn-danger']) ?>
                        <?= $this->Form->button(__('Cancel'), [
                            'type' => 'button',
                            'class' => 'btn btn-default',
                            'onclick' => 'location.href=\'' . $this->url->build([
                                    'controller' => 'Users',
                                    'action' => 'view',
                                    $user->id
                                ]) . '\''
                        ]); ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
