<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <div class="page-action">
        <ul class="nav nav-stacked">
            <!--
            GENERAL
            -->
            <li class="<?= ($this->request->action == 'index') && ($this->request->controller == 'Meetups') ? 'active disabled' : ''; ?>">
                <a href="<?= $this->Url->build(
                    [
                        'controller' => 'Meetups',
                        'action' => 'index'
                    ]) ?>">
                    <i class="fa fa-info"></i>
                    <?= __('List meetup') ?>
                </a>
            </li>

            <li class="<?= ($this->request->action == 'add') && ($this->request->controller == 'Meetups') ? 'active disabled' : ''; ?>">
                <a href="<?= $this->Url->build(
                    [
                        'controller' => 'Meetups',
                        'action' => 'add'
                    ]) ?>">
                    <i class="fa fa-plus"></i>
                    <?= __('Add meetup') ?>
                </a>
            </li>
        </ul>
    </div>
</div>