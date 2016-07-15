
<!doctype html>
<html>
    <?php

    use yii\helpers\Url;
    ?>

    <head>
        <meta charset="utf-8">
        <title>Bluebee-uet.com | Mọi thứ bạn cần để trở thành một UET-er</title>
        <meta name="keywords" content="HTML5 Template">
        <meta name="description" content="Progressive — Responsive Multipurpose HTML Template">
        <meta name="author" content="itembridge.com">
        <meta class="viewport" name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo Yii::getAlias('@web') ?>/img/favicon.ico">

        <!-- Font -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Arimo:400,700,400italic,700italic'>

        <!-- Plugins CSS -->
        <link rel="stylesheet" href="<?php echo Yii::getAlias('@web') ?>/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo Yii::getAlias('@web') ?>/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo Yii::getAlias('@web') ?>/css/jslider.css">
        <link rel="stylesheet" href="<?php echo Yii::getAlias('@web') ?>/css/settings.css">
        <link rel="stylesheet" href="<?php echo Yii::getAlias('@web') ?>/css/jquery.fancybox.css">
        <link rel="stylesheet" href="<?php echo Yii::getAlias('@web') ?>/css/animate.css">
        <link rel="stylesheet" href="<?php echo Yii::getAlias('@web') ?>/css/video-js.min.css">
        <link rel="stylesheet" href="<?php echo Yii::getAlias('@web') ?>/css/morris.css">
        <link rel="stylesheet" href="<?php echo Yii::getAlias('@web') ?>/css/royalslider/royalslider.css">
        <link rel="stylesheet" href="<?php echo Yii::getAlias('@web') ?>/css/royalslider/skins/minimal-white/rs-minimal-white.css">
        <link rel="stylesheet" href="<?php echo Yii::getAlias('@web') ?>/css/layerslider/layerslider.css">
        <link rel="stylesheet" href="<?php echo Yii::getAlias('@web') ?>/css/ladda.min.css">
        <link rel="stylesheet" href="<?php echo Yii::getAlias('@web') ?>/css/datepicker.css">
        <link rel="stylesheet" href="<?php echo Yii::getAlias('@web') ?>/css/jquery.scrollbar.css">
        <link rel="stylesheet" href="<?php echo Yii::getAlias('@web') ?>/css/jquery.toast.css">

        <!-- Theme CSS -->
        <link rel="stylesheet" href="<?php echo Yii::getAlias('@web') ?>/css/style.css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="<?php echo Yii::getAlias('@web') ?>/css/customizer/pages.css">
        <link rel="stylesheet" href="<?php echo Yii::getAlias('@web') ?>/css/customizer/home-pages-customizer.css">

        <!-- IE Styles-->
        <link rel='stylesheet' href="<?php echo Yii::getAlias('@web') ?>/css/ie/ie.css">

        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.<?php echo Yii::getAlias('@web') ?>/js/1.4.2/respond.min.js"></script>
                              <link rel='stylesheet' href="<?php echo Yii::getAlias('@web') ?>/css/ie/ie8.css">
        <![endif]-->
    </head>
    <body class="fixed-header">
        <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.4&appId=<?php echo Yii::$app->params['FB_APP_ID'] ?>";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        <script>
            window.fbAsyncInit = function () {
                FB.init({
                    appId: '<?php echo Yii::$app->params['FB_APP_ID'] ?>',
                    xfbml: true,
                    version: 'v2.4'
                });
                FB.getLoginStatus(function (response) {
                    if (response.status === 'connected') {
                        console.log('Logged in.');
                    }
                });
            };
            (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.4&appId=<?php echo Yii::$app->params['FB_APP_ID'] ?>";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
// Only works after `FB.init` is called
            function myFacebookLogin() {
                FB.login(function (response) {
                    if (response.authResponse) {
                        FB.api('/me?fields=id,name,email,picture, gender,  birthday', function (response) {
                            console.log(response);
                            $.ajax({
                                url: '<?php echo Url::to(['user/login-with-facebook']) ?>',
                                type: 'POST',
                                data: {
                                    token: '<?php echo Yii::$app->request->csrfToken ?>',
                                    facebook_id: response.id,
                                    gender: response.gender,
                                    name: response.name,
                                    email: response.email,
                                    //  avatar: response.picture,
                                    birthday: response.birthday,
                                    //photo: 'https://graph.facebook.com/' + response.id + '/picture?type=large',

                                },
                                dataType: 'json',
                                success: function (response) {
                                    if (response.status === 1) {
                                        //console.log(response);
                                        location.reload();
                                    }
                                },
                            });
                        });
                    }
                }, {scope: 'publish_actions, public_profile, email'});
            }
            function myFacebookLogout() {
                FB.logout(function (response) {
                    // user is now logged out
                });
            }
        </script>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.4&appId=<?php echo Yii::$app->params['FB_APP_ID'] ?>";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        <div class="page-box">
            <div class="page-box-content">

                <header class="header header-two">
                    <div class="header-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-6 col-md-2 col-lg-3 logo-box">
                                    <div class="logo">
                                        <a href="index-2.html">
                                            <img src="<?php echo Yii::getAlias('@web') ?>/img/logo.jpg" class="logo-img" alt="" style="width: auto!important">
                                        </a>
                                    </div>
                                </div><!-- .logo-box -->

                                <div class="col-xs-6 col-md-10 col-lg-9 right-box">
                                    <div class="right-box-wrapper">
                                        <div class="header-icons">
                                            <div class="search-header hidden-600">
                                                <a href="#">
                                                    <svg x="0" y="0" width="16px" height="16px" viewBox="0 0 16 16" enable-background="new 0 0 16 16" xml:space="preserve">
                                                    <path d="M12.001,10l-0.5,0.5l-0.79-0.79c0.806-1.021,1.29-2.308,1.29-3.71c0-3.313-2.687-6-6-6C2.687,0,0,2.687,0,6
                                                          s2.687,6,6,6c1.402,0,2.688-0.484,3.71-1.29l0.79,0.79l-0.5,0.5l4,4l2-2L12.001,10z M6,10c-2.206,0-4-1.794-4-4s1.794-4,4-4
                                                          s4,1.794,4,4S8.206,10,6,10z"></path>
                                                    <image src="<?php echo Yii::getAlias('@web') ?>/img/png-icons/search-icon.png" alt="" width="16" height="16" style="vertical-align: top;">
                                                    </svg>
                                                </a>
                                            </div><!-- .search-header
                                            
                                            --><div class="phone-header hidden-600">
                                                <a href="#">
                                                    <svg x="0" y="0" width="16px" height="16px" viewBox="0 0 16 16" enable-background="new 0 0 16 16" xml:space="preserve">
                                                    <path d="M11.001,0H5C3.896,0,3,0.896,3,2c0,0.273,0,11.727,0,12c0,1.104,0.896,2,2,2h6c1.104,0,2-0.896,2-2
                                                          c0-0.273,0-11.727,0-12C13.001,0.896,12.105,0,11.001,0z M8,15c-0.552,0-1-0.447-1-1s0.448-1,1-1s1,0.447,1,1S8.553,15,8,15z
                                                          M11.001,12H5V2h6V12z"></path>
                                                    <image src="<?php echo Yii::getAlias('@web') ?>/img/png-icons/phone-icon.png" alt="" width="16" height="16" style="vertical-align: top;">
                                                    </svg>
                                                </a>
                                            </div><!-- .phone-header -->
                                        </div><!-- .header-icons -->

                                        <div class="primary">
                                            <div class="navbar navbar-default" role="navigation">
                                                <button type="button" class="navbar-toggle btn-navbar collapsed" data-toggle="collapse" data-target=".primary .navbar-collapse">
                                                    <span class="text">Menu</span>
                                                    <span class="icon-bar"></span>
                                                    <span class="icon-bar"></span>
                                                    <span class="icon-bar"></span>
                                                </button>

                                                <nav class="collapse collapsing navbar-collapse">
                                                    <ul class="nav navbar-nav navbar-center">
                                                        <!--                                                         <li class="item item-primary item-bg">
                                                                                                                    <a href="<?php echo Url::to(['program/index']) ?>">Chương trình học</a>   
                                                                                                                </li>-->
                                                        <li class="item item-primary item-bg">
                                                            <a href="<?php echo Url::to(['document/get-latest-documents']) ?>">Tài liệu</a>   
                                                        </li>
                                                        <li class="item item-primary item-bg">
                                                            <a href="<?php echo Url::to(['teacher/get-teachers']) ?>">Giáo viên</a>   
                                                        </li>
                                                        <li class="item item-primary item-bg">
                                                            <a href="<?php echo Url::to(['moss/check']) ?>">Kiểm tra sao chép</a>   
                                                        </li>

                                                        <li class="item item-primary item-bg">
                                                            <a href="<?php echo Url::to(['news/index']) ?>">Tin tức</a>   
                                                        </li>
                                                        <?php if (Yii::$app->session['user_id']): ?>
                                                            <li class="item item-primary item-bg">
                                                                <a href="<?php echo Url::to(['user/my-page']) ?>">Trang của tôi</a>   
                                                            </li>
                                                        <?php else: ?>
                                                            <li class="item item-primary item-bg">
                                                                <a href="#" onclick="myFacebookLogin()">Đăng nhập</a>   
                                                            </li>
                                                        <?php endif; ?>
                                                        <?php if (Yii::$app->session['user_id']): ?>
                                                            <li class="item item-primary item-bg">
                                                                <a href="#" data-toggle="modal" data-target="#modal-upload">Đăng tài liệu</a>   
                                                            </li>
                                                        <?php endif; ?>
                                                    </ul>
                                                </nav>
                                            </div>
                                        </div><!-- .primary -->
                                    </div>
                                </div>

                                <div class="phone-active col-sm-9 col-md-9">
                                    <a href="#" class="close"><span>close</span>×</a>
                                    <span class="title">Cần hỗ trợ ?</span> <strong>01679263615</strong>
                                </div>
                                <div class="search-active col-sm-9 col-md-9">
                                    <a href="#" class="close"><span>đóng</span>×</a>
                                    <form name="search-form" class="search-form" action="/search/index">
                                        <input class="search-string form-control" type="search" placeholder="Tìm kiếm nào !" name="search-string">
                                        <input class="search-string form-control" type="hidden" name="attr" value="document">
                                        <button class="search-submit">
                                            <svg x="0" y="0" width="16px" height="16px" viewBox="0 0 16 16" enable-background="new 0 0 16 16" xml:space="preserve">
                                            <path fill="#231F20" d="M12.001,10l-0.5,0.5l-0.79-0.79c0.806-1.021,1.29-2.308,1.29-3.71c0-3.313-2.687-6-6-6C2.687,0,0,2.687,0,6
                                                  s2.687,6,6,6c1.402,0,2.688-0.484,3.71-1.29l0.79,0.79l-0.5,0.5l4,4l2-2L12.001,10z M6,10c-2.206,0-4-1.794-4-4s1.794-4,4-4
                                                  s4,1.794,4,4S8.206,10,6,10z"></path>
                                            <image src="<?php echo Yii::getAlias('@web') ?>/img/png-icons/search-icon.png" alt="" width="16" height="16" style="vertical-align: top;">
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div><!--.row -->
                        </div>
                    </div><!-- .header-wrapper -->
                </header><!-- .header -->



                <div class="clearfix"></div>

                <section id="main">
                    <header class="page-header">
                        <div class="container">
                            <h1 class="title"><?php echo $this->title ?></h1>
                        </div>	
                    </header>
                    <div class="container">
                        <?php echo $content; ?>
                    </div>  

                </section><!-- #main -->

            </div><!-- .page-box-content -->
        </div><!-- .page-box -->

        <footer id="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row sidebar">
                        <aside class="col-xs-12 col-sm-6 col-md-3 widget social">
                            <div class="title-block">
                                <h3 class="title">Theo dõi chúng tôi</h3>
                            </div>
                            <p>Theo dõi chúng tôi trên mạng xã hội</p>
                            <div class="social-list">
                                <a class="icon rounded icon-facebook" href="https://www.facebook.com/hotrohoctapUET/?fref=ts"><i class="fa fa-facebook"></i></a>
                                <a class="icon rounded icon-twitter" href="#"><i class="fa fa-twitter"></i></a>
                                <a class="icon rounded icon-google" href="#"><i class="fa fa-google"></i></a>
                                <a class="icon rounded icon-linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </aside>



                        <aside class="col-xs-12 col-sm-6 col-md-3 widget links">
                            <div class="title-block">
                                <h3 class="title">Thông tin</h3>
                            </div>
                            <nav>
                                <ul>
                                    <li><a href="#">Về chúng tôi</a></li>
                                    <li><a href="#">Điều khoản và bảo mật</a></li>
                                </ul>
                            </nav>
                        </aside>

                        <aside class="col-xs-12 col-sm-6 col-md-3 widget links">
                            <div class="title-block">
                                <h3 class="title">Tài khoản của tôi</h3>
                            </div>
                            <nav>
                                <ul>
                                    <li><a href="/user/my-page">Tài khoản của tôi</a></li>
                                    <li><a href="/user/my-upload">Lịch sử tải lên</a></li>
                                    <li><a href="/user/my-wishlist">Mục đánh dấu</a></li>
                                    <li><a href="/news">Blog</a></li>
                                </ul>
                            </nav>
                        </aside>
                    </div>
                </div>
            </div><!-- .footer-top -->

            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="copyright col-xs-12 col-sm-3 col-md-3">
                            Copyright © Bluebee., 2016
                        </div>

                        <div class="phone col-xs-6 col-sm-3 col-md-3">
                            <div class="footer-icon">
                                <svg x="0" y="0" width="16px" height="16px" viewBox="0 0 16 16" enable-background="new 0 0 16 16" xml:space="preserve">
                                <path fill="#c6c6c6" d="M11.001,0H5C3.896,0,3,0.896,3,2c0,0.273,0,11.727,0,12c0,1.104,0.896,2,2,2h6c1.104,0,2-0.896,2-2
                                      c0-0.273,0-11.727,0-12C13.001,0.896,12.105,0,11.001,0z M8,15c-0.552,0-1-0.447-1-1s0.448-1,1-1s1,0.447,1,1S8.553,15,8,15z
                                      M11.001,12H5V2h6V12z"></path>
                                </svg>
                            </div>
                            <strong class="title">Gọi cho tôi:</strong> +84 1679263615 <br>

                        </div>

                        <div class="address col-xs-6 col-sm-3 col-md-3">
                            <div class="footer-icon">
                                <svg x="0" y="0" width="16px" height="16px" viewBox="0 0 16 16" enable-background="new 0 0 16 16" xml:space="preserve">
                                <g>
                                <g>
                                <path fill="#c6c6c6" d="M8,16c-0.256,0-0.512-0.098-0.707-0.293C7.077,15.491,2,10.364,2,6c0-3.309,2.691-6,6-6
                                      c3.309,0,6,2.691,6,6c0,4.364-5.077,9.491-5.293,9.707C8.512,15.902,8.256,16,8,16z M8,2C5.795,2,4,3.794,4,6
                                      c0,2.496,2.459,5.799,4,7.536c1.541-1.737,4-5.04,4-7.536C12.001,3.794,10.206,2,8,2z"></path>
                                </g>
                                <g>
                                <circle fill="#c6c6c6" cx="8.001" cy="6" r="2"></circle>
                                </g>
                                </g>
                                </svg>
                            </div>
                            Nguyễn Thế Huy, Web Developer<br> VED
                        </div>

                        <div class="col-xs-12 col-sm-3 col-md-3">
                            <a href="#" class="up">
                                <span class="glyphicon glyphicon-arrow-up"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div><!-- .footer-bottom -->
        </footer>
        <div class="clearfix"></div>
        <div class="modal fade" tabindex="-1" role="dialog" id="modal-upload">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Đăng tài liệu</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" id="form-upload">
                            <div class="form-group">
                                <label for="name">Tên tài liệu</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Điền tên tài liệu">
                            </div>
                            <div class="form-group">
                                <label for="description">Miêu tả</label>
                                <textarea type="text" class="form-control" id="description" name="description" placeholder="Điền miêu tả tài liệu"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="subject">Môn học</label>
                                <select class="form-control" id="subject" name="subject">
                                    <option value="1">1</option>
                                    <option value="1">1</option>
                                    <option value="1">1</option>
                                    <option value="1">1</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="file">Đính kèm file</label>
                                <input type="file" id="document" name="file">
                            </div>
                        </form>
                        <div class="progress progress-striped active" id="progress-upload" style="display: none">
                            <div class="progress-bar progress-bar-info" style="width: 80%;" id="progress-info"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary" id="btn-upload-doc">Đăng</button>
                    </div>
                </div><!-- /.modal-content -->

            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="modal fade" tabindex="-1" role="dialog" id="modal-success">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Thành công</h4>
                    </div>
                    <div class="modal-body">
                        <p id="message-success">Tài liệu của bạn đã được đăng thành công</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Đóng</button>

                    </div>
                </div><!-- /.modal-content -->

            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <div class="modal fade" tabindex="-1" role="dialog" id="modal-error">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Thất bại</h4>
                    </div>
                    <div class="modal-body">
                        <p id="message-error">Có lỗi xảy ra, bạn vui lòng thử lại sau</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>

                    </div>
                </div><!-- /.modal-content -->

            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!--[if (!IE)|(gt IE 8)]><!-->
        <script src="<?php echo Yii::getAlias('@web') ?>/js/jquery-2.1.3.min.js"></script>
        <!--<![endif]-->

        <!--[if lte IE 8]>
          <script src="<?php echo Yii::getAlias('@web') ?>/js/jquery-1.9.1.min.js"></script>
        <![endif]-->
        <script src="<?php echo Yii::getAlias('@web') ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/price-regulator/jshashtable-2.1_src.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/price-regulator/jquery.numberformatter-1.2.3.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/price-regulator/tmpl.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/price-regulator/jquery.dependClass-0.1.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/price-regulator/draggable-0.1.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/price-regulator/jquery.slider.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/jquery.carouFredSel-6.2.1-packed.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/jquery.touchwipe.min.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/jquery.elevateZoom-3.0.8.min.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/jquery.imagesloaded.min.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/jquery.appear.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/jquery.sparkline.min.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/jquery.easypiechart.min.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/jquery.easing.1.3.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/jquery.fancybox.pack.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/isotope.pkgd.min.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/jquery.knob.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/jquery.selectBox.min.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/jquery.royalslider.min.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/jquery.tubular.1.0.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/SmoothScroll.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/country.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/spin.min.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/ladda.min.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/masonry.pkgd.min.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/morris.min.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/raphael.min.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/video.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/pixastic.custom.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/livicons-1.4.min.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/layerslider/greensock.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/layerslider/layerslider.transitions.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/layerslider/layerslider.kreaturamedia.jquery.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/revolution/jquery.themepunch.tools.min.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/revolution/jquery.themepunch.revolution.min.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/bootstrapValidator.min.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/bootstrap-datepicker.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/jplayer/jquery.jplayer.min.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/jplayer/jplayer.playlist.min.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/jquery.scrollbar.min.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/jquery.toast.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/main.js"></script>
        <script src="<?php echo Yii::getAlias('@web') ?>/js/custom.js"></script>

    </body>

    <!-- Mirrored from template.progressive.itembridge.com/3.0.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Jun 2016 06:52:16 GMT -->
</html>