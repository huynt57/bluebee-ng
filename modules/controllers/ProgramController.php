<?php

namespace app\modules\controllers;

use app\models\Program;

class ProgramController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $data = Program::getAllProgram();
        return $this->render('index'. $data);
    }

    public function actionAdd()
    {
        $request = \Yii::$app->request;

        $data = $request->post();

        $model = new Program();
        $model->attributes = $data;

        $model->save();

        return true;


    }

    public function actionUpdate() {

    }

}
