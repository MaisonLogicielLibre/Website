<?php
use Migrations\AbstractMigration;

class CreateMissions extends AbstractMigration
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
        $table = $this->table('missions');
        $table->addColumn('project_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('role', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);
        $table->addColumn('mission', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('active', 'integer', [
            'default' => null,
            'limit' => 2,
            'null' => false,
        ]);
        $table->create();
    }
}
