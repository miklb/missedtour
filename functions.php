<?php
/**
 * MissedTour child theme functions.php file.
 * @package missedtour
 */
add_action( 'wp_enqueue_scripts', 'mtour_enqueue_styles' );
function mtour_enqueue_styles() {
 
    $parent_style = 'parent-style'; // This is 'storefront-style' for the Store Front theme.
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
    wp_dequeue_style('storefront-fonts');
    wp_enqueue_style( 'missedtour-fugazi', 'https://fonts.googleapis.com/css2?family=Fugaz+One&display=swap');
    wp_enqueue_style( 'missedtour-josefinSans', 'https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap');
}

function remove_sf_actions() {

	remove_action( 'storefront_header', 'storefront_header_cart', 60 );

}
add_action( 'init', 'remove_sf_actions' );
