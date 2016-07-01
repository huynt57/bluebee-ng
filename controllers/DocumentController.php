<?php

namespace app\controllers;

use app\models\Documents;
use Yii;
use app\components\Util;
use app\models\Subjects;
use app\models\Wishlist;

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
            $value['original_url'] = $uploaded['original_url'];
            $message = Documents::upload($value);
            return $message;
        }
        return false;
    }

    public function actionGetLatestDocuments() {
        Yii::$app->view->title = 'Tài liệu mới nhất';
        $data = Documents::getAllLatestDocuments();
        return $this->render('documents', $data);
    }

    public function actionItem() {
        $request = Yii::$app->request;
        try {
            $id = $request->get('id', '');
            $document = Documents::getDocumentById($id);
            Yii::$app->view->title = $document['name'];
            return $this->render('item', ['data' => $document]);
        } catch (Exception $ex) {
            
        }
    }

    public function actionGetDocumentBySubject() {
        $request = Yii::$app->request;
        try {
            $subject = $request->get('id', '');
            $documents = Documents::getDocumentsBySubject($subject);
            $subject_name = Subjects::findOne(['id' => $subject])->name;
            Yii::$app->view->title = 'Tài liệu môn ' . $subject_name;
            return $this->render('documents', $documents);
        } catch (Exception $ex) {
            
        }
    }

    public function actionAddWishlist() {
        $request = Yii::$app->request;
        try {
            $doc_id = $request->post('doc_id', '');
            $user_id = $request->post('user_id', '');
            $result = Wishlist::add($doc_id, $user_id);
            return $result;
        } catch (Exception $ex) {
            
        }
    }

    //Download file tam thoi
    public function actionDownload() {
        $request = Yii::$app->request;
        try {
            $doc_id = $request->post('doc_id', '');
            $user_id = $request->post('user_id', '');
            $result = Wishlist::add($doc_id, $user_id);
            return $result;
        } catch (Exception $ex) {
            
        }
    }

}
