<div class="row">
	<div class="col-sm-5 col-sm-offset-1">
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
			'title' => __('Contributions to the ML² website project'),
			'legend' => 'none',
			'vAxis' => ['format' => '#']
		])
		?>
	</div>
	<div class="col-sm-3" style="margin-top:50px">
		<div class="panel panel-warning">
			<table class="table table-striped table-responsive">
				<div class="panel-heading">
					<h3 class="panel-title"><?= __('Contributions'); ?></h3>
				</div>
				<tr>
					<td style="white-space:pre"><strong><?= __('Commits:'); ?></strong></td>
					<td><?= $stats['repository']['commits']; ?></td>
				</tr>
				<tr>
					<td style="white-space:pre"><strong><?= __('Pull requests:'); ?></strong></td>
					<td><?= $stats['repository']['pullRequests']; ?></td>
				</tr>
				<tr>
					<td style="white-space:pre"><strong><?= __('Issues:'); ?></strong></td>
					<td><?= $stats['repository']['issues']; ?></td>
				</tr>
			</table>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-3 col-sm-offset-2" style="margin-top:50px">
		<div class="panel panel-warning">
			<table class="table table-striped table-responsive">
				<div class="panel-heading">
					<h3 class="panel-title"><?= __('Users'); ?></h3>
				</div>
				<tr>
					<td style="white-space:pre"><strong><?= __('Users:'); ?></strong></td>
					<td><?= $stats['users']['count']; ?></td>
				</tr>
				<tr>
					<td style="white-space:pre"><strong><?= __('Students:'); ?></strong></td>
					<td><?= $stats['users']['students']; ?></td>
				</tr>
				<tr>
					<td style="white-space:pre"><strong><?= __('Available for mentoring:'); ?></strong></td>
					<td><?= $stats['users']['mentors']; ?></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="col-sm-3 col-sm-offset-1" style="margin-top:50px">
		<div class="panel panel-warning">
			<table class="table table-striped table-responsive">
				<div class="panel-heading">
					<h3 class="panel-title"><?= __('Projects'); ?></h3>
				</div>
				<tr>
					<td style="white-space:pre"><strong><?= __('Organizations:'); ?></strong></td>
					<td><?= $stats['website']['organizations']; ?></td>
				</tr>
				<tr>
					<td style="white-space:pre"><strong><?= __('Projects:'); ?></strong></td>
					<td><?= $stats['website']['projects']; ?></td>
				</tr>
				<tr>
					<td style="white-space:pre"><strong><?= __('Missions:'); ?></strong></td>
					<td><?= $stats['website']['missions']; ?></td>
				</tr>
			</table>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-9 col-sm-offset-1">
		<?= $this->GoogleChart->create("ColumnChart", "chart3")
		->addColumns([[
				'string',
				'Name'
			],[
				'number', 
				'Users'
			]])
		->addRows(
				$stats['users']['universities']
			)
		->setOptions([
			'height' => 300,
			'legend' => 'none',
			'title' => __('Users per university'),
 			'vAxis' => ['format' => '#']
		])
		?>
	</div>
</div>