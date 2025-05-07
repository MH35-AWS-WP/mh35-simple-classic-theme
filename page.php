<?php get_header(); ?>
<main id="content" class="content">
    <?php while ( have_posts() ) {
        the_post();
        ?><article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h1 class="post-title"><?php the_title(); ?></h1>
            <div class="post-content"><?php the_content(); ?></div>
            <?php
            if ( ! post_password_required() ) {
                wp_link_pages();
            }
            comments_template();
            ?>
        </article><?php
    } ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>