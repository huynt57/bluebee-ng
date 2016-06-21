<?php

use yii\db\Migration;

class m160621_075713_wishlist extends Migration
{
    public function up()
    {
            $this->createTable('wishlist', [
            'id' => $this->primaryKey(),
            'doc_id' => $this->integer(),
            'user_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    public function down()
    {
        echo "m160621_075713_wishlist cannot be reverted.\n";

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
