<?php

use yii\widgets\LinkPager;
use yii\helpers\Url;
use app\components\Util;

?>
<style>
    .name > a {
        color: white;
    }

    .name > a:hover {
        color: white;
    }

</style>
<div class="row">
    <div class="col-sm-12 col-md-9 content pull-right">

        <div class="clearfix"></div>

        <div class="row">
            <?php foreach ($models as $item): ?>
                <div class="col-sm-4 col-md-4 col-sm-4 col-md-4 employee" style="float: left !important;">
                    <div class="default">
                        <div class="image">
                            <a href="<?php echo Url::to(['teacher/item', 'id' => $item->id]) ?>" class="image">
                                <img class="replace-2x" src="<?php echo Util::makeUrlImage($item->avatar) ?>" alt="<?php echo $item->name ?>"
                                     title="" width="270" height="270">
                            </a>
                        </div>
                        <div class="description">
                            <div class="vertical">
                                <h3 class="name">
                                   <?php echo $item->name ?>
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
    <?php echo Yii::$app->view->render('sideBar', ['departments' => $departments]) ?>
</div>
