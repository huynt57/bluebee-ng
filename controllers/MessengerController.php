<?php

namespace app\controllers;
use app\components\MessengerBot;

class MessengerController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
