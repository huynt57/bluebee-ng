<?php

namespace app\controllers;

use Yii;
use app\components\Util;

class MossController extends \yii\web\Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionCheck() {
        $languages = Yii::$app->params['moss_languages'];
        Yii::$app->view->title = 'Kiểm tra sao chép code';

        return $this->render('index', ['languages' => $languages]);
    }

    public function actionUpload() {
        $result = Util::multipleUpload('file');
    }

}
