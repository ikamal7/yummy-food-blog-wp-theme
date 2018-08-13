<?php
require_once(get_theme_file_path('/inc/tgm.php'));
require_once(get_theme_file_path('/inc/customizer.php'));
require_once(get_theme_file_path('/widgets/header-social-icons-widget.php'));
require_once(get_theme_file_path('/widgets/footer-social-icons-widget.php'));
require_once(get_theme_file_path('/widgets/author-profile-widget.php'));
require_once(get_theme_file_path('/widgets/popular-posts-widget.php'));

if ( ! isset( $content_width ) ) $content_width = 900;

function yummy_food_theme_supports()
{
    load_theme_textdomain("yummy_food");
    add_theme_support("title-tag");
    add_theme_support("post-thumbnails");
    add_theme_support("custom-logo");
    add_theme_support('automatic-feed-links');
    add_theme_support("html5", array('search-form', 'comment-list'));
    //add_theme_support("post-formats", array('image', 'gallery', 'audio', 'video', 'quote', 'link'));
    add_editor_style("assets/css/editor-style.css");
    
    add_image_size('yummy-welcome-post', 330, 495, true);
    add_image_size('yummy-category', 350, 253, true);

    register_nav_menu("primary", __("Primary", "yummy_food"));
    register_nav_menu("footer", __("Footer", "yummy_food"));

}

add_action("after_setup_theme", "yummy_food_theme_supports");

