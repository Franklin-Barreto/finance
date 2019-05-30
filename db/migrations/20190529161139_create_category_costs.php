<?php

use Phinx\Migration\AbstractMigration;

class CreateCategoryCosts extends AbstractMigration
{

    public function up()
    {
        $this->table('category_costs')
            ->addColumn('name', 'string')
            ->addColumn('create_at', 'datetime')
            ->addColumn('update_at', 'datetime')
            ->create();
    }

    public function down()
    {
        $this->table('category_costs')->drop()->save();
    }

}
