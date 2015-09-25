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
                echo $this->Form->input('firstName');
                echo $this->Form->input('lastName');
                echo $this->Form->input('biography');
                echo $this->Form->input('portfolio', ['type' => 'text']);
                echo $this->Form->input('phone');
                ?>
                <div class="form-group">
                    <?= $this->Form->label('gender', __('Gender'), ['class' => 'control-label']); ?>
                    <?= $this->Form->select('gender', [0 => __('Female'), 1 => __('Male')], ['class' => 'form-control']); ?>
                </div>
                <?= $this->Form->input('universitie_id', ['options' => $universities]); ?>
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