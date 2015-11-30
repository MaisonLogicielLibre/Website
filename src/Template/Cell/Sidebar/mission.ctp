<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <div class="page-action">
        <div class="page-header">
            <img data-name="<?= $object->project->getName(); ?>" data-char-count="2" data-width="128" data-height="128"
                 class="initial img-circle img-responsive"/>
            <span><?= (!empty($object) ? $object->project->getName() : ''); ?></span>
            <?php if (!empty($object) && $object->project->getLink() != null): ?>
                <a href="<?= $object->project->getLink() ?>">
                    <?= __('Link') ?>
                </a>
            <?php endif; ?>
        </div>

        <ul class="nav nav-stacked">
                <li>
                    <a href="<?= $this->Url->build(
                        [
                            'controller' => 'Projects',
                            'action' => 'view',
                            $object->project_id
                        ]) ?>">
                        <i class="fa fa-info"></i>
                        <?= __('Project\'s page') ?>
                    </a>
                </li>

                <?php
                if ($user):
                    if (($user->hasPermissionName(['edit_mission']) && ($isMentor)) || $user->hasPermissionName(['edit_missions'])):
                ?>
					<li class="<?= ($this->request->action == 'editMentor') ? 'active' : ''; ?>">
                    <a href="<?= $this->Url->build(
                        [
                            'controller' => 'Missions',
                            'action' => 'editMentor',
                            $object->id
                        ]) ?>">
                        <i class="fa fa-pencil"></i>
                        <?= __('Edit the mentor') ?>
                    </a>
					</li>
                <?php
                    endif;
                    if (($user->hasPermissionName(['edit_mission']) && $isMentor) || $user->hasPermissionName(['edit_missions'])):
                ?>
					<li class="<?= ($this->request->action == 'edit') ? 'active' : ''; ?>">
                    <a href="<?= $this->Url->build(
                        [
                            'controller' => 'Missions',
                            'action' => 'edit',
                            $object->id
                        ]) ?>">
                        <i class="fa fa-pencil"></i>
                        <?= __('Edit the mission') ?>
                    </a>
					</li>
                    <li>
                        <a href=<?= $this->Url->build(
                            [
                                "controller" => "Missions",
                                "action" => "editArchived",
                                $object->id
                            ]); ?>>
                            <i class="fa <?= ($object->isArchived() ? 'fa-check' : 'fa-remove' ) ?>"></i>
                            <?= (boolval($object->isArchived()) ? __('Restore the mission') : __('Archive the mission') ) ?>
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