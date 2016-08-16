<?php

namespace app\modules\controllers;
use app\models\Subjects;

class SubjectController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $data = Subjects::getAllSubject();
        return $this->render('index', $data);
    }

}
