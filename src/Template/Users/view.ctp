<div class="row">
    <div class="users form col-lg-12 col-md-12 columns">

        <?= $this->cell('Sidebar::user', [$user->id]); ?>

        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <h2>
                    <?= (!(empty($user->getName())) ? $user->getName() : $user->getUsername()); ?>
                </h2>
                <?php if($user->getUniversity() != null): ?>
                <h4>
                    <?= $user->getUniversity()->getName(); ?>
                </h4>
                <?php endif; ?>
            </div>
            <div class="col-lg-8 col-md-8">
                <div style="min-height:200px">
                    <p><?= (!(empty($user->getBiography())) ? $user->getBiography() : 'Votre biographie') ?></p>
                </div>
            </div>
        </div>
    </div>
</div>