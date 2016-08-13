<?php

use yii\db\Migration;

class m160813_145223_add_program_table extends Migration
{
    public function up()
    {
        $this->createTable('program', [
            'id' => $this->primaryKey(),
            'department_id' => $this->integer(),
            'semester' => $this->text(),
            'subject'=>$this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    public function down()
    {
        echo "m160813_145223_add_program_table cannot be reverted.\n";

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
