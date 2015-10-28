<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <div class="panel panel-default">
        <div class="panel-body">
            <ul class="nav nav-pills nav-stacked">

                <!--
                GENERAL
                -->

                <li>
                    <a href="<?= $this->Url->build(
                        [
                            'controller' => 'Projects',
                            'action' => 'view',
                            $object->project_id
                        ]) ?>">
                            <span class="fa-stack">
                                <i class="fa fa-square fa-stack-2x"></i>
                                <i class="fa fa-info fa-stack-1x" style="color:<?= ($this->request->action == 'view')  && ($this->request->controller == 'Projects') ? '#337ab7' : '#fff'; ?>"></i>
                            </span> <?= __('Project\'s page') ?>
                    </a>
                </li>
                <?php
                if ($user):
                ?>


                <!--
                EDITION
                -->


                <?php
                if (($user->hasPermissionName(['edit_mission']) && $isMentor) || $user->hasPermissionName(['edit_missions'])):
                ?>
                <li>
                    <hr/>
                </li>
                <li class="<?= ($this->request->action == 'edit') ? 'active disabled' : ''; ?>">
                    <a href="<?= $this->Url->build(
                        [
                            'controller' => 'Missions',
                            'action' => 'edit',
                            $object->id
                        ]) ?>">
                            <span class="fa-stack">
                                <i class="fa fa-square fa-stack-2x"></i>
                                <i class="fa fa-pencil fa-stack-1x" style="color:<?= ($this->request->action == 'edit') ? '#337ab7' : '#fff'; ?>"></i>
                            </span> <?= __('Edit the mission') ?>
                    </a>
                </li>
                <?php
                    endif;
                    if (($user->hasPermissionName(['edit_mission']) && $isMentor) || $user->hasPermissionName(['edit_missions'])):
                ?>
                    <li>
                        <a href=<?= $this->Url->build(
                            [
                                "controller" => "Missions",
                                "action" => "editArchived",
                                $object->id
                            ]); ?>>
                                <span class="fa-stack">
                                    <i class="fa fa-square fa-stack-2x"></i>
                                    <i class="fa <?= ($object->isArchived() ? 'fa-check' : 'fa-minus' ) ?> fa-stack-1x" style="color:#fff;"></i>
                                </span> <?= (boolval($object->isArchived()) ? __('Restore the mission') : __('Archive the mission') ) ?>
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