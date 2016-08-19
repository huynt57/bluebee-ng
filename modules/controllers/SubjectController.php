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

    public function actionEdit()
    {
        return $this->render('add');
    }

    public function actionUpdate()
    {
        $request = \Yii::$app->request;

        $data = $request->post();

        Documents::updateAll($data, 'id = ' . $data['id']);

        return true;

    }

    public function actionAdd()
    {

        $request = \Yii::$app->request;

        $data = $request->post();

        $model = new Documents();
        $model->attributes = $data;

        $model->save();

        return true;

    }

    public function actionDelete()
    {

    }

}
