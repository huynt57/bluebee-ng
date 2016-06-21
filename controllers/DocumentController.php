<?php

namespace app\controllers;

use app\models\Documents;
use Yii;
use app\components\Util;
use app\models\Subjects;

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
            $message = Documents::upload($value);
            return $message;
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
            return $this->render('read', ['data' => $document]);
        } catch (Exception $ex) {
            
        }
    }

    public function actionGetDocumentBySubject() {
        $request = Yii::$app->request;
        try {
            $subject = $request->get('subject', '');
            $documents = Documents::getDocumentsBySubject($subject);
            $subject_name = Subjects::findOne(['id' => $subject])->name;
            return $this->render('documents', ['documents' => $documents, 'title' => $subject_name]);
        } catch (Exception $ex) {
            
        }
    }
        
    public function actionAddWishlist() {
        $request = Yii::$app->request;
        try {
            $doc = $request->post('doc_id', '');
            $user = $request->post('user_id', '');
            
        } catch (Exception $ex) {
            
        }
    }
    //Download file tam thoi
    public function actionDownload()
    {
        $request = Yii::$app->request;
        
    }

}
