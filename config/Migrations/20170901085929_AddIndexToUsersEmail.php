<?php
use Migrations\AbstractMigration;

class AddIndexToUsersEmail extends AbstractMigration
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
        $table->changeColumn('email', 'string', ['limit' => 255, 'default' => null, 'null' => false]);
        $table->addIndex(['email'], ['unique' => true, 'name' => 'idx_users_email']);
        $table->update();
    }
}
