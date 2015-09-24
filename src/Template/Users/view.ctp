<div class="row">
    <div class="users form col-lg-12 col-md-12 columns">
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
                    </ul>
                    <ul class="nav nav-pills nav-stacked">
                        <?php if ($you) : ?>
                            <li>
                                <hr/>
                            </li>
                            <li><a href="#">
                                <span class="fa-stack">
                                    <i class="fa fa-square fa-stack-2x"></i>
                                    <i class="fa fa-envelope fa-stack-1x" style="color:#fff"></i>
                                </span> Change email</a></li>
                            <li><a href="#">
                                <span class="fa-stack">
                                    <i class="fa fa-square fa-stack-2x"></i>
                                    <i class="fa fa-lock fa-stack-1x" style="color:#fff;"></i>
                                </span> Change password</a></li>
                            <li>
                                <hr/>
                            </li>
                            <li><a href=<?= $this->Url->build(
                                    [
                                        "controller" => "Users",
                                        "action" => "edit",
                                        $user->id
                                    ]); ?>>
                                <span class="fa-stack">
                                    <i class="fa fa-square fa-stack-2x"></i>
                                    <i class="fa fa-pencil fa-stack-1x" style="color:#fff;"></i>
                                </span> Edit profile</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <h2>
                    <?= (!(empty($user->getName())) ? $user->getName() : $user->getUsername()); ?>
                </h2>
                <?php if($user->getUniversity() != null): ?>
                <h4>
                    <?= $user->getUniversity()->getName(); ?>
                </h4>
                <?php endif; ?>
            </div>
            <div class="col-lg-8 col-md-8">
                <div style="min-height:200px">
                    <p><?= (!(empty($user->getBiography())) ? $user->getBiography() : 'Votre biographie') ?></p>
                </div>
            </div>
        </div>
    </div>
</div>