<?= $this->Html->script(['organizations/add-member.js','duallistbox/dual-list-box.min.js'], ['block' => 'scriptBottom']); ?>
<div class="row">
    <div class="users form col-lg-12 col-md-12 columns">
        <?= $this->cell('Sidebar::organization', [$organization->id]); ?>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <?= $this->Form->create($organization); ?>
            <fieldset>
                <legend><?= __('Edit owners') ?></legend>
				<select multiple id="users" name="users[]">
				<?php foreach($users as $user) {
					if($user->getId() != $you) {
						foreach ($owners as $owner) {
							if($owner->getId() === $user->getId()) {
								$selected = true;
								break;
							}
							else
								$selected = false;
						}
						
						if($selected) {?>
							<option value="<?= $user['id'] ?>" selected ><?= '(' . $user['username'] . ') ' . $user['firstName'] . ' ' . $user['lastName']?></option>
						<?php } else {?>
							<option value="<?= $user['id'] ?>"><?= '(' . $user['username'] . ') ' . $user['firstName'] . ' ' . $user['lastName']?></option>
				<?php } } } ?>
                </select>
            </fieldset>
			<br>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
            <?= $this->Form->button(__('Cancel'), [
                'type' => 'button',
                'class' => 'btn btn-default',
                'onclick' => 'location.href=\'' . $this->url->build([
                        'controller' => 'Organizations',
                        'action' => 'view',
                        $organization->id
                    ]) . '\''
            ]); ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
