<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= __('The ML2 tv'); ?></title>
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700' rel='stylesheet' type='text/css'>

    <?= $this->Html->meta('icon') ?>
    <?= $this->Less->less('less/stylesTV.less'); ?>
    <?= $this->Html->css('font-awesome.min.css'); ?>

    <?= $this->fetch('meta') ?>
    <style>
        img {height: auto;vertical-align: middle;}
        td {border:0!important;}
    </style>
</head>
<body>
<div class="wrapper">
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1">
                    <h1><strong>Maison du logiciel libre - Nos commanditaires</strong></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-responsive text-center">
                        <tr>
                            <td>
                                <img src="webroot/img/ets.svg" alt="" style="width:300px;" />
                            </td>
                            <td>
                                <img src="webroot/img/google.svg" alt="" style="width:500px;"/>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-responsive text-center">
                        <tr>
                            <td>
                                <img src="webroot/img/montreal.svg" alt="" style="width:500px;" />
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-responsive">
                        <tr>
                            <td>
                                <img src="webroot/img/savoirfairelinux.svg" alt=""/>
                            </td>
                            <td>
                                <img src="webroot/img/facil.png" style="width:200px;" alt="" />
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <body>
        </div>
    </div>
</div>
</body>
</html>