<div class="users form col-lg-12 col-md-12 columns">
    <?php
    $this->element('Projects/sidebar');
    if($user->hasRoleName(['Administrator'])):
        echo $this->fetch('sidebarAdministrator');
    else:
        echo $this->fetch('sidebar');
    endif;
    ?>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <?= $this->Form->create($application); ?>
            <fieldset>
                <legend><?= __('Apply on this project') ?></legend>
                <?php
                    echo $this->Form->input('presentation', ['type' => 'textarea']);
                    echo $this->Form->input('type_application_id', ['options' => $typeApplications, 'type' => 'select']);
                    echo $this->Form->input('weeklyHours', ['min' => '0']);
                    echo $this->Form->input('startDate');
                    echo $this->Form->input('endDate');
                ?>
            </fieldset>
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
</div>
