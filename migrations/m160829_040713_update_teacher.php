<?php

use yii\db\Migration;

class m160829_040713_update_teacher extends Migration
{
    public function up()
    {

        $this->addColumn('teachers', 'address', 'text');

    }

    public function down()
    {
        echo "m160829_040713_update_teacher cannot be reverted.\n";

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
