<?php use app\components\Util; ?>

<div class="container">
    <div class="content">
        <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Chú ý!</strong> Các thông tin sau hoàn toàn chỉ ở mức độ tham khảo. Các bạn hãy chú ý để chọn lựa thông tin hữu ích.
        </div>

        <div class="timeline">
            <?php for($i = 1; $i <= 8; $i ++): ?>
            <article class="post">
                <div class="timeline-time">
                    <time datetime="2014-06-23">Học kỳ thứ <?php echo $i; ?></time>
                </div>

                <div class="timeline-icon">
                    <div class="livicon" data-n="pen" data-c="#fff" data-hc="0" data-s="22"></div>
                </div>

                <div class="timeline-content" data-appear-animation="fadeIn
                <?php if($i %2 == 0): ?>
                Left"
                <?php else:?>
                    Right"
                <?php endif;?>
                >
                    <h2 class="entry-title">
                        <a href="blog-view.html">Các môn học theo khuyến nghị của nhà trường:</a>
                    </h2>

                    <div class="entry-content">
                        <?php $data =  Util::suggest($department_id, $i) ?>

                            <?php foreach($data as $item):?>
                                    <?php echo $item['subject']; ?><br>
                            <?php endforeach;?>

                    </div>
                </div>
            </article><!-- .post -->
            <?php endfor; ?>

        </div><!-- .timeline -->
    </div><!-- .content -->
</div>

