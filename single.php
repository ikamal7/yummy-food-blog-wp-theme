<?php the_post();
get_header();
?>

<!-- ****** Breadcumb Area Start ****** -->
<div class="breadcumb-area" style="background-image: url(<?php the_post_thumbnail_url('large') ?>);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="bradcumb-title text-center">
                    <h2><?php the_title(); ?></h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ****** Breadcumb Area End ****** -->

<!-- ****** Single Blog Area Start ****** -->
<section class="single_blog_area section_padding_80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="row no-gutters">

                    <!-- Single Post Share Info -->
                    <div class="col-2 col-sm-1">
                        <div class="single-post-share-info mt-100">
                            <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#" class="googleplus"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                            <a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="#" class="pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                        </div>
                    </div>

                    <!-- Single Post -->
                    <div class="col-10 col-sm-11">
                        <div class="single-post">
                            <!-- Post Thumb -->
                            <div class="post-thumb">
                                <?php the_post_thumbnail('large'); ?>
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
                                            <?php the_date(); ?>
                                        </div>
                                    </div>
                                    <!-- Post Comment & Share Area -->
                                    <div class="post-comment-share-area d-flex">
                                        <!-- Post Favourite -->
                                        <div class="post-favourite">
                                            <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> </a>
                                        </div>
                                        <!-- Post Comments -->
                                        <div class="post-comments">
                                            <a href="#comments"><i class="fa fa-comment-o"
                                                                   aria-hidden="true"></i> <?php echo esc_html(get_comments_number()); ?>
                                            </a>
                                        </div>
                                        <!-- Post Share -->
                                        <div class="post-share">
                                            <a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <h2 class="post-headline"><?php the_title(); ?></h2>
                                <?php
                                the_content();
                                wp_link_pages();
                                ?>
                            </div>
                        </div>
                    </div>

                    <!-- Tags Area -->
                    <div class="tags-area">
                        <?php the_tags('', '', ''); ?>
                    </div>

                    <!-- Related Post Area -->
                    <div class="related-post-area section_padding_50">


                        <?php
                        global $post;
                        $categories = get_the_category(get_the_ID());
                        if ($categories) :
                            $category_ids = array();
                            foreach ($categories as $category_id) $category_ids[] = $category_id->term_id;

                            $args                = array(
                                'category__in'   => $category_ids,
                                'post__not_in'   => array($post->ID),
                                'posts_per_page' => 6,
                            );
                            $yummy_related_posts = new WP_Query($args);
                            ?>
                            <h4 class="mb-30"><?php _e('Related post', 'yummy_food'); ?></h4>
                            <div class="related-post-slider owl-carousel">
                                <!-- Single Related Post-->
                                <?php while ($yummy_related_posts->have_posts()) : $yummy_related_posts->the_post(); ?>
                                    <div class="single-post">
                                        <!-- Post Thumb -->
                                        <div class="post-thumb">
                                            <?php the_post_thumbnail('thumbnail'); ?>
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
                                            </div>
                                            <a href="<?php the_permalink(); ?>">
                                                <h6><?php the_title(); ?></h6>
                                            </a>
                                        </div>
                                    </div>
                                <?php endwhile;
                                wp_reset_query(); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php
                if (!post_password_required()) {
                    comments_template();
                }
                ?>
            </div>

            <!-- ****** Blog Sidebar ****** -->
            <?php if (is_active_sidebar('blog_sidebar')) : ?>
                <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                    <?php get_sidebar(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- ****** Single Blog Area End ****** -->

<?php get_footer(); ?>
