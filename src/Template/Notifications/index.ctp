<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="page-header"><?= __('Notifications'); ?></h1>
                <?php
                $this->Html->addCrumb(__('Home'), '/');
                $this->Html->addCrumb(__('Users'), '/Users');
                $this->Html->addCrumb(__('My profile'), '/Users/view/'.$this->request->session()->read('Auth.User.id'));
                $this->Html->addCrumb(__('Notifications'));

                echo $this->Html->getCrumbList(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="header-title"><?= __('Notifications') ?></h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?= __('name') ?></th>
                                    <th></th>
                                    <th class="text-right"><a class="display-block" href="<?= $this->Url->build(['controller' => 'Notifications', 'action' => 'markAllAsRead']) ?>"><?= __('Mark all as read') ?></a></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($notifications as $notification): ?>
                                <tr>
                                    <td><a class="display-block" href="<?= $notification->link ?>"><?= h($notification->name) ?></a></td>
                                    <td><a class="display-block" href="<?= $notification->link ?>"><?= $notification->created->timeAgoInWords() ?></a></td>
                                    <td class="text-right"><a class="display-block" href="<?= $this->Url->build(['controller' => 'Notifications', 'action' => 'markAsRead', $notification->id]) ?>"><i class="fa fa-check"></i></a></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
