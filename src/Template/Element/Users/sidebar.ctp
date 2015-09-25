<?php $this->start('sidebarYou'); ?>
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <div class="panel panel-default">
        <div class="panel-body">
            <img src="<?= 'http://www.gravatar.com/avatar/' . (!empty($user) ? md5($user->getEmail()) : md5('no@email.com')) . '?s=512' ?>"
                 alt="avatar"
                 class="img-responsive center-block"/>
            <br/>
            <ul class="nav nav-pills nav-stacked">
                <?php if(!empty($user) && $user->getPortfolio() != null): ?>
                    <li><a href="<?= $user->getPortfolio() ?>">
                            <span class="fa-stack">
                                <i class="fa fa-square fa-stack-2x"></i>
                                <i class="fa fa-external-link fa-stack-1x" style="color:#fff;"></i>
                            </span> <?= __('Portfolio') ?></a></li>
                <?php endif; ?>
                <!-- BitBucket and GitHub links -->
            </ul>
            <ul class="nav nav-pills nav-stacked">
                <li>
                    <hr/>
                </li>
                <li class="<?= ($this->request->action == 'email') ? 'active disabled' : ''; ?>">
                    <a href=<?= $this->Url->build(
                        [
                            "controller" => "Users",
                            "action" => "email",
                            $user->id
                        ]); ?>>
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-pencil fa-stack-1x"
                                           style="color:<?= ($this->request->action == 'email') ? '#337ab7' : '#fff'; ?>"></i>
                                    </span> <?= __('Change email') ?></a></li>
                <li class="<?= ($this->request->action == 'password') ? 'active disabled' : ''; ?>">
                    <a href=<?= $this->Url->build(
                        [
                            "controller" => "Users",
                            "action" => "password",
                            $user->id
                        ]); ?>>
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-pencil fa-stack-1x"
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
                            $user->id
                        ]); ?>>
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-pencil fa-stack-1x"
                                           style="color:<?= ($this->request->action == 'edit') ? '#337ab7' : '#fff'; ?>"></i>
                                    </span> echo __('Edit profile') ?></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php $this->end(); ?>

<?php $this->start('sidebar'); ?>
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <div class="panel panel-default">
        <div class="panel-body">
            <img src="<?= 'http://www.gravatar.com/avatar/' . (!empty($user) ? md5($user->getEmail()) : md5('no@email.com')) . '?s=512' ?>"
                 alt="avatar"
                 class="img-responsive center-block"/>
            <br/>
            <ul class="nav nav-pills nav-stacked">
                <?php if(!empty($user) && $user->getPortfolio() != null): ?>
                    <li><a href="<?= $user->getPortfolio() ?>">
                            <span class="fa-stack">
                                <i class="fa fa-square fa-stack-2x"></i>
                                <i class="fa fa-external-link fa-stack-1x" style="color:#fff;"></i>
                            </span> <?= __('Portfolio') ?></a></li>
                <?php endif; ?>
                <!-- BitBucket and GitHub links -->
            </ul>
        </div>
    </div>
</div>
<?php $this->end(); ?>

