<?php

use \yii\helpers\Url;
use app\components\Util;
?>
<div class="row">
    <article class="content product-page col-sm-12 col-md-12">
        <div class="row">
            <div class="col-sm-4 col-md-4">
                <div class="image-box">
                    <span class="sale top"></span>
                    <div class="general">
                        <img class="replace-2x" alt="" src="<?php echo Util::makeUrlImage($data['preview']) ?>" data-zoom-image="<?php echo Yii::getAlias('@web') ?>/content/img/single-1.jpg" width="700" height="700">
                    </div><!-- .general-img -->
                </div>
            </div>

            <div class="col-sm-8 col-md-8">
                <div class="reviews-box">

                    <span>Đăng bởi <a href="<?php echo Url::to(['user/other', 'id' => $data['user']->id]) ?>"><?php echo $data['user']->name ?></a></span>
                    <span class="separator">|</span>
                    <a href="#reviews" class="add-review">Đăng tài liệu của bạn</a>
                </div>

                <div class="description">
                    <?php echo $data['description'] ?>
                </div>



                <form class="form-inline add-cart-form">
                    <button class="btn add-cart btn-default btn-lg">Download</button>

                </form>

                <div class="actions">
                    <a href="#" class="add-wishlist">
                        <svg x="0" y="0" width="16px" height="16px" viewBox="0 0 16 16" enable-background="new 0 0 16 16" xml:space="preserve">
                        <path fill="#1e1e1e" d="M11.335,0C10.026,0,8.848,0.541,8,1.407C7.153,0.541,5.975,0,4.667,0C2.088,0,0,2.09,0,4.667C0,12,8,16,8,16
                              s8-4,8-11.333C16.001,2.09,13.913,0,11.335,0z M8,13.684C6.134,12.49,2,9.321,2,4.667C2,3.196,3.197,2,4.667,2C6,2,8,4,8,4
                              s2-2,3.334-2c1.47,0,2.666,1.196,2.666,2.667C14.001,9.321,9.867,12.49,8,13.684z"></path>
                        </svg>
                    </a>
                    <a href="#" class="add-compare">
                        <svg x="0" y="0" width="16px" height="16px" viewBox="0 0 16 16" enable-background="new 0 0 16 16" xml:space="preserve">
                        <path fill="#1e1e1e" d="M16,3.063L13,0v2H1C0.447,2,0,2.447,0,3s0.447,1,1,1h12v2L16,3.063z"></path>
                        <path fill="#1e1e1e" d="M16,13.063L13,10v2H1c-0.553,0-1,0.447-1,1s0.447,1,1,1h12v2L16,13.063z"></path>
                        <path fill="#1e1e1e" d="M15,7H3V5L0,7.938L3,11V9h12c0.553,0,1-0.447,1-1S15.553,7,15,7z"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div>
            <h3 class="title" style="
                margin-top: 50px;
                ">Bình luận</h3>
                <div class="fb-comments " data-href="<?php echo Url::to(['document/item', 'id' => $data['id']], true) ?>" data-numposts="5" data-width="100%"></div>
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
                <h2 class="title">Tài liệu liên quan</h2>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="carousel products">
                    <?php echo Yii::$app->view->render('relateDocuments', ['documents' => $related_documents]) ?>
                </div>
            </div>
        </div><!-- .recommended-product -->
</div>

