<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <div class="panel panel-default">
        <div class="panel-body">
            <ul class="nav nav-pills nav-stacked">

                <!--
                GENERAL
                -->

                <li class="<?= ($this->request->action == 'view') && ($this->request->controller == 'Projects') ? 'active disabled' : ''; ?>">
                    <a href="<?= $this->Url->build(
                        [
                            'controller' => 'Projects',
                            'action' => 'view',
                            $object->id
                        ]) ?>">
                            <span class="fa-stack">
                                <i class="fa fa-square fa-stack-2x"></i>
                                <i class="fa fa-info fa-stack-1x" style="color:<?= ($this->request->action == 'view')  && ($this->request->controller == 'Projects') ? '#337ab7' : '#fff'; ?>"></i>
                            </span> <?= __('Project\'s page') ?>
                    </a>
                </li>
               <?php if(!empty($object) && $object->getLink() != null): ?>
                <li>
                    <a href="<?= $object->getLink() ?>">
                        <span class="fa-stack">
                            <i class="fa fa-square fa-stack-2x"></i>
                            <i class="fa fa-external-link fa-stack-1x" style="color:#fff;"></i>
                        </span> <?= __('Website of the project') ?>
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
                if (($user->hasPermissionName(['edit_project']) && $isMentor) || $user->hasPermissionName(['edit_projects'])):
                ?>
                <li>
                    <hr/>
                </li>
                <li  class="<?= ($this->request->action == 'edit') ? 'active disabled' : ''; ?>">
                    <a href="<?= $this->Url->build(
                        [
                            'controller' => 'Projects',
                            'action' => 'edit',
                            $object->id
                        ]) ?>">
                            <span class="fa-stack">
                                <i class="fa fa-square fa-stack-2x"></i>
                                <i class="fa fa-pencil fa-stack-1x" style="color:<?= ($this->request->action == 'edit') ? '#337ab7' : '#fff'; ?>"></i>
                            </span> <?= __('Edit the project') ?>
                    </a>
                </li>
                <?php
                    endif;
                    if ($user->hasPermissionName(['edit_projects']) && !$object->isAccepted()):
                ?>
                    <li>
                        <a href=<?= $this->Url->build(
                            [
                                "controller" => "Projects",
                                "action" => "editAccepted",
                                $object->id
                            ]); ?>>
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-check fa-stack-1x" style="color:#fff;"></i>
                                    </span> <?= __('Accept the project') ?>
                        </a>
                    </li>
                <?php
                    endif;
                    if (($user->hasPermissionName(['add_mission']) && $isMentor) || $user->hasPermissionName(['add_missions'])):
                ?>
                    <li class="<?= ($this->request->action == 'add') ? 'active disabled' : ''; ?>">
                        <a href=<?= $this->Url->build(
                            [
                                "controller" => "Missions",
                                "action" => "add",
                                $object->id
                            ]); ?>>
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-plus fa-stack-1x" style="color:<?= ($this->request->action == 'add') ? '#337ab7' : '#fff'; ?>"></i>
                                    </span> <?= __('Add mission') ?>
                        </a>
                    </li>
                <?php
                    endif;
                    if (($user->hasPermissionName(['edit_project']) && $isMentor) || $user->hasPermissionName(['edit_projects'])):
                ?>
                    <li>
                        <a href=<?= $this->Url->build(
                            [
                                "controller" => "Projects",
                                "action" => "editArchived",
                                $object->id
                            ]); ?>>
                                <span class="fa-stack">
                                    <i class="fa fa-square fa-stack-2x"></i>
                                    <i class="fa <?= ($object->isArchived() ? 'fa-check' : 'fa-minus' ) ?> fa-stack-1x" style="color:#fff;"></i>
                                </span> <?= (boolval($object->isArchived()) ? __('Restore the project') : __('Archive the project') ) ?>
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