<div class="row">
    <?= $this->cell('Sidebar::mission', [$mission->id]); ?>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="page-header"><?= __('Edit mentor'); ?></h1>
                <?php
                $this->Html->addCrumb(__('Home'), '/');
                $this->Html->addCrumb(__('Projects'), '/Projects');
                $this->Html->addCrumb($mission->project->getName(), '/Projects/view/'.$mission->project->id);
                $this->Html->addCrumb(__('Edit mentor'));

                echo $this->Html->getCrumbList(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="header-title"><?= __('Edit mentor'); ?></h3>
                        <?= $this->Form->create($mission); ?>
                        <fieldset>
                            <p>
                                <?= __('Mentor of the mission : ') ?>
                                <select id="users" name="users[]">
                                    <?php foreach ($mentors as $mentor) {
                                        if ($mentor->getId() == $currentMentorId) {
                                            $selected = true;
                                        } else {
                                            $selected = false;
                                        }

                                        if ($selected) { ?>
                                            <option value="<?= $mentor->getId() ?>"
                                                    selected><?= '(' . $mentor->getUsername() . ') ' . $mentor->getName() ?></option>
                                        <?php } else { ?>
                                            <option
                                                value="<?= $mentor['id'] ?>"><?= '(' . $mentor->getUsername() . ') ' . $mentor->getName() ?></option>
                                        <?php }
                                    } ?>
                                </select>
                            </p>
                        </fieldset>
                        <br>
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn-info']) ?>
                        <?= $this->Form->button(__('Cancel'), [
                            'type' => 'button',
                            'class' => 'btn btn-default',
                            'onclick' => 'location.href=\'' . $this->url->build([
                                    'controller' => 'Missions',
                                    'action' => 'view',
                                    $mission->id
                                ]) . '\''
                        ]); ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Html->script(['initial.min'], ['block' => 'scriptBottom']); ?>