<?php

namespace app\models;

use Yii;
use \app\models\base\Wishlist as BaseWishlist;

/**
 * This is the model class for table "wishlist".
 */
class Wishlist extends BaseWishlist
{
    public function add($doc_id, $user_id)
    {
        $model = new  Wishlist;
        $model->user_id = $user_id;
        $model->doc_id = $doc_id;
        if($model->save(FALSE))
        {
            return true;
        }
        return false;
    }
    
    public function getWishlistByUser($user_id)
    {
        $query = Wishlist::find()->where(['user_id' => $user_id]);
        $countQuery = clone $query;
        foreach($query as $item) {
            $item->doc = Documents::getDocumentById($id);
        }
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $models = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
        return [
            'models' => $models,
            'pages' => $pages,
        ];
    }
    
    public function getWishlistById($id)
    {
        
    }
    
}
