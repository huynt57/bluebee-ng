<?php

use yii\db\Migration;

class m160607_072603_alter extends Migration {

    public function up() {
        $this->addColumn('users', 'email', 'string');
        $this->createTable('news', [
            'id' => $this->primaryKey(),
            'content' => $this->text(),
            'tag' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'number_upload' => $this->integer(),
        ]);
    }

    public function down() {
        echo "m160607_072603_alter cannot be reverted.\n";
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
