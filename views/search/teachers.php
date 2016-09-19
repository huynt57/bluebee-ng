<?php

use yii\widgets\LinkPager;
use yii\helpers\Url;
use app\components\Util;
?>
<div class="row">
    <div id="catalog" class="col-sm-12 col-md-12 content">

        <div class="clearfix"></div>

        <div class="row">
            <?php foreach ($models as $item): ?>
                <div class="col-sm-3 col-md-3 col-sm-3 col-md-3 employee" style="float: left !important;">
                    <div class="default">

                        <a href="<?php echo Url::to(['teacher/item', 'id' => $item->id]) ?>" class="image">
                            <img class="replace-2x" src="<?php echo Util::makeUrlImage($item->avatar) ?>" alt="" title="" width="270" height="270">
                        </a>
                        <div class="description">
                            <div class="vertical">
                                <h3 class="name">
                                    <a href="<?php echo Url::to(['teacher/item', 'id' => $item->id]) ?>"><?php echo $item->name ?></a>
                                </h3>

                            </div>
                        </div>
                    </div>
                    <a href="<?php echo Url::to(['teacher/item', 'id' => $item->id]) ?>">
                        <div class="employee-hover">
                            <h3 class="name">
                                <a href="<?php echo Url::to(['teacher/item', 'id' => $item->id]) ?>"><?php echo $item->name ?></a>
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
                </div><!-- .employee -->
            <?php endforeach; ?>
        </div>
        <?php if ($pages->getPageCount() > 1): ?>
            <div class="pagination-box">
                <?php
                echo LinkPager::widget([
                    'pagination' => $pages,
                ]);
                ?>

               

            </div><!-- .pagination-box -->
        <?php endif; ?>
    </div>
</div>
