<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h1 class="page-header"><?= __('Statistics'); ?></h1>
        <?php
        $this->Html->addCrumb(__('Home'), '/');
        $this->Html->addCrumb(__('Statistics'), '/Pages/statistics');
        echo $this->Html->getCrumbList(); ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('Contributions'); ?></h1>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-blue">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-code-fork fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">
                            <?= $stats['repository']['pullRequests']; ?>
                        </div>
                        <div>
                            <?= __('Pull requests'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-code-fork fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">
                            <?= $stats['repository']['issues']; ?>
                        </div>
                        <div>
                            <?= __('Issues'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-code-fork fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">
                            <?= $stats['repository']['commits']; ?>
                        </div>
                        <div>
                            <?= __('Commits'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('Users'); ?></h1>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-blue">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">
                            <?= $stats['users']['count']; ?>
                        </div>
                        <div>
                            <?= __('Users'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-graduation-cap fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">
                            <?= $stats['users']['students']; ?>
                        </div>
                        <div>
                            <?= __('Students'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-child fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">
                            <?= $stats['users']['mentors']; ?>
                        </div>
                        <div>
                            <?= __('Available for mentoring'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= __('Projects'); ?></h1>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-blue">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-suitcase fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">
                            <?= $stats['website']['organizations']; ?>
                        </div>
                        <div>
                            <?= __('Organizations'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-cubes fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">
                            <?= $stats['website']['projects']; ?>
                        </div>
                        <div>
                            <?= __('Projects'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text-o fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">
                            <?= $stats['website']['missions']; ?>
                        </div>
                        <div>
                            <?= __('Missions'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3 class="header-title">Utilisateurs par université</h3>
                <?= $this->GoogleChart->create("ColumnChart", "chart3")
                    ->addColumns([[
                        'string',
                        'Name'
                    ], [
                        'number',
                        'Users'
                    ]])
                    ->addRows(
                        $stats['users']['universities']
                    )
                    ->setOptions([
                        'height' => 300,
                        'legend' => 'none',
                        'vAxis' => ['format' => '#']
                    ])
                ?>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3 class="header-title"><?= __('Contributions to the ML² website project') ?></h3>
                <?= $this->GoogleChart->create("AreaChart", "chart1")
                    ->addColumns([
                        [
                            'string',
                            'Date'
                        ], [
                            'number',
                            'contribution'
                        ]])
                    ->addRows(
                        $contributions
                    )
                    ->setOptions([
                        'height' => 300,
                        'legend' => 'none',
                        'vAxis' => ['format' => '#']
                    ])
                ?>
            </div>
        </div>
    </div>
</div>