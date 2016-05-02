<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property integer $user_id
 * @property string $user_id_fb
 * @property string $username
 * @property string $password
 * @property string $user_real_name
 * @property string $user_avatar
 * @property string $user_cover
 * @property string $user_student_code
 * @property integer $user_university
 * @property string $user_gender
 * @property string $user_dob
 * @property string $user_hometown
 * @property string $user_phone
 * @property string $user_description
 * @property integer $user_faculty
 * @property integer $user_class
 * @property integer $user_active
 * @property integer $user_status
 * @property integer $user_group
 * @property string $user_token
 * @property string $user_activator
 * @property string $user_qoutes
 * @property string $user_date_attend
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_university', 'user_faculty', 'user_class', 'user_active', 'user_status', 'user_group'], 'integer'],
            [['user_id_fb', 'user_avatar', 'user_cover', 'user_hometown', 'user_description', 'user_token', 'user_activator', 'user_date_attend'], 'string', 'max' => 200],
            [['username', 'password', 'user_real_name', 'user_student_code', 'user_gender', 'user_dob', 'user_phone'], 'string', 'max' => 45],
            [['user_qoutes'], 'string', 'max' => 400]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'user_id_fb' => 'User Id Fb',
            'username' => 'Username',
            'password' => 'Password',
            'user_real_name' => 'User Real Name',
            'user_avatar' => 'User Avatar',
            'user_cover' => 'User Cover',
            'user_student_code' => 'User Student Code',
            'user_university' => 'User University',
            'user_gender' => 'User Gender',
            'user_dob' => 'User Dob',
            'user_hometown' => 'User Hometown',
            'user_phone' => 'User Phone',
            'user_description' => 'User Description',
            'user_faculty' => 'User Faculty',
            'user_class' => 'User Class',
            'user_active' => 'User Active',
            'user_status' => 'User Status',
            'user_group' => 'User Group',
            'user_token' => 'User Token',
            'user_activator' => 'User Activator',
            'user_qoutes' => 'User Qoutes',
            'user_date_attend' => 'User Date Attend',
        ];
    }
}
