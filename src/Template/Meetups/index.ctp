<div class="row">
    <?= $this->cell('Sidebar::meetupAction'); ?>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="page-header"><?= __('List of meetups'); ?></h1>
                <?php
                $this->Html->addCrumb(__('Home'), '/');
                $this->Html->addCrumb(__('Meetups'), '/Meetups');

                echo $this->Html->getCrumbList(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="header-title"><?= __('Meetups') ?></h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
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
        </div>
    </div>
</div>
