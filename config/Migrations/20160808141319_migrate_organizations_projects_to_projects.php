<?php

use Phinx\Migration\AbstractMigration;
use Cake\ORM\TableRegistry;

class MigrateOrganizationsProjectsToProjects extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $this->Projects = TableRegistry::get('Projects');
        $this->OrganizationsProjects = TableRegistry::get('OrganizationsProjects');
        $orgProjects = $this->OrganizationsProjects->find('all');
        //$this->out('setting Orgs for projects');
        foreach ($orgProjects as $orgProject) {
            $project_id = $orgProject['project_id'];
            $org_id = $orgProject['organization_id'];
            $projRecord = $this->Projects->find()->where(['id' => $project_id])->first();
            $this->Projects->patchEntity($projRecord, ['organization_id' => $org_id]);

            if (!$this->Projects->save($projRecord)) {
                //$this->out('error saving project id = ' . $project_id);
                return false;
            }
        }
    }
}
