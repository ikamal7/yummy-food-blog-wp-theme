<?php

class YummyFooterSocialIcons_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'yummy_footer_social_icons', // Base ID
            __( 'Yummy: Footer Social Icons', 'yummy_food' ), // Name
            array( 'description' => __( 'Social Icons for Footer Widget', 'yummy_food' ), ) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        extract( $args );
        $social_icons = array(
            "facebook",
            "twitter",
            "github",
            "pinterest",
            "instagram",
            "google-plus",
            "youtube",
            "vimeo",
            "tumblr",
            "dribbble",
            "flickr",
            "behance"
        );
        $title        = apply_filters( 'widget_title', $instance['title'] );

        echo wp_kses_post($before_widget);
        ?>

            <?php
            if ( $title ) {
                echo "<div class=\"widget-title\">";
                echo esc_html($before_title) . esc_html( $title ) . esc_html($after_title);
                echo "</div>";
            }
            ?>
                <?php
                foreach ( $social_icons as $sci ) {
                    $url = trim( $instance[ $sci ] );
                    if ( ! empty( $url ) ) {
                        if ( $sci == "vimeo" ) {
                            $sci = "vimeo-square";
                        }
                        $sci = esc_attr( $sci );
                        echo "<div class='single-icon'>
                                <a target='_blank' href='" . esc_attr( $url ) . "'><i class='fa fa-" . esc_html( $sci ) . "'></i><span>" . esc_attr( $sci ) . "</span></a>
                                </div>";
                    }
                }
                ?>

        <?php
        echo wp_kses_post($after_widget);

    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance                = array();
        $instance['title']       = strip_tags( $new_instance['title'] );
        $instance['facebook']    = strip_tags( $new_instance['facebook'] );
        $instance['twitter']     = strip_tags( $new_instance['twitter'] );
        $instance['github']      = strip_tags( $new_instance['github'] );
        $instance['pinterest']   = strip_tags( $new_instance['pinterest'] );
        $instance['instagram']   = strip_tags( $new_instance['instagram'] );
        $instance['google-plus'] = strip_tags( $new_instance['google-plus'] );
        $instance['youtube']     = strip_tags( $new_instance['youtube'] );
        $instance['vimeo']       = strip_tags( $new_instance['vimeo'] );
        $instance['tumblr']      = strip_tags( $new_instance['tumblr'] );
        $instance['dribbble']    = strip_tags( $new_instance['dribbble'] );
        $instance['flickr']      = strip_tags( $new_instance['flickr'] );
        $instance['behance']     = strip_tags( $new_instance['behance'] );

        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        if ( isset( $instance['title'] ) ) {
            $title = $instance['title'];
        } else {
            $title = __( '', 'yummy_food' );
        }


        $social_icons = array(
            "facebook",
            "twitter",
            "github",
            "pinterest",
            "instagram",
            "google-plus",
            "youtube",
            "vimeo",
            "tumblr",
            "dribbble",
            "flickr",
            "behance"
        );
        foreach ( $social_icons as $sc ) {
            if ( ! isset( $instance[ $sc ] ) ) {
                $instance[ $sc ] = "";
            }
        }
        ?>
        <?php foreach ( $social_icons as $sci ) {
            ?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( $sci )) ; ?>"><?php echo esc_html( ucfirst( $sci )   . " " . __( 'URL', 'yummy_food' ) ); ?>
                    : </label>
                <br/>

                <input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( $sci ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( $sci ) ); ?>"
                       value="<?php echo esc_attr( $instance[ $sci ] ); ?>"/>
            </p>

            <?php
        }
        ?>


        <?php
    }


} // class Foo_Widget

function yummy_footer_social_icons_widget() {
    register_widget( 'YummyFooterSocialIcons_Widget' );
}

add_action( 'widgets_init', 'yummy_footer_social_icons_widget' );
