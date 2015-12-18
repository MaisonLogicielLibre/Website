<?php $Parsedown = new ParsedownNoImage(); ?>
<div class="row">
    <?= $this->cell('Sidebar::user', [$userSelected->id]); ?>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel special-panel profile-panel">
                    <div class="panel-heading">
                        <?= (!(empty($userSelected->getBiography())) ? $Parsedown->text($userSelected->getBiography()) : __('Your biography')) ?>
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
                                        <td><?= $userSelected->getFirstName(); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= __('Student'); ?></td>
                                        <td><?= ($userSelected->isStudent() ? __('Yes') : __('No')); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= __('Email'); ?></td>
                                        <td>
                                            <?php if ($userSelected->getEmailPublic()):
                                            echo $userSelected->getEmailPublic();
                                            else:
                                            echo $userSelected->getCensoredEmail();
                                            endif;
                                            ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="table-responsive">
                                <table class="profile-table">
                                    <tr>
                                        <td><?= __('Lastname'); ?></td>
                                        <td><?= $userSelected->getLastName(); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= __('University'); ?></td>
                                        <td><?= ($userSelected->getUniversity()) ? $userSelected->getUniversity()->getName() : __('Not specified'); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= __('Phone number'); ?></td>
                                        <td><?= $userSelected->getPhone(); ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-12 voffset2">
                            <h3 class="header-title"><?= __('Skills'); ?></h3>
                        </div>
                        <div class="col-lg-12">
                            <?= $userSelected->getSkills(); ?>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="col-lg-12">
                            <h3 class="header-title"><?= __('Interests'); ?></h3>
                        </div>
                        <?= (!(empty($userSelected->getInterest())) ? $Parsedown->text($userSelected->getInterest()) : __('Your Interest')) ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php if (!empty($userSelected->getProjectsMentored())): ?>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3 class="header-title"><?= __('Projects mentored') ?> <?= $this->Wiki->addHelper('Projects'); ?></h3>
                            <table class="table borderless table-striped">
                                <?php foreach ($userSelected->getProjectsMentored() as $project): ?>
                                    <tr>
                                        <td>
                                            <!-- Name of project -->
                                            <?php
                                            if (!$project->isAccepted() || $project->isArchived()) {
                                                if ($user && ($user->isMentorOf($project->id) || $user->hasRoleName(['Administrator']))) {
                                                    echo $this->html->link($project->getName(), ['controller' => 'Projects', 'action' => 'view', $project->id]);
                                                } else {
                                                    echo $project->getName();
                                                }
                                            } else {
                                                echo $this->html->link($project->getName(), ['controller' => 'Projects', 'action' => 'view', $project->id]);
                                            }
                                            ?>
                                            <!-- Badge mentor -->
                                            <?php
                                            if ($userSelected->isMentorOf($project->id)):
                                                ?>
                                                <span class="label label-info label-as-badge"><?= __('Mentor'); ?></span>&nbsp;
                                                <?php
                                            endif;
                                            ?>

                                            <!-- Badge pending-->
                                            <?php
                                                if (!$project->isAccepted()):
                                            ?>
                                                <span
                                                    class="label label-warning label-as-badge"><?= __('Pending Validation'); ?>
                                                </span>&nbsp;
                                            <?php
                                                endif;
                                                if ($project->isArchived()):
                                            ?>
                                                <span
                                                    class="label label-warning label-as-badge"><?= __('Archived'); ?>
                                                </span>&nbsp;
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

            <?php if (!empty($userSelected->getOrganizationsJoined())): ?>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3 class="header-title"><?= __('Organizations joined') ?> <?= $this->Wiki->addHelper('Organizations'); ?></h3>
                            <table class="table borderless table-striped">
                                <?php foreach ($userSelected->getOrganizationsJoined() as $organization): ?>
                                    <tr>
                                        <td>
                                            <!-- Name of organization -->
                                            <?php
                                            if (!$organization->getIsValidated() || $organization->getIsRejected()) {
                                                if ($user && ($user->isMemberOf($organization->id) || $user->hasRoleName(['Administrator']))) {
                                                    echo $this->html->link($organization->getName(), ['controller' => 'Organizations', 'action' => 'view', $organization->id]);
                                                } else {
                                                    echo $organization->getName();
                                                }
                                            } else {
                                                echo $this->html->link($organization->getName(), ['controller' => 'Organizations', 'action' => 'view', $organization->id]);
                                            }
                                            ?>
                                            <!-- Badge owner -->
                                            <?php
                                            if ($userSelected->isOwnerOf($organization->id)):
                                                ?>
                                                <span class="label label-info label-as-badge"><?= __('Owner'); ?></span>&nbsp;
                                                <?php
                                            endif;
                                            ?>

                                            <!-- Badge pending-->
                                            <?php
                                                if (!$organization->getIsValidated()):
                                            ?>
                                                <span
                                                    class="label label-warning label-as-badge"><?= __('Pending Validation'); ?>
                                                </span>&nbsp;
                                            <?php
                                                endif;
                                                if ($organization->getIsRejected()):
                                            ?>
                                                <span
                                                    class="label label-warning label-as-badge"><?= __('Archived'); ?>
                                                </span>&nbsp;
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
			<?php if (!empty($userSelected->svn_users)): ?>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3 class="header-title"><?= __('CVS added') ?> <?= $this->Wiki->addHelper('CVS'); ?></h3>
                            <table class="table borderless table-striped">
								<thead>
									<td> <?= __('Name') ?> </td>
									<td> <?= __('Source') ?> </td>
								</thead>
                                <?php foreach ($userSelected->svn_users as $svnUser): ?>
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