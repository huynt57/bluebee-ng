<?php

namespace app\controllers;

use app\components\MOSS;

class MossController extends \yii\web\Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionUpload() {
        
    }

    public function actionCheck() {
        $moss = new MOSS(Yii::$app->params['moss_user_id']);
        $moss->setLanguage($lang);
        $moss->addByWildcard('test/*');
        $moss->addBaseFile('Example.java');
        $moss->setCommentString("This is a test");
        print_r($moss->send());
    }

}
