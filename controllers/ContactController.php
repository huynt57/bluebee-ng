<?php

namespace app\controllers;
use Yii;

class ContactController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionUs()
    {
        Yii::$app->view->title = 'Về chúng tôi, đội ngũ đằng sau Bluebee';

        Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => 'Về chúng tôi, đội ngũ đằng sau Bluebee'
        ]);
        Yii::$app->view->registerMetaTag([
            'property' => 'og:title',
            'content' => 'Về chúng tôi, đội ngũ đằng sau Bluebee'
        ]);
        Yii::$app->view->registerMetaTag([
            'property' => 'og:description',
            'content' => 'Về chúng tôi, đội ngũ đằng sau Bluebee'
        ]);
        Yii::$app->view->registerMetaTag([
            'property' => 'og:image',
            'content' => 'http://bluebee-uet.com/img/logo.jpg'
        ]);

        return $this->render('about');
    }

}
