<?php $this->start('sidebarAdministrator'); ?>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li>
                        <a href="<?= $project->getLink() ?>">
                        <span class="fa-stack">
                            <i class="fa fa-square fa-stack-2x"></i>
                            <i class="fa fa-external-link fa-stack-1x" style="color:#fff;"></i>
                        </span> <?= __('Website of the project') ?>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-pills nav-stacked">
                    <li>
                        <hr/>
                    </li>
                    <li>
                        <a href="<?= $this->Url->build(
                            [
                                'controller' => 'Projects',
                                'action' => 'edit',
                                $project->id
                            ]) ?>">
                            <span class="fa-stack">
                                <i class="fa fa-square fa-stack-2x"></i>
                                <i class="fa fa-external-link fa-stack-1x" style="color:#fff;"></i>
                            </span> <?= __('Edit the project') ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<?php $this->end(); ?>

<?php $this->start('sidebar'); ?>
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <div class="panel panel-default">
        <div class="panel-body">
            <ul class="nav nav-pills nav-stacked">
                <li>
                    <a href="<?= $project->getLink() ?>">
                        <span class="fa-stack">
                            <i class="fa fa-square fa-stack-2x"></i>
                            <i class="fa fa-external-link fa-stack-1x" style="color:#fff;"></i>
                        </span> <?= __('Website of the project') ?>
                    </a>
                </li>
                <li>
                    <a href="<?= $this->Url->build(
                        [
                            'controller' => 'Projects',
                            'action' => 'apply',
                            $project->id
                        ]) ?>">
                        <span class="fa-stack">
                            <i class="fa fa-square fa-stack-2x"></i>
                            <i class="fa fa-pencil fa-stack-1x" style="color:#fff;"></i>
                        </span> <?= __('Apply on the project') ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php $this->end(); ?>