<?php

namespace app\controllers;

use Yii;
use app\components\Util;
use app\components\Moss;

class MossController extends \yii\web\Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionCheck() {

        Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => 'Bluebee-UET.com - Kiểm tra sao chép code'
        ]);
        Yii::$app->view->registerMetaTag([
            'property' => 'og:title',
            'content' => 'Bluebee-UET.com - Kiểm tra sao chép code'
        ]);
        Yii::$app->view->registerMetaTag([
            'property' => 'og:description',
            'content' => 'Bluebee-UET.com - Kiểm tra sao chép code'
        ]);
        Yii::$app->view->registerMetaTag([
            'property' => 'og:image',
            'content' => 'http://bluebee-uet.com/img/logo.jpg'
        ]);


        $languages = Yii::$app->params['moss_languages'];
        Yii::$app->view->title = 'Kiểm tra sao chép code';



        return $this->render('index', ['languages' => $languages]);
    }

    public function actionUpload() {
        $request = Yii::$app->request;
        $lang = $request->post('language', '');

        if($lang == '')
        {
            return json_encode(Util::arrayError('Bạn phải chọn ngôn ngữ', ''));
        }

        $result = Util::multipleUpload('file');

        if(is_array($result))
        {
            return json_encode(Util::arrayError($result['message'], ''));
        }

        $moss = new Moss(Yii::$app->params['moss_id']);
        $moss->setLanguage($lang);
        $moss->addByWildcard($result . '/*');
        $moss->setCommentString("This is a bluebee test");

        return json_encode(Util::arraySuccess('Thành công', $moss->send()));


    }

}
