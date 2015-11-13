<?= $this->Html->css('bootstrap-social', ['block' => 'cssTop']); ?>
<div class="row">
    <?= $this->cell('Sidebar::user', [$user->id]); ?>
    <div class="col-sm-2">
			<a class="btn btn-block btn-social btn-github" href="https://github.com/login/oauth/authorize?scope=user:email&client_id=e10d326475ff982bbd84">
				<span class="fa fa-github"></span> Sign in with GitHub
			</a>
    </div>
	</br>
	</br>
	<div class="col-sm-9">
		<table class="table table-bordered" style="width">
			<thead>
				<tr>
				  <th> <?= __('Account') ?></th>
				</tr>
			</thead>
			<tbody>
			<?php foreach($pseudos as $pseudo) { ?>
				<tr>
					<td><?= $pseudo['pseudo'] ?><a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'svnRemove', $user->getId(), '?' => ['pseudo' => $pseudo['pseudo']]]); ?>"><?= ' ' . __("Remove") ?></a></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>
</div>
