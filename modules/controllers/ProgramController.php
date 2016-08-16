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
        return $this->render('index');
    }

    public function actionUpdate() {

    }

}
