<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

if ( !class_exists( 'WPBakeryShortCode_la_team_member' ) ) {
    class WPBakeryShortCode_la_team_member extends LaStudio_Shortcodes_Abstract{

    }
}

$carousel = LaStudio_Shortcodes_Helper::fieldCarousel(array(
    'element' => 'enable_carousel',
    'not_empty' => true
));
$shortcode_params = array(
    array(
        'type' => 'dropdown',
        'heading' => __('Design','la-studio'),
        'param_name' => 'style',
        'value' => array(
            __('Style 01','la-studio') => '1',
            __('Style 02','la-studio') => '2',
            __('Style 03','la-studio') => '3',
            __('Style 04','la-studio') => '4',
            __('Style 05','la-studio') => '5',
            __('Style 06','la-studio') => '6',
            __('Style 07','la-studio') => '7',
            __('Style 08','la-studio') => '8',
            __('Style 09','la-studio') => '9',
            __('Style 10','la-studio') => '10'
        ),
        'default' => '1'
    ),
    array(
        'type'       => 'autocomplete',
        'heading'    => __( 'Choose member', 'la-studio' ),
        'param_name' => 'ids',
        'settings'   => array(
            'unique_values'  => true,
            'multiple'       => true,
            'sortable'       => true,
            'groups'         => false,
            'min_length'     => 1,
            'auto_focus'     => true,
            'display_inline' => true
        ),
    ),
    array(
        'type' => 'la_number',
        'heading' => __('Total items', 'la-studio'),
        'description' => __('Set max limit for items in grid or enter -1 to display all (limited to 1000).', 'la-studio'),
        'param_name' => 'per_page',
        'value' => 4,
        'min' => -1,
        'max' => 1000
    ),
    array(
        'type' => 'dropdown',
        'heading' => __('Item title tag','la-studio'),
        'param_name' => 'title_tag',
        'value' => array(
            __('Default','la-studio') => 'h3',
            __('H1','la-studio') => 'h1',
            __('H2','la-studio') => 'h2',
            __('H4','la-studio') => 'h4',
            __('H5','la-studio') => 'h5',
            __('H6','la-studio') => 'h6',
            __('DIV','la-studio') => 'div',
        ),
        'default' => 'h3',
        'description' => __('Default is H3', 'la-studio'),
    ),
    array(
        'type'       => 'checkbox',
        'heading'    => __('Enable slider', 'la-studio' ),
        'param_name' => 'enable_carousel',
        'value'      => array( __( 'Yes', 'la-studio' ) => 'yes' )
    ),
    array(
        'type' => 'la_number',
        'heading' => __('Excerpt Length', 'la-studio'),
        'param_name' => 'excerpt_length',
        'value' => 10,
        'min' => 10,
        'suffix' => ''
    ),
    LaStudio_Shortcodes_Helper::fieldColumn(),
    LaStudio_Shortcodes_Helper::fieldImageSize(),
    LaStudio_Shortcodes_Helper::fieldExtraClass()
);


$shortcode_params = array_merge( $shortcode_params, $carousel);

return apply_filters(
    'LaStudio/shortcodes/configs',
    array(
        'name'			=> __('Team Member', 'la-studio'),
        'base'			=> 'la_team_member',
        'icon'          => 'la-wpb-icon la_team_member',
        'category'  	=> __('La Studio', 'la-studio'),
        'description' 	=> __('Display the team member','la-studio'),
        'params' 		=> $shortcode_params
    ),
    'la_team_member'
);