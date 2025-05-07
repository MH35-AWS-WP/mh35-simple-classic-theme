<?php get_header(); ?>
<main id="content" class="content">
    <h1 class="archive-title"><?php the_archive_title(); ?></h1>
    <?php
    while ( have_posts() ) {
        the_post();
        if ( has_post_format() ) {
            get_template_part( 'archive-part/post', get_post_format() );
        } else {
            get_template_part( 'archive-part/post' );
        }
    }
    the_posts_pagination(); ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>