<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

if ( !class_exists( 'WPBakeryShortCode_la_portfolio_masonry' ) ) {
    class WPBakeryShortCode_la_portfolio_masonry extends LaStudio_Shortcodes_Abstract{

    }
}

$shortcode_params = array(

    array(
        'type' => 'dropdown',
        'heading' => __('Style','la-studio'),
        'param_name' => 'masonry_style',
        'value' => array(
            __('Style 01','la-studio') => 'default',
            __('Style 02','la-studio') => '2',
            __('Style 03','la-studio') => '3',
            __('Style 04','la-studio') => '4',
            __('Style 05','la-studio') => '5',
            __('Style 06','la-studio') => '6',
            __('Style 07','la-studio') => '7',
            __('Masonry Auto Width','la-studio') => 'auto-width'
        ),
        'default' => 'default'
    ),

    array(
        'type'       => 'autocomplete',
        'heading'    => __( 'Category In:', 'la-studio' ),
        'param_name' => 'category__in',
        'settings'   => array(
            'unique_values'  => true,
            'multiple'       => true,
            'sortable'       => true,
            'groups'         => false,
            'min_length'     => 0,
            'auto_focus'     => true,
            'display_inline' => true,
        ),
        'group' => __('Query Settings', 'la-studio')
    ),
    array(
        'type'       => 'autocomplete',
        'heading'    => __( 'Category Not In:', 'la-studio' ),
        'param_name' => 'category__not_in',
        'settings'   => array(
            'unique_values'  => true,
            'multiple'       => true,
            'sortable'       => true,
            'groups'         => false,
            'min_length'     => 0,
            'auto_focus'     => true,
            'display_inline' => true,
        ),
        'group' => __('Query Settings', 'la-studio')
    ),
    array(
        'type'       => 'autocomplete',
        'heading'    => __( 'Post In:', 'la-studio' ),
        'param_name' => 'post__in',
        'settings'   => array(
            'unique_values'  => true,
            'multiple'       => true,
            'sortable'       => true,
            'groups'         => false,
            'min_length'     => 0,
            'auto_focus'     => true,
            'display_inline' => true,
        ),
        'group' => __('Query Settings', 'la-studio')
    ),
    array(
        'type'       => 'autocomplete',
        'heading'    => __( 'Post Not In:', 'la-studio' ),
        'param_name' => 'post__not_in',
        'settings'   => array(
            'unique_values'  => true,
            'multiple'       => true,
            'sortable'       => true,
            'groups'         => false,
            'min_length'     => 0,
            'auto_focus'     => true,
            'display_inline' => true,
        ),
        'group' => __('Query Settings', 'la-studio')
    ),
    array(
        'type' => 'dropdown',
        'heading' => __( 'Order by', 'la-studio' ),
        'param_name' => 'orderby',
        'value' => array(
            '',
            __( 'Date', 'la-studio' ) => 'date',
            __( 'ID', 'la-studio' ) => 'ID',
            __( 'Author', 'la-studio' ) => 'author',
            __( 'Title', 'la-studio' ) => 'title',
            __( 'Modified', 'la-studio' ) => 'modified',
            __( 'Random', 'la-studio' ) => 'rand',
            __( 'Comment count', 'la-studio' ) => 'comment_count',
            __( 'Menu order', 'la-studio' ) => 'menu_order',
        ),
        'save_always' => true,
        'description' => sprintf( __( 'Select how to sort retrieved products. More at %s.', 'la-studio' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
        'group' => __('Query Settings', 'la-studio')
    ),
    array(
        'type' => 'dropdown',
        'heading' => __( 'Sort order', 'la-studio' ),
        'param_name' => 'order',
        'value' => array(
            '',
            __( 'Descending', 'la-studio' ) => 'DESC',
            __( 'Ascending', 'la-studio' ) => 'ASC',
        ),
        'save_always' => true,
        'description' => sprintf( __( 'Designates the ascending or descending order. More at %s.', 'la-studio' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
        'group' => __('Query Settings', 'la-studio')
    ),
    array(
        'type' => 'la_number',
        'heading' => __('Total items', 'la-studio'),
        'description' => __('Set max limit for items in grid or enter -1 to display all (limited to 1000).', 'la-studio'),
        'param_name' => 'per_page',
        'value' => -1,
        'min' => -1,
        'max' => 1000,
        'group' => __('Query Settings', 'la-studio')
    ),
    array(
        'type' => 'hidden',
        'heading' => __('Paged', 'la-studio'),
        'param_name' => 'paged',
        'value' => '1',
        'group' => __('Query Settings', 'la-studio')
    ),

    LaStudio_Shortcodes_Helper::fieldColumn(array(
        'dependency' => array(
            'element'   => 'masonry_style',
            'value_not_equal_to'     => 'auto-width'
        )
    )),
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
        'description' => __('Default is H3', 'la-studio')
    ),
    LaStudio_Shortcodes_Helper::fieldImageSize(array(
        'dependency' => array(
            'element'   => 'masonry_style',
            'value_not_equal_to'     => 'auto-width'
        )
    )),
    array(
        'type'       => 'checkbox',
        'heading'    => __( 'Enable Skill Filter', 'la-studio' ),
        'param_name' => 'enable_skill_filter',
        'value'      => array( __( 'Yes', 'la-studio' ) => 'yes' )
    ),
    array(
        'type'       => 'autocomplete',
        'heading'    => __( 'Skill Filter', 'la-studio' ),
        'param_name' => 'filters',
        'settings'   => array(
            'unique_values'  => true,
            'multiple'       => true,
            'sortable'       => true,
            'groups'         => false,
            'min_length'     => 0,
            'auto_focus'     => true,
            'display_inline' => true,
        ),
        'dependency' => array(
            'element'   => 'enable_skill_filter',
            'value'     => 'yes'
        ),
        'group' => __('Skill Filters', 'la-studio')
    ),
    array(
        'type' => 'dropdown',
        'heading' => __('Filter style','la-studio'),
        'param_name' => 'filter_style',
        'value' => array(
            __('Default','la-studio') => '1',
            __('Style 02','la-studio') => '2'
        ),
        'default' => '1',
        'dependency' => array(
            'element'   => 'enable_skill_filter',
            'value'     => 'yes'
        ),
        'group' => __('Skill Filters', 'la-studio')
    ),
    array(
        'type'       => 'checkbox',
        'heading'    => __( 'Enable Load More', 'la-studio' ),
        'param_name' => 'enable_loadmore',
        'value'      => array( __( 'Yes', 'la-studio' ) => 'yes' )
    ),
    array(
        'type' => 'textfield',
        'heading' => __('Load More Text', 'la-studio'),
        'param_name' => 'load_more_text',
        'value' => __('Load more', 'la-studio'),
        'dependency' => array( 'element' => 'enable_loadmore', 'value' => 'yes' ),
    ),
    LaStudio_Shortcodes_Helper::fieldExtraClass()
);

return apply_filters(
    'LaStudio/shortcodes/configs',
    array(
        'name'			=> __('Portfolio Masonry', 'la-studio'),
        'base'			=> 'la_portfolio_masonry',
        'icon'          => 'la-wpb-icon la_portfolio_masonry',
        'category'  	=> __('La Studio', 'la-studio'),
        'description' 	=> __('Display portfolio with la-studio themes style.','la-studio'),
        'params' 		=> $shortcode_params
    ),
    'la_portfolio_masonry'
);