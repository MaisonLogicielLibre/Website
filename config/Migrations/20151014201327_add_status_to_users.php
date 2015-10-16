<?php
use Migrations\AbstractMigration;

class AddStatusToUsers extends AbstractMigration
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
        $table = $this->table('users');
        $table->addColumn('isAvailableMentoring', 'boolean', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('isStudent', 'boolean', [
            'default' => null,
            'null' => true,
        ]);
        $table->update();
    }
}
