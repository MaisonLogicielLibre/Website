<div class="row">
    <?= $this->cell('Sidebar::mission', [$mission->getId()]); ?>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="page-header"><?= __('Apply on the mission'); ?></h1>
                <?php
                $this->Html->addCrumb(__('Home'), '/');
                $this->Html->addCrumb(__('Projects'), '/Projects');
                $this->Html->addCrumb($mission->project->getName(), '/Projects/view/'.$mission->project->id);
                $this->Html->addCrumb(__('Apply on the mission'));

                echo $this->Html->getCrumbList(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="header-title"><?= __('Apply on the mission'); ?> <i class="fa fa-user-secret"></i></h3>
                        <fieldset>
                            <p>
                                <?= __('As always, should you encounter a bug, we will disavow any knowledge of your actions.') ?>
                                <br/><br/>
                                <?= __('This page will self-destruct on the press of a button. Good luck..') ?>
                            </p>
                        <?php echo $this->Form->create($mission); ?>
                        </fieldset>
                        <?= $this->Form->button(__('Apply'), ['class' => 'btn-info']) ?>
                        <?= $this->Form->button(__('Cancel'), [
                            'type' => 'button',
                            'class' => 'btn btn-default',
                            'onclick' => 'location.href=\'' . $this->url->build([
                                    'controller' => 'Missions',
                                    'action' => 'view',
                                    $mission->getId()
                                ]) . '\''
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
