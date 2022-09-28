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
function optima_options_section_page_title_bar( $sections ) {

    $page_title_layout = array(
        'hide' => esc_html__("Don't show", 'optima')
    );
    $page_title_layout = $page_title_layout + Optima_Options::get_config_page_title_bar_opts(false);

    $desc1 = esc_html__('For page title bar', 'optima');
    $desc2 = esc_html__('For page title bar of WooCommerce', 'optima');

    $sections['page_title_bar'] = array(
        'name'          => 'page_title_bar_panel',
        'title'         => esc_html__('Page Title Bar', 'optima'),
        'icon'          => 'fa fa-sliders',
        'sections' => array(
            array(
                'name'      => 'page_title_bar_sections',
                'title'     => esc_html__('Global Page Title', 'optima'),
                'icon'      => 'fa fa-plus',
                'fields'    => array(
                    array(
                        'id'            => 'page_title_bar_layout',
                        'type'          => 'select',
                        'class'         => 'chosen',
                        'title'         => esc_html__('Select Layout', 'optima'),
                        'desc'          => $desc1,
                        'options'       => $page_title_layout
                    ),
                    array(
                        'id'        => 'page_title_bar_background',
                        'type'      => 'background',
                        'title'     => esc_html__('Background', 'optima'),
                        'desc'      => $desc1
                    ),
                    array(
                        'id'        => 'page_title_bar_heading_color',
                        'type'      => 'color_picker',
                        'default'   => '#252634',
                        'title'     => esc_html__('Heading Color', 'optima'),
                        'desc'      => $desc1
                    ),
                    array(
                        'id'        => 'page_title_bar_text_color',
                        'type'      => 'color_picker',
                        'default'   => '#b5b7c4',
                        'title'     => esc_html__('Text Color', 'optima'),
                        'desc'      => $desc1
                    ),
                    array(
                        'id'        => 'page_title_bar_link_color',
                        'type'      => 'color_picker',
                        'default'   => '#b5b7c4',
                        'title'     => esc_html__('Link Color', 'optima'),
                        'desc'      => $desc1
                    ),
                    array(
                        'id'        => 'page_title_bar_link_hover_color',
                        'type'      => 'color_picker',
                        'default'   => '#252634',
                        'title'     => esc_html__('Link Hover Color', 'optima'),
                        'desc'      => $desc1
                    ),
                    array(
                        'id'        => 'page_title_bar_spacing',
                        'type'      => 'spacing',
                        'title'     => esc_html__('Spacing', 'optima'),
                        'desc'      => $desc1,
                        'unit' 	    => 'px',
                        'default'   => array(
                            'top' => 25,
                            'bottom' => 25
                        )
                    ),
                    array(
                        'id'        => 'page_title_bar_spacing_tablet',
                        'type'      => 'spacing',
                        'title'     => esc_html__('Spacing', 'optima'),
                        'desc'      => esc_html__('For page title bar on Tablet', 'optima'),
                        'unit' 	    => 'px',
                        'default'   => array(
                            'top' => 25,
                            'bottom' => 25
                        )
                    ),
                    array(
                        'id'        => 'page_title_bar_spacing_mobile',
                        'type'      => 'spacing',
                        'title'     => esc_html__('Spacing', 'optima'),
                        'desc'      => esc_html__('For page title bar on Mobile', 'optima'),
                        'unit' 	    => 'px',
                        'default'   => array(
                            'top' => 25,
                            'bottom' => 25
                        )
                    )
                )
            ),
            array(
                'name'      => 'page_title_bar_woo_sections',
                'title'     => esc_html__('WooCommerce Page Title Bar', 'optima'),
                'fields'    => array(
                    array(
                        'id'        => 'woo_override_page_title_bar',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'off',
                        'title'     => esc_html__('Enable Override', 'optima'),
                        'desc'      => esc_html__('Turn on to override all setting page title bar of WooCommerce Settings ( Shop page/Product details/Product Category/ Product tags and search page )', 'optima'),
                        'info'      => esc_html__('This option will not work with these pages were overwritten', 'optima'),
                        'options'   => Optima_Options::get_config_radio_onoff(false)
                    ),
                    array(
                        'id'            => 'woo_page_title_bar_layout',
                        'type'          => 'select',
                        'class'         => 'chosen',
                        'title'         => esc_html__('WooCommerce Page Title Bar Layout', 'optima'),
                        'options'       => $page_title_layout,
                        'dependency'    => array('woo_override_page_title_bar_on', '==', 'true')
                    ),
                    array(
                        'id'        => 'woo_page_title_bar_background',
                        'type'      => 'background',
                        'title'     => esc_html__('Background', 'optima'),
                        'dependency'=> array('woo_override_page_title_bar_on|woo_page_title_bar_layout', '==|!=', 'true|hide'),
                        'desc'      => $desc2
                    ),
                    array(
                        'id'        => 'woo_page_title_bar_heading_color',
                        'type'      => 'color_picker',
                        'default'   => '#252634',
                        'title'     => esc_html__('Heading Color', 'optima'),
                        'dependency'=> array('woo_override_page_title_bar_on|woo_page_title_bar_layout', '==|!=', 'true|hide'),
                        'desc'      => $desc2
                    ),
                    array(
                        'id'        => 'woo_page_title_bar_text_color',
                        'type'      => 'color_picker',
                        'default'   => '#b5b7c4',
                        'title'     => esc_html__('Text Color', 'optima'),
                        'dependency'=> array('woo_override_page_title_bar_on|woo_page_title_bar_layout', '==|!=', 'true|hide'),
                        'desc'      => $desc2
                    ),
                    array(
                        'id'        => 'woo_page_title_bar_link_color',
                        'type'      => 'color_picker',
                        'default'   => '#b5b7c4',
                        'title'     => esc_html__('Link Color', 'optima'),
                        'dependency'=> array('woo_override_page_title_bar_on|woo_page_title_bar_layout', '==|!=', 'true|hide'),
                        'desc'      => $desc2
                    ),
                    array(
                        'id'        => 'woo_page_title_bar_link_hover_color',
                        'type'      => 'color_picker',
                        'default'   => '#252634',
                        'title'     => esc_html__('Link Hover Color', 'optima'),
                        'dependency'=> array('woo_override_page_title_bar_on|woo_page_title_bar_layout', '==|!=', 'true|hide'),
                        'desc'      => $desc2
                    ),
                    array(
                        'id'        => 'woo_page_title_bar_spacing',
                        'type'      => 'spacing',
                        'title'     => esc_html__('Spacing', 'optima'),
                        'dependency'=> array('woo_override_page_title_bar_on|woo_page_title_bar_layout', '==|!=', 'true|hide'),
                        'desc'      => $desc2,
                        'unit' 	    => 'px',
                        'default'   => array(
                            'top' => 25,
                            'bottom' => 25
                        )
                    ),
                    array(
                        'id'        => 'woo_page_title_bar_spacing_tablet',
                        'type'      => 'spacing',
                        'title'     => esc_html__('Spacing', 'optima'),
                        'dependency'=> array('woo_override_page_title_bar_on|woo_page_title_bar_layout', '==|!=', 'true|hide'),
                        'desc'      => esc_html__('For page title bar of WooCommerce on Tablet', 'optima'),
                        'unit' 	    => 'px',
                        'default'   => array(
                            'top' => 25,
                            'bottom' => 25
                        )
                    ),
                    array(
                        'id'        => 'woo_page_title_bar_spacing_mobile',
                        'type'      => 'spacing',
                        'title'     => esc_html__('Spacing', 'optima'),
                        'dependency'=> array('woo_override_page_title_bar_on|woo_page_title_bar_layout', '==|!=', 'true|hide'),
                        'desc'      => esc_html__('For page title bar of WooCommerce on Mobile', 'optima'),
                        'unit' 	    => 'px',
                        'default'   => array(
                            'top' => 25,
                            'bottom' => 25
                        )
                    )
                )
            )
        )
    );
    return $sections;
}