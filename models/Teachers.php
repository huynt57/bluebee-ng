<?php

namespace app\models;

use Yii;
use \app\models\base\Teachers as BaseTeachers;
use yii\data\Pagination;
use app\models\TeacherSubject;

/**
 * This is the model class for table "teachers".
 */
class Teachers extends BaseTeachers
{

    public static function getAllLatestTeachers()
    {
        $query = Teachers::find()->orderBy('id desc');
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $pages->defaultPageSize = 27;
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        if(!Yii::$app->cache->exists('departments'))
        {
            $departments = Departments::find()->orderBy('name', 'desc')->all();
            Yii::$app->cache->add('departments', $departments, 3600);
        } else {
            $departments = Yii::$app->cache->get('departments');
        }

        return [
            'models' => $models,
            'pages' => $pages,
            'departments' => $departments,
        ];
    }

    public static function getAll()
    {
        $query = Teachers::find()->orderBy('id desc');
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

    public static function getTeacherById($id)
    {
        $teacher = Teachers::findOne(['id' => $id]);
        $retVal = array();
        $retVal['id'] = $teacher->id;
        $retVal['name'] = $teacher->name;
        $retVal['description'] = $teacher->description;
        $retVal['avatar'] = $teacher->avatar;
        $retVal['email'] = $teacher->email;
        $retVal['phone'] = $teacher->phone;
        $retVal['website'] = $teacher->website;
        $retVal['address'] = $teacher->address;
        $retVal['research'] = $teacher->research;
        if ($teacher->number_rated != 0) {

            $retVal['stars'] = round($teacher->stars / $teacher->number_rated);
            $retVal['number_rated'] = $teacher->number_rated;
        } else {
            $retVal['stars'] = 1;
            $retVal['number_rated'] = 1;
        }
        $retVal['department'] = Departments::findOne(['id' => $teacher->department])->name;
        $retVal['created_at'] = Date('d/m/Y', $teacher->created_at);
        $retVal['updated_at'] = Date('d/m/Y', $teacher->updated_at);
        return $retVal;
    }

    public static function getTeachersBySubject($subject)
    {
        $query = TeacherSubject::find()->where(['subject_id' => $subject])->orderBy('id desc');
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $pages->defaultPageSize = 27;
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();


        if(!Yii::$app->cache->exists('departments'))
        {
            $departments = Departments::find()->orderBy('name', 'desc')->all();
            Yii::$app->cache->add('departments', $departments, 3600);
        } else {
            $departments = Yii::$app->cache->get('departments');
        }

        $returnArr = [];

        foreach ($models as $item) {
            $itemArr = Teachers::findOne(['id' => $item->id]);
            $returnArr[] = $itemArr;
        }

        return [
            'models' => $returnArr,
            'pages' => $pages,
            'departments' => $departments,
        ];
    }

    public static function rateTeacher($teacher, $stars)
    {
        $model = Teachers::findOne(['id' => $teacher]);
        $model->number_rated++;
        $model->stars += $stars;
        if ($model->save(FALSE)) {
            return true;
        }
        return false;
    }

    public static function getRelatedTeachers()
    {
        $teachers = Teachers::find()->orderBy(new \yii\db\Expression('rand()'))->limit(5)->all();
        return $teachers;
    }

    public static function searchTeachers($search)
    {
        $query = Teachers::find()->filterWhere(['like', 'name', $search]);
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

    public static function getTeachersByDepartment($department)
    {
        $query = Teachers::find()->where(['department' => $department])->orderBy('id desc');
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $pages->defaultPageSize = 27;
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        if(!Yii::$app->cache->exists('departments'))
        {
            $departments = Departments::find()->orderBy('name', 'desc')->all();
            Yii::$app->cache->add('departments', $departments, 3600);
        } else {
            $departments = Yii::$app->cache->get('departments');
        }
        return [
            'models' => $models,
            'pages' => $pages,
            'departments' => $departments,
        ];
    }

}
