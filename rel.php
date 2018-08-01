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