<?php
if ( ! function_exists( 'mh35_simple_classic_theme_setup' ) ) {
    /**
     * Sets up this theme.
     */
    function mh35_simple_classic_theme_setup() {
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'custom-background', array(
            'default-color' => '#ffffff',
        ) );
        add_theme_support( 'custom-logo', array(
            'height' => 100,
            'width' => 300,
            'flex-height' => true,
            'flex-width' => true,
            'header-text' => array( 'site-title-text' ),
            'unlink-homepage-logo' => true,
        ) );
        add_theme_support( 'custom-line-height' );
        add_theme_support( 'featured-content', array(
            'featured_content_filter' => 'mh35_simple_classic_theme_featured_posts',
            'max_posts' => 3,
        ) );
        add_theme_support( 'html5', array(
            'comment-list', 'comment-form', 'search-form', 'gallery', 'caption',
            'style', 'script', 'meta',
        ) );
        add_theme_support( 'post-formats', array(
            'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video',
            'audio', 'chat',
        ) );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'responsive-embeds' );
        add_theme_support( 'title-tag' );
    }
}
add_action( 'after_setup_theme', 'mh35_simple_classic_theme_setup' );

if ( ! function_exists( 'mh35_simple_classic_theme_init' ) ) {
    /**
     * After init hook of this theme.
     */
    function mh35_simple_classic_theme_init() {
        load_theme_textdomain( 'mh35-simple-classic-theme' );
    }
}
add_action( 'init', 'mh35_simple_classic_theme_init' );

if ( ! function_exists( 'mh35_simple_classic_theme_featured_posts' ) ) {
    /**
     * Get featured posts
     * 
     * @return array An array of WP_Post objects.
     */
    function mh35_simple_classic_theme_featured_posts() {
        /**
         * Filters the featured posts to return in this theme
         * 
         * @param array|bool $posts Array of featured posts, otherwise false.
         */
        return apply_filters(
            'mh35_simple_classic_theme_featured_posts', array()
        );
    }
}

if ( !function_exists( 'mh35_simple_classic_theme_has_featured_posts' ) ) {
    /**
     * Get whether there are any featured posts.
     * 
     * @return bool Whether there are any featured posts.
     */
    function mh35_simple_classic_theme_has_featured_posts() {
        if ( is_paged() ) {
            return false;
        }
        $posts = mh35_simple_classic_theme_featured_posts();
        return !empty($posts);
    }
}
