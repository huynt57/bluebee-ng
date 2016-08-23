<?php

namespace app\models;

use Yii;
use \app\models\base\Users as BaseUsers;
use yii\data\Pagination;

/**
 * This is the model class for table "users".
 */
class Users extends BaseUsers {

    public static function facebookLogin($value) {
        $check = Users::findOne(['fb_id' => $value['fb_id']]);
        if ($check) {
            Yii::$app->session['user_id'] = $check->id;
            Yii::$app->session['user'] = $check;
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
        Yii::$app->session['user_id'] = $user->id;
        Yii::$app->session['user'] = $user;
    }

    public static function getTopUser() {
        $data = Users::find()->order('points')->limit(10)->all();
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
        $retVal['fb_id'] = $user->fb_id;
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

    public static function getAll()
    {
        $query = Users::find()->orderBy('id desc');
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $pages->defaultPageSize = 27;
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return [
            'models' => $models,
            'pages' => $pages,
        ];
    }
}
