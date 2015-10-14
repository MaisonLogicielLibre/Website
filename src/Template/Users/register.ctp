<div class="users form col-lg-12 col-md-12 columns">
    <?= $this->Form->create($user); ?>
    <fieldset>
        <legend><?= __('Register') ?></legend>
        <?= $this->Form->input('username', ['label' => __('Choose your username'), 'placeholder' => __('Username'), 'autocomplete' => 'off' ]); ?>
		<?php
			$options[0] = __('Not specified');
			foreach($universities as $i => $university) {
				$options[$i] = $university;
			}
        ?>
		<div class="form-group">
                    <?= $this->Form->label('universitie_id', __('University'), ['class' => 'control-label']); ?>
                    <?= $this->Form->select('universitie_id', $options, ['class' => 'form-control']); ?>
        </div>
        <?= $this->Form->input('password', ['label' => __('Choose a password'), 'placeholder' => __('Password'), 'autocomplete' => 'off' ]); ?>
        <?= $this->Form->input('confirm_password', ['type' => 'password', 'label' => __('Confirm password'), 'placeholder' => __('Password'), 'autocomplete' => 'off' ]); ?>

        <?= $this->Form->input('email', ['label' => __('Email adress'), 'placeholder' => __('Email'), 'autocomplete' => 'off' ]); ?>
        <?= $this->Form->input('confirm_email', ['label' => __('Confirm email adress'), 'placeholder' => __('Email'), 'autocomplete' => 'off' ]); ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>

