<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h1 class="page-header"><?= __('Administration'); ?></h1>
        <?php
        $this->Html->addCrumb(__('Home'), '/');
        $this->Html->addCrumb(__('Administration'), '/Pages/administration');
        echo $this->Html->getCrumbList(); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-blue">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-newspaper-o fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">
                            <a class="btn btn-warning" href="<?= $this->Url->build(['controller' => 'News', 'action' => 'index']);?>"><?= __('Manage');?></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <?= __('News'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3 class="header-title"><?= __('Projects') ?></h3>
                <table class="table">
                    <?php foreach ($projects as $project):?>
                        <tr>
                            <td><?= $this->Html->link($project->getName(), ['controller' => 'Projects', 'action' => 'view', $project->id]); ?></td>
                            <td><?= $project->created ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <a class="btn btn-info pull-right" href="<?= $this->Url->build(['controller' => 'Projects', 'action' => 'add']);?>"><?= __('Add project');?></a>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body table-responsive">
                <h3 class="header-title"><?= __('Organizations') ?></h3>
                <table class="table">
                    <?php foreach ($organizations as $organization): ?>
                        <tr>
                            <td>
                                <?= $this->Html->link($organization['name'], ['controller' => 'Organizations', 'action' => 'view', $organization['id']]); ?>
                                <span class='label label-success' title='projets'><?= $organization['pj']; ?></span>
                            </td>
                            <td><em class="small"><?= ($organization['created'] != null) ?  date("d-m-Y", strtotime($organization['created'])) : __("not define"); ?> </em></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <a class="btn btn-info pull-right" href="<?= $this->Url->build(['controller' => 'Organizations', 'action' => 'add']);?>"><?= __('Add organization');?></a>
            </div>
        </div>
		
		
    </div>
	
	<div class="col-lg-6 col-xs-12 hidden-xs hide">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3 class="header-title">Carousel</h3>   

				<div class="row">
					<div class="col-lg-12 col-md-12">
						
						<?php foreach ($filesCar as $fichier):?>
							<div class="col-sm-6 col-md-4">
								<div class="thumbnail">
									<img src="<?= $this->request->webroot . "img/carousel/". $fichier ?>" />
									<div class="caption">
										<p><a href="<?= "/pages/administration/".$fichier ?>" class="" ><?= __('Delete') ?></a></p>
									</div>
								</div>
						    </div>
						<?php endforeach; ?>
			
					</div>

					<div class="col-lg-12 col-md-12">
						<div class='col-lg-5 col-lg-offset-2'>
							<h4>Enregistrer une image</h4>

							<?= $this->Flash->render('er_gene'); ?>
							<?= $this->Form->create('image', array('type'=>'file')); ?>
								<ul>
									<li>format png</li>
									<li>taille minimale (1920 x 1080)</li>
								</ul>
							
							<?= $this->Form->hidden('hidden', ['value' => 'car']); ?>
							<?= $this->Form->input('avatar_file', array('label' => 'Envoyer votre image',
									'type' => 'file')); ?>
									
							<?= $this->Form->button('Envoyé'); ?>
							<?= $this->Form->end(); ?>
						</div>
						
					</div>
				</div>

            </div>
        </div>
    </div>
	<div class="col-lg-6 col-xs-12 hidden-xs hide">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3 class="header-title">TV</h3>   

				<div class="row">
					<div class="col-lg-12 col-md-12">
						
						<?php 
							$i = 0;
							foreach ($filesTV as $fichier):
								$i++;
						?>
							<div class="col-sm-6 col-md-4">
								<div class="thumbnail">
									<img src="<?= $this->request->webroot . "img/tv/". $fichier ?>" />
									<div class="caption">
										<p><?= "tv".$i ?></p>
									</div>
								</div>
						    </div>
						<?php endforeach; ?>
			
					</div>

					<div class="col-lg-12 col-md-12">
						<div class='col-lg-5 col-lg-offset-2'>
							<h4>Enregistrer une image</h4>

							<?= $this->Flash->render('er_tv'); ?>
							<?= $this->Flash->render('er_gene'); ?>
							<?= $this->Form->create('image', array('type'=>'file')); ?>
								<ul>
									<li>Format png</li>
									<li>Exemple de nom de fichier: tv1.png</li>
									<li>Taille minimale (1920 x 1080)</li>
								</ul>
							
							<?= $this->Form->hidden('hidden', ['value' => 'tv']); ?>
							<?= $this->Form->input('avatar_file', array('label' => 'Envoyer votre image',
									'type' => 'file')); ?>
									
							<?= $this->Form->button('Envoyé'); ?>
							<?= $this->Form->end(); ?>
						</div>
						
					</div>
				</div>

            </div>
        </div>
    </div>
</div>
