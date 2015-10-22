<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <div class="panel panel-default">
        <div class="panel-body">
            <ul class="nav nav-pills nav-stacked">


                <!--
                GENERAL
                -->

                <?php if(!empty($object) && $object->getWebsite() != null): ?>
                    <li>
                        <a href="<?= $object->getWebsite() ?>">
                    <span class="fa-stack">
                        <i class="fa fa-square fa-stack-2x"></i>
                        <i class="fa fa-external-link fa-stack-1x" style="color:#fff;"></i>
                    </span><?= __('Website of the organization') ?>
                        </a>
                    </li>
                <?php
                    endif;
                    if ($user):
                ?>

                <!--
                EDITION
                -->
				<?php
                    if (($isOwner && $user->hasPermissionName(['edit_organization'])) || $user->hasPermissionName(['edit_organizations'])):
                ?>
                <li>
                    <a href="<?= $this->Url->build(
                        [
                            'controller' => 'Organizations',
                            'action' => 'addMember',
                            $object->id
                        ]) ?>">
                        <span class="fa-stack">
                            <i class="fa fa-square fa-stack-2x"></i>
                            <i class="fa fa-pencil fa-stack-1x" style="color:#fff;"></i>
                        </span> <?= __('Edit members') ?>
                    </a>
                </li>
				<li>
                    <a href="<?= $this->Url->build(
                        [
                            'controller' => 'Organizations',
                            'action' => 'addOwner',
                            $object->id
                        ]) ?>">
                        <span class="fa-stack">
                            <i class="fa fa-square fa-stack-2x"></i>
                            <i class="fa fa-pencil fa-stack-1x" style="color:#fff;"></i>
                        </span> <?= __('Edit owners') ?>
                    </a>
                </li>
				<li>
                    <a href="<?= $this->Url->build(
                        [
                            'controller' => 'Organizations',
                            'action' => 'edit',
                            $object->id
                        ]) ?>">
                        <span class="fa-stack">
                            <i class="fa fa-square fa-stack-2x"></i>
                            <i class="fa fa-external-link fa-stack-1x" style="color:#fff;"></i>
                        </span> <?= __('Edit the organization') ?>
                    </a>
                </li>
                <?php
                    endif;
					if ($isMember):
				?>
				<li>
                    <a href="<?= $this->Url->build(
                        [
                            'controller' => 'Organizations',
                            'action' => 'quit',
                            $object->id
                        ]) ?>">
                        <span class="fa-stack">
                            <i class="fa fa-square fa-stack-2x"></i>
                            <i class="fa fa-remove fa-stack-1x" style="color:#fff;"></i>
                        </span> <?= __('Quit the organization') ?>
                    </a>
                </li>
                <?php
                    endif;
                    if ($user->hasPermissionName(['edit_organizations']) && !$object->getIsValidated()):
                ?>
                <li>
                    <a href=<?= $this->Url->build(
                        [
                            "controller" => "Organizations",
                            "action" => "editValidated",
                            $object->id
                        ]); ?>>
                                <span class="fa-stack">
                                    <i class="fa fa-square fa-stack-2x"></i>
                                    <i class="fa fa-check fa-stack-1x" style="color:#fff;"></i>
                                </span> <?= __('Approve the organization') ?>
                    </a>
                </li>
                <?php
                    endif;
                    if ($user->hasPermissionName(['edit_organizations'] )):
                ?>
                <li>
                    <a href=<?= $this->Url->build(
                        [
                            "controller" => "Organizations",
                            "action" => "editRejected",
                            $object->id
                        ]); ?>>
                                <span class="fa-stack">
                                    <i class="fa fa-square fa-stack-2x"></i>
                                    <i class="fa <?= ($object->getIsRejected() ? 'fa-check' : 'fa-minus' ) ?> fa-stack-1x" style="color:#fff;"></i>
                                </span> <?= ($object->getIsRejected() ? __('Approve the organization') : __('Reject the organization')) ?>
                    </a>
                </li>
                <?php
                    endif;
                endif;
                ?>
            </ul>
        </div>
    </div>
</div>