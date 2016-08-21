
<!doctype html>
<html>
    <?php

    use yii\helpers\Url;
    ?>

    <head>
        <meta charset="utf-8">
        <title>Bluebee-uet.com | Mọi thứ bạn cần để trở thành một UET-er</title>
        <?php
        $metaTags = Yii::$app->view->metaTags;
        if (!empty($metaTags)) {
            foreach ($metaTags as $meta) {
                echo $meta;
            }
        }
        ?>
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
<!--        <link rel="stylesheet" href="<?php echo Yii::getAlias('@web') ?>/css/customizer/home-pages-customizer.css">-->
        <link rel="stylesheet" href="<?php echo Yii::getAlias('@web') ?>/css/customizer/shop-pages-customizer.css">

        <!-- IE Styles-->
        <link rel='stylesheet' href="<?php echo Yii::getAlias('@web') ?>/css/ie/ie.css">

        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.<?php echo Yii::getAlias('@web') ?>/js/1.4.2/respond.min.js"></script>
                              <link rel='stylesheet' href="<?php echo Yii::getAlias('@web') ?>/css/ie/ie8.css">
        <![endif]-->
    </head>
    <body class="fixed-header">
        <div class="page-box" style="padding-top: 50px;">
            <div class="page-box-content">
                <div class="clearfix"></div>
                <section id="main" style="padding-top: 0px; padding-bottom: 80px;">
                    <header class="page-header">
                        <div class="container-fluid">
                            <h1 class="title">11<?php echo $this->title ?></h1>
                        </div>	
                    </header>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-2">
                                <ul class="nav nav-pills nav-stacked">
                                    <li class="active"><a href="/admin/document/list">Document management</a></li>
                                    <li><a href="/admin/teacher/list">Teacher management</a></li>
                                    <li><a href="/admin/subject/list">Subject management</a></li>
                                    <li><a href="/admin/program/list">Program management</a></li>
                                    <li><a href="/admin/user/list">User management</a></li>
                                </ul>
                            </div>
                            <div class="col-md-10">
                                <?php echo $content; ?>
                            </div>
                        </div>

                    </div>  

                </section><!-- #main -->

            </div><!-- .page-box-content -->
        </div><!-- .page-box -->

        <footer id="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row sidebar">

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