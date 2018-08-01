<!-- ****** Welcome Post Area Start ****** -->
<section class="welcome-post-sliders owl-carousel">
    <?php $yummy_welcome_slider_post = new WP_Query(array(
        'posts_per_page'     => 6,
        'ignore_sticky_post' => 1,
        'orderby'            => 'comment_count',
    ));
while ($yummy_welcome_slider_post->have_posts()) : $yummy_welcome_slider_post->the_post();
?>

    <!-- Single Slide -->
    <div class="welcome-single-slide">
        <!-- Post Thumb -->
        <?php the_post_thumbnail('yummy-welcome-post'); ?>
        <!-- Overlay Text -->
        <div class="project_title">
            <div class="post-date-commnents d-flex">
                <a href="<?php the_permalink(); ?>"><?php the_date(); ?></a>
                <a href="<?php the_permalink(); ?>"><?php comments_number('0 Comment', '1 Comment', '% Comments'); ?></a>
            </div>
            <a href="<?php the_permalink(); ?>">
                <h5><?php the_title(); ?></h5>
            </a>
        </div>
    </div>
    <?php endwhile; ?>

    

</section>
<!-- ****** Welcome Area End ****** -->