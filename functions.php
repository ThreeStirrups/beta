<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Set Localization (do not remove)
// load_child_theme_textdomain( 'beta', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'beta' ) );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Beta' );
define( 'CHILD_THEME_URL', 'http://www.threestirrups.com/themes/beta' );
define( 'CHILD_THEME_VERSION', '1.0.0' );

//* Enqueue Lato Google font
add_action( 'wp_enqueue_scripts', 'genesis_base_theme_google_fonts' );
function genesis_base_theme_google_fonts() {
    wp_enqueue_script( 'backstretch', get_bloginfo( 'stylesheet_directory' ) . '/js/jquery.backstretch.min.js', array( 'jquery' ), '1.0.0' );
    wp_enqueue_script( 'beta-custom', get_bloginfo( 'stylesheet_directory' ) . '/js/custom.js', array( 'jquery' ), '1.0.0' );
    wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( 'beta-fonts', '//fonts.googleapis.com/css?family=Open+Sans:400,600,700', array(), CHILD_THEME_VERSION );
}

//* Add HTML5 markup structure
add_theme_support( 'html5' );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Remove the site description
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );
add_action('beta_banner', 'genesis_seo_site_description');

//* Add support for additional color style options
add_theme_support( 'genesis-style-selector', array(
    'beta-midnight' => __( 'Beta Midnight', 'beta' ),
    'beta-sea'      => __( 'Beta Sea', 'beta' ),
    'beta-green'    => __( 'Beta Green', 'beta' ),
    'beta-orange'   => __( 'Beta Orange', 'beta' ),
    'beta-purple'   => __( 'Beta Purple', 'beta' ),
    'beta-red'      => __( 'Beta Red', 'beta' ),
    'beta-yellow'   => __( 'Beta Yellow', 'beta' ),
) );

//* Add support for structural wraps
add_theme_support( 'genesis-structural-wraps', array(
    'header',
    'nav',
    'subnav',
    'site-inner',
    'footer-widgets',
    'footer'
) );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

//* Reposition the primary navigation menu
// remove_action( 'genesis_after_header', 'genesis_do_nav' );
// add_action( 'genesis_before_header', 'genesis_do_nav' );

add_action('genesis_before_footer', 'beta_before_footer', 5);
function beta_before_footer() {
    genesis_widget_area( 'before-footer', array(
        'before' => '<div class="before-footer widget-area">',
        'after'  => '</div>',
    ) );
}

//* Count widgets in sidebar
function beta_count_widgets( $sidebar_name ) {
    global $sidebars_widgets;
    $count = count ($sidebars_widgets[$sidebar_name]);

    switch ( $count ) {
        case '2':
            $class = 'two';
            break;
        case '3':
            $class = 'three';
            break;
        case '4':
            $class= 'four';
            break;
        default:
            $class = '';
            break;
    }

    return $class;
}

//* Register widget areas
genesis_register_sidebar( array(
    'id'          => 'home-banner',
    'name'        => __( 'Home Banner', 'beta' ),
    'description' => __( 'This is the home banner section.', 'beta' ),
) );
genesis_register_sidebar( array(
    'id'          => 'home-featured-1',
    'name'        => __( 'Home Featured 1', 'beta' ),
    'description' => __( 'This is the home featured 1 section.', 'beta' ),
) );
genesis_register_sidebar( array(
    'id'          => 'home-featured-2',
    'name'        => __( 'Home Featured 2', 'beta' ),
    'description' => __( 'This is the home featured 2 section.', 'beta' ),
) );
genesis_register_sidebar( array(
    'id'          => 'after-entry',
    'name'        => __( 'After Entry', 'beta' ),
    'description' => __( 'This is the after entry widget area.', 'beta' ),
) );
genesis_register_sidebar( array(
    'id'          => 'before-footer',
    'name'        => __( 'Before Footer', 'beta' ),
    'description' => __( 'This is the before footer widget area.', 'beta' ),
) );