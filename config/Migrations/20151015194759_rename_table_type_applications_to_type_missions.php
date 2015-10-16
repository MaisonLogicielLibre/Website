<?php
use Migrations\AbstractMigration;

class RenameTableTypeApplicationsToTypeMissions extends AbstractMigration
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
        $table = $this->table('type_applications');
        $table->rename('type_missions');
    }
}
