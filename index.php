<?php get_header(); ?>
<main id="content" class="content">
    <?php if ( is_archive() ) {
        ?><h1 class="archive-title"><?php the_archive_title(); ?></h1>
        <?php
    }
    while ( have_posts() ) {
        the_post();
        ?><article id="post-<?php the_ID(); ?>" <?php post_class(); ?>><?php
        if ( is_singular() ) {
            ?><h1 class="post-title"><?php the_title(); ?></h1>
            <div class="post-content"><?php the_content(); ?></div>
            <?php
        } else {
            ?><h2 class="post-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
            <div class="post-excerpt"><?php the_excerpt(); ?></div>
            <?php
        }
        ?></article><?php
    } ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>