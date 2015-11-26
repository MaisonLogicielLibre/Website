<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= __('The ML2 tv'); ?></title>
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700' rel='stylesheet' type='text/css'>

    <?= $this->Html->meta('icon') ?>
    <link rel="stylesheet" href="webroot/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="webroot/css/font-awesome.min.css"/>

    <?= $this->fetch('meta') ?>
    <style>
        * {
            font-family: "Source Sans Pro", sans-serif;
            overflow: hidden;
        }

        body {
            height: 100%;
        }
    </style>
</head>
<body>
<div class="row">
    <div class="col-sm-4 col-sm-offset-1" style="margin-top:20px">
        <div class="panel panel-warning">
            <table class="table table-striped table-responsive">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= __('Users'); ?></h3>
                </div>
                <tr>
                    <td style="white-space:pre"><strong><?= __('Users:'); ?></strong></td>
                    <td><?= $stats['users']['count']; ?></td>
                </tr>
                <tr>
                    <td style="white-space:pre"><strong><?= __('Students:'); ?></strong></td>
                    <td><?= $stats['users']['students']; ?></td>
                </tr>
                <tr>
                    <td style="white-space:pre"><strong><?= __('Available for mentoring:'); ?></strong></td>
                    <td><?= $stats['users']['mentors']; ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="col-sm-4 col-sm-offset-2" style="margin-top:20px">
        <div class="panel panel-warning">
            <table class="table table-striped table-responsive">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= __('Projects'); ?></h3>
                </div>
                <tr>
                    <td style="white-space:pre"><strong><?= __('Organizations:'); ?></strong></td>
                    <td><?= $stats['website']['organizations']; ?></td>
                </tr>
                <tr>
                    <td style="white-space:pre"><strong><?= __('Projects:'); ?></strong></td>
                    <td><?= $stats['website']['projects']; ?></td>
                </tr>
                <tr>
                    <td style="white-space:pre"><strong><?= __('Missions:'); ?></strong></td>
                    <td><?= $stats['website']['missions']; ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <?= $this->GoogleChart->create("ColumnChart", "chart3")
            ->addColumns([[
                'string',
                'Name'
            ],[
                'number',
                'Users'
            ]])
            ->addRows(
                $stats['users']['universities']
            )
            ->setOptions([
                'height' => 250,
                'legend' => 'none',
                'title' => __('Users per university'),
                'vAxis' => ['format' => '#']
            ])
        ?>
    </div>
</div>

<?=$this->fetch('scriptBottom'); ?>
</body>
</html>
