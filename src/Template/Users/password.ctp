<div class="row">
    <?= $this->cell('Sidebar::user', [$user->id]); ?>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="page-header"><?= __('Change my password'); ?></h1>
                <?php
                $this->Html->addCrumb(__('Home'), '/');
                $this->Html->addCrumb(__('Users'), '/Users');
                $this->Html->addCrumb(__('My profile'), '/users/view/'.$user->id);
                $this->Html->addCrumb(__('Change my password'));

                echo $this->Html->getCrumbList(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?= $this->Form->create($user); ?>
                        <fieldset>
                            <input type="text" style="display:none;"/>
                            <?= $this->Form->input('password', ['value' => '', 'label' => __('Choose a new password'), 'placeholder' => __('Password')]); ?>
                            <?= $this->Form->input('confirm_password', ['value' => '', 'type' => 'password', 'label' => __('Confirm the new password'), 'placeholder' => __('Password')]); ?>
                            </br />
                            <?= $this->Form->input('old_password', ['value' => '', 'type' => 'password', 'label' => __('Confirm your current password to confirm the change'), 'placeholder' => __('Password')]); ?>
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
        </div>
    </div>
</div>
