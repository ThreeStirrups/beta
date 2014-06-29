<?php

add_action('genesis_meta', 'beta_home_meta');

function beta_home_meta() {

    if ( is_home() ) {

    //* Remove entry meta in entry footer and Genesis loop
    remove_action( 'genesis_loop', 'genesis_do_loop' );

    //* Force full width content layout
    add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

    }

    if ( is_active_sidebar( 'home-featured-1' ) || is_active_sidebar( 'home-featured-2' ) || is_active_sidebar( 'home-featured-3' ) ) {

        //* Add Home featured Widget areas
        add_action( 'genesis_after_header', 'beta_home_featured', 15 );

    }

    add_action('genesis_after_header', 'beta_home_banner', 5);

}

function beta_home_banner() {
    echo'<div class="home-banner"><div class="wrap">';
    do_action('beta_banner');
    genesis_widget_area( 'home-banner', array(
        'before' => '<div class="widget-area">',
        'after'  => '</div>',
    ) );
    echo'</div></div>';
}

//* Add markup for homepage widgets
function beta_home_featured() {

    $count1 = beta_count_widgets('home-featured-1');
    $count2 = beta_count_widgets('home-featured-2');

    echo '<div class="home-featured home-featured-1">';

    genesis_widget_area( 'home-featured-1', array(
        'before' => '<div class="' . $count1 . ' widget-area">',
        'after'  => '</div>',
    ) );

    echo '</div>';

    echo '<div class="home-featured home-featured-2">';

    genesis_widget_area( 'home-featured-2', array(
        'before' => '<div class="' . $count2 . ' widget-area">',
        'after'  => '</div>',
    ) );

    echo '</div>';

}

genesis();