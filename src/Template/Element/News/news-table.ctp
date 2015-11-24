<!--            todo this section should be contains in an element and automatically generated from an admin page. for this SPRINT we will manually maintain-->
<table class="table table-responsive">
	<thead>
	<tr>
		<th style="min-width: 110px"<?= __("Date"); ?></th>
		<th><?= __("Info"); ?></th>
		<th><?= __("Link2"); ?></th>
	</tr>
	</thead>
	<tbody>
	<tr class="info">
		<td><?= __("October 28"); ?></td>
		<td><?= __("Deadline to submit an intern project."); ?></td>
		<td><a class="btn btn-success"
			   href="<?= $this->Url->build(['controller' => 'Projects', 'action' => 'submit']); ?>"><?= __('Submit a project'); ?></a></a>
		</td>
	</tr>
	<tr class="danger">
		<td><?= __("December 1"); ?></td>
		<td><?= __("ML2 Kick-off party at ÉTS. Register to get invited!"); ?></td>
		<td><a class="btn btn-primary"
			   href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'register']); ?>"><?= __("Register") ?></a>
		</td>
	</tr>
	<!-- <tr class="info">
		<td><?= __("December 1"); ?></td>
		<td><?= __("ÉTS substance article"); ?></td>
		<td><a href="http://substance-en.etsmtl.ca/">substance</a></td>
	</tr> -->
	</tbody>
</table>

