<?= $this->Html->css('dataTables.bootstrap.min', ['block' => 'cssTop']); ?>
<?= $this->Html->css('bootstrap-switch.min', ['block' => 'cssTop']); ?>
<div class="row">
<?= $this->cell('Sidebar::mission', [$mission->id]); ?>
<?php $Parsedown = new Parsedown(); ?>
<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
    <div class="row-fluid">
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 no-pading">
            <div class="clearfix">
                <h2 class="pull-left">
                    <?= $mission->getName() ?>
                </h2>
				<a href="<?= $this->Url->build(['controller' => 'Missions', 'action' => 'apply', $mission->getId()]); ?>"><h2 class="btn btn-danger pull-right"><?= __('I accept the mission!'); ?></h2></a>
            </div>
				<?= __('Your mission, should you choose to accept it, ...') ?>
                <div class="bs-callout bs-callout-warning">
                    <h4><?= __('Description'); ?></h4>

                    <p><?= $Parsedown->text($mission->getDescription()); ?></p>
                </div>

                </p>
                <div class="bs-callout bs-callout-primary">
                    <h4><?= __('Skills'); ?></h4>

                    <p><?= $Parsedown->text($mission->getCompetence()); ?></p>
                </div>
				<?php 
		if($user) { 
			if ($user->hasPermissionName(['edit_mission', 'edit_missions'])) {?>
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title"><?= __('List of applications'); ?></h3>
					</div>
					<div class="table-responsive">
						<table id="applications" class="table table-striped table-bordered table-hover dataTable">
							<thead>
							<tr>
								<th><?= __('Name'); ?></th>
								<th><?= __('Approved'); ?></th>
								<th><?= __('Rejected'); ?></th>
							</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
	<?php } } ?>
        </div>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="padding-right:0;">
			<div class="panel panel-warning">
				<div class="panel-heading">
					<h3 class="panel-title"><?= __('Mission details'); ?></h3>
				</div>
				<table class="table table-striped table-responsive">
					<tr>
						<td style="white-space:pre"><strong><?= __('Term:'); ?></strong></td>
						<td><?= $mission->getSession(); ?></td>
					</tr>
					<tr>
						<td style="white-space:pre"><strong><?= __('Length:'); ?></strong></td>
						<td><?= $mission->getLength(); ?></td>
					</tr>
					<tr>
						<td style="white-space:pre"><strong><?= __('Places available:'); ?></strong></td>
						<td><?= $mission->getInternNbr(); ?></td>
					</tr>
					<tr>
						<td style="white-space:pre"><strong><?= __('School year:'); ?></strong></td>
						<td><?= implode(', ', array_map(function ($v) {
								return $v->getName();
							}, $mission->getLevels())) ?></td>
					</tr>
					<tr>
						<td style="white-space:pre"><strong><?= __('Looking for:'); ?></strong></td>
						<td><?= implode(', ', array_map(function ($v) {
								return $v->getName();
							}, $mission->getType())) ?></td>
					</tr>
					<tr>
						<td style="white-space:pre"><strong><?= __('Mentor:'); ?></strong></td>
						<td>
							<a href="<?= $this->Url->Build(['controller' => 'users', 'action' => 'view', $mission->getMentorId()]); ?>"><?= $mission->getMentor()->getName(); ?></a>
						</td>
					</tr>
				</table>
			</div>
			<?php foreach ($mission->getProject()->getOrganizations() as $org): ?>
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title"><?= __('Company information'); ?></h3>
					</div>
					<table class="table table-bordered table-responsive">
						<tr>
							<td style="border-right:none;"><strong><?= __('Company:'); ?></strong></td>
							<td style="border-left:none"><?= $org->getName(); ?></td>
						</tr>
						<?php if (!empty($org->getWebsite())) : ?>
							<tr>
								<td style="border-right:none;"><strong><?= __('Website:'); ?></strong></td>
								<td style="border-left:none;"><a
										href="<?= $org->getWebsite(); ?>"><?= $org->getWebsite() ?></a></td>
							</tr>
						<?php endif; ?>
						<tr>
							<td style="border-right:none;"><strong><?= __('Full company details'); ?></strong></td>
							<td style="border-left:none;"><a
									href="<?= $this->Url->Build(['controller' => 'Organizations', 'action' => 'view', $org->getId()]); ?>"><?= __('See'); ?></a>
							</td>
						</tr>
					</table>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
       <!-- Add DataTables scripts -->
    <?= $this->Html->script(
        [
            'datatables/jquery.dataTables.min',
            'datatables/dataTables.bootstrap.min',
            'DataTables.cakephp.dataTables',
            'bootstrap/bootstrap-switch.min'
        ],
        ['block' => 'scriptBottom']);
    ?>

    <?php
    $this->Html->scriptStart(['block' => 'scriptBottom']);
    echo $this->DataTables->init([
        'ajax' => [
            'url' => $this->Url->build(['action' => 'view', $mission->getId()]),
        ],
        'deferLoading' => $recordsTotal,
        'delay' => 600,
        "sDom" => "<'row'<'col-xs-6'l>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
        'columns' => [
            [
                'name' => 'applications.user_id',
                'data' => 'user_id',
                'searchable' => false
            ],
            [
                'name' => 'applications.accepted',
                'data' => 'accepted',
                'searchable' => false
            ],
            [
                'name' => 'applications.rejected',
                'data' => 'rejected',
                'searchable' => false
            ]
        ],
        'lengthMenu' => ''
    ])->draw('.dataTable');
    echo 'var ajaxUrl="' . $this->Url->Build(['action' => 'editApplicationStatus']) . '";';
    echo 'var userUrl="' . $this->Url->Build(['controller' => 'Users', 'action' => 'view']) . '";';
    $this->Html->scriptEnd();
    ?>
    <?= $this->Html->script('missions/view.js', ['block' => 'scriptBottom']); ?>