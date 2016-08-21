<?php

namespace app\modules\controllers;

use app\models\Subjects;
use yii\web\Response;
use Yii;

class SubjectController extends \yii\web\Controller
{
    public $layout;

    public $layoutPath;

    public function actionList()
    {
        $data = Subjects::getAllSubject();
        return $this->render('list', $data);
    }

    public function actionEdit()
    {
        $this->layout = '@app/modules/views/layouts/modal';
        $this->layoutPath = 'main';

        $request = \Yii::$app->request;
        $id = $request->get('id');

        $data = Subjects::findOne(['id'=>$id]);

        return $this->render('form_update', ['data'=>$data]);


    }

    public function actionUpdate()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $request = \Yii::$app->request;

        $data = $request->post();

        if ($data['name'] == '')
        {
            return ['status' => 0, 'message' => 'Không được để trống tên'];
        }
        Documents::updateAll($data, 'id = ' . $data['id']);

        return true;

    }

    public function actionAdd()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $request = \Yii::$app->request;

        $data = $request->post();

        if ($data['name'] == '')
        {
            return ['status' => 0, 'message' => 'Không được để trống tên'];
        }

        $model = new Subjects();
        $model->attributes = $data;
        $model->save();

        return  ['status' => 1, 'message' => 'Thành công'];

    }

    public function actionDelete()
    {



    }

}
