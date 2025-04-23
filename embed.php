<?php get_header( 'embed' );
if ( have_posts() ) {
    while ( have_posts() ) {
        the_post();
        ?>
        <article id="embed-<?php the_ID(); ?>" <?php post_class( 'embed-post' ); ?>>
            <h1 class="embed-title">
                <a href="<?php the_permalink(); ?>" target="_top"><?php
                the_title(); ?></a>
            </h1>
            <div class="embed-content">
                <?php if ( 'attachment' === get_post_type() && wp_attachment_is_image() ) {
                    $thumbnail_id = get_the_ID();
                } elseif ( has_post_thumbnail() ) {
                    $thumbnail_id = get_post_thumbnail_id();
                } else {
                    $thumbnail_id = 0;
                }
                $thumbnail_id = apply_filters( 'embed_thumbnail_id', $thumbnail_id );
                if ( $thumbnail_id ) {
                    ?><div class="embed-thumbnail-wrap">
                        <a href="<?php the_permalink(); ?>" target="_top">
                            <?php echo wp_get_attachment_image(
                                $thumbnail_id,
                                'mh35-simple-classic-theme-embed'
                            ); ?>
                        </a>
                    </div><?php
                } ?>
                <p class="embed-excerpt"><?php the_excerpt_embed(); ?></p>
            </div>
            <?php do_action( 'embed_content' ); ?>
            <footer class="embed-article-footer">
                <?php the_embed_site_title(); ?>
                <div class="embed-metadata"><?php do_action( 'embed_content_meta' ); ?></div>
            </footer>
        </article>
        <?php
    }
} else {
    ?>
    <article id="embed-0" class="embed-post">
        <h1 class="embed-title"><?php _e(
            'Embed target post not found.', 'mh35-simple-classic-theme'
        ); ?></h1>
        <div class="embed-content">
            <p class="embed-excerpt"><?php _e(
                'The post is not available for this embed.',
                'mh35-simple-classic-theme'
            ); ?></p>
        </div>
        <?php do_action( 'embed_content' ); ?>
        <footer class="embed-article-footer">
            <?php the_embed_site_title(); ?>
        </footer>
    </article>
    <?php
} ?>
<?php get_footer( 'embed' );