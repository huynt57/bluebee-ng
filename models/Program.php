<?php

namespace app\models;

use Yii;
use \app\models\base\Program as BaseProgram;

/**
 * This is the model class for table "program".
 */
class Program extends BaseProgram
{

    public static function getAllProgram()
    {
        $query = Program::find()->orderBy('id desc');
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


    public static function getProgramByAttribute($args)
    {
        $programs = Program::find()->where($args)->all();

        $retVal = array();

        foreach ($programs as $program)
        {
            $itemArr = array();
            $itemArr['subject'] = Subjects::findOne(['subject'=>$program->subject])->name;
            $itemArr['semester'] = $program->semester;

            $retVal[] = $itemArr;
        }

        return $retVal;
    }

}





