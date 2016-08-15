<div class="row">
    <?= $this->cell('Sidebar::mission', [$mission->id]); ?>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="page-header"><?= __('Edit professor'); ?></h1>
                <?php
                $this->Html->addCrumb(__('Home'), '/');
                $this->Html->addCrumb(__('Projects'), '/Projects');
                $this->Html->addCrumb($mission->project->getName(), '/Projects/view/'.$mission->project->id);
                $this->Html->addCrumb(__('Edit professor'));

                echo $this->Html->getCrumbList(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="header-title"><?= __('Edit professor'); ?></h3>
                        <?= $this->Form->create($mission); ?>
                        <fieldset>
                            <p>
                                <?= __('Professor of the mission : ') ?>
                                <select id="users" name="users[]" class="form-control">
                                    <?php if (is_null($mission->professor)) : ?>
                                        <option value="null" selected><?= __("No professor"); ?></option>
                                    <?php else: ?>
                                        <option value="null"><?= __("No professor"); ?></option>
                                    <?php endif; ?>
                                    <?php foreach ($professors as $professor):
                                        if ($professor->getId() == $currentProfessorId) : ?>
                                            <option value="<?= $professor->getId() ?>"
                                                    selected><?= '(' . $professor->getUsername() . ') ' . $professor->getName() ?></option>
                                        <?php else: ?>
                                            <option
                                                value="<?= $professor['id'] ?>"><?= '(' . $professor->getUsername() . ') ' . $professor->getName() ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </p>
                        </fieldset>
                        <br>
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn-info']) ?>
                        <?= $this->Form->button(
                            __('Cancel'), [
                            'type' => 'button',
                            'class' => 'btn btn-default',
                            'onclick' => 'location.href=\'' . $this->url->build(
                                [
                                    'controller' => 'Missions',
                                    'action' => 'view',
                                    $mission->id
                                ]
                            ) . '\''
                            ]
                        ); ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Html->script(['initial.min'], ['block' => 'scriptBottom']); ?>
