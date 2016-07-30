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
        
    }

    public function actionAdd() {
       return $this->render('add'); 
    }

    public function actionDelete() {
        
    }

}
