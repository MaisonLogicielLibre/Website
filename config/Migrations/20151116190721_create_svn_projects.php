<?php
use Migrations\AbstractMigration;

class CreateSvnProjects extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('svn_projects');
		$table->addColumn('owner_name', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
		$table->addColumn('repository_name', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('svn_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('project_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ]);
        $table->create();
    }
}
