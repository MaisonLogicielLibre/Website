<?php $Parsedown = new Parsedown(); ?>
<div class="row">
    <?= $this->cell('Sidebar::meetupAction'); ?>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><?= __('Meetups') ?></h3>
            </div>
            <table class="table table-striped">
                <?php foreach ($meetups as $meetup): ?>
                    <tr>
                        <td>
                            <!-- Date of meetup -->
                            <?= $meetup->date ?>
                        </td>
                        <td>
                            <!-- Name of meetup -->
                            <?= $meetup->name ?>
                        </td>
                        <td>
                            <!-- Name of meetup -->
                            <?php if ($meetup->link) :
                                echo $this->html->link(__('Link'), $meetup->link);
                            endif;
                            ?>
                        </td>
                        <td>
                            <?= $this->html->link(__('Edit'), ['controller' => 'Meetups', 'action' => 'edit', $meetup->id]); ?>
                        </td>
                        <td>
                            <?= $this->Form->postLink(
                                __('Delete'),
                                ['action' => 'delete', $meetup->id],
                                ['confirm' => __('Are you sure you want to delete # {0}?', $meetup->id)]
                            )
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
