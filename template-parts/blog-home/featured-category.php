<!-- ****** Categories Area Start ****** -->
<section class="categories_area clearfix" id="about">
    <div class="container">
        <div class="row">

            <?php

            $terms = get_categories(
                array(
                    'taxonomy'   => 'category',
                    'number'     => 3,
                    'order'      => 'DESC',
                    'meta_query' => array(
                        array(
                            'key'     => 'featured_category',
                            'value'   => true,
                            'compare' => '=',
                        ),
                    ),
                )
            );
            //echo count($terms);
            if (count($terms) >= 1) :
                foreach ($terms as $term) :
                    $fet = get_field('featured_image', $term);
                    $img = wp_get_attachment_image_url($fet, 'category_img');
                    //var_dump($term);
                    ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="single_catagory wow fadeInUp" data-wow-delay=".2s">
                            <img src="<?php echo esc_url($img); ?>">
                            <div class="catagory-title">
                                <a href="<?php echo esc_url(get_term_link($term)) ?>">
                                    <h5><?php echo esc_html($term->name); ?></h5>
                                </a>
                            </div>
                        </div>
                    </div>

            <?php
            endforeach;
            endif;

            ?>
        </div>
    </div>
</section>
<!-- ****** Categories Area End ****** -->