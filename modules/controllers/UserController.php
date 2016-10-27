<?php

namespace app\modules\controllers;

use app\models\Users;
use yii\data\Pagination;
use Yii;

class UserController extends \yii\web\Controller
{
    public $layout;
    public $layoutPath;

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionList()
    {
        Yii::$app->view->title = 'User management';
        $data = Users::getAll();
        return $this->render('list', $data);
    }

    public function actionEdit()
    {
        $this->layout = '@app/modules/views/layouts/modal';
        $this->layoutPath = 'main';

        $request = \Yii::$app->request;
        $id = $request->get('id');

        $data = Subjects::findOne(['id' => $id]);

        return $this->render('form_update', ['data' => $data]);


    }

    public function actionUpdate()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $request = \Yii::$app->request;

        $data = $request->post();

        unset($data['_csrf']);

        if ($data['name'] == '') {
            return ['status' => 0, 'message' => 'Không được để trống tên'];
        }

        $data['updated_at'] = time();
        try {
            Subjects::updateAll($data, 'id = ' . $data['id']);
            return ['status' => 1, 'message' => 'Thành công'];
        } catch (Exception $ex) {
            return ['status' => 0, 'message' => 'Có lỗi xảy ra'];
        }


    }

    public function actionAdd()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $request = \Yii::$app->request;

        $data = $request->post();

        if ($data['name'] == '') {
            return ['status' => 0, 'message' => 'Không được để trống tên'];
        }
        $data['created_at'] = time();
        $data['updated_at'] = time();

        try {

            $model = new Subjects();
            $model->attributes = $data;
            if ($model->save()) {

                return ['status' => 1, 'message' => 'Thành công'];
            }
            return ['status' => 0, 'message' => 'Có lỗi xảy ra'];
        } catch (Exception $ex) {
            return ['status' => 0, 'message' => 'Có lỗi xảy ra'];
        }
    }

    public function actionDelete()
    {


        Yii::$app->response->format = Response::FORMAT_JSON;
        $request = \Yii::$app->request;

        $data = $request->post();

        $id = $data['id'];

        try {

            Subjects::findOne(['id'=>$id])->delete();

            return ['status' => 1, 'message' => 'Thành công'];
        } catch (Exception $ex) {
            return ['status' => 0, 'message' => 'Có lỗi xảy ra'];
        }
    }

}
