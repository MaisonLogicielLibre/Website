<?php
use Migrations\AbstractMigration;

class CreateProjectsUsers extends AbstractMigration
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
        $table = $this->table('projects_users');
        $table->addColumn('user_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('project_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('cv', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('description', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('presentation', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('accepted', 'integer', [
            'default' => null,
            'limit' => 2,
            'null' => false,
        ]);
        $table->addColumn('is_mentor', 'integer', [
            'default' => null,
            'limit' => 2,
            'null' => false,
        ]);
        $table->create();
    }
}
