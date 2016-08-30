<?php

namespace app\controllers;

use app\models\Departments;
use app\models\TblTeacher;
use app\models\Teachers;
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


//    public function actionAddTeacher() {
//        $o_subs = TblTeacher::find()->all();
//        foreach ($o_subs as $item) {
//            $sub = new Teachers();
//            $sub->name = $item->teacher_acadamic_title .' '. $item->teacher_name;
//            $sub->description = $item->teacher_description;
//            $sub->updated_at = time();
//            $sub->created_at = time();
//            $sub->status = 1;
//            $sub->avatar = '';
//            $sub->phone = $item->teacher_phone;
//            $sub->email = $item->teacher_email;
//            $sub->address = $item->teacher_work_place;
//            $sub->website = $item->teacher_personal_page;
//            $sub->avatar = 'https://placeholdit.imgix.net/~text?txtsize=25&txt=270%C3%97270&w=270&h=270';
//            $sub->research = $item->teacher_research;
//            $sub->department = $item->teacher_dept;
//            $sub->save();
//        }
//    }

}
