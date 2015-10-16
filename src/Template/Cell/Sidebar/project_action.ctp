<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <div class="panel panel-default">
        <div class="panel-body">
            <ul class="nav nav-pills nav-stacked">


                <!--
                    GENERAL
                -->


                <li class="<?= ($this->request->action == 'index') ? 'active disabled' : ''; ?>">
                    <a href=<?= $this->Url->build(
                        [
                            "controller" => "Projects",
                            "action" => "index"
                        ]); ?>>
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-list fa-stack-1x"
                                           style="color:<?= ($this->request->action == 'index') ? '#337ab7' : '#fff'; ?>"></i>
                                    </span> <?= __('List of projects') ?></a>
                </li>

                <!--
                    ADD
                -->
                <?php
                    if ($user):
                        if ($user->hasPermissionName(['add_project'])):
                ?>
                    <li class="<?= ($this->request->action == 'add') ? 'active disabled' : ''; ?>">
                        <a href=<?= $this->Url->build(
                            [
                                "controller" => "Projects",
                                "action" => "add"
                            ]); ?>>
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-plus fa-stack-1x"
                                               style="color:<?= ($this->request->action == 'add') ? '#337ab7' : '#fff'; ?>"></i>
                                        </span> <?= __('Add an projects') ?></a>
                    </li>
                    <?php
                        endif;
                        if ($user->hasPermissionName(['submit_project'])):
                    ?>
                    <li class="<?= ($this->request->action == 'submit') ? 'active disabled' : ''; ?>">
                        <a href=<?= $this->Url->build(
                            [
                                "controller" => "Projects",
                                "action" => "submit"
                            ]); ?>>
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-plus fa-stack-1x"
                                               style="color:<?= ($this->request->action == 'submit') ? '#337ab7' : '#fff'; ?>"></i>
                                        </span> <?= __('Submit a project') ?></a>
                    </li>
                <?php
                    endif;
                endif;
                ?>
            </ul>
            </ul>
        </div>
    </div>
</div>
