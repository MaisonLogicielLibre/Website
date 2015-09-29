<?php
use Migrations\AbstractMigration;

class CreateApplication extends AbstractMigration
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
        $table->addColumn('project_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('user_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('presentation', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('type_application_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('weeklyHours', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('startDate', 'date', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('endDate', 'date', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('accepted', 'boolean', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('archived', 'boolean', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
