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

    public static function getTopUser() {
        $data = Users::findAll()->order('points')->limit(10);
        return $data;
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            $this->updated_at = time();
            return true;
        }
        return false;
    }

    public static function getUserById($id) {
        $retVal = array();
        $user = Users::findOne(['id' => $id]);
        $retVal['id'] = $user->id;
        $retVal['name'] = $user->name;
        $retVal['avatar'] = $user->avatar;
        $retVal['description'] = $user->description;
        $retVal['created_at'] = Date('d/m/Y', $user->created_at);
        $retVal['updated_at'] = Date('d/m/Y', $user->updated_at);
        $retVal['number_upload'] = $user->number_upload;
        $retVal['points'] = $user->points;
        $retVal['role'] = $user->role;
        $retVal['status'] = $user->status;
        $retVal['gender'] = \app\components\Util::getGender($user->gender);
        $retVal['dob'] = $user->dob;
        $retVal['email'] = $user->email;
        return $retVal;
    }
    
    

}
