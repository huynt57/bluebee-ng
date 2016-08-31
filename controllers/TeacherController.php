<?php

namespace app\controllers;

use app\models\Departments;
use Yii;
use app\models\Teachers;
use app\components\Util;
use app\models\Subjects;

class TeacherController extends \yii\web\Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionGetTeachers() {
        Yii::$app->view->title = 'Danh sách giáo viên';
        $data = Teachers::getAllLatestTeachers();
        return $this->render('teachers', $data);
    }

    public function actionGetTeachersByDepartment()
    {
        $request = Yii::$app->request;
        try {
            $department = $request->get('id', '');
            $teachers = Teachers::getTeachersByDepartment($department);
            $department_name = Departments::findOne(['id' => $department])->name;



            Yii::$app->view->registerMetaTag([
                'name' => 'description',
                'content' => 'Bluebee-UET.com - Giảng viên ngành: ' . $department_name
            ]);
            Yii::$app->view->registerMetaTag([
                'property' => 'og:title',
                'content' => 'Bluebee-UET.com - Giảng viên ngành: ' . $department_name
            ]);
            Yii::$app->view->registerMetaTag([
                'property' => 'og:description',
                'content' => 'Bluebee-UET.com - Giảng viên ngành: ' . $department_name
            ]);
            Yii::$app->view->registerMetaTag([
                'property' => 'og:image',
                'content' => 'http://bluebee-uet.com/img/logo.jpg'
            ]);


            Yii::$app->view->title = 'Giảng viên ngành: ' . $department_name;
            return $this->render('teachers', $teachers);
        } catch (Exception $ex) {

        }
    }

    public function actionGetTeachersBySubject() {
        $request = Yii::$app->request;
        try {
            $subject = $request->get('id', '');
            $teachers = Teachers::getTeachersBySubject($subject);
            $subject_name = Subjects::findOne(['id' => $subject])->name;
            Yii::$app->view->title = 'Giảng viên môn ' . $subject_name;


            Yii::$app->view->registerMetaTag([
                'name' => 'description',
                'content' => 'Bluebee-UET.com - Giảng viên môn ' . $subject_name
            ]);
            Yii::$app->view->registerMetaTag([
                'property' => 'og:title',
                'content' => 'Bluebee-UET.com - Giảng viên môn ' . $subject_name
            ]);
            Yii::$app->view->registerMetaTag([
                'property' => 'og:description',
                'content' => 'Bluebee-UET.com - Giảng viên môn ' . $subject_name
            ]);
            Yii::$app->view->registerMetaTag([
                'property' => 'og:image',
                'content' => 'http://bluebee-uet.com/img/logo.jpg'
            ]);


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
            Yii::$app->view->title = 'Giảng viên: ' .$document['name'];


            Yii::$app->view->registerMetaTag([
                'name' => 'description',
                'content' => 'Bluebee-UET.com - Giảng viên: ' .$document['name']
            ]);
            Yii::$app->view->registerMetaTag([
                'property' => 'og:title',
                'content' => 'Bluebee-UET.com - Giảng viên: ' .$document['name']
            ]);
            Yii::$app->view->registerMetaTag([
                'property' => 'og:description',
                'content' => 'Bluebee-UET.com - Giảng viên: ' .$document['name']
            ]);
            Yii::$app->view->registerMetaTag([
                'property' => 'og:image',
                'content' => 'http://bluebee-uet.com/img/logo.jpg'
            ]);


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
