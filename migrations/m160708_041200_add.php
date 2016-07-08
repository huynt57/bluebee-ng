<?php

use yii\db\Migration;

class m160708_041200_add extends Migration {

    public function up() {
        $this->addColumn('documents', 'token', 'text');
    }

    public function down() {
        echo "m160708_041200_add cannot be reverted.\n";

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
