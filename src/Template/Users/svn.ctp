<?= $this->Html->css('bootstrap-social', ['block' => 'cssTop']); ?>
<div class="row">
    <?= $this->cell('Sidebar::user', [$user->id]); ?>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
		<br>
        <div class="row">
			<div class="col-sm-3">
					<a class="btn btn-block btn-social btn-github" href="https://github.com/login/oauth/authorize?scope=user:email&client_id=<?= GITHUBID ?>">
						<span class="fa fa-github"></span> <?= __('Add GitHub account') ?>
					</a>
			</div>
		</div>
		<br>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php foreach($pseudos as $pseudo) { ?>
					<div class="row">
						<div class="panel panel-info col-sm-6">
							<div class="panel-body">
								<div class="col-sm-8 text-left">
									<?= $pseudo['pseudo'] ?>
								</div>
								<div class="col-sm-4 text-right">
										<a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'svnRemove', $user->getId(), '?' => ['pseudo' => $pseudo['pseudo']]]); ?>"><?= ' ' . __("Remove") ?></a></td>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
            </div>
        </div>
    </div>
</div>

