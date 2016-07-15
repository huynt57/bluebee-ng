<div class="row">
    <div class="content col-sm-12 col-md-12">
        <div class="row">
            <div class="col-sm-3 col-md-3">
                <?php foreach($models as $item):?>
                <h6><?php echo $item->name?></h6>
                <div class="text-small"><?php echo $item->description; ?></div>
                <?php endforeach;?>
            </div>
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