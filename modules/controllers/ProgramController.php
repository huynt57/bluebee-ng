<?php

namespace app\modules\controllers;

use app\models\Program;

class ProgramController extends \yii\web\Controller
{
    public function actionList()
    {
        $data = Program::getAllProgram();
        return $this->render('list', $data);
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
