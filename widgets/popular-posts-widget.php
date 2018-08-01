<?php
    
    /**
     * Widget API: Yummy_Popular_Posts class
     *
     */
    
    class YummyPopularPost extends WP_Widget {
        public function __construct() {
            parent::__construct( 'yummypopularpost',
                __( 'Yummy: Popular Posts', 'yummy_food'), array(
                'description'                 => __( 'Your site&#8217;s most popular Post.', 'yummy_food' ),
            ) );
            
        }
        
        /**
         * Outputs the content for the current Popular Posts widget instance.
         */
        public function widget( $args, $instance ) {
            if ( ! isset( $args[ 'widget_id' ] ) ){
                $args[ 'widget_id' ] = $this->id;
            }
            $title = ( ! empty( $instance[ 'title' ] ) ) ? $instance[ 'title' ] : __( 'Popular Posts', 'yummy_food' );
            $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
            $number = ( ! empty( $instance[ 'number' ] ) ) ? $instance[ 'number' ] : 5;
            if ( ! $number ){
                $number = 5;
            }
            
            $show_date = isset( $instance[ 'show_date' ] ) ? $instance[ 'show_date' ] : false;
            
            /**
             * Query for Popular posts
             */
            
            $philosophy_popular_post = new WP_Query(  array(
                'posts_per_page'      => $number,
                'no_found_rows'       => true,
                'post_status'         => 'publish',
                'ignore_sticky_posts' => true,
                'orderby'=> 'comment_count'
            ) );
            if ( ! $philosophy_popular_post->have_posts() ){
                return;
            }
            echo wp_kses_post( $args[ 'before_widget' ]);
            
            if ( ! empty( $instance[ 'title' ] ) ){
                echo wp_kses_post( $args[ 'before_title' ]) . esc_html( $title) . wp_kses_post( $args[ 'after_title' ]);
            } ?>
            <div class="popular-post-widget">
            <?php
            while ($philosophy_popular_post->have_posts()) : $philosophy_popular_post->the_post();
                $post_title = get_the_title();
            $title = (! empty( $post_title)) ? $post_title : __('No Title', 'yummy_food');
            
            ?>
            <div class="single-populer-post d-flex">
                <?php the_post_thumbnail('thumbnail') ?>
                <div class="post-content">
                    <a href="<?php the_permalink(); ?>">
                        <h6><?php echo esc_html( $title); ?></h6>
                    </a>
                    <?php if ($show_date) : ?>
                    <p><?php echo esc_html( get_the_date()); ?></p>
                <?php endif; ?>
                </div>
            </div>
            
            <?php
                endwhile;
                wp_reset_query();
                ?>
            </div>
            <?php
            
            echo wp_kses_post( $args[ 'after_widget' ]);
            
            
        }
        
        public function update($new_instance, $old_instance){
            $instance = $old_instance;
            $instance['title'] = sanitize_text_field( $new_instance['title']);
            $instance['number'] = (int) $new_instance['number'];
            $instance['show_date'] = isset( $new_instance['show_date']) ? (bool) $new_instance['show_date'] : false;
            
            return $instance;
        }
    
        public function form( $instance ) {
            $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
            $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
            $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
            ?>
            <p><label for="<?php echo esc_attr( $this->get_field_id( 'title' )); ?>"><?php _e( 'Title:', 'yummy_food' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr( $this->get_field_id( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title); ?>" /></p>

            <p><label for="<?php echo esc_attr( $this->get_field_id( 'number' )); ?>"><?php _e( 'Number of posts to show:', 'yummy_food' ); ?></label>
                <input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr( $this->get_field_id( 'number' )); ?>" type="number" step="1" min="1" value="<?php echo esc_attr( $number); ?>" size="3" /></p>

            <p><input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_date' )); ?>" name="<?php echo esc_attr( $this->get_field_id( 'show_date' )); ?>" />
                <label for="<?php echo esc_attr( $this->get_field_id( 'show_date' )); ?>"><?php _e( 'Display post date?', 'yummy_food' ); ?></label></p>
            <?php
        }
        
    } // Class Yummy_popular_Posts
    
    function yummy_popular_post(){
        register_widget( 'YummyPopularPost');
    }
    add_action('widgets_init', 'yummy_popular_post');
    
    
    
    
    
    
    
    
    