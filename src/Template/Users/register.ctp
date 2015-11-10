<div class="row">
    <div class="users form col-lg-12 col-md-12 columns">
        <?= $this->Form->create($user, ['class' => 'form-hozitontal']); ?>
        <fieldset>
            <legend><?= __('Register') ?></legend>
            <div class="form-group clearfix required">
                <?= $this->Form->label('username', __('Choose your username'), ['class' => 'col-sm-2 control-label']); ?>
                <div class="col-sm-10">
                    <?= $this->Form->input('username', ['pattern' => '[a-zA-Z0-9_.-]{3,16}', 'title' => __('Letters (a-z), numbers, periods, underscore, and between 3 and 16 characters'), 'label' => false, 'placeholder' => __('Username'), 'autocomplete' => 'off']); ?>
                </div>
            </div>
            <br/>

            <div class="form-group clearfix required">
                <?= $this->Form->label('password', __('Choose a password'), ['class' => 'col-sm-2 control-label']); ?>
                <div class="col-sm-10">
                    <?= $this->Form->input('password', ['label' => false, 'placeholder' => __('Password'), 'autocomplete' => 'off']); ?>
                </div>
                <?= $this->Form->label('confirm_password', __('Confirm password'), ['class' => 'col-sm-2 control-label']); ?>
                <div class="col-sm-10">
                    <?= $this->Form->input('confirm_password', ['label' => false, 'type' => 'password', 'placeholder' => __('Password'), 'autocomplete' => 'off']); ?>
                </div>
            </div>
            <br/>

            <div class="form-group clearfix required">
                <?= $this->Form->label('email', __('Email adress'), ['class' => 'col-sm-2 control-label']); ?>
                <div class="col-sm-10">
                    <?= $this->Form->input('email', ['label' => false, 'placeholder' => __('Email'), 'autocomplete' => 'off']); ?>
                </div>
                <?= $this->Form->label('confirm_email', __('Confirm email adress'), ['class' => 'col-sm-2 control-label']); ?>
                <div class="col-sm-10">
                    <?= $this->Form->input('confirm_email', ['label' => false, 'placeholder' => __('Email'), 'autocomplete' => 'off']); ?>
                </div>
            </div>
            <br/>

            <div class="form-group clearfix required">
                <?= $this->Form->label('firstName', __('Enter your firstname'), ['class' => 'col-sm-2 control-label']); ?>
                <div class="col-sm-10">
                    <?= $this->Form->input('firstName', ['label' => false, 'placeholder' => __('Firstname'), 'autocomplete' => 'off']); ?>
                </div>
                <?= $this->Form->label('lastName', __('Enter your lastname'), ['class' => 'col-sm-2 control-label']); ?>
                <div class="col-sm-10">
                    <?= $this->Form->input('lastName', ['label' => false, 'placeholder' => __('Lastname'), 'autocomplete' => 'off']); ?>
                </div>
                <?php
                $options[] = ['value' => '', 'text' => '', 'disabled' => true, 'selected' => true];
                foreach ($universities as $i => $university) {
                    $options[] = ['value' => $i, 'text' => $university];
                }
                $options[] = ['value'=> 0, 'text' => __('Not specified')];
                ?>
                <?= $this->Form->label('universitie_id', __('University'), ['class' => 'col-sm-2 control-label']); ?>
                <div class="col-sm-10">
                    <?= $this->Form->input('universitie_id', ['type' => 'select', 'label' => false, 'options' => $options, 'required' => true, 'class' => 'form-control']); ?>
                </div>
            </div>
            <br/>
        </fieldset>

        <?= $this->Form->button(__('Register'), ['class' => 'btn-success']) ?> -
        <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'login']); ?>"><?= __("I have an account"); ?></a>
        <?= $this->Form->end() ?>
    </div>
</div>
