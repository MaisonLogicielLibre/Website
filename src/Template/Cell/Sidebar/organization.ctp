<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <div class="page-action">
        <div class="page-header">
            <img data-name="<?= $object->getName(); ?>" data-char-count="2" data-width="128" data-height="128"
                 class="initial img-circle img-responsive"/>
            <span><?= (!empty($object) ? $object->getName() : ''); ?></span>
            <?php if (!empty($object) && $object->getWebsite() != null): ?>
                <a href="<?= $object->getWebsite() ?>">
                    <?= __('Link') ?>
                </a>
            <?php endif; ?>
        </div>

        <ul class="nav nav-stacked">
            <li class="<?= ($this->request->action == 'view') && ($this->request->controller == 'Organizations') ? 'active' : ''; ?>">
                <a href="<?= $this->Url->build(
                    [
                        'controller' => 'Organizations',
                        'action' => 'view',
                        $object->id
                    ]) ?>">
                    <i class="fa fa-info"></i>
                    <?= __('Organization\'s page') ?>
                </a>
            </li>
            <?php
                if ($user):
            ?>

            <!--
            EDITION
            -->
            <?php
                if (($isOwner && $user->hasPermissionName(['edit_organization'])) || $user->hasPermissionName(['edit_organizations'])):
            ?>
            <li class="<?= ($this->request->action == 'addMember') && ($this->request->controller == 'Organizations') ? 'active' : ''; ?>">
                <a href="<?= $this->Url->build(
                    [
                        'controller' => 'Organizations',
                        'action' => 'addMember',
                        $object->id
                    ]) ?>">
                    <i class="fa fa-users"></i>
                    <?= __('Edit members') ?>
                </a>
            </li>
            <li class="<?= ($this->request->action == 'addOwner') && ($this->request->controller == 'Organizations') ? 'active' : ''; ?>">
                <a href="<?= $this->Url->build(
                    [
                        'controller' => 'Organizations',
                        'action' => 'addOwner',
                        $object->id
                    ]) ?>">
                    <i class="fa fa-user-md"></i>
                    <?= __('Edit owners') ?>
                </a>
            </li>
            <li class="<?= ($this->request->action == 'edit') && ($this->request->controller == 'Organizations') ? 'active' : ''; ?>">
                <a href="<?= $this->Url->build(
                    [
                        'controller' => 'Organizations',
                        'action' => 'edit',
                        $object->id
                    ]) ?>">
                    <i class="fa fa-pencil"></i>
                    <?= __('Edit the organization') ?>
                </a>
            </li>
            <?php
                endif;
                if ((($isMember || $isOwner) && $user->hasPermissionName(['add_project'])) || $user->hasPermissionName(['add_projects'])):
            ?>
            <li>
                <a href="<?= $this->Url->build(
                    [
                        'controller' => 'Projects',
                        'action' => 'add'
                    ]) ?>">
                    <i class="fa fa-plus"></i>
                    <?= __('Add project') ?>
                </a>
            </li>
            <?php
                endif;
                if ((($isMember || $isOwner) && $user->hasPermissionName(['submit_project'])) || $user->hasPermissionName(['submit_projects'])):
            ?>
            <li>
                <a href="<?= $this->Url->build(
                    [
                        'controller' => 'Projects',
                        'action' => 'submit'
                    ]) ?>">
                    <i class="fa fa-plus"></i>
                    <?= __('Submit project') ?>
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
                    <i class="fa fa-remove"></i>
                    <?= __('Quit the organization') ?>
                </a>
            </li>
            <?php
                endif;
                if ($user->hasPermissionName(['edit_organizations']) && !$object->getIsValidated()):
            ?>
            <li>
                <a href="<?= $this->Url->build(
                    [
                        "controller" => "Organizations",
                        "action" => "editValidated",
                        $object->id
                    ]); ?>">
                    <i class="fa fa-check fa-stack-1x" style="color:#fff;"></i>
                    <?= __('Approve the organization') ?>
                </a>
            </li>
            <?php
                endif;
                if ($user->hasPermissionName(['edit_organizations'] )):
            ?>
            <li>
                <a href="<?= $this->Url->build(
                    [
                        "controller" => "Organizations",
                        "action" => "editRejected",
                        $object->id
                    ]); ?>">
                    <i class="fa <?= ($object->getIsRejected() ? 'fa-check' : 'fa-minus' ) ?>"></i>
                    <?= ($object->getIsRejected() ? __('Approve the organization') : __('Reject the organization')) ?>
                </a>
            </li>
            <?php
                endif;
            endif;
            ?>
        </ul>
    </div>
</div>