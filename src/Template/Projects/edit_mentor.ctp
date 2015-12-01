<div class="row">
    <?= $this->cell('Sidebar::project', [$project->id]); ?>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="page-header"><?=__('Edit mentors'); ?></h1>
                <?php
                $this->Html->addCrumb(__('Home'), '/');
                $this->Html->addCrumb(__('Projects'), '/Projects');
                $this->Html->addCrumb($project->getName(), '/projects/view/' . $project->id);
                $this->Html->addCrumb(__('Edit mentors'));

                echo $this->Html->getCrumbList(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="header-title"><?= __('Edit mentors') ?></h3>
                        <?= $this->Form->create($project); ?>
                        <fieldset>
                            <select multiple id="users" name="users[]">
                                <?php foreach ($members as $member) {
                                    foreach ($mentors as $mentor) {
                                        if ($mentor->getId() === $member->getId()) {
                                            $selected = true;
                                            break;
                                        } else
                                            $selected = false;
                                    }

                                    if ($selected) { ?>
                                        <option value="<?= $member['id'] ?>"
                                                selected><?= '(' . $member['username'] . ') ' . $member['firstName'] . ' ' . $member['lastName'] ?></option>
                                    <?php } else { ?>
                                        <option
                                            value="<?= $member['id'] ?>"><?= '(' . $member['username'] . ') ' . $member['firstName'] . ' ' . $member['lastName'] ?></option>
                                    <?php }
                                } ?>
                            </select>
                        </fieldset>
                        <br>
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn-info']) ?>
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
        </div>
    </div>
</div>
<?= $this->Html->script(['projects/edit-mentor.js', 'duallistbox/dual-list-box.min.js', 'initial.min'], ['block' => 'scriptBottom']); ?>
