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
            <img src="webroot/img/banner.png" class="img-responsive" alt="">
        </div>
    </div>
</div>

<script src="webroot/js/jquery-2.1.4.min.js"></script>
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