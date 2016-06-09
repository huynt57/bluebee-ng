<?php

namespace app\controllers;

use app\models\Documents;
use Yii;
use app\components\Util;

class DocumentController extends \yii\web\Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionUpload() {
        $fileName = 'file';
        $request = Yii::$app->request;
        $value = array();
        $value['user'] = $request->post('user', '');
        $value['name'] = $request->post('name', '');
        $value['description'] = $request->post('description', '');
        $value['subject'] = $request->post('subject', '');
        if (isset($_FILES[$fileName])) {
            $uploaded = Util::upload($fileName);
            $value['path'] = $uploaded['path'];
            $value['preview'] = $uploaded['preview'];
            $value['pdf'] = $uploaded['pdf'];
            Documents::upload($value);
        }
        return false;
    }

    public function actionGetLatestDocuments() {
        $data = Documents::getAllLatestDocuments();
        return $this->render('documents', $data);
    }

    public function actionGetDocumentById() {
        $request = Yii::$app->request;
        try {
            $id = $request->get('id', '');
            $document = Documents::getDocumentById($id);
            return $document;
        } catch (Exception $ex) {
            
        }
    }

    public function actionGetDocumentBySubject() {
        $request = Yii::$app->request;
        try {
            $subject = $request->get('subject', '');
            $documents = Documents::getDocumentsBySubject($subject);
            return $documents;
        } catch (Exception $ex) {
            
        }
    }

}
