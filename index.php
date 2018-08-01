<?php get_header(); ?>

<?php
if (is_home()) {
    get_template_part('template-parts/blog-home/welcome-slider');
    get_template_part('template-parts/blog-home/featured-category');
}
?>


<!-- ****** Blog Area Start ****** -->
<section class="blog_area section_padding_0_80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="row">

                    <!-- ******* List Blog Area Start ******* -->
                    <?php while (have_posts()): the_post(); ?>
                        <!-- Single Post -->
                        <div id="post-<?php the_ID(); ?>" <?php post_class('col-12'); ?>>
                            <div class="list-blog single-post d-sm-flex wow fadeInUp" data-wow-delay=".3s">
                                <!-- Post Thumb -->
                                <div class="post-thumb">
                                    <?php the_post_thumbnail('yummy-category'); ?>
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <div class="post-meta d-flex">
                                        <div class="post-author-date-area d-flex">
                                            <!-- Post Author -->
                                            <div class="post-author">
                                                <?php _e('By ', 'yummy_food');
                                                the_author_posts_link(); ?>
                                            </div>
                                            <!-- Post Date -->
                                            <div class="post-date">
                                                <?php echo esc_html(get_the_date()); ?>
                                            </div>
                                        </div>
                                        <!-- Post Comment & Share Area -->
                                        <div class="post-comment-share-area d-flex">
                                            <!-- Post Comments -->
                                            <div class="post-comments">
                                                <a href="<?php the_permalink(); ?>"><i class="fa fa-comment-o"
                                                                                       aria-hidden="true"></i> <?php echo esc_html(get_comments_number()); ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="<?php the_permalink(); ?>">
                                        <h4 class="post-headline"><?php the_title(); ?></h4>
                                    </a>
                                    <p><?php echo esc_html(wp_trim_words(get_the_content(), 20, null)); ?></p>
                                    <a href="<?php the_permalink(); ?>"
                                       class="read-more"><?php _e('Continue Reading..', 'yummy_food'); ?></a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>


                </div>
            </div>

            <!-- ****** Blog Sidebar ****** -->
            <?php if (is_active_sidebar('blog_sidebar')) : ?>
                <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                    <?php get_sidebar(); ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="row justify-content-center">
            <?php yummy_pagination(); ?>
        </div>
    </div>
</section>
<!-- ****** Blog Area End ****** -->
<?php get_footer(); ?>
