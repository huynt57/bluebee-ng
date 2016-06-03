<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

class Util extends Component {

    public function welcome() {
        echo "Hello..Welcome to MyComponent";
    }

}
