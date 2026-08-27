<?php
/**
 * Theme functions and definitions
 *
 * @package Author Landing Page
 */
/**
 * Load assets.
 *
 */
function author_landing_page_enqueue_styles() {
    $my_theme = wp_get_theme();
    $version = $my_theme['Version'];

    wp_enqueue_style( 'author-landing-page-parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'author-landing-page-style', get_stylesheet_directory_uri() . '/style.css', array( 'author-landing-page-parent-style' ), $version );

	wp_enqueue_style( 'author-landing-page-google-fonts', author_landing_page_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'author_landing_page_enqueue_styles' );

/**
 * Register custom fonts.
 */
function author_landing_page_fonts_url() {
    $fonts_url = '';

    /*
    * translators: If there are characters in your language that are not supported
    * by PT Sans, translate this to 'off'. Do not translate into your own language.
    */
    $pt_sans = _x( 'on', 'PT Sans font: on or off', 'author-landing-page' );
    
    /*
    * translators: If there are characters in your language that are not supported
    * by Quicksand, translate this to 'off'. Do not translate into your own language.
    */
    $quicksand = _x( 'on', 'Quicksand font: on or off', 'author-landing-page' );

    if ( 'off' !== $pt_sans || 'off' !== $quicksand ) {
        $font_families = array();

        if( 'off' !== $pt_sans ){
            $font_families[] = 'PT Sans:700i';
        }

        if( 'off' !== $quicksand ){
            $font_families[] = 'Quicksand:300,400,500,700';
        }

        $query_args = array(
            'family'  => urlencode( implode( '|', $font_families ) ),
            'display' => urlencode( 'fallback' ),
        );

        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }

    return esc_url( $fonts_url );
}

/**
 * After setup theme hook
 */
function author_landing_page_theme_setup(){
    /*
     * Make chile theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_child_theme_textdomain( 'author-landing-page', get_stylesheet_directory() . '/languages' );

    /**
     * Add support for custom header.
    */
    add_theme_support( 'custom-header', apply_filters( 'author_landing_page_header_args', array(
        'default-image' => get_stylesheet_directory_uri() . '/images/banner-bg.jpg',
        'video'         => false,
        'width'         => 1920,
        'height'        => 730,
        'header-text'   => false
    ) ) );
    
    register_default_headers( array(
        'default-image' => array(
            'url'           => get_stylesheet_directory_uri() . '/images/banner-bg.jpg',
            'thumbnail_url' => get_stylesheet_directory_uri() . '/images/banner-bg.jpg',
            'description'   => __( 'Default Header Image', 'author-landing-page' ),
        ),
    ) );

    add_image_size( 'author-landing-page-banner-image', 650, 510, true );
    add_image_size( 'author-landing-page-about-block', 800, 1072, true );

    /*
     * Make chile theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_child_theme_textdomain( 'author-landing-page', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'author_landing_page_theme_setup' );

/**
 * Implementing parent theme functions to the child theme.
 */
require get_stylesheet_directory() . '/inc/parent-functions.php';