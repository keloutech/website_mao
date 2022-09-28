<?php

/**
 * Optima Child Theme Function
 *
 */

add_action( 'after_setup_theme', 'optima_child_theme_setup' );
add_action( 'wp_enqueue_scripts', 'optima_child_enqueue_styles', 20);

if( !function_exists('optima_child_enqueue_styles') ) {
    function optima_child_enqueue_styles() {
        wp_enqueue_style( 'optima-child-style',
            get_stylesheet_directory_uri() . '/style.css',
            array( 'optima-theme' ),
            wp_get_theme()->get('Version')
        );
    }
}

if( !function_exists('optima_child_theme_setup') ) {
    function optima_child_theme_setup() {
        load_child_theme_textdomain( 'optima-child', get_stylesheet_directory() . '/languages' );
    }
}