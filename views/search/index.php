<?php

use yii\widgets\LinkPager;
use yii\helpers\Url;
use app\components\Util;
?>
<div class="row">
    <div class="content search-result list col-sm-12 col-md-12">

        <div class="row">
            <div class="col-sm-7 col-md-7 btn-group filter-buttons filter-list">         
                <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo Url::to(['search/index', 'search-string' => $query, 'attr' => 'document']) ?>" <?php if ($attr == 'document'): ?>class="active"<?php endif; ?>>Tài liệu</a></li>
                    <li><a href="<?php echo Url::to(['search/index', 'search-string' => $query, 'attr' => 'teacher']) ?>" <?php if ($attr == 'teacher'): ?>class="active"<?php endif; ?>>Giáo viên</a></li>
                    <li><a href="<?php echo Url::to(['search/index', 'search-string' => $query, 'attr' => 'subject']) ?>" <?php if ($attr == 'subject'): ?>class="active"<?php endif; ?>>Môn học</a></li>
                </ul>
                <div class="clearfix"></div>
            </div><!-- .filter-buttons -->
        </div>

        <div class="clearfix"></div>


        <?php
        switch ($attr) {
            case 'teacher':
                echo Yii::$app->view->render('teachers', ['models' => $models, 'pages' => $pages]);
                break;

            case 'document':
                echo Yii::$app->view->render('documents', ['models' => $models, 'pages' => $pages]);
                break;

            case 'subject':
                echo Yii::$app->view->render('subjects', ['models' => $models, 'pages' => $pages]);
                break;
            default:
                break;
        }
        ?>

    </div><!-- .filter-box -->
</div><!-- .content -->
</div>
