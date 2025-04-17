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
            サイトヘッダー
        </header>
        <div id="site-content-wrap" class="site-content-wrap">