<?php

use yii\db\Migration;

class m160720_071951_scribd extends Migration {

    public function up() {
        $this->addColumn('documents', 'scribd_id', 'text');
    }

    public function down() {
        echo "m160720_071951_scribd cannot be reverted.\n";

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
