<?php

use \yii\helpers\Url;
use app\components\Util;?>
<div class="row">
    <article class="content product-page col-sm-12 col-md-12">
        <div class="row">
            <div class="col-sm-4 col-md-4">
                <div class="image-box">
                   
                    <div class="general">
                        <img class="replace-2x" alt="" src="<?php echo Util::makeUrlImage($data['avatar']) ?>" data-zoom-image="<?php echo Yii::getAlias('@web') ?>/content/img/single-1.jpg" width="700" height="700">
                    </div><!-- .general-img -->
                </div>
            </div>

            <div class="col-sm-8 col-md-8">
                <div class="reviews-box">
                    <div class="rating-box">
                        <div style="width: 80%" class="rating">
                            <svg x="0" y="0" width="73px" height="12px" viewBox="0 0 73 12" enable-background="new 0 0 73 12" xml:space="preserve">
                            <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#1e1e1e" points="6.5,0 8,5 13,5 9,7.7 10,12 6.5,9.2 3,12 4,7.7 0,5 5,5"></polygon>
                            <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#1e1e1e" points="66.5,0 68,5 73,5 69,7.7 70,12 66.5,9.2 63,12 64,7.7 60,5 65,5 "></polygon>
                            <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#1e1e1e" points="21.5,0 23,5 28,5 24,7.7 25,12 21.5,9.2 18,12 19,7.7 15,5 20,5 "></polygon>
                            <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#1e1e1e" points="51.5,0 53,5 58,5 54,7.7 55,12 51.5,9.2 48,12 49,7.7 45,5 50,5 "></polygon>
                            <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#1e1e1e" points="36.5,0 38,5 43,5 39,7.7 40,12 36.5,9.2 33,12 34,7.7 30,5 35,5 "></polygon>
                            </svg>
                        </div>
                    </div>
                    <span><?php echo $data['number_rated'] ?> đánh giá</span>
                    <span class="separator">|</span>
                    <a href="#reviews" class="add-review">Thêm đánh giá của bạn</a>
                </div>

                <div class="description">
                    <?php echo $data['description'] ?>
                </div>




            </div>
        </div>
<!--        <div id="reviews">
            <h3 class="title">Để lại đánh giá của bạn</h3>
            <form class="comments-form">
                <div class="evaluation-box">
                    <div class="evaluation">
                        <div class="pull-left">Đánh giá <span class="required">*</span></div>
                        <div class="add-rating">
                            <label class="radio"><input type="radio" name="radio"><span class="number">1</span></label>
                            <label class="radio"><input type="radio" name="radio"><span class="number">2</span></label>
                            <label class="radio"><input type="radio" name="radio"><span class="number">3</span></label>
                            <label class="radio"><input type="radio" name="radio"><span class="number">4</span></label>
                            <label class="radio"><input type="radio" name="radio"><span class="number">5</span></label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <button class="btn btn-default">Gửi</button>
                </div>
            </form> .comments-form 
        </div>-->
        <h3 class="title" style="
            margin-top: 50px;
            ">Bình luận</h3>
        <div class="fb-comments " data-href="<?php echo Url::to(['teacher/item', 'id' => $data['id']], true) ?>" data-numposts="5" data-width="100%"></div>
</div>

<div class="clearfix"></div>

<div class="recommended-product carousel-box load overflow" data-autoplay-disable="true">
    <div class="title-box no-margin">
        <a class="next" href="#">
            <svg x="0" y="0" width="9px" height="16px" viewBox="0 0 9 16" enable-background="new 0 0 9 16" xml:space="preserve">
            <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#fcfcfc" points="1,0.001 0,1.001 7,8 0,14.999 1,15.999 9,8 "></polygon>
            </svg>
        </a>
        <a class="prev" href="#">
            <svg x="0" y="0" width="9px" height="16px" viewBox="0 0 9 16" enable-background="new 0 0 9 16" xml:space="preserve">
            <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#fcfcfc" points="8,15.999 9,14.999 2,8 9,1.001 8,0.001 0,8 "></polygon>
            </svg>
        </a>
        <h2 class="title">Có thể bạn quan tâm</h2>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="carousel products">
            <?php echo Yii::$app->view->render('relateTeachers', ['teachers' => $related_teachers]) ?>
        </div>
    </div><!-- .recommended-product -->
</div>
</article>
</div>
