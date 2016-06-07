<?php

use yii\db\Migration;

class m160606_143914_init extends Migration {

    public function up() {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'avatar' => $this->text(),
            'fb_id' => $this->string(),
            'description' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'number_upload' => $this->integer(),
            'points' => $this->integer(),
            'role' => $this->integer(),
            'status' => $this->integer(),
            'gender' => $this->string(),
            'dob' => $this->string()
        ]);

        $this->createTable('documents', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'path' => $this->text(),
            'money_url' => $this->text(),
            'original_url' => $this->text(),
            'preview' => $this->text(),
            'description' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'subject' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'user' => $this->integer(),
            'status' => $this->integer()
        ]);

        $this->createTable('subjects', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'status' => $this->integer()
        ]);

        $this->createTable('teachers', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description' => $this->text(),
            'avatar' => $this->text(),
            'email' => $this->string(),
            'phone' => $this->string(),
            'website' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'stars' => $this->float(),
            'number_rated' => $this->integer(),
            'department' => $this->integer(),
            'status' => $this->integer()
        ]);

        $this->createTable('departments', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description' => $this->text(),
            'email' => $this->string(),
            'phone' => $this->string(),
            'website' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'status' => $this->integer()
        ]);

        $this->createTable('notifications', [
            'id' => $this->primaryKey(),
            'content' => $this->string(),
            'to' => $this->integer(),
            'type' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'status' => $this->integer()
        ]);

        $this->createTable('admin', [
            'id' => $this->primaryKey(),
            'username' => $this->string(),
            'password' => $this->text(),
            'role' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'status' => $this->integer()
        ]);

        $this->createTable('role', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'slug' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'status' => $this->integer()
        ]);
    }

    public function down() {
        echo "m160606_143914_init cannot be reverted.\n";

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
