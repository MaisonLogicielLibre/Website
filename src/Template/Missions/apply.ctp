<?= $this->Html->css(['bootstrap-switch.min', 'bootstrap-markdown.min'], ['block' => 'cssTop']); ?>
<?php $Parsedown = new ParsedownNoImage(); ?>
<div class="row">
        <?= $this->cell('Sidebar::mission', [$mission->getId()]); ?>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="page-header"><?= __('Apply on the mission'); ?></h1>
                <?php
                $this->Html->addCrumb(__('Home'), '/');
                $this->Html->addCrumb(__('Projects'), '/Projects');
                $this->Html->addCrumb($mission->project->getName(), '/Projects/view/'.$mission->project->id);
				$this->Html->addCrumb($mission->getName(), '/Missions/view/'.$mission->id);
                $this->Html->addCrumb(__('Apply on the mission'));

                echo $this->Html->getCrumbList(); ?>
            </div>
        </div>
		<div class="row col-sm-12">
			<?= $this->Form->create($mission); ?>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<?= $this->Form->input('email', ['value' => $userEmail, 'label' => __('Enter your email '), 'placeholder' => __('Email'), 'autocomplete' => 'off', 'required' => true]); ?>
							<div class="form-group">
								<?= $this->Form->label('type', __('Type'), ['class' => 'control-label']); ?>
								<select id="type_mission_id" name="type_mission_id" class="form-control">
									<?php   foreach ($mission->getType() as $type) { ?>	
											<?php if ($isProfessor) {
													if ($type->name == 'Professor') { ?>
														<option 
															value=<?=$type->id?>><?= __($type->name) ?>
														</option>
											  <?php }
												  } 
												  if($isStudent) { 
														if ($type->name != 'Professor') { ?>
															<option 
																value=<?=$type->id?>><?= __($type->name) ?>
															</option>
											<?php } }?>
									  <?php } 
									?>
								</select>
							</div>
							<?= $this->Form->input('text',
								[
									'type' => 'textarea',
									'label' => __('Extra information'),
									'data-provide' => 'markdown',
									'data-iconlibrary' => 'fa',
									'data-hidden-buttons' => 'cmdImage',
									'data-language' => ($this->request->session()->read('lang') == 'fr_CA' ? 'fr' : ''),
									'data-footer' => '<a target="_blank" href="https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet">' . __('Markdown Cheatsheet') . '</a>'
								]
							); ?>
							<p>
								<?= __('As always, should you encounter a bug, we will disavow any knowledge of your actions.') ?>
								<br/><br/>
								<?= __('This page will self-destruct on the press of a button. Good luck..') ?>
							</p>
							<?= $this->Form->button(__('Apply'), ['class' => 'btn-info']) ?>
							<?= $this->Form->button(__('Cancel'), [
								'type' => 'button',
								'class' => 'btn btn-default',
								'onclick' => 'location.href=\'' . $this->url->build([
										'controller' => 'Missions',
										'action' => 'view',
										$mission->getId()
								]) . '\''
							]); ?>
						</div>
					</div>
				</div>   
			</div>
			<?= $this->Form->end() ?>
		</div>
    </div>
</div>
<?= $this->Html->script([
    'bootstrap/bootstrap-switch.min',
    'bootstrap-tokenfield',
    'typeahead.min',
    'markdown/markdown',
    'markdown/to-markdown',
    'bootstrap/bootstrap-markdown',
], ['block' => 'scriptBottom']);
if ($this->request->session()->read('lang') == 'fr_CA')
    echo $this->Html->script('locale/bootstrap-markdown.fr', ['block' => 'scriptBottom']);
?>
<?= $this->Html->script(['initial.min', 'missions/apply.js'], ['block' => 'scriptBottom']); ?>