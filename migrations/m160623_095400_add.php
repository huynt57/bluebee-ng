<?php

use yii\db\Migration;

class m160623_095400_add extends Migration
{
    public function up()
    {
        $this->addColumn('documents', 'pdf', 'text');
    }

    public function down()
    {
        echo "m160623_095400_add cannot be reverted.\n";

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
