<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "admin".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property integer $role
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 * @property string $aliasModel
 */
abstract class Admin extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['password'], 'string'],
            [['role', 'created_at', 'updated_at', 'status'], 'integer'],
            [['username'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'role' => 'Role',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }




}
