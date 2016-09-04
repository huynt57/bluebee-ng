<?php

use \yii\helpers\Url;
use app\components\Util;
?>
<?php foreach ($documents as $item): ?>
    <div class="col-sm-3 col-md-3 col-sm-3 col-md-3 product rotation">
        <div class="default">
<!--            <span class="sale top"></span>-->
            <a href="<?php echo Url::to(['item', 'id' => $item->id]) ?>" class="product-image">
                <img class="replace-2x" src="<?php echo Util::makeUrlImage($item->preview) ?>" alt="" title="" width="270" height="270">
            </a>
            <div class="product-description">
                <div class="vertical">
                    <h3 class="product-name">
                        <a href="<?php echo Url::to(['item', 'id' => $item->id]) ?>"><?php echo $item->name ?></a>
                    </h3>

                </div>
            </div>
        </div>
        <a href="<?php echo Url::to(['item', 'id' => $item->id]) ?>">
            <div class="product-hover">
                <h3 class="product-name">
                    <a href="<?php echo Url::to(['item', 'id' => $item->id]) ?>"><?php echo $item->name ?></a>
                </h3>
                <p>
                    <?php echo $item->description; ?>

                </p>
                <div class="actions">

                    <a href="#" class="add-wishlist" data-id="<?php echo $item->id?>">
                        <svg x="0" y="0" width="16px" height="16px" viewBox="0 0 16 16" enable-background="new 0 0 16 16" xml:space="preserve">
                        <path fill="#1e1e1e" d="M11.335,0C10.026,0,8.848,0.541,8,1.407C7.153,0.541,5.975,0,4.667,0C2.088,0,0,2.09,0,4.667C0,12,8,16,8,16
                              s8-4,8-11.333C16.001,2.09,13.913,0,11.335,0z M8,13.684C6.134,12.49,2,9.321,2,4.667C2,3.196,3.197,2,4.667,2C6,2,8,4,8,4
                              s2-2,3.334-2c1.47,0,2.666,1.196,2.666,2.667C14.001,9.321,9.867,12.49,8,13.684z"></path>
                        </svg>
                    </a>

                </div><!-- .actions -->
            </div><!-- .product-hover -->
        </a>
    </div><!-- .product -->
<?php endforeach ?>