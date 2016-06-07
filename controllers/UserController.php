<?php

namespace app\controllers;

use Yii;
use app\components\Util;
use app\models\Users;

class UserController extends \yii\web\Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionLoginWithFacebook() {
        $request = Yii::$app->request;
        try {
            $value = array();
            $value['email'] = $request->post('email', '');
            $value['avatar'] = $request->post('avatar', '');
            $value['gender'] = $request->post('gender', '');
            $value['dob'] = $request->post('dob', '');
            $value['name'] = $request->post('name', '');
            $value['description'] = $request->post('description', '');
            $value['fb_id'] = $request->post('fb_id', '');
            $result = Users::facebookLogin($value);
            Util::arraySuccess('Success', $result);
        } catch (Exception $ex) {
            
        }
    }

}
