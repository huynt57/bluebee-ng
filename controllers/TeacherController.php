<?php

namespace app\controllers;

use Yii;
use app\models\Teachers;
use app\components\Util;

class TeacherController extends \yii\web\Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionGetTeachers() {
        Yii::$app->view->title = 'Danh sách giáo viên';
        $data = Teachers::getAllLatestTeachers();
        return $this->render('teachers', $data);
    }

    public function actionGetTeachersBySubject() {
        $request = Yii::$app->request;
        try {
            $subject = $request->get('id', '');
            $teachers = Teachers::getTeachersBySubject($subject);
            $subject_name = Subjects::findOne(['id' => $subject])->name;
            Yii::$app->view->title = 'Giảng viên môn ' . $subject_name;
            return $this->render('teachers', $teachers);
        } catch (Exception $ex) {
            
        }
    }
    
    public function actionItem() {
        $request = Yii::$app->request;
        try {
            $id = $request->get('id', '');
            $document = Teachers::getTeacherById($id);
            $related_teachers = Teachers::getRelatedTeachers();
            Yii::$app->view->title = 'Giảng viên:' .$document['name'];
            return $this->render('item', ['data' => $document, 'related_teachers'=>$related_teachers]);
        } catch (Exception $ex) {
            
        }
    }
    

    public function actionRateTeacher() {
        $request = Yii::$app->request;
        try {
            $teacher = $request->post('teacher', '');
            $stars = $request->post('stars', '');
            $result = Teachers::rateTeacher($teacher, $stars);
            Util::arraySuccess('Success', $result);
        } catch (Exception $ex) {
            
        }
    }

}
