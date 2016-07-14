<?php

namespace app\controllers;

use Yii;
use app\components\Util;
use app\models\Users;
use app\models\Documents;

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
            $value['fb_id'] = $request->post('facebook_id', '');
            $result = Users::facebookLogin($value);
            return json_encode(Util::arraySuccess('Success', $result));
        } catch (Exception $ex) {
            
        }
    }

    public function actionMyPage() {
        try {
            $id = Yii::$app->session['user_id'];
            $data = Users::getUserById($id);
            Yii::$app->view->title = $data['name'] . ', chào mừng trở lại';
            return $this->render('profile', ['profile' => $data]);
        } catch (Exception $ex) {
            
        }
    }

    public function actionMyUpload() {
        try {
            $id = Yii::$app->session['user_id'];
            $data = Documents::getDocumentsByUser($id);
            Yii::$app->view->title ='';// Yii::$app->session['user'] . name . ', đây là tài liệu bạn đã tải lên';
            return $this->render('//document/documents', $data);
        } catch (Exception $ex) {
            
        }
    }

    public function actionMyWishlist() {
        try {
            $id = Yii::$app->session['user_id'];
            $data = Documents::getDocumentsByWishlist($id);
            Yii::$app->view->title ='';// Yii::$app->session['user'] . name . ', đây là tài liệu bạn đã đánh dấu';
            return $this->render('//document/documents', $data);
        } catch (Exception $ex) {
            
        }
    }

    public function actionOther() {
        
    }

    public function actionStatistic() {
        
    }

}
