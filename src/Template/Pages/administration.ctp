<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h1 class="page-header"><?= __('Administration'); ?></h1>
        <?php
        $this->Html->addCrumb(__('Home'), '/');
        $this->Html->addCrumb(__('Administration'), '/Pages/administration');
        echo $this->Html->getCrumbList(); ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3 class="header-title"><?= __('Projects') ?></h3>
                <table class="table">
                    <?php foreach ($projects as $project):?>
                        <tr>
                            <td><?= $this->Html->link($project->getName(), ['controller' => 'Projects', 'action' => 'view', $project->id]); ?></td>
                            <td><?= $project->created ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <a class="btn btn-info pull-right"><?= __('Add project');?></a>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3 class="header-title"><?= __('Organizations') ?></h3>
                <table class="table">
                    <?php foreach ($organizations as $organization):?>
                        <tr>
                            <td><?= $this->Html->link($organization->getName(), ['controller' => 'Organizations', 'action' => 'view', $organization->id]); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <a class="btn btn-info pull-right"><?= __('Add organization');?></a>
            </div>
        </div>
    </div>
</div>