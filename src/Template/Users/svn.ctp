<?= $this->Html->css('bootstrap-social', ['block' => 'cssTop']); ?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h1 class="page-header"><?= __('Edit CVS'); ?></h1>
        <?php
        $this->Html->addCrumb(__('Home'), '/');
        $this->Html->addCrumb(__('Users'), '/Users');
        $this->Html->addCrumb(__('My profile'), '/users/view/'.$user->id);
        $this->Html->addCrumb(__('Edit CVS'));

        echo $this->Html->getCrumbList(); ?>
    </div>
</div>
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
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="header-title"><?= __('CVS added') ?> <?= $this->Wiki->addHelper('CVS'); ?></h3>
                        <table class="table borderless table-striped">
                            <thead>
                                <td></td>
                                <td></td>

                            <?php foreach($pseudos as $pseudo) { ?>
                                <tr>
                                    <td>
                                        <!-- Name of cvs -->
                                        <?= $pseudo['pseudo'] ?>
                                    </td>
                                    <td>
                                        <!-- Remove action -->
                                        <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'svnRemove', $user->getId(), '?' => ['pseudo' => $pseudo['pseudo']]]); ?>"><?= ' ' . __("Remove") ?></a></td>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
