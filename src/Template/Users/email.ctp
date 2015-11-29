<div class="row">
    <?= $this->cell('Sidebar::user', [$user->id]); ?>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="page-header"><?= __('Change my email'); ?></h1>
                <?php
                $this->Html->addCrumb(__('Home'), '/');
                $this->Html->addCrumb(__('Users'), '/Users');
                $this->Html->addCrumb(__('My profile'), '/users/view/'.$user->id);
                $this->Html->addCrumb(__('Change my email'));

                echo $this->Html->getCrumbList(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="header-title"><?= __('Change my email'); ?></h3>
                    <?= $this->Form->create($user); ?>
                    <fieldset>
                        <?= $this->Form->input('email', ['value' => "", 'label' => __('Enter your new email'), 'placeholder' => __('Email'), 'autocomplete' => 'off']); ?>
                        <?= $this->Form->input('confirm_email', ['label' => __('Confirm your new email'), 'placeholder' => __('Email'), 'autocomplete' => 'off']); ?>
                        </br />
                        <?= $this->Form->input('old_password', ['type' => 'password', 'label' => __('Confirm your password to confirm the change'), 'placeholder' => __('Password'), 'autocomplete' => 'off']); ?>
                    </fieldset>
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn-info']) ?>
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
