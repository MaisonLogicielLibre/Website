<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h1 class="page-header"><?= __('News'); ?></h1>
        <?php
        $this->Html->addCrumb(__('Home'), '/');
        $this->Html->addCrumb(__('News'));

        echo $this->Html->getCrumbList(); ?>
    </div>
</div>
<?= $this->cell('News::listNews'); ?>