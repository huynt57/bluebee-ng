<?php

use yii\widgets\LinkPager;
use yii\helpers\Url;
use app\components\Util;
?>
<div class="row">
    <div class="content col-sm-12 col-md-12">
        <div class="row">

            <?php foreach ($models as $item): ?>
                <div class="col-sm-3 col-md-3">

                    <h6><a href="<?php echo Url::to(['document/get-document-by-subject', 'id'=>$item->id])?>"><?php echo $item->name ?></a></h6>
                    <div class="text-small"><?php echo Util::excerpt($item->description, 150); ?></div>

                </div>
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