function yummy_food_assets()
{
    wp_enqueue_style('bootstrap', get_theme_file_uri('/assets/css/bootstrap/bootstrap.min.css'), '4.0');
    wp_enqueue_style('animate', get_theme_file_uri('/assets/css/others/animate.css'), '1.0');
    wp_enqueue_style('magnific-popup', get_theme_file_uri('/assets/css/others/magnific-popup.css'), '3.0');
    wp_enqueue_style('meanmenu.min', get_theme_file_uri('/assets/css/others/meanmenu.min.css'), '1.0');
    wp_enqueue_style('owl.carousel', get_theme_file_uri('/assets/css/others/owl.carousel.min.css'), '3.0');
    wp_enqueue_style('font-awesome', get_theme_file_uri('/assets/css/others/font-awesome.min.css'), '4.7');
    wp_enqueue_style('pe-icon-7-stroke', get_theme_file_uri('/assets/css/others/pe-icon-7-stroke.css'), '1.0');
    wp_enqueue_style('yummy_food-responsive', get_theme_file_uri('/assets/css/responsive/responsive.css'), '1.0');
    wp_enqueue_style('yummy_food-base', get_theme_file_uri('/assets/css/style.css'), '1.0');
    wp_enqueue_style('yummy_food', get_stylesheet_uri(), time());

    wp_enqueue_script('popper-js', get_theme_file_uri('/assets/js/bootstrap/popper.min.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('bootstrap-js', get_theme_file_uri('/assets/js/bootstrap/bootstrap.min.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('jquery-counterup-js', get_theme_file_uri('/assets/js/jquery.counterup.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('jquery-easing-js', get_theme_file_uri('/assets/js/jquery.easing.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('owl-carousel-js', get_theme_file_uri('/assets/js/owl-carousel.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('magnific-popup-js', get_theme_file_uri('/assets/js/magnific-popup.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('scrollup-js', get_theme_file_uri('/assets/js/scrollup.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('jquery-match-height-js', get_theme_file_uri('/assets/js/jquery-match-height.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('jquery-waypoints-js', get_theme_file_uri('/assets/js/jquery-waypoints.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('wow-js', get_theme_file_uri('/assets/js/wow.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('active-js', get_theme_file_uri('/assets/js/active.js'), array('jquery'), '1.0', true);
    if (is_singular() && comments_open() && (get_option('thread_comments') == 1)) {
        wp_enqueue_script('comment-reply', array('jquery'));
    }
    wp_enqueue_script('yummy-js', get_theme_file_uri('/assets/js/yummy.js'), array('jquery'), time(), true);
}

add_action('wp_enqueue_scripts', 'yummy_food_assets');

function yummy_sidebar(){
    register_sidebar(
            array(
                'name'          => __( 'Blog Sidebar', 'yummy_food' ),
                'id'            => 'blog_sidebar',
                'description'   => __( 'This sidebar show in blog', 'yummy_food' ),
                'before_widget' => '<div id="%1$s" class="widget single-widget-area text-center %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<div class="widget-title text-center"><h6>',
                'after_title'   => '</h6></div>',
            )
        );
    register_sidebar(
                array(
                    'name'          => __( 'Header top Right', 'yummy_food' ),
                    'id'            => 'header_social',
                    'description'   => __( 'Header top social icon widget area', 'yummy_food' ),
                    'before_widget' => '',
                    'after_widget'  => '',
                    'before_title'  => '',
                    'after_title'   => '',
                )
            );
    register_sidebar(
            array(
                'name'          => __( 'Footer Social Widget', 'yummy_food' ),
                'id'            => 'footer_social',
                'description'   => __( 'Footer Social Widget Area', 'yummy_food' ),
                'before_widget' => '',
                'after_widget'  => '',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            )
        );
    register_sidebar(
            array(
                'name'          => __( 'Footer bottom Widget', 'yummy_food' ),
                'id'            => 'footer_bottom',
                'description'   => __( 'Display In Footer bottom Widget', 'yummy_food' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s copy_right_text text-center">',
                'after_widget'  => '</div>',
                'before_title'  => '',
                'after_title'   => '',
            )
        );
}
add_action('widgets_init', 'yummy_sidebar');

function yummy_comment_cb($comment, $args, $depth){
?>
    <li <?php comment_class(empty($args['has_children single_comment_area']) ? '' : 'parent single_comment_area') ?>>
        <div class="comment-wrapper d-flex">
            <!-- Comment Meta -->
            <div class="comment-author">
                <?php if (0 != $args['avatar_size']){
                    echo get_avatar($comment, $args['avatar_size']);
                } ?>
            </div>
            <!-- Comment Content -->
            <div class="comment-content">
                <span class="comment-date text-muted"><?php echo esc_html(get_comment_date()); ?></span>
                <h5><?php comment_author(); ?> <small><?php edit_comment_link(__('Edit', 'yummy_food'), '  ', ''); ?></small></h5>
                <?php comment_text(); ?>
                <?php
                $comments_reply_args = array(
                    'add_below' => 'active',
                    'depth'     => $depth,
                    'max_depth' => $args['max_depth'],
                    'class'=> 'active'
                );
                comment_reply_link(array_merge($args, $comments_reply_args)); ?>
            </div>
        </div>

    </li>
<?php
}

function yummy_nav_menu(){
    $nav_menu = wp_nav_menu(array(
        'theme_location' => 'primary',
        'menu_class' => 'navbar-nav',
        'menu_id'=> 'yummy-nav',
        'echo' => false
    ));
    
    $nav_menu = str_replace('menu-item', 'menu-item nav-item', $nav_menu);
    $nav_menu = str_replace('current-menu-item', 'current-menu-item active', $nav_menu);
    $nav_menu = str_replace('nav-item-has-children', 'nav-item-has-children nav-item dropdown', $nav_menu);

    echo wp_kses_post($nav_menu);


}

function yummy_footer_nav_menu(){
    $nav_menu = wp_nav_menu(array(
        'theme_location' => 'footer',
        'menu_class' => 'navbar-nav',
        'menu_id'=> 'yummy-footer-nav',
        'echo' => false
    ));

    $nav_menu = str_replace('menu-item', 'menu-item nav-item', $nav_menu);
    $nav_menu = str_replace('current-menu-item', 'current-menu-item active', $nav_menu);
    $nav_menu = str_replace('nav-item-has-children', 'nav-item-has-children nav-item dropdown', $nav_menu);

    echo wp_kses_post($nav_menu);


}
function yummy_search_highlight($text){

    if (is_search()){
        $pattern = '/(' . join('|', explode(' ', get_search_query())) . ')/i';
        $text = preg_replace($pattern, '<span class="highlight__text">\0</span>', $text);
    }
    return $text;
}

add_filter('the_title', 'yummy_search_highlight');
add_filter('the_excerpt', 'yummy_search_highlight');
add_filter('the_content', 'yummy_search_highlight');

function yummy_pagination()
{
    global $wp_query;
    $links = paginate_links(array(
        'current'  => max(1, get_query_var('paged')),
        'total'    => $wp_query->max_num_pages,
        'type'     => 'list',
        'mid_size' => 3,
        'prev_text'=> '<i class="fa fa-long-arrow-left"></i> Prev',
        'next_text'=> 'Next <i class="fa fa-long-arrow-right"></i>',
    ));

    echo wp_kses_post($links);


}
