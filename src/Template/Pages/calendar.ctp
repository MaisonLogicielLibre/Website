<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h1 class="page-header"><?= __('Calendar'); ?></h1>
        <?php
        $this->Html->addCrumb(__('Home'), '/');
        $this->Html->addCrumb(__('Calendar'));

        echo $this->Html->getCrumbList(); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 col-sm-offset-3">
        <iframe src="https://calendar.google.com/calendar/embed?src=etsmtl.net_iu7pki0ov8q0i7d5rkhckhqu48%40group.calendar.google.com&ctz=America/Toronto" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
    </div>
</div>
