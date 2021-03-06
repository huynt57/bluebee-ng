<?php

namespace app\models;

use Yii;
use app\models\Users;
use \app\models\base\Documents as BaseDocuments;
use yii\data\Pagination;
use app\components\Util;

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
        $token = Util::generateRandomStringCode(20);
        $document->token = $token;
        // echo \yii\helpers\Url::home(true) . $value['original_url'];die;
        $document->money_url = Util::makeOuoUrl(\yii\helpers\Url::home(true) . $value['original_url']);
        //$value['user'] = 1; //for testing
        $user = Users::findOne(['id' => $value['user']]);
        if (!$user) {
            return Util::arrayError('Error !');
        }
        if ($document->save()) {
            $user->number_upload += 1;
            $user->points+=3;
            $user->save();
            return Util::arraySuccess('Success', $document->id);
        }
        return Util::arrayError('Error !');
    }

    public static function getRelatedDocuments() {
        $documents = Documents::find()->orderBy(new \yii\db\Expression('rand()'))->limit(5)->all();
        return $documents;
    }

    public static function getAllLatestDocuments() {
        $query = Documents::find()->orderBy('id desc');
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $pages->defaultPageSize = 27;
        $models = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->all();


        if(!Yii::$app->cache->exists('subjects'))
        {
            $subjects = Subjects::find()->orderBy('name', 'desc')->all();
            Yii::$app->cache->add('subjects', $subjects, 3600);
        } else {
            $subjects = Yii::$app->cache->get('subjects');
        }

        return [
            'models' => $models,
            'pages' => $pages,
            'subjects' => $subjects,
        ];
    }

    public static function getDocumentById($id) {
        $document = Documents::findOne(['id' => $id]);
        $retVal = array();
        $retVal['id'] = $document->id;
        $retVal['name'] = $document->name;
        $retVal['description'] = $document->description;
        $retVal['created_at'] = Date('d/m/Y', $document->created_at);
        $retVal['updated_at'] = Date('d/m/Y', $document->updated_at);
        $retVal['preview'] = $document->preview;
        $retVal['original_url'] = $document->original_url;
        $retVal['money_url'] = $document->money_url;
        $retVal['subject'] = Subjects::findOne(['id' => $document->subject])->name;
        $retVal['user'] = Users::findOne(['id' => $document->user]);
        $retVal['number_download'] = $document->number_download;
        $retVal['pdf'] = $document->pdf;
        $retVal['scribd_id'] = $document->scribd_id;
        return $retVal;
    }

    public static function download($id) {
        $document = Documents::findOne(['id' => $id]);
        $document->number_download += 1;
        $user = User::findOne(['id' => $document->user_id]);
        $user->points+=2;
        $document->save();
    }

    public static function getDocumentsBySubject($subject) {
        $query = Documents::find()->where(['subject' => $subject])->orderBy('id desc');
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $models = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
        if(!Yii::$app->cache->exists('subjects'))
        {
            $subjects = Subjects::find()->orderBy('name', 'desc')->all();
            Yii::$app->cache->add('subjects', $subjects, 3600);
        } else {
            $subjects = Yii::$app->cache->get('subjects');
        }
        return [
            'models' => $models,
            'pages' => $pages,
            'subjects' => $subjects,
            'subject_id'=>$subject,
        ];
    }

    public static function searchDocuments($search) {
        $query = Documents::find()->filterWhere(['like', 'name', $search]);
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

    public static function getDocumentsByUser($user) {
        $query = Documents::find()->where(['user' => $user])->orderBy('id desc');
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $pages->defaultPageSize = 27;
        $models = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->all();

        if(!Yii::$app->cache->exists('subjects'))
        {
            $subjects = Subjects::find()->orderBy('name', 'desc')->all();
            Yii::$app->cache->add('subjects', $subjects, 3600);
        } else {
            $subjects = Yii::$app->cache->get('subjects');
        }
        return [
            'models' => $models,
            'pages' => $pages,
            'subjects' => $subjects
        ];
    }

    public static function getDocumentsByWishlist($user) {
        $query = Documents::find()->join('JOIN', 'wishlist', '`wishlist`.`doc_id`=`documents`.`id`')->where(['wishlist.user_id' => $user])->orderBy('wishlist.created_at desc');
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $pages->defaultPageSize = 27;
        $models = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->all();

        if(!Yii::$app->cache->exists('subjects'))
        {
            $subjects = Subjects::find()->orderBy('name', 'desc')->all();
            Yii::$app->cache->add('subjects', $subjects, 3600);
        } else {
            $subjects = Yii::$app->cache->get('subjects');
        }
        return [
            'models' => $models,
            'pages' => $pages,
            'subjects' => $subjects
        ];
    }

}
