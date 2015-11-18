<?php
use Migrations\AbstractMigration;

class CreateStatistics extends AbstractMigration
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
		$table = $this->table('statistics');
        $table->addColumn('commits', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ]);
		$table->addColumn('pull_requests_open', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ]);
		$table->addColumn('pull_requests_close', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ]);
		$table->addColumn('issues_open', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ]);
		$table->addColumn('issues_close', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ]);
		$table->addColumn('date', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
		$table->create();
    }
}
