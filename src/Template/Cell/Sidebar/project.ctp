<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <div class="page-action">
        <div class="page-header">
            <img data-name="<?= $object->getName(); ?>" data-char-count="2" data-width="128" data-height="128"
                 class="initial img-circle img-responsive"/>
            <span><?= (!empty($object) ? $object->getName() : ''); ?></span>
            <?php if (!empty($object) && $object->getLink() != null): ?>
                <a href="<?= $object->getLink() ?>">
                    <?= __('Link') ?>
                </a>
            <?php endif; ?>
        </div>
        <ul class="nav nav-stacked">
            <li class="<?= ($this->request->action == 'view') && ($this->request->controller == 'Projects') ? 'active' : ''; ?>">
                <a href="<?= $this->Url->build(
                    [
                        'controller' => 'Projects',
                        'action' => 'view',
                        $object->id
                    ]) ?>">
                    <i class="fa fa-info"></i>
                    <?= __('Project\'s page') ?>
                </a>
            </li>
            <?php if ($user): ?>
                <?php
                if (($user->hasPermissionName(['edit_project']) && $isMentor) || $user->hasPermissionName(['edit_projects'])):
                    ?>
                    <li class="<?= ($this->request->action == 'edit') ? 'active' : ''; ?>">
                        <a href="<?= $this->Url->build(
                            [
                                'controller' => 'Projects',
                                'action' => 'edit',
                                $object->id
                            ]) ?>">
                            <i class="fa fa-pencil"></i>
                            <?= __('Edit the project') ?>
                        </a>
                    </li>
                    <li class="<?= ($this->request->action == 'editMentor') ? 'active' : ''; ?>">
                        <a href="<?= $this->Url->build(
                            [
                                'controller' => 'Projects',
                                'action' => 'editMentor',
                                $object->id
                            ]) ?>">
                            <i class="fa fa-pencil"></i>
                            <?= __('Edit project mentors') ?>
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
                            <i class="fa fa-check"></i>
                            <?= __('Accept the project') ?>
                        </a>
                    </li>
                    <?php
                endif;
                if (($user->hasPermissionName(['add_mission']) && $isMentor) || $user->hasPermissionName(['add_missions'])):
                    ?>
                    <li class="<?= ($this->request->action == 'add') ? 'active' : ''; ?>">
                        <a href=<?= $this->Url->build(
                            [
                                "controller" => "Missions",
                                "action" => "add",
                                $object->id
                            ]); ?>>

                            <i class="fa fa-plus"></i>
                            <?= __('Add mission') ?>
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
                            <i class="fa <?= ($object->isArchived() ? 'fa-check' : 'fa-remove') ?>"></i>
                            <?= (boolval($object->isArchived()) ? __('Restore the project') : __('Archive the project')) ?>
                        </a>
                    </li>
                    <?php
                endif;
            endif;
            ?>
        </ul>
    </div>
</div>
