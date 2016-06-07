<?php

use yii\db\Migration;

class m160606_152549_alter extends Migration
{
    public function up()
    {
        $this->addColumn('documents', 'number_download', 'integer');
      
    }

    public function down()
    {
        echo "m160606_152549_alter cannot be reverted.\n";
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
