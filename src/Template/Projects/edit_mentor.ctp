<?= $this->Html->script(['projects/edit-mentor.js', 'duallistbox/dual-list-box.min.js'], ['block' => 'scriptBottom']); ?>
<div class="row">
    <?= $this->cell('Sidebar::project', [$project->id]); ?>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <?= $this->Form->create($project); ?>
        <fieldset>
            <legend><?= __('Edit mentors') ?></legend>
            <select multiple id="users" name="users[]">
                <?php foreach ($members as $member) {
					foreach ($mentors as $mentor) {
						if ($mentor->getId() === $member->getId()) {
							$selected = true;
							break;
						} else
							$selected = false;
					}

					if ($selected) { ?>
						<option value="<?= $member['id'] ?>"
								selected><?= '(' . $member['username'] . ') ' . $member['firstName'] . ' ' . $member['lastName'] ?></option>
					<?php } else { ?>
						<option
							value="<?= $member['id'] ?>"><?= '(' . $member['username'] . ') ' . $member['firstName'] . ' ' . $member['lastName'] ?></option>
					<?php }
                } ?>
            </select>
        </fieldset>
        <br>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
        <?= $this->Form->button(__('Cancel'), [
            'type' => 'button',
            'class' => 'btn btn-default',
            'onclick' => 'location.href=\'' . $this->url->build([
                    'controller' => 'Projects',
                    'action' => 'view',
                    $project->id
                ]) . '\''
        ]); ?>
        <?= $this->Form->end() ?>
    </div>
</div>
