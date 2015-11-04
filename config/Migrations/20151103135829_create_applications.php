<?php
use Migrations\AbstractMigration;

class CreateApplications extends AbstractMigration
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
		$table->addColumn('mission_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('user_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
		$table->addColumn('accepted', 'boolean', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('rejected', 'boolean', [
            'default' => null,
            'null' => false,
        ]);
		$table->create();
    }
}
