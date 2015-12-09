<?= $this->Html->css(['bootstrap-switch.min', 'bootstrap-markdown.min'], ['block' => 'cssTop']); ?>
<div class="row">
    <?= $this->cell('Sidebar::user', [$user->id]); ?>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="page-header"><?= __('Edit my profile'); ?></h1>
                <?php
                $this->Html->addCrumb(__('Home'), '/');
                $this->Html->addCrumb(__('Users'), '/Users');
                $this->Html->addCrumb(__('My profile'), '/users/view/' . $user->id);
                $this->Html->addCrumb(__('Edit my profile'));

                echo $this->Html->getCrumbList(); ?>
            </div>
        </div>
        <?= $this->Form->create($user); ?>
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="header-title"><?= __('Personal information'); ?></h3>
                        <?= $this->Form->input('firstName', ['label' => __('First name')]); ?>
                        <?= $this->Form->input('lastName', ['label' => __('Last name')]); ?>
                        <?php
                        $options[0] = __('Not specified');
                        foreach ($universities as $i => $university) {
                            $options[$i] = $university;
                        }
                        ?>
                        <div class="form-group">
                            <?= $this->Form->label('universitie_id', __('University'), ['class' => 'control-label']); ?>
                            <?= $this->Form->select('universitie_id', $options, ['class' => 'form-control']); ?>
                        </div>
                        <div class="form-group">
                            <?= $this->Form->label('gender', __('Gender'), ['class' => 'control-label']); ?>
                            <select class="form-control" name="gender">
                                <option
                                    value="null" <?= (is_null($user->getGender()) ? "selected" : ""); ?>><?= __('Not specified'); ?></option>
                                <option
                                    value="0" <?= (!$user->getGender() && !is_null($user->getGender()) ? "selected" : ""); ?>><?= __('Female'); ?></option>
                                <option value="1" <?= ($user->getGender() ? "selected" : ""); ?>><?= __('Male'); ?></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="header-title"><?= __('Status'); ?></h3>
                        <div class="form-group">
                            <?= $this->Form->label('isStudent', __('Are you a student?'), ['class' => 'control-label', 'style' => 'width:100%;']); ?>
                            <?= $this->Form->input('isStudent', ['label' => false, 'class' => 'form-control']); ?>
                        </div>
                        <div class="form-group">
                            <?= $this->Form->label('isProfessor', __('Are you a professor?'), ['class' => 'control-label', 'style' => 'width:100%;']); ?>
                            <?= $this->Form->input('isProfessor', ['label' => false, 'class' => 'form-control']); ?>
                        </div>
                        <div class="form-group">
                            <?= $this->Form->label('isAvailableMentoring', __('Would you like to be a mentor?'), ['class' => 'control-label', 'style' => 'width:100%;']); ?>
                            <?= $this->Form->input('isAvailableMentoring', ['label' => false, 'class' => 'form-control']); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="header-title"><?= __('Extra information'); ?></h3>
                        <?= $this->Form->input('biography',
                            [
                                'label' => __('Biography'),
                                'data-provide' => 'markdown',
                                'data-iconlibrary' => 'fa',
                                'data-hidden-buttons' => 'cmdImage',
                                'data-language' => ($this->request->session()->read('lang') == 'fr_CA' ? 'fr' : ''),
                                'data-footer' => '<a target="_blank" href="https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet">' . __('Markdown Cheatsheet') . '</a>'
                            ]
                        ); ?>
						<?= $this->Form->input('email', ['value' => "", 'label' => __('Enter your contact email'), 'placeholder' => __('Email'), 'autocomplete' => 'off']); ?>
                        <?= $this->Form->input('interest',
                            [
                                'label' => __('What are your interests'),
                                'data-provide' => 'markdown',
                                'data-iconlibrary' => 'fa',
                                'data-hidden-buttons' => 'cmdImage',
                                'data-language' => ($this->request->session()->read('lang') == 'fr_CA' ? 'fr' : ''),
                                'data-footer' => '<a target="_blank" href="https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet">' . __('Markdown Cheatsheet') . '</a>'
                            ]
                        ); ?>
                        <div id="bloodhound">
                        <?= $this->Form->input('skills', ['type' => 'text', 'disabled' => true, 'placeholder' => __('Enter and select your skills')]); ?>
                        </div>
                        <br />
                        <h3 class="header-title"><?= __('Contact information'); ?></h3>
                        <?= $this->Form->input('phone', ['label' => __('Phone')]); ?>
                        <?= $this->Form->input('emailPublic', ['label' => __('Enter your public email'), 'placeholder' => __('Email'), 'autocomplete' => 'off']); ?>
                        <?= $this->Form->input('mailingList', ['label' => __('Subscribe to receive promotional email from ML2')]); ?>
                        <br />
                        <h3 class="header-title"><?= __('Social networks'); ?></h3>
                        <?= $this->Form->input('portfolio', ['type' => 'text', 'label' => __('Portfolio'), 'placeholder' => __("http(s)://website.com")]); ?>
                        <?= $this->Form->input('twitter', ['type' => 'text', 'label' => __('Twitter'), 'placeholder' => __("username twitter")]); ?>
                        <?= $this->Form->input('facebook', ['type' => 'text', 'label' => __('Facebook'), 'placeholder' => __("username facebook")]); ?>
                        <?= $this->Form->input('googlePlus', ['type' => 'text', 'label' => __('Google+'), 'placeholder' => __("http(s)://website.com")]); ?>
                        <?= $this->Form->input('linkedIn', ['type' => 'text', 'label' => __('LinkedIn'), 'placeholder' => __("http(s)://website.com")]); ?>

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
                    </div>
                </div>
        <?= $this->Form->end() ?>
    </div>
</div>
<?php
    $this->Html->scriptStart(['block' => 'scriptBottom']);
    echo 'var urlUsersSkills="' . $this->request->webroot . 'json/UsersSkills.json";';
    echo 'var yesTr="' . __('Yes') . '";';
    echo 'var noTr="' . __('No') . '";';
    $this->Html->scriptEnd();
?>
<?= $this->Html->script([
    'bootstrap/bootstrap-switch.min',
    'bootstrap-tokenfield',
    'typeahead.min',
    'users/edit',
    'markdown/markdown',
    'markdown/to-markdown',
    'bootstrap/bootstrap-markdown',
], ['block' => 'scriptBottom']);
if ($this->request->session()->read('lang') == 'fr_CA')
    echo $this->Html->script('locale/bootstrap-markdown.fr', ['block' => 'scriptBottom']);
?>
