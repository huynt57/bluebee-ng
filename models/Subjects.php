<?php

namespace app\models;

use Yii;
use \app\models\base\Subjects as BaseSubjects;
use yii\data\Pagination;

/**
 * This is the model class for table "subjects".
 */
class Subjects extends BaseSubjects {

    public static function searchSubjects($search) {
        $query = Subjects::find()->filterWhere(['like', 'name', $search]);
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

    public static function getAllSubject()
    {
        $query = Subjects::find()->orderBy('id desc');
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $pages->defaultPageSize = 27;
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return [
            'models' => $models,
            'pages' => $pages,
        ];
    }

}
