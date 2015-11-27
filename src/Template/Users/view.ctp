<?= $this->cell('Sidebar::user', [$user->id]); ?>
<?php $Parsedown = new Parsedown(); ?>
<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
    <div class="panel special-panel">
        <div class="panel-heading">
            <?= (!(empty($user->getBiography())) ? $Parsedown->text($user->getBiography()) : __('Your biography')) ?>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table-responsive">
                    <tr>
                        <td><?= __('Bio'); ?></td>
                    </tr>
                    <tr>
                        <td><?= __('Firstname'); ?></td>
                        <td><?= __('Lastname'); ?></td>
                    </tr>
                    <tr>

                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<?php if (!empty($user->getProjectsMentored())): ?>
    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3><?= __('Projects mentored') ?> <?= $this->Wiki->addHelper('Projects'); ?></h3>
                <table class="table table-striped">
                    <?php foreach ($user->getProjectsMentored() as $project): ?>
                        <tr>
                            <td>
                                <!-- Name of project -->
                                <?php if ($project->isAccepted() && !$project->isArchived()) {
                                    echo $this->html->link($project->getName(), ['controller' => 'Projects', 'action' => 'view', $project->id]);
                                } elseif (!$project->isAccepted() && !$project->isArchived()) {
                                    echo $project->getName();
                                }
                                ?>
                                <!-- Badge pending-->
                                <?php
                                if (!$project->isAccepted() && !$project->isArchived()):
                                    ?>
                                    <span
                                        class="label label-warning label-as-badge"><?= __('Pending Validation'); ?></span>
                                    <?php
                                endif;
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (!empty($user->getOrganizationsJoined())): ?>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3><?= __('Organizations joined') ?> <?= $this->Wiki->addHelper('Organizations'); ?></h3>
                <table class="table table-striped">
                    <?php foreach ($user->getOrganizationsJoined() as $organization): ?>
                        <tr>
                            <td>
                                <!-- Name of organization -->
                                <?= $this->html->link($organization->getName(), ['controller' => 'Organizations', 'action' => 'view', $organization->id]) ?>
                                <!-- Badge owner -->
                                <?php
                                if ($user->isOwnerOf($organization->id)):
                                    ?>
                                    <span class="label label-info label-as-badge"><?= __('Owner'); ?></span>
                                    <?php
                                endif;
                                ?>
                                <!-- Badge pending -->
                                <?php
                                if (!$organization->getIsValidated() && !$organization->getIsRejected()):
                                    ?>
                                    <span
                                        class="label label-warning label-as-badge"><?= __('Pending Validation'); ?></span>
                                    <?php
                                endif;
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
<?php endif; ?>
