<?php $this->start('actionAdminSidebar'); ?>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li class="<?= ($this->request->action == 'index') ? 'active disabled' : ''; ?>">
                        <a href=<?= $this->Url->build(
                            [
                                "controller" => "Organizations",
                                "action" => "index"
                            ]); ?>>
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-list fa-stack-1x"
                                           style="color:<?= ($this->request->action == 'index') ? '#337ab7' : '#fff'; ?>"></i>
                                    </span> <?= __('List of organizations') ?></a>
                    </li>
                    <li class="<?= ($this->request->action == 'add') ? 'active disabled' : ''; ?>">
                        <a href=<?= $this->Url->build(
                            [
                                "controller" => "Organizations",
                                "action" => "add"
                            ]); ?>>
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-list fa-stack-1x"
                                           style="color:<?= ($this->request->action == 'add') ? '#337ab7' : '#fff'; ?>"></i>
                                    </span> <?= __('Add an organization') ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<?php $this->end(); ?>
<?php $this->start('actionSidebar'); ?>
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <div class="panel panel-default">
        <div class="panel-body">
            <ul class="nav nav-pills nav-stacked">
                <li class="<?= ($this->request->action == 'index') ? 'active disabled' : ''; ?>">
                    <a href=<?= $this->Url->build(
                        [
                            "controller" => "Organizations",
                            "action" => "index"
                        ]); ?>>
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-list fa-stack-1x"
                                           style="color:<?= ($this->request->action == 'index') ? '#337ab7' : '#fff'; ?>"></i>
                                    </span> <?= __('List of organizations') ?></a>
                </li>
                <li class="<?= ($this->request->action == 'submit') ? 'active disabled' : ''; ?>">
                    <a href=<?= $this->Url->build(
                        [
                            "controller" => "Organizations",
                            "action" => "submit"
                        ]); ?>>
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-list fa-stack-1x"
                                           style="color:<?= ($this->request->action == 'submit') ? '#337ab7' : '#fff'; ?>"></i>
                                    </span> <?= __('Submit an organization') ?></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php $this->end(); ?>
