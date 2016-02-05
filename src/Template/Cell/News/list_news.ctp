<?php $Parsedown = new ParsedownNoImage(); ?>
<?php
$compteur = 0;
foreach ($news as $new):
    $compteur++; ?>
    <div class="row">
        <div class="panel panel-default col-sm-6 col-sm-offset-3">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h4><?= $this->html->link($new->name, $new->link) ?></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <p> <?= $Parsedown->text($new->description) ?> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach;
?>
