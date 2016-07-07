<?php

namespace app\controllers;

use app\models\Subjects;
use app\models\Teachers;
use app\models\Documents;

class SearchController extends \yii\web\Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionByAttributes() {
        $request = Yii::$app->request;
        try {
            $query = $request->get('query', '');
            $teachers = Teachers::searchTeachers(strtolower($query));
            $subjects = Subjects::searchSubjects(strtolower($query));
            $documents = Documents::searchDocuments(strtolower($query));
            Yii::$app->view->title = 'Kết quả tìm kiếm cho ' . $query;
            return $this->render('index', ['teachers' => $teachers, 'subjects' => $subjects, 'documents' => $documents]);
        } catch (Exception $ex) {
            
        }
    }

}
