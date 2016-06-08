<?php

namespace app\models;

use Yii;
use app\models\Users;
use \app\models\base\Documents as BaseDocuments;
use yii\data\Pagination;

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
        $document->user = $value['user'];
        
        $user = Users::findOne(['id' => $value['user']]);
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

    public static function getAllLatestDocuments() {
        $query = Documents::find()->orderBy('id', 'SORT_DESC');
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

    public static function getDocumentById($id) {
        $document = Documents::findOne(['id' => $id]);
        $retVal = array();
        $retVal['id'] = $document->id;
        $retVal['name'] = $document->name;
        $retVal['description'] = $document->description;
        $retVal['created_at'] = Date($document->created_at, 'd/m/Y');
        $retVal['updated_at'] = Date($document->updated_at, 'd/m/Y');
        $retVal['preview'] = $document->preview;
        $retVal['original_url'] = $document->original_url;
        $retVal['money_url'] = $document->money_url;
        $retVal['subject'] = Subjects::findOne(['id' => $document->subject])->name;
        $retVal['user'] = Users::findOne(['id' => $document->user])->name;
        $retVal['number_download'] = $document->number_download;
        return $retVal;
    }

    public static function download($id) {
        $document = Documents::findOne(['id' => $id]);
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
