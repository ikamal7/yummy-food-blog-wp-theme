<?php
get_header();
?>
    
    <section class="section_padding_80">
        <div class="container">
            <?php while (have_posts()){
                the_post();
                if (has_post_thumbnail())
                    the_post_thumbnail('large');
                the_content();
            } ?>
        </div>
    </section>


<?php get_footer(); ?>