<?php
use Cake\Core\Configure;

if (Configure::read('debug')) :
    $this->layout = 'dev_error';

    $this->assign('title', $message);
    $this->assign('templateName', 'error400.ctp');

    $this->start('file');
    ?>
    <?php if (!empty($error->queryString)) : ?>
        <p class="notice">
            <strong>SQL Query: </strong>
            <?= h($error->queryString) ?>
        </p>
    <?php endif; ?>

    <?php if (!empty($error->params)) : ?>
        <strong>SQL Query Params: </strong>
        <?= Debugger::dump($error->params) ?>
    <?php endif; ?>

    <?= $this->element('auto_table_warning') ?>

    <?php
    if (extension_loaded('xdebug')) :
        xdebug_print_function_stack();
    endif;

    $this->end();
endif;
?>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h1 class="page-header"><?= __('Somewhere'); ?></h1>
        <?php
        $this->Html->addCrumb(__('Home'), '/');
        $this->Html->addCrumb(__('?'));

        echo $this->Html->getCrumbList(); ?>
    </div>
</div>
<div class="row">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <img class="img-responsive" src="<?= $this->request->webroot . 'img/errors/404.png' ?>" alt="404">
        </div>
    </div>
    <div class="row">
        <h3 class="col-sm-6 col-sm-offset-3 error-text">
            <?= __('Looks like a ghost stole your page. Quickly go to') ?>
            <a href="<?= $this->Url->build(['controller' => 'pages', 'action' => 'home']); ?>"><strong><?= __('Home') ?></strong></a>
        </h3>
    </div>
</div>
