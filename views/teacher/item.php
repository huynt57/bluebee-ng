<?php

use \yii\helpers\Url;
use app\components\Util;
?>
<div class="row">
    <article class="content product-page col-sm-12 col-md-12">
        <div class="row">
            <div class="col-sm-3 col-md-3">
                <div class="image-box">

                    <div class="general">
                        <img class="replace-2x" alt="" src="<?php echo Util::makeUrlImage($data['avatar']) ?>" data-zoom-image="<?php echo Yii::getAlias('@web') ?>/content/img/single-1.jpg" width="700" height="700">
                    </div><!-- .general-img -->
                </div>
            </div>

            <div class="col-sm-9 col-md-9">
                <div class="reviews-box">
                    <div class="rating-box">
                        <div style="width: 80%" class="rating">
                            <svg x="0" y="0" width="73px" height="12px" viewBox="0 0 73 12" enable-background="new 0 0 73 12" xml:space="preserve">

                            <?php for ($i = 1; $i <= $data['stars']; $i++): ?>
                                <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#1e1e1e" points="66.5,0 68,5 73,5 69,7.7 70,12 66.5,9.2 63,12 64,7.7 60,5 65,5 "></polygon>
                            <?php endfor; ?>
                            </svg>
                        </div>
                    </div>
                    <span><?php echo $data['number_rated'] ?> đánh giá</span>
                    <span class="separator">|</span>
                    <a href="#" data-toggle="modal" data-target="#modal-review" class="add-review">Thêm đánh giá của bạn</a>
                </div>

                <div class="description">
                    <p> Ngành: <?php echo $data['department'] ?></p>
                    <p> <?php echo $data['description'] ?></p>
                    <p> SĐT: <?php echo $data['phone'] ?></p>
                    <p> Email: <?php echo $data['email'] ?></p>
                    <p> Trang cá nhân: <a href="<?php echo $data['website'] ?>" target="_blank"><?php echo $data['website'] ?></a></p>
                    <p> Nơi làm việc: <?php echo $data['address'] ?></p>
                    <p> Lĩnh vực nghiên cứu: <?php echo $data['research'] ?></p>
                </div>
            </div>
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" id="modal-review">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Để lại đánh giá giảng viên: <?php echo $data['name'] ?></h4>
                    </div>
                    <br>
                    <div class="modal-body">
                        <form role="form" id="form-review">
                            <div class="evaluation-box">
                                <div class="evaluation">


                                    <div class="pull-left">Đánh giá <span class="required">*</span></div>
<!--                                        <label for="description">Đánh giá <span class="required">*</span></label>-->
                                    <div class="add-rating">
                                        <label class="radio"><input type="radio" name="stars" value="1"><span class="stars">1</span></label>
                                        <label class="radio"><input type="radio" name="stars" value="2"><span class="stars">2</span></label>
                                        <label class="radio"><input type="radio" name="stars" value="3"><span class="stars">3</span></label>
                                        <label class="radio"><input type="radio" name="stars" value="4"><span class="stars">4</span></label>
                                        <label class="radio"><input type="radio" name="stars" value="5"><span class="stars">5</span></label>
                                    </div>

                                </div>
                            </div>
                            <input type="hidden" name="teacher" value="<?php echo $data['id'] ?>" />
                            <input type="hidden" name="<?php echo \Yii::$app->request->csrfParam ?>" value="<?php echo \Yii::$app->request->csrfToken?>" >
                            <br>
                            <div class="form-group">
                                <label for="description">Một vài comment</label>
                                <textarea type="text" class="form-control" id="description" name="description" placeholder="Ý kiến của bạn"></textarea>
                                <p class="help-block">Bọn mình không hiển thị những dữ liệu này, bạn đừng ngại nhé :D</p>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary" id="btn-review">Đăng</button>
                    </div>
                </div><!-- /.modal-content -->

            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
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
