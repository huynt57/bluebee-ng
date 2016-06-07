<?php

namespace app\models;

use Yii;
use \app\models\base\Users as BaseUsers;

/**
 * This is the model class for table "users".
 */
class Users extends BaseUsers {

    public static function facebookLogin($value) {
        $check = Users::findOne(['fb_id' => $value['fb_id']]);
        if ($check) {
            return 'User created !';
        }
        $user = new Users;
        foreach ($value as $item => $i) {
            $user->$item = $i;
        }
        $user->created_at = time();
        if ($user->save()) {
            return 'Success';
        }
    }
    
    public static function getTopUser()
    {
        
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            $this->updated_at = time();
            return true;
        }
        return false;
    }

}
