<?php
use Migrations\AbstractMigration;

class ModifyUsersNullables extends AbstractMigration
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
        $table->changeColumn('universitie_id', 'integer', ['null' => true]);
        $table->changeColumn('gender', 'boolean' , ['null' => true]);
        $table->changeColumn('phone', 'string', ['limit' => 25, 'null' => true]);
        $table->changeColumn('firstName', 'string', ['limit' => 50, 'null' => true]);
        $table->changeColumn('lastName' , 'string' , ['limit' => 50, 'null' => true]);
    }
}
