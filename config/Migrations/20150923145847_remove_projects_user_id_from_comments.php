<?php
use Migrations\AbstractMigration;

class RemoveProjectsUserIdFromComments extends AbstractMigration
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
        $table = $this->table('comments');
        $table->removeColumn('projects_user_id');
        $table->update();
    }
}
