<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h1 class="page-header"><?= __('List of projects'); ?> <?= $this->Wiki->addHelper('Projects'); ?></h1>
        <?php
        $this->Html->addCrumb(__('Home'), '/');
        $this->Html->addCrumb(__('Projects'), '/Projects');
        $this->Html->addCrumb(__('List of projects'));

        echo $this->Html->getCrumbList(); ?>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-body">
        <?= $this->Form->create($projects); ?>
        <div class="col-xs-12 col-md-12 col-sm-12">
            <?= $this->Form->input('name', ['required' => false]); ?>
        </div>
        <div class="col-xs-12">
            <?= $this->Form->button(__('Search for a project'), ['class' => 'btn btn-info']) ?>
        </div>
        <?= $this->Form->end(); ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3 class="header-title"><?= __('List of projects'); ?></h3>
                <div class="table-responsive">
                    <table id="projects" class="table table-striped table-bordered dataTable">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('Organizations.name', __('Organization')) ?></th>
                                <th><?= $this->Paginator->sort('name', __('Project')) ?></th>
                                <th><?= __('Link'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($projects as $project): ?>
                                <tr>
                                    <td class="hide-mobile">
                                        <?php if (isset($project->organization['name'])) {
                                            echo $this->Html->link(
                                                $project->organization['name'],
                                                ['controller' => 'Organizations', 'action' => 'view',$project->organization['id']]
                                            );
                                        } else {
    echo 'not specified';
} ?>
                                    </td>
                                    <td><?= $this->Html->link($project->name, ['controller' => 'Projects', 'action' => 'view', $project->id]); ?></td>
                                    <td><?= $this->Html->link($project->link, $project->link); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="paginator">
        <ul class="pagination col-lg-12 col-md-12 col-xs-12">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
    </div>
</div>
<?= $this->Html->script(
            [
            'jquery-2.1.4.min.js',
            'bootstrap.min.js'
            ]
        );
?>
