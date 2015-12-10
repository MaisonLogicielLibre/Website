<div class="row">
    <?= $this->cell('Sidebar::newAction'); ?>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="page-header"><?= __('News'); ?></h1>
                <?php
                $this->Html->addCrumb(__('Home'), '/');
                $this->Html->addCrumb(__('Administration'), '/Pages/administration');
                $this->Html->addCrumb(__('News'), '/News');

                echo $this->Html->getCrumbList(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="header-title"><?= __('News') ?></h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <td><?= __('Id') ?></td>
                                <td><?= __('Date') ?></td>
                                <td><?= __('Name') ?></td>
                                <td><?= __('Link') ?></td>
                                <td><?= __('Edit') ?></td>
                                <td><?= __('Delete') ?></td>
                            </tr>
                            <?php foreach ($news as $new): ?>
                                <tr>
                                    <td>
                                        <!-- Id of meetup -->
                                        <?= $new->id ?>
                                    </td>
                                    <td>
                                        <!-- Date of meetup -->
                                        <?= $new->date ?>
                                    </td>
                                    <td>
                                        <!-- Name of meetup -->
                                        <?= $new->name ?>
                                    </td>
                                    <td>
                                        <!-- Name of meetup -->
                                        <?php if ($new->link) :
                                            echo $this->html->link(__('Link'), $new->link);
                                        endif;
                                        ?>
                                    </td>
                                    <td>
                                        <?= $this->html->link(__('Edit'), ['controller' => 'News', 'action' => 'edit', $new->id]); ?>
                                    </td>
                                    <td>
                                        <?= $this->Form->postLink(
                                            __('Delete'),
                                            ['action' => 'delete', $new->id],
                                            ['confirm' => __('Are you sure you want to delete # {0}?', $new->id)]
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