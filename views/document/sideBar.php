<?php use yii\helpers\Url; ?>
<div id="sidebar" class="sidebar col-sm-12 col-md-3">
    <aside class="widget menu">
        <header>
            <h3 class="title">Các môn học</h3>
        </header>
        <nav>
            <ul>
                <?php foreach ($subjects as $subject):?>
                <li><a href="<?php echo Url::to(['document/get-document-by-subject', 'id'=>$subject->id])?>"><?php echo $subject->name?></a></li>
                <?php endforeach;?>
            </ul>
        </nav>
    </aside><!-- .menu-->
</div>
