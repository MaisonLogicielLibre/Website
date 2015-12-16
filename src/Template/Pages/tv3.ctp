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
        body {overflow:hidden;}
    </style>
</head>
<body>
<div class="wrapper">
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <h1><strong><?= __('Users per university') ?></strong></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <?= $this->GoogleChart->create("PieChart", "chart3")
                        ->addColumns([[
                            'string',
                            'Name'
                        ], [
                            'number',
                            'Users'
                        ]])
                        ->addRows(
                            $stats['users']['universities']
                        )
                        ->setOptions([
                            'height' => 720,
                            'width' => 1280,
                            'vAxis' => ['format' => '#']
                        ])
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?=$this->fetch('scriptBottom'); ?>
</body>
</html>