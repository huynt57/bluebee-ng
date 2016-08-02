<?php

use yii\widgets\LinkPager;
use yii\helpers\Url;
use app\components\Util;
use app\models\Users;
use app\models\Subjects;
?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th></th>
            <th>ID</th>
            <th>Image</th>
            <th>User</th>
            <th>Subject</th>
            <th>Created at</th>
<<<<<<< HEAD
            <th>Action</th>
=======
            <th>ACtion</th>
>>>>>>> c4eef2a03be03692752385099615070cd31c0c70
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
<<<<<<< HEAD
                <td>
                    <a class="btn btn-default">Edit</a>
                    <a class="btn btn-danger">Delete</a>
                </td>
=======
                <td><?php echo Date('d/m/Y', $model->created_at) ?></td>
>>>>>>> c4eef2a03be03692752385099615070cd31c0c70
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
