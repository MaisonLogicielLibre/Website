<?php $Parsedown = new Parsedown(); ?>
<div class="row">
    <?= $this->cell('Sidebar::user', [$user->id]); ?>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel special-panel profile-panel">
                    <div class="panel-heading">
                        <?= (!(empty($user->getBiography())) ? $Parsedown->text($user->getBiography()) : __('Your biography')) ?>
                    </div>
                    <div class="panel-body">
                        <div class="col-lg-12">
                            <h3 class="header-title"><?= __('Bio'); ?></h3>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="table-responsive">
                                <table class="profile-table">
                                    <tr>
                                        <td><?= __('Firstname'); ?></td>
                                        <td><?= $user->getFirstName(); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= __('Student'); ?></td>
                                        <td><?= ($user->isStudent() ? __('Yes') : __('No')); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= __('Email'); ?></td>
                                        <td><?= $user->getEmail(); ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="table-responsive">
                                <table class="profile-table">
                                    <tr>
                                        <td><?= __('Lastname'); ?></td>
                                        <td><?= $user->getLastName(); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= __('University'); ?></td>
                                        <td><?= ($user->getUniversity()) ? $user->getUniversity()->getName() : __('Not specified'); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= __('Phone number'); ?></td>
                                        <td><?= $user->getPhone(); ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-12 voffset2">
                            <h3 class="header-title"><?= __('Skills'); ?></h3>
                        </div>
                        <div class="col-lg-12">
                            <?= $user->getSkills(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php if (!empty($user->getProjectsMentored())): ?>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3 class="header-title"><?= __('Projects mentored') ?> <?= $this->Wiki->addHelper('Projects'); ?></h3>
                            <table class="table borderless table-striped">
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
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3 class="header-title"><?= __('Organizations joined') ?> <?= $this->Wiki->addHelper('Organizations'); ?></h3>
                            <table class="table borderless table-striped">
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
			<?php if (!empty($user->svn_users)): ?>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3 class="header-title"><?= __('CVS added') ?> <?= $this->Wiki->addHelper('CVS'); ?></h3>
                            <table class="table borderless table-striped">
								<thead>
									<td> <?= __('Name') ?> </td>
									<td> <?= __('Source') ?> </td>
								</thead>
                                <?php foreach ($user->svn_users as $svnUser): ?>
                                    <tr>
                                        <td>
                                            <!-- Name of cvs -->
                                            <a href="<?=$svnUser->svn->getLink() . $svnUser->getPseudo() ?>"><?=$svnUser->getPseudo()?></a>
                                        </td>
										<td>
                                            <!-- Source of cvs -->
                                            <?= $svnUser->svn->getName() ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>