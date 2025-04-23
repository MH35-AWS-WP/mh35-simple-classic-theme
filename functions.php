<?php
if ( ! function_exists( 'mh35_simple_classic_theme_setup' ) ) {
    /**
     * Sets up this theme.
     */
    function mh35_simple_classic_theme_setup() {
        /* 
         * I want to use translations in this function, but I don't know whether
         * JIT translation is available.
         * So I load JIT translation first, and if no translations are available,
         * load theme translation.
         */
        $cur_trans = get_translations_for_domain( 'mh35-simple-classic-theme' );
        if ( $cur_trans instanceof NOOP_Translations ) {
            load_theme_textdomain( 'mh35-simple-classic-theme' );
        }
        // Add theme supports
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
        // Register navigation menus
        register_nav_menus( array(
            'primary' => __( 'Primary menu', 'mh35-simple-classic-theme' ),
            'footer' => __( 'Footer menu', 'mh35-simple-classic-theme' ),
        ) );
        // Add image sizes
        add_image_size( 'mh35-simple-classic-theme-embed', 200, 200, true );
    }
}
add_action( 'after_setup_theme', 'mh35_simple_classic_theme_setup' );

if ( ! function_exists( 'mh35_simple_classic_theme_init' ) ) {
    /**
     * After init hook of this theme.
     */
    function mh35_simple_classic_theme_init() {
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

if ( ! function_exists( 'mh35_simple_classic_theme_has_featured_posts' ) ) {
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

if ( ! function_exists( 'mh35_simple_classic_theme_register_sidebars' ) ) {
    /**
     * Register sidebars.
     */
    function mh35_simple_classic_theme_register_sidebars() {
        register_sidebar( array(
            'name' => __( 'Main sidebar', 'mh35-simple-classic-theme' ),
            'id' => 'sidebar-1',
            'description' => __( 'Left sidebar', 'mh35-simple-classic-theme' ),
        ) );
    }
}
add_action( 'widgets_init', 'mh35_simple_classic_theme_register_sidebars' );

if ( ! function_exists( 'mh35_simple_classic_theme_enqueue_scripts' ) ) {
    /**
     * Enqueue scripts and styles.
     */
    function mh35_simple_classic_theme_enqueue_scripts() {
        wp_enqueue_style(
            'normalize',
            get_template_directory_uri() . '/vendor/normalize.normalize.css',
            array(),
            '8.0.1'
        );
        wp_enqueue_style( 'theme-style', get_stylesheet_uri(), array( 'normalize' ) );
    }
}
add_action( 'wp_enqueue_scripts', 'mh35_simple_classic_theme_enqueue_scripts' );

if ( ! function_exists( 'mh35_simple_classic_theme_title_separator' ) ) {
    /**
     * Override title tag separator
     * 
     * @param string $sep Separator
     * @return string New separator
     */
    function mh35_simple_classic_theme_title_separator( $sep ) {
        return '|';
    }
}
add_filter( 'document_title_separator', 'mh35_simple_classic_theme_title_separator' );

if ( ! function_exists( 'mh35_simple_classic_theme_custom_logo_attributes' ) ) {
    /**
     * Override custom logo attributes
     * 
     * @param array $custom_logo_attr Custom logo attributes
     * @return array New custom logo attributes
     */
    function mh35_simple_classic_theme_custom_logo_attributes($custom_logo_attr) {
        if ( empty( $custom_logo_attr['alt'] ) ) {
            $custom_logo_attr['alt'] = get_bloginfo( 'name', 'display' );
        }
        return $custom_logo_attr;
    }
}
add_filter(
    'get_custom_logo_image_attributes',
    'mh35_simple_classic_theme_custom_logo_attributes'
);

if ( ! function_exists( 'mh35_simple_classic_theme_embed_style' ) ) {
    function mh35_simple_classic_theme_embed_style() {
        wp_enqueue_style(
            'normalize',
            get_template_directory_uri() . '/vendor/normalize.normalize.css',
            array(),
            '8.0.1'
        );
        wp_enqueue_style(
            'embed-style',
            get_template_directory_uri() . '/embed-style.css',
            array( 'normalize' )
        );
    }
}
add_action( 'embed_head', 'mh35_simple_classic_theme_embed_style' );
remove_action( 'embed_head', 'print_embed_styles' );
remove_action( 'embed_head', 'wp_enqueue_embed_styles', 9 );
