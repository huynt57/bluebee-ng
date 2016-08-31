<?php

namespace app\controllers;

use app\models\Subjects;
use app\models\Teachers;
use app\models\Documents;
use Yii;

class SearchController extends \yii\web\Controller {

    public function actionIndex() {
        $request = Yii::$app->request;
        try {
            $query = $request->get('search-string', '');
            Yii::$app->view->title = 'Kết quả tìm kiếm cho ' . $query;

            Yii::$app->view->registerMetaTag([
                'name' => 'description',
                'content' => 'Bluebee-UET.com - Kết quả tìm kiếm cho ' . $query
            ]);
            Yii::$app->view->registerMetaTag([
                'property' => 'og:title',
                'content' => 'Bluebee-UET.com - Kết quả tìm kiếm cho ' . $query
            ]);
            Yii::$app->view->registerMetaTag([
                'property' => 'og:description',
                'content' => 'Bluebee-UET.com - Kết quả tìm kiếm cho ' . $query
            ]);
            Yii::$app->view->registerMetaTag([
                'property' => 'og:image',
                'content' => 'http://bluebee-uet.com/img/logo.jpg'
            ]);


            $attr = $request->get('attr', '');
            switch ($attr) {
                case 'teacher':
                    $data = Teachers::searchTeachers(strtolower($query));
                    break;
                case 'document':
                    $data = Documents::searchDocuments(strtolower($query));
                    break;
                case 'subject':
                    $data = Subjects::searchSubjects(strtolower($query));
                    break;
                default:
                    break;
            }
            $data['attr'] = $attr;
            $data['query'] = $query;
            return $this->render('index', $data);
        } catch (Exception $ex) {
            
        }
    }

}
