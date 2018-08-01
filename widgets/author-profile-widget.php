<?php


class YummyAuthorProfile extends WP_Widget {
	/**
	 * Register Widget
	 */
	public function __construct() {
		parent::__construct(
			'yummyauthorprofile', //base ID
			__( 'Yummy: Author Profile', 'yummy_food' ),
			array( __( 'Yummy: Author Profile', 'yummy_food' ) )
		);
	}


	/**
	 * Author Bio Widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args Widget arguments.
	 * @param array $instance Saved values from database.
	 */

	public function widget( $args, $instance ) {
		echo wp_kses_post( $args['before_widget']);
		if ( ! empty( $instance['title'] ) ) {
			echo wp_kses_post( $args['before_title'] ) . apply_filters( 'widget_title', $instance['title'] ) . wp_kses_post( $args['after_title'] );
		} ?>
        <div class="about-me-widget">
            <div class="about-me-widget-thumb">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 180 ); ?>
            </div>
            <h4 class="font-shadow-into-light"><?php echo get_the_author_meta( 'first_name' ); ?></h4>
            <?php echo wpautop( get_the_author_meta( 'description' ) ); ?>V
        </div>

		<?php
		echo wp_kses_post( $args['after_widget'] );

	}

	/**
     * @see WP_Widget::form()
     * @param array $instance Previously saved values from database.
     */

	public function form($instance){
	    $title = ! empty( $instance['title']) ? $instance['title'] : '';
	    ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title')); ?>"><?php _e( 'TItle', 'yummy_food'); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title')); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>" type="text">
        </p>
<?php
    }


    /**
     * @see WP_Widget::update()
     */

    public function update( $new_instance, $old_instance){
        $instance = array();

        $instance['title'] = (! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

        return $instance;
    }

} // class YummyAuthorProfile

    /**
     * Register Widget area
     */
    function yummy_widgets(){
        register_widget( 'yummyauthorprofile');
    }
    add_action('widgets_init', 'yummy_widgets');