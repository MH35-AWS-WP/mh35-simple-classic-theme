<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <?php wp_body_open(); ?>
        <a href="#content" class="screen-reader-text skip-link"><?php
        _e( 'Skip to content', 'mh35-simple-classic-theme' );
        ?></a>
        <header id="site-header" class="site-header">
            <?php if ( is_front_page() ) {
                ?><h1 class="site-title">
                    <?php if ( has_custom_logo() ) {
                        the_custom_logo();
                    } else {
                        ?><span class="header-text"><?php
                        bloginfo( 'name' ); ?></span><?php
                    } ?>
                </h1><?php
            } else {
                ?><p class="site-title">
                    <?php if ( has_custom_logo() ) {
                        the_custom_logo();
                    } else {
                        ?><span class="header-text"><?php
                        bloginfo( 'name' ); ?></span><?php
                    } ?>
                </p><?php
            } ?>
            <nav class="header-nav">
                <?php if ( has_nav_menu( 'primary' ) ) {
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                    ) );
                } ?>
            </nav>
        </header>
        <div id="site-content-wrap" class="site-content-wrap">