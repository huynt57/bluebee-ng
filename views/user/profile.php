<?php use app\components\Util;
use yii\helpers\Url;?>
<article class="content">
    <div class="bottom-padding">
        <div class="employee employee-single">
            <div class="row">
                <div class="images-box col-xs-9 col-sm-6 col-md-4">
                    <div class="image">
                        <img class="replace-2x" src="<?php echo "https://graph.facebook.com/".$profile['fb_id']."/picture?width=270"; ?>" alt="" title="" width="768" height="768">
                    </div>
                </div>

                <div class="employee-description col-sm-8 col-md-8">
                    <h3 class="name"><?php echo $profile['name']?></h3>
                    <div class="role">Cám ơn bạn đã sử dụng Bluebee. Hãy thường xuyên ghé thăm upload và download tài liệu nhé :D</div>
                    <div>
                        <p>Số điểm bạn đang có: <?php echo $profile['points']?></p>
                        <p>Bấm vào <a href="/user/my-upload">đây</a> để xem danh mục tài liệu đã upload</p>
                        <p>Bấm vào <a href="/user/my-wishlist">đây</a> để xem danh mục tài liệu đã đánh dấu</p>
                                              
                    </div>                    
                </div>
                <div class="clearfix"></div>
            </div>
        </div><!-- .employee -->
    </div>
</article><!-- .content -->
