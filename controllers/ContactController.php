<?php

namespace app\controllers;

class ContactController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionAdd()
    {
        return $this->render('add');
    }

}
