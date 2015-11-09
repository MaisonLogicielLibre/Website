<div class="row">
    <?= $this->cell('Sidebar::mission', [$mission->id]); ?>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <?= $this->Form->create($mission); ?>
        <fieldset>
            <legend><?= __('Edit mentor') ?></legend>
			<p>
				<?= __('Mentor of the mission : ') ?> 
				<select id="users" name="users[]">
					<?php foreach ($mentors as $mentor) {
						if ($mentor->getId() == $currentMentorId) {
							$selected = true;
						} else {
							$selected = false;
						}
								
						if ($selected) { ?>
							<option value="<?= $mentor->getId() ?>"
									selected><?= '(' . $mentor->getUsername() . ') ' . $mentor->getName() ?></option>
						<?php } else { ?>
							<option
								value="<?= $mentor['id'] ?>"><?= '(' . $mentor->getUsername() . ') ' . $mentor->getName() ?></option>
						<?php }
					} ?>
				</select>
			</p>
        </fieldset>
        <br>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
        <?= $this->Form->button(__('Cancel'), [
            'type' => 'button',
            'class' => 'btn btn-default',
            'onclick' => 'location.href=\'' . $this->url->build([
                    'controller' => 'Missions',
                    'action' => 'view',
                    $mission->id
                ]) . '\''
        ]); ?>
        <?= $this->Form->end() ?>
    </div>
</div>
