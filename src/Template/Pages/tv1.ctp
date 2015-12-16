<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= __('The ML2 tv'); ?></title>
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700' rel='stylesheet' type='text/css'>

    <?= $this->Html->meta('icon') ?>
    <?= $this->Less->less('less/stylesTV.less'); ?>
    <link rel="stylesheet" href="webroot/css/font-awesome.min.css"/>

    <?= $this->fetch('meta') ?>
</head>
<body>
<div id="wrapper-tv1">
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div id="banner" class="col-xs-12">
                    <img src="webroot/img/banner.png" class="img-responsive" alt="">
                </div>
            </div>
        </div>
    </div>
</body>
</html>