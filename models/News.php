<?php

namespace app\models;

use Yii;
use \app\models\base\News as BaseNews;
use yii\data\Pagination;
/**
 * This is the model class for table "news".
 */
class News extends BaseNews {

    public static function getLatestNews() {
        $query = News::find()->orderBy('id desc');
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $pages->defaultPageSize = 12;
        $models = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
        return [
            'models' => $models,
            'pages' => $pages,
        ];
    }

}
