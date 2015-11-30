<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li class="<?= ($this->request->controller == 'Pages' && $this->request->action == 'home') ? 'active' : ''; ?>">
            <a href="<?= $this->Url->build(['controller' => 'pages', 'action' => 'home']); ?>">
                <i class="fa fa-home fa-lg"></i>Home</a>
        </li>
        <li class="<?= ($this->request->controller == 'Organizations') ? 'active' : ''; ?>">
            <a href="javascript:;" data-toggle="collapse" data-target="#organizations-submenu">
                <i class="fa fa-lg fa-suitcase"></i>
                <?= __('Organizations'); ?>
                <span class="label label-info label-as-badge pull-right">2</span>
            </a>
            <ul id="organizations-submenu" class="<?= ($this->request->controller == 'Organizations') ? 'collapse in' : 'collapse'; ?>">
                <li>
                    <a href="<?= $this->Url->build(['controller' => 'Organizations', 'action' => 'index']); ?>">
                        <i class="fa fa-list-ul"></i>
                        <?= __('List of organizations'); ?>
                    </a>
                </li>
                <li>
                    <a href="<?= $this->Url->build(['controller' => 'Organizations', 'action' => 'submit']); ?>">
                        <i class="fa fa-suitcase"></i>
                        <?= __('Submit an organization'); ?>
                    </a>
                </li>
            </ul>
        </li>
        <li class="<?= ($this->request->controller == 'Projects') ? 'active' : ''; ?>">
            <a href="javascript:;" data-toggle="collapse" data-target="#projects-submenu">
               <i class="fa fa-lg fa-cubes"></i>
                <?= __('Projects'); ?>
                <span class="label label-info label-as-badge pull-right">2</span>
            </a>
            <ul id="projects-submenu" class="<?= ($this->request->controller == 'Projects') ? 'collapse in' : 'collapse'; ?>">
                <li>
                    <a href="<?= $this->Url->build(['controller' => 'Projects', 'action' => 'index']); ?>">
                        <i class="fa fa-list-ul"></i>
                        <?= __('List of projects'); ?>
                    </a>
                </li>
                <li>
                    <a href="<?= $this->Url->build(['controller' => 'Projects', 'action' => 'submit']); ?>">
                        <i class="fa fa-cube"></i>
                        <?= __('Submit a project'); ?>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#activities-submenu">
                <i class="fa fa-lg fa-calendar"></i>
                <?= __('Activities') ?>
                <span class="label label-info label-as-badge pull-right">3</span>
            </a>
            <ul id="activities-submenu" class="collapse">
				<li>
                    <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'news']); ?>">
                    <i class="fa fa-newspaper-o"></i>
                    <?= __('News'); ?>
                    </a>
                </li>
                <li>
                    <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'meetup']); ?>">
                    <i class="fa fa-comments-o"></i>
                    <?= __('Meetup'); ?>
                    </a>
                </li>
                <li>
                    <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'survey']); ?>">
                    <i class="fa fa-pencil-square-o"></i>
                       <?= __('Survey'); ?>
                   </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#partners-submenu">
                <i class="fa fa-lg fa-users"></i>
                <?= __('Partners') ?>
                <span class="label label-info label-as-badge pull-right">3</span>
            </a>
            <ul id="partners-submenu" class="collapse">
                <li>
                    <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'industry']); ?>">
                        <i class="fa fa-industry"></i>
                        <?= __('Industry'); ?>
                    </a>
                </li>
                <li>
                    <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'academic']); ?>">
                        <i class="fa fa-graduation-cap"></i>
                        <?= __('Academic'); ?>
                    </a>
                </li>
                <li>
                    <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'association']); ?>">
                        <i class="fa fa-male"></i>
                        <?= __('Association'); ?>
                    </a>
                </li>
				<li>
                    <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'government']); ?>">
                        <i class="fa fa-bank"></i>
                        <?= __('Government'); ?>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>