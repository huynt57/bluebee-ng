<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "notifications".
 *
 * @property integer $id
 * @property string $content
 * @property integer $to
 * @property string $type
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 * @property string $aliasModel
 */
abstract class Notifications extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notifications';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['to', 'created_at', 'updated_at', 'status'], 'integer'],
            [['content', 'type'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Content',
            'to' => 'To',
            'type' => 'Type',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }




}
