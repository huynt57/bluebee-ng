<?php

namespace app\controllers;
use Yii;
use app\models\Teachers;

class TeacherController extends \yii\web\Controller
{
    public function actionIndex()
    {
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
            $teachers = Teachers::getDocumentsBySubject($subject);
            $subject_name = Subjects::findOne(['id' => $subject])->name;
            Yii::$app->view->title = 'Giảng viên môn ' . $subject_name;
            return $this->render('teachers', $teachers);
        } catch (Exception $ex) {
            
        }
    }

}
