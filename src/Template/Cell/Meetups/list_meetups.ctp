<?php
$compteur = 0;
foreach ($meetups as $meetup):
	$compteur++; ?>
	<div class="row">
		<div class="panel panel-default col-sm-6 col-sm-offset-3">
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-9">
						<h4><?= $this->html->link($meetup->name, $meetup->link) ?></h4>
					</div>
					<div class="col-sm-3 text-right">
						<h4><?= $meetup->date ?></h4>
					</div>
				</div>
				<div class="row">	
					<div class="col-sm-12">
						<p> <?= $meetup->description ?> </p>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endforeach;
?>

