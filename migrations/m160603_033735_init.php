<?php

use yii\db\Schema;
use yii\db\Migration;

class m160603_033735_init extends Migration {

    public function up() {
        $this->createTable('user', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'content' => Schema::TYPE_TEXT,
        ]);
        
        
    }

    public function down() {
        echo "m160603_033735_init cannot be reverted.\n";

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
