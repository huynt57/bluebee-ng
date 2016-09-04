<?php

namespace app\modules;

use Yii;

/**
 * admin module definition class
 */
class AdminModule extends \yii\base\Module {

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\controllers';
    public $layout;
    public $layoutPath;

    /**
     * @inheritdoc
     */
    public function init() {
        if(Yii::$app->session['user_id'] == 2) {
            $this->layout = '@app/modules/views/layouts/main';
            $this->layoutPath = 'main';
            parent::init();
        } else {
            return null;
        }

        // custom initialization code goes here
    }

}
