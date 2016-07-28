<?php

namespace app\modules\controllers;

class ProgramController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
