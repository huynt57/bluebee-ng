<?php

namespace app\controllers;

use yii\web\UploadedFile;
use app\models\Documents;
use Yii;

class DocumentController extends \yii\web\Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionUpload() {
        $request = Yii::$app->request;
        $fileName = 'file';
        $uploadPath = '/uploads';
        $value = array();
        $value['user'] = $request->post('user', '');
        $value['name'] = $request->post('name', '');
        $value['description'] = $request->post('description', '');
        $value['subject'] = $request->post('subject', '');
        if (isset($_FILES[$fileName])) {
            $file = UploadedFile::getInstanceByName($fileName);
            $path = $uploadPath . '/' . $file->name;
            $value['path'] = $path;
            if ($file->saveAs($path)) {
                Documents::upload($value);
            }
        }

        return false;
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
