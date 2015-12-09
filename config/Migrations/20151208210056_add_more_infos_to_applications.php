<?php
use Migrations\AbstractMigration;

class AddMoreInfosToApplications extends AbstractMigration
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
        $table = $this->table('applications');
		$table->addColumn('text', 'text', [
            'null' => true
        ]);
		$table->addColumn('email', 'string', [
            'null' => true
        ]);
		$table->addColumn('type_mission_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->update();
    }
}
