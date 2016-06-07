<?php

namespace app\models;

use Yii;
use app\models\Users;
use \app\models\base\Documents as BaseDocuments;

/**
 * This is the model class for table "documents".
 */
class Documents extends BaseDocuments {

    public static function upload($value) {
        $document = new Documents;
        foreach ($value as $item => $i) {
            $document->$item = $i;
        }
        $document->created_at = time();
        $document->updated_at = time();
        $user = Users::findOne(['id' => $user]);
        if (!$user) {
            return 'Error !';
        }
        if ($document->save()) {
            $user->number_upload += 1;
            $user->save();
            return 'Success';
        }
        return 'Error !';
    }
    
    public static function download($id)
    {
        $document = Documents::findOne(['id'=>$id]);
        $document->number_download += 1;
        $document->save();
    }

    public static function getDocumentsBySubject($subject) {
        $query = Documents::find()->where(['subject' => $subject]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $models = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
        return [
            'models' => $models,
            'pages' => $pages,
        ];
    }

}
