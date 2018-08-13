<?php
get_header();

?>
    
    <div class="breadcumb-area" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="bradcumb-title text-center">
                        <h2><?php the_archive_title(); ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="archive-area section_padding_80">
        <div class="container">
            <div class="row">
                <?php while (have_posts()) : the_post(); ?>
                <!-- Single Post -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-post wow fadeInUp" data-wow-delay="0.1s">
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
    </section>

<?php
    get_footer();
