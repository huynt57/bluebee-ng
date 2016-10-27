<?php

namespace app\modules\controllers;

use app\models\Documents;
use yii\data\Pagination;
use Yii;

class DocumentController extends \yii\web\Controller {

    public $layout;
    public $layoutPath;

    public function actionIndex() {

        return $this->render('index');
    }

    public function actionList() {
        Yii::$app->view->title = 'Document management';
        $data = Documents::getAllLatestDocuments();
        return $this->render('list', $data);
    }

    public function actionEdit()
    {
        $this->layout = '@app/modules/views/layouts/modal';
        $this->layoutPath = 'main';

        $request = \Yii::$app->request;
        $id = $request->get('id');

        $data = Documents::findOne(['id' => $id]);

        return $this->render('form_update', ['data' => $data]);


    }

    public function actionUpdate()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $request = \Yii::$app->request;

        $data = $request->post();

        if ($data['name'] == '') {
            return ['status' => 0, 'message' => 'Không được để trống tên'];
        }

        $data['updated_at'] = time();
        try {
            Documents::updateAll($data, 'id = ' . $data['id']);
            return ['status' => 1, 'message' => 'Thành công'];
        } catch (Exception $ex) {
            return ['status' => 0, 'message' => 'Có lỗi xảy ra'];
        }


    }

    public function actionAdd()
    {
        $fileName = 'file';
        $request = Yii::$app->request;
        $value = array();
        $value['user'] = Yii::$app->session['user_id'];
        $value['name'] = $request->post('name', '');
        $value['description'] = $request->post('description', '');
        $value['subject'] = $request->post('subject', '');
        if (isset($_FILES[$fileName])) {
            $uploaded = Util::upload($fileName);
            $value['path'] = $uploaded['path'];
            $value['preview'] = $uploaded['preview'];
            $value['pdf'] = $uploaded['pdf'];
            $value['original_url'] = $uploaded['original_url'];
            $value['scribd_id'] = $uploaded['scribd_id'];
            $message = Documents::upload($value);
            return json_encode($message);
        }
        return false;
    }

    public function actionDelete()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $request = \Yii::$app->request;

        $data = $request->post();

        $id = $data['id'];

        try {

            Documents::findOne(['id'=>$id])->delete();

            return ['status' => 1, 'message' => 'Thành công'];
        } catch (Exception $ex) {
            return ['status' => 0, 'message' => 'Có lỗi xảy ra'];
        }
    }

}
