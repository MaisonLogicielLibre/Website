<div class="row">
    <div class="users form col-lg-12 col-md-12 columns">

        <?= $this->cell('Sidebar::user', [$user->id]); ?>

        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <?= $this->Form->create($user); ?>
            <fieldset>
                <legend><?= __('Edit User') ?></legend>
                <?php
                echo $this->Form->input('firstName', ['label' => __('First name')]);
                echo $this->Form->input('lastName', ['label' => __('Last name')]);
                echo $this->Form->input('biography', ['label' => __('Biography')]);
                echo $this->Form->input('portfolio', ['type' => 'text'], ['label' => __('Portfolio')]);
                echo $this->Form->input('phone', ['label' => __('Phone')]);
                ?>
                <div class="form-group">
                    <?= $this->Form->label('gender', __('Gender'), ['class' => 'control-label']); ?>
                    <select class="form-control" name="gender">
                        <option value="null" <?= (is_null($user->getGender()) ? "selected" : ""); ?>><?= __('Not specified'); ?></option>
                        <option value="0" <?= (!$user->getGender() && !is_null($user->getGender()) ? "selected" : ""); ?>><?= __('Female'); ?></option>
                        <option value="1" <?= ($user->getGender() ? "selected" : ""); ?>><?= __('Male'); ?></option>
                    </select>
                </div>
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
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
            <?= $this->Form->button(__('Cancel'), [
                'type' => 'button',
                'class' => 'btn btn-default',
                'onclick' => 'location.href=\'' . $this->url->build([
                        'controller' => 'Users',
                        'action' => 'view',
                        $user->id
                    ]) . '\''
            ]); ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>