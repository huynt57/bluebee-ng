<?php

use yii\db\Migration;

class m160609_094353_update extends Migration
{
    public function up()
    {
        $this->addColumn('users', 'pdf', 'text');
    }

    public function down()
    {
        echo "m160609_094353_update cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
