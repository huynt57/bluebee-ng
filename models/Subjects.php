<?php

namespace app\models;

use Yii;
use \app\models\base\Subjects as BaseSubjects;

/**
 * This is the model class for table "subjects".
 */
class Subjects extends BaseSubjects
{
    public static function searchSubjects($query)
    {
        return Subjects::find()->filterWhere(['like', 'name', $query]);
    }
    
}
