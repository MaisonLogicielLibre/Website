<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h1 class="page-header"><?= __('Survey'); ?></h1>
        <?php
        $this->Html->addCrumb(__('Home'), '/');
        $this->Html->addCrumb(__('Survey'));

        echo $this->Html->getCrumbList(); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 col-sm-offset-3">
        <?php $lang = $this->request->session()->read('lang');
        if ($lang == "fr_CA") {?>
            <iframe src="https://docs.google.com/forms/d/1V6JFtvjS7u8s_P_4pCd4ErTvmLoNGPeCLy4hg3M0sz8/viewform?embedded=true" width="760" height="700" frameborder="0" marginheight="0" marginwidth="0"><?php echo __('Loading...') ?></iframe>
        <?php } else { ?>
            <iframe src="https://docs.google.com/forms/d/1776VuKQwbZvC-WHBL-5imu5ZMrQnb8o3t9x7qGz6SWI/viewform?embedded=true" width="760" height="700" frameborder="0" marginheight="0" marginwidth="0"><?php echo __('Loading...') ?></iframe>
        <?php }  ?>
    </div>
</div>