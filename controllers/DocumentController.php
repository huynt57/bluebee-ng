<?php

namespace app\controllers;

use yii\web\UploadedFile;
use app\models\Documents;
use Yii;
use Imagick;
use Scribd;

class DocumentController extends \yii\web\Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionConvert() {
        $scribd_api_key = "24cxjtv3vw69wu5p7pqd9";
        $scribd_secret = "sec-b2rlvg8kxwwpkz9fo3i02mo9vo";
        $scribd = new Scribd\API($scribd_api_key, $scribd_secret);

        $docx = Yii::getAlias('@webroot') . '/uploads/t';
        $upload_scribd = $scribd->uploadFromUrl($docx);
        $thumbnail_info = array('doc_id' => $upload_scribd["doc_id"],
            'method' => NULL,
            'session_key' => NULL,
            'my_user_id' => NULL,
            'width' => '220',
            'height' => '250');
        $get_thumbnail = $scribd->postRequest('thumbnail.get', $thumbnail_info);

        var_dump($upload_scribd);
    }
    
    public function actionDownload()
    {
        $scribd_api_key = "24cxjtv3vw69wu5p7pqd9";
        $scribd_secret = "sec-b2rlvg8kxwwpkz9fo3i02mo9vo";
        $scribd = new Scribd\API($scribd_api_key, $scribd_secret);
        $result = $scribd->downloadFromUrl('315134125', "PDF");
        var_dump($result);
    }

    public function actionUpload() {
        $request = Yii::$app->request;
        $fileName = 'file';
        $uploadPath = './uploads';
        $value = array();
        $value['user'] = $request->post('user', '');
        $value['name'] = $request->post('name', '');
        $value['description'] = $request->post('description', '');
        $value['subject'] = $request->post('subject', '');
        if (isset($_FILES[$fileName])) {
            $file = UploadedFile::getInstanceByName($fileName);
            $path = $uploadPath . '/' . $file->name;
            if ($file->saveAs($path)) {
                Documents::upload($value);
            }
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
