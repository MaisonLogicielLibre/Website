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
            <a href="#">
                <span class="fa-stack fa-lg pull-left"><i class="fa fa-tasks fa-stack-1x"></i></span>
                <?= __('Projects'); ?>
                <span class="label label-default pull-right">4</span>
            </a>
            <ul class="nav-stacked">
                <li><?= $this->Html->link(__('List of organizations'), ['controller' => 'Organizations', 'action' => 'index']); ?></li>
                <li><?= $this->Html->link(__('Submit an organization'), ['controller' => 'Organizations', 'action' => 'submit']); ?></li>
                <li><?= $this->Html->link(__('List of projects'), ['controller' => 'Projects', 'action' => 'index']); ?></li>
                <li><?= $this->Html->link(__('Submit a project'), ['controller' => 'Projects', 'action' => 'submit']); ?></li>
            </ul>
        </li>a
        <li>
            <a href="#">
                <span class="fa-stack fa-lg pull-left"><i class="fa fa-calendar fa-stack-1x"></i></span>
                <?= __('Activities') ?>
                <span class="label label-default pull-right">2</span>
            </a>
            <ul class="nav-stacked">
                <li><?= $this->Html->link(__('Meetup'), ['controller' => 'Pages', 'action' => 'meetup']); ?></li>
                <li><?= $this->Html->link(__('Survey'), ['controller' => 'Pages', 'action' => 'survey']); ?></li>
            </ul>
        </li>
        <li>
            <a href="#">
                <span class="fa-stack fa-lg pull-left"><i class="fa fa-users fa-stack-1x"></i></span>
                <?= __('Partners') ?>
                <span class="label label-default pull-right">4</span>
            </a>
            <ul class="nav-stacked">
                <li><?= $this->Html->link(__('Industry'), ['controller' => 'Pages', 'action' => 'industry']); ?></li>
                <li><?= $this->Html->link(__('Academic'), ['controller' => 'Pages', 'action' => 'academic']); ?></li>
                <li><?= $this->Html->link(__('Associations'), ['controller' => 'Pages', 'action' => 'aso']); ?></li>
            </ul>
        </li>
    </ul>
</div>