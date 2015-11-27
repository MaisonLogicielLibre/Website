<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li class="menu-title">
            <?= __('Navigation'); ?>
        </li>
        <li class="active">
            <a href="<?= $this->Url->build(['controller' => 'pages', 'action' => 'home']); ?>"><span
                    class="fa-stack fa-lg pull-left"><i class="fa fa-home fa-stack-1x"></i></span>Home</a>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#projects-submenu">
                <span class="fa-stack fa-lg pull-left"><i class="fa fa-cubes fa-stack-1x"></i></span>
                <?= __('Projects'); ?>
                <span class="label label-default pull-right">4</span>
            </a>
            <ul id="projects-submenu" class="collapse">
                <li>
                    <a href="<?= $this->Url->build(['controller' => 'Organizations', 'action' => 'index']); ?>">
                    <span class="fa-stack fa-lg pull-left"><i class="fa fa-list-ul fa-stack-1x"></i></span>
                    <?= __('List of organizations'); ?>
                    </a>
                </li>
                <li>
                    <a href="<?= $this->Url->build(['controller' => 'Organizations', 'action' => 'submit']); ?>">
                        <span class="fa-stack fa-lg pull-left"><i class="fa fa-suitcase fa-stack-1x"></i></span>
                        <?= __('Submit an organization'); ?>
                    </a>
                </li>
                <li>
                    <a href="<?= $this->Url->build(['controller' => 'Projects', 'action' => 'index']); ?>">
                        <span class="fa-stack fa-lg pull-left"><i class="fa fa-list-ul fa-stack-1x"></i></span>
                        <?= __('List of projects'); ?>
                    </a>
                </li>
                <li>
                    <a href="<?= $this->Url->build(['controller' => 'Projects', 'action' => 'submit']); ?>">
                        <span class="fa-stack fa-lg pull-left"><i class="fa fa-cube fa-stack-1x"></i></span>
                        <?= __('Submit a project'); ?>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#activities-submenu">
                <span class="fa-stack fa-lg pull-left"><i class="fa fa-calendar fa-stack-1x"></i></span>
                <?= __('Activities') ?>
                <span class="label label-default pull-right">2</span>
            </a>
            <ul id="activities-submenu" class="collapse">
                <li><?= $this->Html->link(__('Meetup'), ['controller' => 'Pages', 'action' => 'meetup']); ?></li>
                <li><?= $this->Html->link(__('Survey'), ['controller' => 'Pages', 'action' => 'survey']); ?></li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#partners-submenu">
                <span class="fa-stack fa-lg pull-left"><i class="fa fa-users fa-stack-1x"></i></span>
                <?= __('Partners') ?>
                <span class="label label-default pull-right">4</span>
            </a>
            <ul id="partner-submenu" class="collapse">
                <li><?= $this->Html->link(__('Industry'), ['controller' => 'Pages', 'action' => 'industry']); ?></li>
                <li><?= $this->Html->link(__('Academic'), ['controller' => 'Pages', 'action' => 'academic']); ?></li>
                <li><?= $this->Html->link(__('Associations'), ['controller' => 'Pages', 'action' => 'aso']); ?></li>
            </ul>
        </li>
    </ul>
</div>