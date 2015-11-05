<?= $this->Html->css('bootstrap-markdown.min', ['block' => 'cssTop']); ?>
    <div class="row">
        <?= $this->cell('Sidebar::projectAction'); ?>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <ul id="formTab" class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#project-tab" aria-controls="project" data-toggle="tab"><?= __('Project') ?>
                        <i class="fa"></i></a></li>
                <li><a id="newMission" href="#mission-tab-0" class="mission-0" aria-controls="mission-0"
                       data-toggle="tab"><?= __('Add a mission') ?> <i class="fa fa-plus"></i></a></li>
            </ul>
            <br/>

            <div class="tab-content">
                <div class="tab-pane active" id="project-tab">
                    <div><a href="<?= $this->Wiki->buildLink('projects:submit'); ?>"><?= __('Need more informations?')  ?></a></div><br/>
                    <?= $this->Form->create($project, ['name' => 'project', 'id' => 'createProject']); ?>
                    <?php
                    echo $this->Form->input('name', ['label' => __('Name of the project ')]);
                    echo $this->Form->input('link', ['label' => __('Website of the project'), 'placeholder' => __("http(s)://website.com")]);
                    echo $this->Form->input('description',
                        [
                            'label' => __('Description of the project'),
                            'data-provide' => 'markdown',
                            'data-iconlibrary' => 'fa',
                            'data-hidden-buttons' => 'cmdImage',
                            'data-language' => ($this->request->session()->read('lang') == 'fr_CA' ? 'fr' : ''),
                            'data-footer' => '<a target="_blank" href="https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet">' . __('Markdown Cheatsheet') . '</a>'
                        ]
                    );
                    if (empty($organizations->toArray())) : ?>
                        <p>
                            <?= $this->Html->link(__('You\'re not part of an organization. Add yours now!'), ['controller' => 'Organizations', 'action' => 'submit']); ?>
                        </p>
                    <?php else : ?>
                        <?= $this->Form->input('organizations._ids', ['options' => $organizations, 'label' => __('Select organizations associated with the project. Leave blank if no organizations')]); ?>
                        <p>
                            <?= __('Or you can add a new organizations ') . $this->Html->link(__('here.'), ['controller' => 'Organizations', 'action' => 'submit']) ?>
                        </p>
                        <?php
                    endif;
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
            <?= $this->Form->button(__('Submit the project'), ['id' => 'submitProject', 'class' => 'btn-success ']) ?>
            <a id="addMission" href="#"><?= __('Or add a mission'); ?></a>
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
    ['block' => 'scriptBottom']);
if ($this->request->session()->read('lang') == 'fr_CA')
    echo $this->Html->script('locale/bootstrap-markdown.fr', ['block' => 'scriptBottom']);
$this->Html->scriptStart(['block' => 'scriptBottom']);
echo 'var btnSubmitTxt="' . __('Submit the project') . '";';
echo 'var errorMsg="' . __('All tabs must be valid before submitting the project.') . '";';
echo 'var multiselectTr="' . __('You must select at least one item.') . '";';
$this->Html->scriptEnd();
?>