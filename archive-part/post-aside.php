<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if ( has_post_thumbnail() ) {
        ?><div class="archive-article-layout">
            <?php the_post_thumbnail(
                'mh35-simple-classic-theme-archive'
            ); ?>
            <div class="archive-article-content">
                <h2 class="post-title"><?php the_title(); ?></h2>
                <p class="post-date-wrap">
                    <time class="post-date"
                    datetime="<?php echo get_the_date( 'c' ); ?>"><?php
                    echo get_the_date(); ?></time>
                </p>
                <div class="post-excerpt"><?php the_content(); ?></div>
            </div>
        </div><?php
    } else {
        ?>
        <h2 class="post-title"><?php the_title(); ?></h2>
        <p class="post-date-wrap">
            <time class="post-date"
            datetime="<?php echo get_the_date( 'c' ); ?>"><?php
            echo get_the_date(); ?></time>
        </p>
        <div class="post-excerpt"><?php the_content(); ?></div>
        <?php
    } ?>
</article>
