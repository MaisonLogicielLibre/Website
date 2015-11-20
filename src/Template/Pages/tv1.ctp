<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= __('The ML2 tv'); ?></title>
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700' rel='stylesheet' type='text/css'>

    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('bootstrap.min'); ?>
    <?= $this->Html->css('font-awesome.min.css'); ?>

    <?= $this->fetch('meta') ?>
    <style>
        * {
            font-family: "Source Sans Pro", sans-serif;
            overflow: hidden;
        }

        body {
            height: 100%;
        }

        h1 {
            font-weight: 700;
            text-align: center;
            font-size: 7em;
            margin: 50px 0 0 0;
        }
    </style>
</head>
<body>
<div id="wrapper">
    <div class="row">
        <div class="col-sm-12">
            <h1>Maison Logiciel Libre - ML<sup>2</sup></h1>
            <?= $this->Html->image('banner.png', ['class' => 'img-responsive']); ?>
        </div>
    </div>
</div>

<?= $this->Html->script('jquery-2.1.4.min'); ?>
<script>
    !function(n){n.fn.flowtype=function(i){var m=n.extend({maximum:9999,minimum:1,maxFont:9999,minFont:1,fontRatio:35},i),t=function(i){var t=n(i),o=t.width(),u=o>m.maximum?m.maximum:o<m.minimum?m.minimum:o,a=u/m.fontRatio,f=a>m.maxFont?m.maxFont:a<m.minFont?m.minFont:a;t.css("font-size",f+"px")};return this.each(function(){var i=this;n(window).resize(function(){t(i)}),t(this)})}}(jQuery);
</script>
<script>
    $('h1').flowtype({
        minFont : 64,
        maxFont : 260
    });
</script>
</body>
</html>