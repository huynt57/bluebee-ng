<?php

namespace app\modules\controllers;

use app\models\Documents;

class DocumentController extends \yii\web\Controller {

    public function actionIndex() {

        return $this->render('index');
    }

    public function actionList() {
        $data = Documents::getAllLatestDocuments();
        return $this->render('list', $data);
    }

    public function actionEdit() {
        return $this->render('add');
    }

    public function actionUpdate() {
        $request = \Yii::$app->request;

        $data = $request->post();

        Documents::updateAll($data, 'id = '.$data['id']);

        return true;
        
    }

    public function actionAdd() {

        $request = \Yii::$app->request;

        $data = $request->post();

        $model = new Documents();
        $model->attributes = $data;

        $model->save();

        return true;

    }

    public function actionDelete() {
        
    }

}
