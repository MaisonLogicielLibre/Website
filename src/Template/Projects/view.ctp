<div class="users form col-lg-12 col-md-12 columns">
    <?= $this->cell('Sidebar::project', [$project->id]); ?>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <h2>
                    <?= $project->getName(); ?>
                </h2>
            </div>
            <div class="col-lg-8 col-md-8">
                <div style="min-height:200px">
                    <p><?= $project->getDescription(); ?></p>
                </div>
            </div>
            <?php if(!empty($project->contributors)): ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?= __('Contributors') ?></h3>
                    </div>
                    <table class="table table-striped">
                        <?php foreach($project->contributors as $contributor ): ?>
                        <tr>
                            <td><?= $this->html->link($contributor->getName(), ['controller' => 'Users', 'action' => 'view', $contributor->id]) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
            <?php endif; ?>
            <?php if(!empty($project->mentors)): ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?= __('Mentors') ?></h3>
                    </div>
                    <table class="table table-striped">
                        <?php foreach($project->mentors as $mentor ): ?>
                            <tr>
                                <td><?= $this->html->link($mentor->getName(), ['controller' => 'Users', 'action' => 'view', $mentor->id]) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
            <?php endif; ?>
            <?php if(!empty($project->organizations)): ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?= __('Organizations') ?></h3>
                    </div>
                    <table class="table table-striped">
                        <?php foreach($project->organizations as $organization ): ?>
                            <tr>
                                <td><?= $this->html->link($organization->getName(), ['controller' => 'Organizations', 'action' => 'view', $organization->id]) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
            <?php endif; ?>

    </div>
</div>