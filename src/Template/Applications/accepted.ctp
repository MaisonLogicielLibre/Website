<div class="row">
    <?= $this->cell('Sidebar::mission', [$mission->id]); ?>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <?= $this->Form->create($application, ['type' => 'post', 'action' => 'accepted']); ?>
        <fieldset>
            <legend><?= __('Accept the candidate for {0}', $mission->getName()); ?></legend>
            <?php if ($application->getMission()->getRemainingPlaces() === 1) : ?>
                <div class="bs-callout bs-callout-danger">
                    <h4><?= __('Warning! There is only 1 position left on the mission') ?>.</h4>

                    <p><?= __('If you accept this candidate, all other candidates will be refused'); ?>. </p>

                    <p> <?= __('If you want to add more candidates {0} {1} accepting this candidate',
                            $this->Html->link(
                                __('edit your mission'),
                                ['controller' => 'Missions', 'action' => 'edit', $mission->getId()]
                            ),
                            '<strong>' . __('BEFORE') . '</strong>'
                        ); ?>.</p>
                </div>
            <?php endif; ?>
            <p><?= __('You\'re about to accept the application of {0} for the mission {1}',
                    $this->Html->link(
                        $application->getUser()->getName(),
                        ['controller' => 'Users', 'action' => 'view', $application->getUser()->getId()]
                    ),
                    $this->Html->link(
                        $application->getMission()->getName(),
                        ['controller' => 'Missions', 'action' => 'view', $mission->getId()]
                    )
                ); ?>.</p>

            <p><?= __('We will advise the candidate that they have been selected by email'); ?>.</p><br/>
            <input type="text" style="display:none;">
            <?= $this->Form->input('old_password', ['label' => __('Please insert your password to finalize your choice'), 'type' => 'password', 'autocomplete' => 'off']); ?>

        </fieldset>
        <?= $this->Form->button(__('Accept the candidate'), ['class' => 'btn-success']); ?>
        <?= $this->Form->button(__('Cancel'), [
            'type' => 'button',
            'class' => 'btn btn-default',
            'onclick' => 'location.href=\'' . $this->url->build([
                    'controller' => 'Missions',
                    'action' => 'view',
                    $mission->id
                ]) . '\''
        ]); ?>
        <?= $this->Form->end(); ?>
    </div>
</div>

