<div class="row">
    <div class="users form col-lg-12 col-md-12 columns">
        <?php
        $this->element('Users/sidebar');
        if ($you)
            echo $this->fetch('sidebarYou');
        else
            echo $this->fetch('sidebar');
        ?>

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
                    <?= $this->Form->select('gender', [0 => __('Female'), 1 => __('Male')], ['class' => 'form-control']); ?>
                </div>
                <?= $this->Form->input('universitie_id', ['label' => __('University')], ['options' => $universities]); ?>
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