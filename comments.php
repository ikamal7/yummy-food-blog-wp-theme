<!-- Comment Area Start -->
<div class="comment_area section_padding_50 clearfix">
    <?php if(have_comments()) : ?>
    <h4 class="mb-30">
        <?php
        $yummy_com_num = get_comments_number();
        if ($yummy_com_num <= 1) {
            echo esc_html($yummy_com_num) . " " . __('Comment', 'yummy_food');
        } else {
            echo esc_html($yummy_com_num) . " " . __('Comments', 'yummy_food');
        }
        ?>
    </h4>

    <ol>
        <?php
        wp_list_comments(array(
            'style'       => 'ol',
            'short_ping'  => true,
            'avatar_size' => 70,
            'callback'    => 'yummy_comment_cb',
        ));
        ?>
    </ol>


    <div class="comments-pagination">
        <?php the_comments_pagination(array(
            'screen_reader_text' => __("Pagination", "yummy_food"),
            'prev_text'          => __("Previous Comments", "yummy_food"),
            'next_text'          => __("Next Comments", "yummy_food"),
        )); ?>
    </div>
    <?php endif; ?>
    <?php
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if (!comments_open() && '0' != get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
    ?>
    <p class="no-comments"><?php esc_html_e('Comments are closed.', 'yummy_food'); ?></p>
    <?php endif; ?>
</div>


<!-- Leave A Comment -->
<div class="leave-comment-area section_padding_50 clearfix">
    <div class="comment-form">

        <?php
        $commenter = wp_get_current_commenter();
        $req       = get_option('require_name_email');
        $aria_req  = ($req ? " aria-required='true'" : '');
        $consent   = empty($commenter['comment_author_email']) ? '' : ' checked="checked"';
        $fields    = array(
            'author'  => '<div class="form-group">
                <input type="text" name="author" class="form-control" id="contact-name" ' . $aria_req . ' placeholder="' . esc_attr('Name', 'yummy_food') . '" value="' . esc_attr($commenter['comment_author']) . '">
            </div>',
            'email'   => '<div class="form-group">
                <input type="text" name="email" class="form-control" id="contact-email" ' . $aria_req . ' placeholder="' . esc_attr('Email', 'yummy_food') . '" value="">
            </div>',
            'url'     => '<div class="form-group">
                <input type="text" name="url" class="form-control" id="contact-website" placeholder="' . esc_attr('Website', 'yummy_food') . '" value="">
            </div>',
            'cookies' => '<div class="form-group"><div class="form-check">
                                    <input class="form-check-input" id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' .
                '<label class="form-check-label" for="wp-comment-cookies-consent">' . __('Save my name, email, and website in this browser for the next time I comment.', 'yummy_food') . '</label>
                                    </div></div>',

        );
        comment_form(array(
            'fields'        => $fields,
            'class_submit'  => 'btn contact-btn',
            'comment_field' => '<div class="form-group">
                <textarea class="form-control" name="comment" id="message" cols="30" rows="10" ' . $aria_req . ' placeholder="' . esc_html('Message', 'yummy_food') . '"></textarea>
            </div>',
            'title_reply' => __('Leave A Comment', 'yummy_food'),
            'title_reply_before' => '<h4 class="mb-30">',
            'title_reply_after'=> '</h4>'
        )); ?>

        <!-- Comment Form -->

    </div>
</div>