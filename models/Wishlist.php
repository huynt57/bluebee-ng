<?php

namespace app\models;

use Yii;
use \app\models\base\Wishlist as BaseWishlist;

/**
 * This is the model class for table "wishlist".
 */
class Wishlist extends BaseWishlist {

    public static function add($doc_id, $user_id) {
        $model = Wishlist::find()->where(['doc_id' => $doc_id, 'user_id' => $user_id])->one();
        if (!$model) {
            $model = new Wishlist;
        }
        $model->user_id = $user_id;
        $model->doc_id = $doc_id;
        $model->created_at = time();
        $model->updated_at = time();
        if ($model->save(FALSE)) {
            return true;
        }
        return false;
    }

    public function getWishlistById($id) {
        
    }

}
