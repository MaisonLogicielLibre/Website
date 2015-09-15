<?php
use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
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
        $table->addColumn('firstName', 'string', [
            'limit' => 50,
            'null' => false
        ])
            ->addColumn('lastName', 'string', [
                'limit' => 50,
                'null' => false
            ])
            ->addColumn('biography', 'text', [
                'null' => true
            ])
            ->addColumn('portfolio', 'text', [
                'null' => true
            ])
            ->addColumn('email', 'string', [
                'limit' => 255,
                'null' => false
            ])
            ->addColumn('phone', 'string', [
                'limit' => 25,
                'null' => false
            ])
            ->addColumn('gender', 'integer', [
                'null' => true,
                'limit' => 2
            ])
            ->addColumn('password', 'string', [
                'limit' => 255,
                'null' => false
            ])
            ->addColumn('username', 'string', [
                'limit' => 50,
                'null' => false
            ])
            ->addColumn('universitie_id', 'integer', [
                'limit' => 10,
                'null' => false
            ])
            ->create();
    }
}
