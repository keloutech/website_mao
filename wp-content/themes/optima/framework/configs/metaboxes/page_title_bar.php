<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}


/**
 * Page title bar settings
 *
 * @param array $sections An array of our sections.
 * @return array
 */
function optima_metaboxes_section_page_title_bar( $sections ) {

    $sections['page_title_bar'] = array(
        'name'          => 'page_title_bar_panel',
        'title'         => esc_html__('Page Title Bar', 'optima'),
        'icon'          => 'laicon-page_title',
        'fields'        => array(
            array(
                'id'            => 'page_title_bar_layout',
                'type'          => 'select',
                'class'         => 'chosen',
                'title'         => esc_html__('Select Layout', 'optima'),
                'desc'          => esc_html__('Choose to show or hide the page title bar.', 'optima'),
                'options'       => Optima_Options::get_config_page_title_bar_opts(false,true)
            ),
            array(
                'id'            => 'hide_breadcrumb',
                'type'          => 'radio',
                'default'       => 'no',
                'class'         => 'la-radio-style',
                'title'         => esc_html__('Hide Breadcrumbs', 'optima'),
                'options'       => Optima_Options::get_config_radio_opts(false),
                'dependency'    => array( 'page_title_bar_layout', '!=', 'hide' )
            ),
            array(
                'id'            => 'hide_page_title',
                'type'          => 'radio',
                'default'       => 'no',
                'class'         => 'la-radio-style',
                'title'         => esc_html__('Hide Page Title', 'optima'),
                'options'       => Optima_Options::get_config_radio_opts(false),
                'dependency'    => array( 'page_title_bar_layout', '!=', 'hide' )
            ),
            array(
                'id'            => 'page_title_custom',
                'type'          => 'text',
                'title'         => esc_html__('Page Title Bar Custom','optima'),
                'dependency'    => array( 'hide_page_title_no|page_title_bar_layout', '==|!=', 'true|hide' ),
            ),
            array(
                'id'            => 'page_title_bar_style',
                'type'          => 'radio',
                'default'       => 'no',
                'class'         => 'la-radio-style',
                'title'         => esc_html__('Enable Custom Style', 'optima'),
                'options'       => Optima_Options::get_config_radio_opts(false),
                'dependency'    => array( 'page_title_bar_layout', '!=', 'hide' )
            ),

            array(
                'id'            => 'page_title_bar_background',
                'type'          => 'background',
                'title'         => esc_html__('Background', 'optima'),
                'desc'          => esc_html__('For page title bar', 'optima'),
                'dependency'    => array( 'page_title_bar_layout|page_title_bar_style_no', '!=|!=', 'hide|true' )
            ),
            array(
                'id'            => 'page_title_bar_heading_color',
                'type'          => 'color_picker',
                'default'       => '#252634',
                'title'         => esc_html__('Heading Color', 'optima'),
                'dependency'    => array( 'page_title_bar_layout|page_title_bar_style_no', '!=|!=', 'hide|true' )
            ),
            array(
                'id'            => 'page_title_bar_text_color',
                'type'          => 'color_picker',
                'default'       => '#b5b7c4',
                'title'         => esc_html__('Text Color', 'optima'),
                'dependency'    => array( 'page_title_bar_layout|page_title_bar_style_no', '!=|!=', 'hide|true' )
            ),
            array(
                'id'            => 'page_title_bar_link_color',
                'type'          => 'color_picker',
                'default'       => '#b5b7c4',
                'title'         => esc_html__('Link Color', 'optima'),
                'dependency'    => array( 'page_title_bar_layout|page_title_bar_style_no', '!=|!=', 'hide|true' )
            ),
            array(
                'id'            => 'page_title_bar_link_hover_color',
                'type'          => 'color_picker',
                'default'       => '#252634',
                'title'         => esc_html__('Link Hover Color', 'optima'),
                'dependency'    => array( 'page_title_bar_layout|page_title_bar_style_no', '!=|!=', 'hide|true' )
            ),
            array(
                'id'            => 'page_title_bar_spacing',
                'type'          => 'spacing',
                'title'         => esc_html__('Spacing', 'optima'),
                'dependency'    => array( 'page_title_bar_layout|page_title_bar_style_no', '!=|!=', 'hide|true' ),
                'unit' 	        => 'px',
                'default'       => array(
                    'top'       => 80,
                    'bottom'    => 80
                )
            ),
            array(
                'id'            => 'page_title_bar_spacing_tablet',
                'type'          => 'spacing',
                'title'         => esc_html__('Spacing', 'optima'),
                'desc'          => esc_html__('For page title bar on Tablet', 'optima'),
                'dependency'    => array( 'page_title_bar_layout|page_title_bar_style_no', '!=|!=', 'hide|true' ),
                'unit' 	        => 'px',
                'default'       => array(
                    'top'       => 80,
                    'bottom'    => 80
                )
            ),
            array(
                'id'            => 'page_title_bar_spacing_mobile',
                'type'          => 'spacing',
                'title'         => esc_html__('Spacing', 'optima'),
                'desc'          => esc_html__('For page title bar on Mobile', 'optima'),
                'dependency'    => array( 'page_title_bar_layout|page_title_bar_style_no', '!=|!=', 'hide|true' ),
                'unit' 	        => 'px',
                'default'       => array(
                    'top'       => 50,
                    'bottom'    => 50
                )
            )
        )
    );
    return $sections;
}