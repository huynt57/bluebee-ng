<?php use yii\helpers\Url; ?>
<div id="sidebar" class="sidebar col-sm-12 col-md-3">
    <aside class="widget menu">
        <header>
            <h3 class="title">Các phòng ban</h3>
        </header>
        <nav>
            <ul>
                <?php foreach ($departments as $department):?>
                <li><a href="<?php echo Url::to(['teacher/get-teachers-by-department', 'id'=>$department->id])?>"><?php echo $department->name?></a></li>
                <?php endforeach;?>
            </ul>
        </nav>
    </aside><!-- .menu-->
</div>
