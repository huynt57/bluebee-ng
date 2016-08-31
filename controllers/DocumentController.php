<?php

namespace app\controllers;

use app\models\Documents;
use Yii;
use app\components\Util;
use app\models\Subjects;
use app\models\Wishlist;
use yii\caching\ApcCache;
use yii\caching\Cache;

class DocumentController extends \yii\web\Controller {

//    public function actionIndex() {
//        return $this->render('index');
//    }

    public function actionUpload() {
        $fileName = 'file';
        $request = Yii::$app->request;
        $value = array();
        $value['user'] = Yii::$app->session['user_id'];
        $value['name'] = $request->post('name', '');
        $value['description'] = $request->post('description', '');
        $value['subject'] = $request->post('subject', '');

        $check_subject = Subjects::find()->where(['id'=> $request->post('subject', '')])->count();

        if($check_subject == 0)
        {
            return json_encode(Util::arrayError('Không tồn tại môn học này', ''));
        }

        if(empty(Yii::$app->session['user_id']))
        {
            return json_encode(Util::arrayError('Bạn chưa đăng nhập', ''));
        }


        if (isset($_FILES[$fileName])) {
            $uploaded = Util::upload($fileName);

            if($uploaded['status'] == false)
            {
                return json_encode($uploaded['message']);
            } else {

                $value['path'] = $uploaded['path'];
                $value['preview'] = $uploaded['preview'];
                $value['pdf'] = $uploaded['pdf'];
                $value['original_url'] = $uploaded['original_url'];
                $value['scribd_id'] = $uploaded['scribd_id'];
                $message = Documents::upload($value);
                return json_encode($message);
            }
        } else {
            return json_encode(Util::arrayError('Bạn phải đính kèm file', ''));
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
            $related_documents = Documents::getRelatedDocuments();

            Yii::$app->view->registerMetaTag([
                'name' => 'description',
                'content' => $document['description']
            ]);
            Yii::$app->view->registerMetaTag([
                'property' => 'og:title',
                'content' => $document['name']
            ]);
            Yii::$app->view->registerMetaTag([
                'property' => 'og:description',
                'content' => $document['description']
            ]);
            Yii::$app->view->registerMetaTag([
                'property' => 'og:image',
                'content' => Util::makeUrlImage($document['preview'])
            ]);
            return $this->render('item', ['data' => $document, 'related_documents' => $related_documents]);
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

            Yii::$app->view->registerMetaTag([
                'name' => 'description',
                'content' => 'Bluebee-UET.com - Tài liệu môn ' . $subject_name
            ]);
            Yii::$app->view->registerMetaTag([
                'property' => 'og:title',
                'content' => 'Bluebee-UET.com - Tài liệu môn ' . $subject_name
            ]);
            Yii::$app->view->registerMetaTag([
                'property' => 'og:description',
                'content' => 'Bluebee-UET.com - Tài liệu môn ' . $subject_name
            ]);
            Yii::$app->view->registerMetaTag([
                'property' => 'og:image',
                'content' => 'http://bluebee-uet.com/img/logo.jpg'
            ]);


            return $this->render('documents', $documents);
        } catch (Exception $ex) {
            
        }
    }

    public function actionAddWishlist() {


        $request = Yii::$app->request;
        try {
            $doc_id = $request->post('doc_id', '');
            $user_id = Yii::$app->session['user_id'];

            $check_doc = Documents::find()->where(['id'=>$doc_id])->count();

            if($check_doc == 0)
            {
                return json_encode(Util::arrayError('Không tồn tại tài liệu này', ''));
            }

            if(empty($user_id))
            {
                return json_encode(Util::arrayError('Bạn chưa đăng nhập', ''));
            }

            $result = Wishlist::add($doc_id, $user_id);
            return json_encode(Util::arraySuccess('Thành công', $result));
        } catch (Exception $ex) {
            
        }
    }

    //Download file tam thoi
    public function actionDownload() {
        $request = Yii::$app->request;
        try {
            $token = $request->get('token', '');
            $document = Document::findOne(['token' => $token]);
            Yii::$app->response->sendFile($document->original_url);
        } catch (Exception $ex) {
            
        }
    }

}
