<?php

use yii\widgets\LinkPager;
use yii\helpers\Url;
use app\components\Util;
use app\models\Users;
use app\models\Subjects;
?>
<div class="row" style="margin-bottom: 10px;">
    <div class="col-md-3">
        <a class="btn btn-primary" href="#"data-toggle="modal" data-target="#modal-upload">Add</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>Image</th>
                <th>User</th>
                <th>Subject</th>
                <th>Created at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($models as $model): ?>
                <tr>
                    <td><input type="checkbox" > </td>
                    <td><?php echo $model->id; ?></td>
                    <td><img src="<?php echo Util::makeUrlImage($model->preview) ?>" style="max-height: 150px;"/></td>
                    <td><?php echo Users::findOne(['id' => $model->user])->name ?></td>
                    <td><?php echo Subjects::findOne(['id' => $model->subject])->name ?></td>
                    <td><?php echo Date('d/m/Y', $model->created_at) ?></td>

                    <td>
                        <a class="btn btn-default">Edit</a>
                        <a class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
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
<?php echo Yii::$app->view->render('add'); ?>