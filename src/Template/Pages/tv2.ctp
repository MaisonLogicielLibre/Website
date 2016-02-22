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
            background-color: #70CCD6;
        }
        html {
        background: url(webroot/img/banner2.jpg) #70CCD6 no-repeat fixed;
            -webkit-background-size: contain;
            -moz-background-size: contain;
            -o-background-size: contain;
            background-size: 98% 100%;
        }
    </style>
</head>
<body>
</body>
</html>
