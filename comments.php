<?php
if ( post_password_required() ) {
    // If post password is required, exit.
    return;
} ?>
<aside id="comments" class="comments-area">
    <?php if ( have_comments() ) {
        $comments_number = get_comments_number();
        ?><section class="comments-list">
            <h2 class="comments-list-title"><?php
            printf(
                _n(
                    '%1$s comment is available on &ldquo;%2$s&rdquo;',
                    '%2$s comments are available on &ldquo;%2$s&rdquo;',
                    $comments_number,
                    'mh35-simple-classic-theme'
                ),
                number_format_i18n( $comments_number ),
                get_the_title()
            ); ?></h2>
            <?php the_comments_navigation(); ?>
            <ol class="comment-list">
                <?php wp_list_comments( array(
                    'style' => 'ol',
                    'short_ping' => true,
                ) ); ?>
            </ol>
            <?php the_comments_navigation(); ?>
        </section><?php
    }
    if (
        ! comments_open() &&
        get_comments_number() &&
        post_type_supports( get_post_type(), 'comments' ) ) {
        ?><p class="comments-are-closed"><?php _e(
            'Comments are closed.', 'mh35-simple-classic-theme'
        ); ?></p><?php
    }
    ?>
    <section class="comment-form-wrap">
        <?php comment_form( array(
            'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
            'title_reply_after' => '</h2>',
        ) ); ?>
    </section>
</aside>
