<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <div class="panel panel-default">
        <div class="panel-body">

            <!--
            GENERAL
            -->

            <img src="<?= 'http://www.gravatar.com/avatar/' . (!empty($object) ? md5($object->getEmail()) : md5('no@email.com')) . '?s=512' ?>"
                 alt="avatar"
                 class="img-responsive center-block"/>
            <br/>
            <?php
            if ($isOwner):
            ?>
            <p><?= __('This avatar is a gravatar linked with your email. If you want change your avatar, go on '); ?><a href="http://gravatar.com/">gravatar.com</a></p>
            <?php
            endif;
            ?>
            <ul class="nav nav-pills nav-stacked">
                <?php if(!empty($object) && $object->getPortfolio() != null): ?>
                    <li><a href="<?= $object->getPortfolio() ?>">
                            <span class="fa-stack">
                                <i class="fa fa-square fa-stack-2x"></i>
                                <i class="fa fa-external-link fa-stack-1x" style="color:#fff;"></i>
                            </span> <?= __('Portfolio') ?></a></li>
            <?php endif;
            if ($user):
            ?>
                <!--
                EDITION
                -->
                    <?php
                    if (($user->hasPermissionName(['edit_user']) && $isOwner) || $user->hasPermissionName(['edit_users'])):
                    ?>
                    <li>
                        <hr/>
                    </li>
                    <li class="<?= ($this->request->action == 'email') ? 'active disabled' : ''; ?>">
                        <a href=<?= $this->Url->build(
                            [
                                "controller" => "Users",
                                "action" => "email",
                                $object->id
                            ]); ?>>
                            <span class="fa-stack">
                                <i class="fa fa-square fa-stack-2x"></i>
                                <i class="fa fa-envelope fa-stack-1x" style="color:<?= ($this->request->action == 'email') ? '#337ab7' : '#fff'; ?>"></i>
                            </span> <?= __('Change email') ?>
                        </a>
                    </li>
                    <li class="<?= ($this->request->action == 'password') ? 'active disabled' : ''; ?>">
                        <a href=<?= $this->Url->build(
                            [
                                "controller" => "Users",
                                "action" => "password",
                                $object->id
                            ]); ?>>
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-unlock-alt  fa-stack-1x"
                                               style="color:<?= ($this->request->action == 'password') ? '#337ab7' : '#fff'; ?>"></i>
                                        </span> <?= __('Change password') ?></a></li>
                    <!-- Modify phone link/form -->
                    <li>
                        <hr/>
                    </li>
                    <li class="<?= ($this->request->action == 'edit') ? 'active disabled' : ''; ?>">
                        <a href=<?= $this->Url->build(
                            [
                                "controller" => "Users",
                                "action" => "edit",
                                $object->id
                            ]); ?>>
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-pencil fa-stack-1x"
                                               style="color:<?= ($this->request->action == 'edit') ? '#337ab7' : '#fff'; ?>"></i>
                                        </span> <?= __('Edit profile') ?></a>
                    </li>
                    <?php
                    endif;
                    ?>


                    <!--
                    DELETE
                    -->


                    <?php
                    if (($user->hasPermissionName(['delete_user']) && $isOwner) || $user->hasPermissionName(['delete_users'])):
                    ?>
                    <li>
                        <hr/>
                    </li>
                    <li class="<?= ($this->request->action == 'delete') ? 'active disabled' : ''; ?>">
                        <a href=<?= $this->Url->build(
                            [
                                "controller" => "Users",
                                "action" => "delete",
                                $object->id
                            ]); ?>>
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-trash fa-stack-1x"
                                               style="color:<?= ($this->request->action == 'delete') ? '#337ab7' : '#fff'; ?>"></i>
                                        </span> <?= __('Delete profile') ?></a>
                    </li>
                    <?php
                    endif;
                endif;
                ?>
            </ul>
        </div>
    </div>
</div>