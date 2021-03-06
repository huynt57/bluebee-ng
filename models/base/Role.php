<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "role".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 * @property string $aliasModel
 */
abstract class Role extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'role';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slug'], 'string'],
            [['created_at', 'updated_at', 'status'], 'integer'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'slug' => 'Slug',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }




}
