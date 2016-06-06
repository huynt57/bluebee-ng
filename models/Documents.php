<?php

namespace app\models;

use Yii;
use \app\models\base\Documents as BaseDocuments;

/**
 * This is the model class for table "documents".
 */
class Documents extends BaseDocuments {

    public static function upload($value) {
        $document = new Documents;
        foreach($value as $item => $i) 
        {
            $document->$item = $i;
        }
        $document->created_at = time();
        $document->updated_at = time();
        if($document->save())
        {
            
        }
    }

}
