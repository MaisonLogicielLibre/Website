<?php $this->start('sidebarYou'); ?>
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <div class="panel panel-default">
        <div class="panel-body">
            <img src="<?= 'http://www.gravatar.com/avatar/' . md5($user->getEmail()) . '?s=512' ?>"
                 alt="avatar"
                 class="img-responsive center-block"/>
            <br/>
            <ul class="nav nav-pills nav-stacked">
                <?php if($user->getPortfolio() != null): ?>
                    <li><a href="<?= $user->getPortfolio() ?>">
                            <span class="fa-stack">
                                <i class="fa fa-square fa-stack-2x"></i>
                                <i class="fa fa-external-link fa-stack-1x" style="color:#fff;"></i>
                            </span> Portfolio</a></li>
                <?php endif; ?>
                <!-- BitBucket and GitHub links -->
            </ul>
            <ul class="nav nav-pills nav-stacked">
                <li>
                    <hr/>
                </li>
                <li><a href="#">
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-pencil fa-stack-1x"
                                           style="color:<?= ($this->request->action == 'editPassword') ? '#337ab7' : '#fff'; ?>"></i>
                                    </span> Change email</a></li>
                <li><a href="#">
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-pencil fa-stack-1x"
                                           style="color:<?= ($this->request->action == 'editEmail') ? '#337ab7' : '#fff'; ?>"></i>
                                    </span> Change password</a></li>
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
                                    </span> Edit profile</a>
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
            <img src="<?= 'http://www.gravatar.com/avatar/' . md5($user->getEmail()) . '?s=512' ?>"
                 alt="avatar"
                 class="img-responsive center-block"/>
            <br/>
            <ul class="nav nav-pills nav-stacked">
                <?php if($user->getPortfolio() != null): ?>
                    <li><a href="<?= $user->getPortfolio() ?>">
                            <span class="fa-stack">
                                <i class="fa fa-square fa-stack-2x"></i>
                                <i class="fa fa-external-link fa-stack-1x" style="color:#fff;"></i>
                            </span> Portfolio</a></li>
                <?php endif; ?>
                <!-- BitBucket and GitHub links -->
            </ul>
        </div>
    </div>
</div>
<?php $this->end(); ?>

