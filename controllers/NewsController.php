<?php

namespace app\controllers;

use Yii;
use app\models\News;

class NewsController extends \yii\web\Controller {

    public function actionIndex() {
        $data = News::getLatestNews();
        return $this->render('index', ['data' => $data]);
    }

}
