<?php get_header(); ?>
    <div class="container">
        <div class="row justify-content-center mb-30 mt-30">
            <div class="col-12">
                <h2><?php _e('You searched for: ', 'yummy_food'); ?><span class="highlight__text"><?php echo get_search_query(); ?></span></h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php while (have_posts()) : the_post(); ?>
                <div class="col-4">
                    <a class="d-block mb-3" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
                    <a href="<?php the_permalink(); ?>">
                        <h4 class="post-headline"><?php the_title(); ?></h4>
                    </a>
                    <p><?php the_excerpt(); ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php get_footer(); ?>