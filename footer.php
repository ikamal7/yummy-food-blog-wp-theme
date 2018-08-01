<!-- ****** Instagram Area Start ****** -->
<!-- ****** Our Creative Portfolio Area End ****** -->

<!-- ****** Footer Social Icon Area Start ****** -->
<div class="social_icon_area clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="footer-social-area d-flex">
                    <?php if (is_active_sidebar('footer_social')) {
                        dynamic_sidebar('footer_social');
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ****** Footer Social Icon Area End ****** -->

<!-- ****** Footer Menu Area Start ****** -->
<footer class="footer_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="footer-content">
                    <!-- Logo Area Start -->
                    <div class="footer-logo-area text-center">
                        <?php if (has_custom_logo()) {
                            the_custom_logo();
                        } else { ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>"
                               class="yummy-logo"><?php bloginfo('name'); ?></a>';
                        <?php }
                        ?>
                    </div>
                    <!-- Menu Area Start -->
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#yummyfood-footer-nav" aria-controls="yummyfood-footer-nav"
                                aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"
                                                                                        aria-hidden="true"></i> Menu
                        </button>
                        <!-- Menu Area Start -->
                        <div class="collapse navbar-collapse justify-content-center" id="yummyfood-footer-nav">
                            <?php yummy_footer_nav_menu(); ?>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Copywrite Text -->
                <?php if(is_active_sidebar('footer_bottom')){
                    dynamic_sidebar('footer_bottom');
                } ?>
            </div>
        </div>
    </div>
</footer>

<!-- ****** Footer Menu Area End ****** -->
<?php wp_footer(); ?>
</body>