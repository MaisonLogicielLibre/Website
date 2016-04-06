<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h1 class="page-header"><?= __('Government'); ?> <?= $this->Wiki->addHelper('Organizations'); ?></h1>
        <?php
        $this->Html->addCrumb(__('Home'), '/');
        $this->Html->addCrumb(__('Government'));

        echo $this->Html->getCrumbList(); ?>
    </div>
</div>
<div class="row">
    <div class="panel panel-info col-sm-6 col-sm-offset-3 partner-panel partner-premium">
        <div class="panel-body">
            <div class="row">
                <div style="float:left">
                    <?php echo $this->Html->image('montreal.png', ['alt' => 'Montreal', 'width' => '64px', 'height' => '64px', 'class' => 'img-responsive']) ?>
                </div>
                <div class="col-sm-4">
                    <h4><a href="http://ville.montreal.qc.ca"> Montréal </a></h4>
                </div>
                <div class="col-sm-7">
                    <h5 class="partner-text-premium"><?= __('Sponsor') ?></h5>
                    <div class="partner-text-premium-bottom">
                      Ce projet bénéficie du soutien financier de la Ville de Montréal
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-11 col-sm-offset-1">
                    <p>« La Ville de Montréal est fière de s'associer à titre de partenaire fondateur, à l'instar de Google et de Savoir-faire Linux, à la création de ML2, la première Maison du logiciel libre. Inaugurée en décembre dernier à l'ÉTS, au cœur du Quartier de l'innovation (QI), ML2 vise à proposer un lieu de rencontre et de partage. En plus de soutenir le plan stratégique de la Ville intelligente et numérique, le soutien financier accordé accordera une visibilité internationale à la Ville, tout en soulignant l'importance que celle-ci accorde à sa stratégie Montréal, Ville Intelligente et Numérique » - M. Chtilian</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="panel panel-danger col-sm-6 col-sm-offset-3">
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-11 col-sm-offset-1">
                    <h4><a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'contact']); ?>"> <?= __('Become a sponsor') ?> </a></h4>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-11 col-sm-offset-1">
                    <p> <?= __("Get visibility and access to over") ?>
                <strong> <?= __("5000 software engineering and computer science students.") ?> </strong>
                <?= __("Create partnerships with professors in our university network. Form strategic alliances with our industry and government partners.") ?> </p>
                </div>
            </div>
        </div>
    </div>
</div>
