<?php

namespace app\controllers;

use app\models\Departments;
use Yii;



class ProgramController extends \yii\web\Controller {

    public function actionIndex() {

        return $this->render('index');

        $request = Yii::$app->request;

        $department_id = $request->get('department_id');

        $department_name = Departments::findOne(['id'=>$department_id])->name;

        return $this->render('index', ['department_name' => $department_name]);
    }

    public function actionSuggest() {

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
