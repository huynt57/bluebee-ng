<?php

namespace app\controllers;

use app\models\Departments;
use Yii;



class ProgramController extends \yii\web\Controller {

    public function actionIndex() {

        $departments = Departments::find()->all();

        Yii::$app->view->title = 'Xem chương trình đào tạo các ngành';

        return $this->render('list', ['departments'=>$departments]);
    }

    public function actionSuggest() {
        $request = Yii::$app->request;

        $department_id = $request->get('id');

        $department_name = Departments::findOne(['id'=>$department_id])->name;

        Yii::$app->view->title = 'Chương trình đào tạo ngành: ' . $department_name;

        return $this->render('index', ['department_name' => $department_name, 'department_id'=>$department_id]);
    }



//    public function actionAddSub() {
//        $o_subs = TblSubject::find()->all();
//        foreach ($o_subs as $item) {
//            $sub = new Subjects;
//            $sub->name = $item->subject_name;
//            $sub->description = $item->subject_content;
//            $sub->updated_at = time();
//            $sub->created_at = time();
//            $sub->status = 1;
//            $sub->save();
//        }
//    }

}
