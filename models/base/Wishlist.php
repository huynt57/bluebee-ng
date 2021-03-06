<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "wishlist".
 *
 * @property integer $id
 * @property integer $doc_id
 * @property integer $user_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $aliasModel
 */
abstract class Wishlist extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wishlist';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['doc_id', 'user_id', 'created_at', 'updated_at'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'doc_id' => 'Doc ID',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }




}
