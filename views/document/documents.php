<div class="row">
    <div id="catalog" class="col-sm-12 col-md-9 content pull-right">

        <div class="toolbar clearfix">
        <div class="clearfix"></div>
            <div class="grid-list">
                <span class="grid">
                    <span class="glyphicon glyphicon-th-large"></span>
                </span>
                <a href="shop-catalog-list.html" class="list">
                    <span class="glyphicon glyphicon-th-list"></span>
                </a>
            </div>

            <div class="sort-catalog">
                <div class="btn-group sort-by btn-select">
                    <a class="btn dropdown-toggle btn-default" role="button" data-toggle="dropdown" href="#">Sort by: <span>Rating</span> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Price</a></li>
                        <li><a href="#">Rating</a></li>
                        <li><a href="#">Name</a></li>
                    </ul>
                </div><!-- .sort-by -->
                <button type="button" class="btn up-down btn-default" data-toggle="button"><span></span></button>
            </div><!-- .sort-catalog -->

            <div class="sort-catalog">
                <div class="btn-group show-by btn-select">
                    <a class="btn dropdown-toggle btn-default" role="button" data-toggle="dropdown" href="#">Show: <span>12</span> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">6</a></li>
                        <li><a href="#">7</a></li>
                        <li><a href="#">8</a></li>
                        <li><a href="#">9</a></li>
                        <li><a href="#">10</a></li>
                        <li><a href="#">11</a></li>
                        <li><a href="#">12</a></li>
                    </ul>
                </div><!-- .show -->
                <span class="per-page">per page</span>
            </div><!-- .sort-catalog -->
        </div>

        <div class="clearfix"></div>

        <div class="products grid row">
            <?php foreach ($models as $item): ?>
                <div class="col-sm-4 col-md-4 col-sm-4 col-md-4 product rotation">
                    <div class="default">
                        <span class="sale top"></span>
                        <a href="shop-product-view.html" class="product-image">
                            <img class="replace-2x" src="<?php echo Yii::getAlias('@web') . '/' . $item->preview ?>" alt="" title="" width="270" height="270">
                        </a>
                        <div class="product-description">
                            <div class="vertical">
                                <h3 class="product-name">
                                    <a href="shop-product-view.html"><?php echo $item->name ?></a>
                                </h3>
                                <div class="price">$1, 449.00</div>	
                            </div>
                        </div>
                    </div>

                    <div class="product-hover">
                        <h3 class="product-name">
                            <a href="shop-product-view.html"><?php echo $item->name ?></a>
                        </h3>
                        <p>
                            <?php echo $item->description; ?>

                        </p>
                        <div class="actions">
                            <a href="shop-product-view.html" class="add-cart">
                                <svg x="0" y="0" width="16px" height="16px" viewBox="0 0 16 16" enable-background="new 0 0 16 16" xml:space="preserve">
                                <g>
                                <path fill="#1e1e1e" d="M15.001,4h-0.57l-3.707-3.707c-0.391-0.391-1.023-0.391-1.414,0c-0.391,0.391-0.391,1.023,0,1.414L11.603,4
                                      H4.43l2.293-2.293c0.391-0.391,0.391-1.023,0-1.414s-1.023-0.391-1.414,0L1.602,4H1C0.448,4,0,4.448,0,5s0.448,1,1,1
                                      c0,2.69,0,7.23,0,8c0,1.104,0.896,2,2,2h10c1.104,0,2-0.896,2-2c0-0.77,0-5.31,0-8c0.553,0,1-0.448,1-1S15.554,4,15.001,4z
                                      M13.001,14H3V6h10V14z"></path>
                                <path fill="#1e1e1e" d="M11.001,13c0.553,0,1-0.447,1-1V8c0-0.553-0.447-1-1-1s-1,0.447-1,1v4C10.001,12.553,10.448,13,11.001,13z"></path>
                                <path fill="#1e1e1e" d="M8,13c0.553,0,1-0.447,1-1V8c0-0.553-0.448-1-1-1S7,7.447,7,8v4C7,12.553,7.448,13,8,13z"></path>
                                <path fill="#1e1e1e" d="M5,13c0.553,0,1-0.447,1-1V8c0-0.553-0.447-1-1-1S4,7.447,4,8v4C4,12.553,4.448,13,5,13z"></path>
                                </g>
                                </svg>
                            </a>
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
                        </div><!-- .actions -->
                    </div><!-- .product-hover -->
                </div><!-- .product -->
            <?php endforeach; ?>
        </div>
        <div class="pagination-box">
            <ul class="pagination">
                <li class="disabled"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li class="disabled"><a href="#">...</a></li>
                <li><a href="#">9</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
            </ul>
            <i class="pagination-text">Displaying 1 to 10 (of 100 posts)</i>
        </div><!-- .pagination-box -->
    </div><!-- .<?php //echo Yii::getAlias('@web') ?>/content -->
    <?php
echo Yii::$app->view->render('sideBar', ['subjects' => $subjects])?>
</div>
