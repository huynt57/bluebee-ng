<?php

use yii\db\Migration;

class m160727_025408_update extends Migration {

    public function up() {
        $this->createTable('teacher_subject', [
            'id' => $this->primaryKey(),
            'teacher_id' => $this->string(),
            'subject_id' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    public function down() {
        echo "m160727_025408_update cannot be reverted.\n";

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
