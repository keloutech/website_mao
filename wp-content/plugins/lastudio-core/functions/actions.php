<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

/**
 *
 * Get icons from admin ajax
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'la_fw_get_icons' ) ) {
    function la_fw_get_icons() {

        do_action( 'lastudio/action/framework/field/icon/before_add_icon' );

        $icons = la_get_icon_fonts();

        if( ! empty( $icons ) ) {

            foreach ( $icons as $icon_object ) {

                if( is_object( $icon_object ) ) {

                    echo ( count( $icons ) >= 2 ) ? '<h4 class="la-icon-title">'. $icon_object->name .'</h4>' : '';

                    foreach ( $icon_object->icons as $icon ) {
                        echo '<a class="la-icon-tooltip" data-la-icon="'. $icon .'" data-title="'. $icon .'"><span class="la-icon la-selector"><i class="'. $icon .'"></i></span></a>';
                    }

                } else {
                    echo '<h4 class="la-icon-title">'. __( 'Error! Can not load json file.', 'la-studio' ) .'</h4>';
                }

            }

        }
        do_action( 'lastudio/action/framework/field/icon/add_icon' );
        do_action( 'lastudio/action/framework/field/icon/after_add_icon' );

        die();
    }
    add_action( 'wp_ajax_la-fw-get-icons', 'la_fw_get_icons' );
}

/**
 *
 * Set icons for wp dialog
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'la_fw_set_icons' ) ) {
    function la_fw_set_icons() {

        echo '<div id="la-icon-dialog" class="la-dialog" title="'. __( 'Add Icon', 'la-studio' ) .'">';
        echo '<div class="la-dialog-header la-text-center"><input type="text" placeholder="'. __( 'Search a Icon...', 'la-studio' ) .'" class="la-icon-search" /></div>';
        echo '<div class="la-dialog-load"><div class="la-icon-loading">'. __( 'Loading...', 'la-studio' ) .'</div></div>';
        echo '</div>';

    }
    add_action( 'admin_footer', 'la_fw_set_icons' );
    add_action( 'customize_controls_print_footer_scripts', 'la_fw_set_icons' );
}


if(!function_exists('la_fw_ajax_autocomplete')) {
    function la_fw_ajax_autocomplete() {

        if ( empty( $_GET['query_args'] ) || empty( $_GET['s'] ) ) {
            echo '<b>' . __('Query is empty ...', 'la-studio' ) . '</b>';
            die();
        }

        $out = array();
        ob_start();

        $query = new WP_Query( wp_parse_args( $_GET['query_args'], array( 's' => $_GET['s'] ) ) );
        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                $query->the_post();
                echo '<div data-id="' . get_the_ID() . '">' . get_the_title() . '</div>';
            }
        } else {
            echo '<b>' . __('Not found', 'la-studio' ) . '</b>';
        }

        echo ob_get_clean();
        wp_reset_postdata();
        die();
    }
    add_action( 'wp_ajax_la-fw-autocomplete', 'la_fw_ajax_autocomplete' );
}


/**
 *
 * Export options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'la_export_options' ) ) {
    function la_export_options() {
        $unique = isset($_REQUEST['unique']) ? $_REQUEST['unique'] : 'la_options';
        header('Content-Type: plain/text');
        header('Content-disposition: attachment; filename=backup-'.esc_attr($unique).'-'. gmdate( 'd-m-Y' ) .'.txt');
        header('Content-Transfer-Encoding: binary');
        header('Pragma: no-cache');
        header('Expires: 0');
        echo json_encode(get_option($unique));
        die();
    }
    add_action( 'wp_ajax_la-export-options', 'la_export_options' );
}