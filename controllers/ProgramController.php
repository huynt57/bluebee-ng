<?php

namespace app\controllers;

use app\models\TblSubject;
use app\models\Subjects;

class ProgramController extends \yii\web\Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionAddSub() {
        $o_subs = TblSubject::find()->all();
        foreach ($o_subs as $item) {
            $sub = new Subjects;
            $sub->name = $item->subject_name;
            $sub->description = $item->subject_content;
            $sub->updated_at = time();
            $sub->created_at = time();
            $sub->status = 1;
            $sub->save();
        }
    }

}
