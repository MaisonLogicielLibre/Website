<!-- todo this section should be automatically generated from an admin page. for this SPRINT we will manually maintain -->
<table class="table table-responsive">
	<thead>
	<tr>
		<th class="mll-table"><?= __("Date"); ?></th>
		<th><?= __("Meetup"); ?></th>
		<th class="mll-table"><?= __("Register"); ?></th>
	</tr>
	</thead>
	<tbody>
		<?php
		$compteur = 0;
		foreach ($meetups as $meetup):
			$compteur++;
			if ($compteur % 2)
				echo "<tr class='success'>";
			else
				echo "<tr class='info'>";
		?>
				<td><?= $meetup->date ?></td>
				<td><?= $meetup->description ?></td>
				<td>
					<?php if ($meetup->link) :
						echo $this->html->link(__('Link'), $meetup->link);
					endif;
					?>
				</td>
			</tr>
		<?php
		endforeach;
		?>
	</tbody>
</table>

