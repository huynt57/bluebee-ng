<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "teacher_subject".
 *
 * @property integer $id
 * @property string $teacher_id
 * @property string $subject_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $aliasModel
 */
abstract class TeacherSubject extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teacher_subject';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject_id'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['teacher_id'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'teacher_id' => 'Teacher ID',
            'subject_id' => 'Subject ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }




}
