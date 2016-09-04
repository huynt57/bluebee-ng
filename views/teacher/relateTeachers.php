<?php

use \yii\helpers\Url;
use app\components\Util;
?>
<?php foreach ($teachers as $item): ?>
    <div class="col-sm-3 col-md-3 col-sm-3 col-md-3 employee rotation">
        <div class="default">

            <a href="<?php echo Url::to(['item', 'id' => $item->id]) ?>" class="image">
                <img class="replace-2x" src="<?php echo Util::makeUrlImage($item->avatar) ?>" alt="" title="" width="270" height="270">
            </a>
            <div class="description">
                <div class="vertical">
                    <h3 class="name">
                        <a href="<?php echo Url::to(['item', 'id' => $item->id]) ?>" style="color: white"><?php echo $item->name ?></a>
                    </h3>

                </div>
            </div>
        </div>
        <a href="<?php echo Url::to(['item', 'id' => $item->id]) ?>">
            <div class="employee-hover">
                <h3 class="name">
                    <a href="<?php echo Url::to(['item', 'id' => $item->id]) ?>"><?php echo $item->name ?></a>
                </h3>

                <div>
                    <p>
                        <?php echo $item->description; ?>

                    </p>
                    <div class="contact"><b>Email: </b><?php echo $item->email; ?></div>
                    <div class="contact"><b>Phone: </b><?php echo $item->phone; ?></div>
                </div>

            </div><!-- .employee-hover -->
        </a>
    </div><!-- .product -->
<?php endforeach ?>