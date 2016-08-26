<?= $this->Html->css('bootstrap-markdown.min', ['block' => 'cssTop']); ?>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="page-header"><?= __('Submit a project'); ?></h1>
            <?php
            $this->Html->addCrumb(__('Home'), '/');
            $this->Html->addCrumb(__('Projects'), '/Projects');
            $this->Html->addCrumb(__('Submit a project'));

            echo $this->Html->getCrumbList(); ?>
        </div
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <?= __("Maison Logiciel Libre supports software development and system administration projects. Projects have one or more university student missions. A project can be owned by zero, one, or multiple organizations.") ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="header-title"><?= __('Submit a project'); ?></h3>
                    <ul id="formTab" class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#project-tab" aria-controls="project" data-toggle="tab"><?= __('Project') ?>
                                <i class="fa"></i></a></li>
                        <li><a id="newMission" href="#mission-tab-0" class="mission-0" aria-controls="mission-0"
                               data-toggle="tab"><?= __('Add a mission') ?> <i class="fa fa-plus"></i></a></li>
                    </ul>
                    <br/>

                    <div class="tab-content">
                        <div class="tab-pane active" id="project-tab">
                            <div>
                                <a href="<?= $this->Wiki->buildLink('projects:submit'); ?>"><?= __('Need more informations?') ?></a>
                            </div>
                            <br/>
                            <?= $this->Form->create($project, ['name' => 'project', 'id' => 'createProject']); ?>
                            <?php
                            echo $this->Form->input('name', ['label' => __('Name of the project ')]);
                            echo $this->Form->input('link', ['pattern' => '^(https?):\/\/(.*)\.(.+)', 'title' => 'http://website.ca', 'label' => __('Website of the project'), 'placeholder' => __("http(s)://website.com")]);
                            echo $this->Form->input(
                                'description',
                                [
                                    'label' => __('Description of the project'),
                                    'data-provide' => 'markdown',
                                    'data-iconlibrary' => 'fa',
                                    'data-hidden-buttons' => 'cmdImage',
                                    'data-language' => ($this->request->session()->read('lang') == 'fr_CA' ? 'fr' : ''),
                                    'data-footer' => '<a target="_blank" href="https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet">' . __('Markdown Cheatsheet') . '</a>'
                                ]
                            ); ?>

                                <?= $this->Form->input(
                                    'organization_id',
                                    ['options' => $organizations,
                                        'type' => 'select',
                                        'multiple'=> false,
                                        'empty' => false,
                                    'label' => __('Select the organization associated with the project.')]
                                ); ?>
                                <?php
                                $projectArray = $project->toArray();
                                $missionsPost = array_intersect_key($projectArray, array_flip(preg_grep('/^mission-/', array_keys($projectArray))));
                                if (!is_null($missionsPost)) :
                                    foreach ($missionsPost as $i => $mission) :
                                        ?>
                                        <input type='hidden' name='<?= $i ?>' value='<?= $mission ?>'/>
                                    <?php endforeach;
                                endif;
                                echo $this->Form->end()
                            ?>
                        </div>
                        <div class="tab-pane" id="mission-tab-0">
                            <div class="clearfix">
                                <button class="deleteMission pull-right btn btn-danger"><?= __('Delete the mission') ?></button>
                            </div>
                            <form role="form" accept-charset="utf-8">
                                <?php
                                echo $this->element('Missions/addForm');
                                echo $this->fetch('form');
                                ?>
                            </form>
                        </div>
                    </div>
                    <?= $this->Form->button(__('Submit the project'), ['id' => 'submitProject', 'class' => 'btn-info ']) ?>
                    <a id="addMission" href="#"><?= __('Or add a mission'); ?></a>
                </div>
            </div>
        </div>
    </div>
<?php echo $this->Html->script(
    [
        'markdown/markdown',
        'markdown/to-markdown',
        'bootstrap/bootstrap-markdown',
        'bootstrap.min',
        'projects/submit'
    ],
    ['block' => 'scriptBottom']
);
if ($this->request->session()->read('lang') == 'fr_CA') {
    echo $this->Html->script('locale/bootstrap-markdown.fr', ['block' => 'scriptBottom']); 
}
$this->Html->scriptStart(['block' => 'scriptBottom']);
echo 'var btnSubmitTxt="' . __('Submit the project') . '";';
echo 'var errorMsg="' . __('All tabs must be valid before submitting the project.') . '";';
echo 'var multiselectTr="' . __('You must select at least one item.') . '";';
echo 'var infoIntern="' . __('By selecting an intern, you acknowledge that you will pay for your intern (typically $12000 to $14000 per semester). We will then forward your posting to the CO-OP department of all our university partners.') . '";';
echo 'var infoMaster="' . __('This project type requires a professor and student(s) from the same university. Ensure the project is sufficiently complex for a graduate student (guidelines coming in 2016).') . '";';
echo 'var infoCapstone=\'' . __('A PFE/Capstone project requires a professor and student(s) from the same university. The length is 1 to 2 sessions, depending on the university. For example guidelines see here: (guidelines coming in 2016). {0} for more information', $this->Html->link(__('Contact us'), ['controller' => 'Pages', 'action' => 'contact'])) . '\';';
$this->Html->scriptEnd();
?>