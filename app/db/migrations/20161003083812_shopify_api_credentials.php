<?php

use Phinx\Migration\AbstractMigration;

class ShopifyApiCredentials extends AbstractMigration
{
    private $tableName = 'app_credentials';

    public function up()
    {
        $table = $this->table($this->tableName);
        $table->addColumn('app_access_token', 'string')
            ->addColumn('shop_name', 'string')
            ->addColumn('app_key', 'string')
            ->addColumn('app_secret', 'string')
            ->addColumn('app_permissions', 'string')
            ->addIndex('app_access_token', ['type' => 'unique'])
            ->addIndex('shop_name', ['type' => 'unique'])
            ->create();
    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }
}
