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
    <style>
        body {
            background: url(webroot/img/banner.png) no-repeat center center fixed;
            -webkit-background-size: 95%;
            -moz-background-size: 95%;
            -o-background-size: 95%;
            background-size: 95%;
        }
    </style>
</head>
<body>
    <div class="row" style="position:absolute;bottom:0;text-align:center;width:100%;">
        <div class="col-xs-12">
            <h2>Inscrivez-vous à maisonlogiciellibre.org</h2>
        </div>
    </div>
</body>
</html>