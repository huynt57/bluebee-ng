<?php

namespace app\models;

use Yii;
use \app\models\base\Teachers as BaseTeachers;
use yii\data\Pagination;

/**
 * This is the model class for table "teachers".
 */
class Teachers extends BaseTeachers {

    public static function getAllLatestTeachers() {
        $query = Teachers::find()->orderBy('id desc');
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $pages->defaultPageSize = 12;
        $models = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
        $departments = Departments::find()->orderBy('name', 'desc')->all();
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

    public static function getTeacherById($id) {
        $teacher = Teachers::findOne(['id' => $id]);
        $retVal = array();
        $retVal['id'] = $teacher->id;
        $retVal['name'] = $teacher->name;
        $retVal['description'] = $teacher->description;
        $retVal['avatar'] = $teacher->avatar;
        $retVal['email'] = $teacher->email;
        $retVal['phone'] = $teacher->phone;
        $retVal['website'] = $teacher->website;
        $retVal['stars'] = round($teacher->stars / $teacher->number_rated);
        $retVal['number_rated'] = $teacher->number_rated;
        $retVal['department'] = Departments::findOne(['id' => $teacher->department])->name;
        $retVal['created_at'] = Date('d/m/Y', $teacher->created_at);
        $retVal['updated_at'] = Date('d/m/Y', $teacher->updated_at);
        return $retVal;
    }

    public static function getTeachersBySubject($subject) {
        $query = Teachers::find()->where(['subject' => $subject])->orderBy('id desc');
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $models = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
        $departments = Departments::find()->orderBy('name', 'desc')->all();
        return [
            'models' => $models,
            'pages' => $pages,
            'departments' => $departments,
        ];
    }

    public static function rateTeacher($teacher, $stars) {
        $model = Teachers::findOne(['id' => $teacher]);
        $model->number_rated++;
        $model->stars+=$stars;
        if ($model->save(FALSE)) {
            return true;
        }
        return false;
    }

    public static function getRelatedTeachers() {
        $teachers = Teachers::find()->orderBy(new \yii\db\Expression('rand()'))->limit(5)->all();
        return $teachers;
    }

    public static function searchTeachers($search) {
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
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        $departments = Departments::find()->orderBy('name', 'desc')->all();
        return [
            'models' => $models,
            'pages' => $pages,
            'departments' => $departments,
        ];
    }

}
