<div class="content">
    <div class="row social-feed loaded" style="position: relative; height: 1528.02px;">

        <?php foreach ($departments as $department):  ?>
        <article class="col-xs-12 col-sm-6 col-md-4 isotope-item item-clone" style="position: absolute; left: 0px; top: 257px;">
            <div class="post bg number twitter">

                <div class="social-data">
                <?php echo $department->name; ?>
                </div>
            </div>
        </article><!-- .isotope-item -->
        <?php endforeach; ?>

    </div><!-- .social-feed -->

    <div class="clearfix"></div>
</div>