<?= $this->Html->script(['organizations/add-member.js', 'duallistbox/dual-list-box.min.js', 'initial.min'], ['block' => 'scriptBottom']); ?>
<div class="row">
    <?= $this->cell('Sidebar::organization', [$organization->id]); ?>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="page-header"><?= __('Edit members'); ?></h1>
                <?php
                $this->Html->addCrumb(__('Home'), '/');
                $this->Html->addCrumb(__('Organizations'), '/Organizations');
                $this->Html->addCrumb($organization->getName(), '/Organizations/view/'.$organization->id);
                $this->Html->addCrumb(__('Edit members'));

                echo $this->Html->getCrumbList(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="header-title"><?= __('Edit members'); ?></h3>
                        <?= $this->Form->create($organization); ?>
                        <fieldset>
                            <select multiple id="users" name="users[]">
                                <?php foreach ($users as $user) {
                                    if ($user->getId() != $you || $user->hasRoleName(['Administrator'])) {
                                        foreach ($members as $member) {
                                            if ($member->getId() === $user->getId()) {
                                                $selected = true;
                                                break;
                                            } else {
                                                $selected = false; 
                                            }
                                        }

                                        if ($selected) { ?>
                                            <option value="<?= $user['id'] ?>"
                                                    selected><?= '(' . $user['username'] . ') ' . $user['firstName'] . ' ' . $user['lastName'] ?></option>
                                        <?php } else { ?>
                                            <option
                                                value="<?= $user['id'] ?>"><?= '(' . $user['username'] . ') ' . $user['firstName'] . ' ' . $user['lastName'] ?></option>
                                        <?php }
                                    }
} ?>
                            </select>
                        </fieldset>
                        <br />
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn-info']) ?>
                        <?= $this->Form->button(
                            __('Cancel'), [
                            'type' => 'button',
                            'class' => 'btn btn-default',
                            'onclick' => 'location.href=\'' . $this->url->build(
                                [
                                    'controller' => 'Organizations',
                                    'action' => 'view',
                                    $organization->id
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