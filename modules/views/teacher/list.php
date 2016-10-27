<?php

use yii\widgets\LinkPager;
use yii\helpers\Url;
use app\components\Util;

?>
<div class="row" style="margin-bottom: 10px;">
    <div class="col-md-3">
        <a class="btn btn-primary" href="#"data-toggle="modal" data-target="#modal-admin-add">Add</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>Name</th>
<!--                <th>Description</th>-->
                <th>Avatar</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Website</th>
<!--                <th>Stars</th>-->
<!--                <th>Number Rated</th>-->
                <th>Department</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($models as $model): ?>
                <tr>
                    <td><input type="checkbox" > </td>
                    <td><?php echo $model->id; ?></td>
                    <td><?php echo $model->name ?></td>
<!--                    <td>--><?php //echo $model->description ?><!--</td>-->
                    <td><img src="<?php echo Util::makeUrlImage($model->avatar) ?>" ></td>
                    <td><?php echo $model->email ?></td>
                    <td><?php echo $model->phone ?></td>
                    <td><?php echo $model->website ?></td>
<!--                    <td>--><?php //echo $model->stars ?><!--</td>-->
<!--                    <td>--><?php //echo $model->number_rated ?><!--</td>-->
                    <td><?php echo \app\models\Departments::findOne(['id'=>$model->department])->name; ?></td>
                    <td><?php echo Date('d/m/Y', $model->created_at) ?></td>
                    <td>
                        <a class="btn btn-default admin-update" href="#" data-toggle="modal" data-target="#modal-admin-update" data-id="<?php echo $model->id?>">Edit</a>
                        <a class="btn btn-danger admin-delete" href="#" data-toggle="modal" data-target="#modal-admin-delete" data-id="<?php echo $model->id?>">Delete</a>
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
<?php echo Yii::$app->view->render('update'); ?>
<?php echo Yii::$app->view->render('delete'); ?>

<script>

    var url_get_update = '/admin/teacher/edit';
    var url_update = '/admin/teacher/update';
</script>


