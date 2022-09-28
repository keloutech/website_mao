<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}


/**
 * Header settings
 *
 * @param array $sections An array of our sections.
 * @return array
 */
function optima_options_section_header( $sections ) {
    $sections['header'] = array(
        'name'          => 'header_panel',
        'title'         => esc_html__('Header', 'optima'),
        'icon'          => 'fa fa-arrow-up',
        'sections' => array(
            array(
                'name'      => 'header_layout_sections',
                'title'     => esc_html__('Layout', 'optima'),
                'icon'      => 'fa fa-cog',
                'fields'    => array(
                    array(
                        'id'        => 'header_layout',
                        'title'     => esc_html__('Header Layout', 'optima'),
                        'type'      => 'image_select',
                        'radio'     => true,
                        'class'     => 'la-radio-style',
                        'default'   => '1',
                        'desc'      => esc_html__('Controls the general layout of the header.', 'optima'),
                        'options'   => Optima_Options::get_config_header_layout_opts(true, false)
                    ),
                    array(
                        'id'        => 'header_full_width',
                        'type'      => 'radio',
                        'default'   => 'no',
                        'class'     => 'la-radio-style',
                        'title'     => esc_html__('100% Header Width', 'optima'),
                        'desc'      => esc_html__('Turn on to have the header area display at 100% width according to the window size. Turn off to follow site width.', 'optima'),
                        'options'   => Optima_Options::get_config_radio_opts(false)
                    ),
                    array(
                        'id'        => 'header_transparency',
                        'type'      => 'radio',
                        'default'   => 'no',
                        'class'     => 'la-radio-style',
                        'title'     => esc_html__('Header Transparency', 'optima'),
                        'options'   => Optima_Options::get_config_radio_opts(false)
                    )
                )
            ),
            array(
                'name'      => 'header_element_sections',
                'title'     => esc_html__('Elements', 'optima'),
                'icon'      => 'fa fa-cog',
                'fields'    => array(
                    array(
                        'id'        => 'header_show_cart',
                        'type'      => 'radio',
                        'default'   => 'no',
                        'class'     => 'la-radio-style',
                        'title'     => esc_html__('Header Shopping Cart', 'optima'),
                        'desc'      => esc_html__('Show/Hide Shopping Cart in the Header.', 'optima'),
                        'options'   => Optima_Options::get_config_radio_opts(false)
                    ),
                    array(
                        'id'        => 'header_show_search',
                        'type'      => 'radio',
                        'default'   => 'no',
                        'class'     => 'la-radio-style',
                        'title'     => esc_html__('Header Search Form', 'optima'),
                        'desc'      => esc_html__('Show/Hide Search Form in the Header.', 'optima'),
                        'options'   => Optima_Options::get_config_radio_opts(false)
                    ),
                    array(
                        'id'        => 'header_show_wishlist',
                        'type'      => 'radio',
                        'default'   => 'no',
                        'class'     => 'la-radio-style',
                        'title'     => esc_html__('Header Wishlist Icon', 'optima'),
                        'desc'      => esc_html__('Show/Hide Wishlist Icon in the Header.', 'optima'),
                        'options'   => Optima_Options::get_config_radio_opts(false)
                    ),
                    array(
                        'id'        => 'header_show_social',
                        'type'      => 'radio',
                        'default'   => 'no',
                        'class'     => 'la-radio-style',
                        'title'     => esc_html__('Header Social', 'optima'),
                        'desc'      => esc_html__('Show/Hide Social Media in the Header.', 'optima'),
                        'info'      => esc_html__('For Header 6', 'optima'),
                        'options'   => Optima_Options::get_config_radio_opts(false)
                    ),
                    array(
                        'id'        => 'header_show_aside_toggle',
                        'type'      => 'radio',
                        'default'   => 'yes',
                        'class'     => 'la-radio-style',
                        'title'     => esc_html__('Header Aside Toggle', 'optima'),
                        'desc'      => esc_html__('Show/Hide Button toggle aside area in the Header.', 'optima'),
                        'info'      => esc_html__('For header type 1 to 4', 'optima'),
                        'options'   => Optima_Options::get_config_radio_opts(false)
                    ),
                    array(
                        'type'    => 'notice',
                        'class'   => 'info',
                        'content' => esc_html__('For header layout 7', 'optima')
                    ),
                    array(
                        'id'        => 'header_custom_text',
                        'type'      => 'text',
                        'title'     => esc_html__('Header Custom text', 'optima'),
                        'info'      => esc_html__('For Header 7', 'optima')
                    ),
                    array(
                        'id'        => 'store_phone',
                        'type'      => 'text',
                        'title'     => esc_html__('Store Phone', 'optima'),
                        'info'      => esc_html__('For Header 7', 'optima')
                    ),
                    array(
                        'id'        => 'store_email',
                        'type'      => 'text',
                        'title'     => esc_html__('Store Email', 'optima'),
                        'info'      => esc_html__('For Header 7', 'optima')
                    ),
                    array(
                        'id'            => 'header7_block_top',
                        'type'          => 'autocomplete',
                        'title'         => esc_html__('Header Middle block', 'optima'),
                        'info'          => esc_html__('For Header 7', 'optima'),
                        'class'         => 'single',
                        'query_args'    => array(
                            'post_type'    => 'la_block',
                            'orderby'   => 'title',
                            'order'     => 'ASC',
                            'posts_per_page' => 20
                        ),
                        'attributes' => array(
                            'placeholder' => esc_html__('Enter the block name...', 'optima')
                        )
                    )
                )
            ),
            array(
                'name'      => 'header_default_styling_sections',
                'title'     => esc_html__('Default Header Styling', 'optima'),
                'icon'      => 'fa fa-paint-brush',
                'fields'    => array(
                    array(
                        'id'        => 'header_background',
                        'type'      => 'background',
                        'default'       => array(
                            'color' => '#fff'
                        ),
                        'title'     => esc_html__('Background', 'optima'),
                        'desc'      => esc_html__('for default header', 'optima'),
                    ),
                    array(
                        'id'        => 'header_text_color',
                        'type'      => 'color_picker',
                        'default'   => Optima_Options::get_color_default('secondary_color'),
                        'title'     => esc_html__('Text Color', 'optima'),
                        'desc'      => esc_html__('For default header', 'optima'),
                    ),
                    array(
                        'id'        => 'header_link_color',
                        'type'      => 'color_picker',
                        'default'   => Optima_Options::get_color_default('secondary_color'),
                        'title'     => esc_html__('Link Color', 'optima'),
                        'desc'      => esc_html__('For default header', 'optima'),
                    ),
                    array(
                        'id'        => 'header_link_hover_color',
                        'type'      => 'color_picker',
                        'default'   => Optima_Options::get_color_default('primary_color'),
                        'title'     => esc_html__('Link Hover Color', 'optima'),
                        'desc'      => esc_html__('For default header', 'optima'),
                    ),
                    array(
                        'id'        => 'mm_lv_1_color',
                        'type'      => 'color_picker',
                        'default'   => Optima_Options::get_color_default('secondary_color'),
                        'title'     => esc_html__('Menu Level 1 Color', 'optima'),
                        'desc'      => esc_html__('For default header', 'optima'),
                    ),
                    array(
                        'id'        => 'mm_lv_1_bg_color',
                        'type'      => 'color_picker',
                        'default'   => 'rgba(0,0,0,0)',
                        'title'     => esc_html__('Menu Level 1 Background Color', 'optima'),
                        'desc'      => esc_html__('For default header', 'optima')
                    ),
                    array(
                        'id'        => 'mm_lv_1_hover_color',
                        'type'      => 'color_picker',
                        'default'   => Optima_Options::get_color_default('primary_color'),
                        'title'     => esc_html__('Menu Level 1 Hover Color', 'optima'),
                        'desc'      => esc_html__('For default header', 'optima')
                    ),
                    array(
                        'id'        => 'mm_lv_1_hover_bg_color',
                        'type'      => 'color_picker',
                        'default'   => 'rgba(0,0,0,0)',
                        'title'     => esc_html__('Menu Level 1 Hover Background Color', 'optima'),
                        'desc'      => esc_html__('For default header', 'optima')
                    )
                )
            ),
            array(
                'name'      => 'header_top_styling_sections',
                'title'     => esc_html__('Header Top Styling', 'optima'),
                'icon'      => 'fa fa-paint-brush',
                'fields'    => array(
                    array(
                        'id'        => 'header_top_background_color',
                        'type'      => 'color_picker',
                        'default'   => 'rgba(0,0,0,0)',
                        'title'     => esc_html__('Header Top Background Color', 'optima'),
                        'desc'      => esc_html__('For default header top', 'optima'),
                    ),
                    array(
                        'id'        => 'header_top_text_color',
                        'type'      => 'color_picker',
                        'default'   => 'rgba(255,255,255,0.2)',
                        'title'     => esc_html__('Header Top Text Color', 'optima'),
                        'desc'      => esc_html__('For default header top', 'optima'),
                    ),
                    array(
                        'id'        => 'header_top_link_color',
                        'type'      => 'color_picker',
                        'default'   => '#fff',
                        'title'     => esc_html__('Header Top Link Color', 'optima'),
                        'desc'      => esc_html__('For default header top', 'optima'),
                    ),
                    array(
                        'id'        => 'header_top_link_hover_color',
                        'type'      => 'color_picker',
                        'default'   => Optima_Options::get_color_default('primary_color'),
                        'title'     => esc_html__('Header Top Link Hover Color', 'optima'),
                        'desc'      => esc_html__('For default header top', 'optima'),
                    )
                )
            ),
            array(
                'name'      => 'header_transparency_styling_sections',
                'title'     => esc_html__('Transparency Header Styling', 'optima'),
                'icon'      => 'fa fa-paint-brush',
                'fields'    => array(
                    array(
                        'id'        => 'transparency_header_background',
                        'type'      => 'background',
                        'default'       => array(
                            'color' => 'rgba(0,0,0,0)'
                        ),
                        'title'     => esc_html__('Background', 'optima'),
                        'desc'      => esc_html__('For transparency header', 'optima')
                    ),
                    array(
                        'id'        => 'transparency_header_text_color',
                        'type'      => 'color_picker',
                        'default'   => '#fff',
                        'title'     => esc_html__('Text Color', 'optima'),
                        'desc'      => esc_html__('For transparency header', 'optima')
                    ),
                    array(
                        'id'        => 'transparency_header_link_color',
                        'type'      => 'color_picker',
                        'default'   => '#fff',
                        'title'     => esc_html__('Link Color', 'optima'),
                        'desc'      => esc_html__('For transparency header', 'optima')
                    ),
                    array(
                        'id'        => 'transparency_header_link_hover_color',
                        'type'      => 'color_picker',
                        'default'   => Optima_Options::get_color_default('primary_color'),
                        'title'     => esc_html__('Link Hover Color', 'optima'),
                        'desc'      => esc_html__('For transparency header', 'optima')
                    ),
                    array(
                        'id'        => 'transparency_mm_lv_1_color',
                        'type'      => 'color_picker',
                        'default'   => '#fff',
                        'title'     => esc_html__('Menu Level 1 Color', 'optima'),
                        'desc'      => esc_html__('For transparency header', 'optima')
                    ),
                    array(
                        'id'        => 'transparency_mm_lv_1_bg_color',
                        'type'      => 'color_picker',
                        'default'   => 'rgba(0,0,0,0)',
                        'title'     => esc_html__('Menu Level 1 Background Color', 'optima'),
                        'desc'      => esc_html__('For transparency header', 'optima')
                    ),
                    array(
                        'id'        => 'transparency_mm_lv_1_hover_color',
                        'type'      => 'color_picker',
                        'default'   => Optima_Options::get_color_default('primary_color'),
                        'title'     => esc_html__('Menu Level 1 Hover Color', 'optima'),
                        'desc'      => esc_html__('For transparency header', 'optima')
                    ),
                    array(
                        'id'        => 'transparency_mm_lv_1_hover_bg_color',
                        'type'      => 'color_picker',
                        'default'   => 'rgba(0,0,0,0)',
                        'title'     => esc_html__('Menu Level 1 Hover Background Color', 'optima'),
                        'desc'      => esc_html__('For transparency header', 'optima')
                    )
                )
            ),
            array(
                'name'      => 'header_offcanvas_styling_sections',
                'title'     => esc_html__('Aside Menu Styling', 'optima'),
                'icon'      => 'fa fa-paint-brush',
                'fields'    => array(
                    array(
                        'id'        => 'offcanvas_background',
                        'default'   => '#fff',
                        'type'      => 'color_picker',
                        'title'     => esc_html__('Background Color', 'optima'),
                        'desc'      => esc_html__('For Aside Header', 'optima')
                    ),
                    array(
                        'id'        => 'offcanvas_text_color',
                        'default'   => Optima_Options::get_color_default('secondary_color'),
                        'type'      => 'color_picker',
                        'title'     => esc_html__('Text color', 'optima'),
                        'desc'      => esc_html__('For Aside Header', 'optima')
                    ),
                    array(
                        'id'        => 'offcanvas_heading_color',
                        'default'   => Optima_Options::get_color_default('heading_color'),
                        'type'      => 'color_picker',
                        'title'     => esc_html__('Heading color', 'optima'),
                        'desc'      => esc_html__('For Aside Header', 'optima')
                    ),
                    array(
                        'id'        => 'offcanvas_link_color',
                        'default'   => Optima_Options::get_color_default('secondary_color'),
                        'type'      => 'color_picker',
                        'title'     => esc_html__('Link color', 'optima'),
                        'desc'      => esc_html__('For Aside Header', 'optima')
                    ),
                    array(
                        'id'        => 'offcanvas_link_hover_color',
                        'default'   => Optima_Options::get_color_default('primary_color'),
                        'type'      => 'color_picker',
                        'title'     => esc_html__('Link Hover color', 'optima'),
                        'desc'      => esc_html__('For Aside Header', 'optima')
                    )
                )
            ),
            array(
                'name'      => 'header_megamenu_styling_sections',
                'title'     => esc_html__('Mega Menu Styling', 'optima'),
                'icon'      => 'fa fa-bars',
                'fields'    => array(
                    array(
                        'id'        => 'mm_dropdown_bg',
                        'default'   => '#fff',
                        'type'      => 'color_picker',
                        'title'     => esc_html__('Background Color', 'optima'),
                        'desc'      => esc_html__('For type "DropDown"', 'optima')
                    ),
                    array(
                        'id'        => 'mm_dropdown_link_color',
                        'default'   => Optima_Options::get_color_default('body_color'),
                        'type'      => 'color_picker',
                        'title'     => esc_html__('Link Color', 'optima'),
                        'desc'      => esc_html__('For type "DropDown"', 'optima')
                    ),
                    array(
                        'id'        => 'mm_dropdown_link_bg',
                        'default'   => 'rgba(0,0,0,0)',
                        'type'      => 'color_picker',
                        'title'     => esc_html__('Link Background Color', 'optima'),
                        'desc'      => esc_html__('For type "DropDown"', 'optima')
                    ),
                    array(
                        'id'        => 'mm_dropdown_link_hover_color',
                        'default'   => Optima_Options::get_color_default('secondary_color'),
                        'type'      => 'color_picker',
                        'title'     => esc_html__('Link Hover Color', 'optima'),
                        'desc'      => esc_html__('For type "DropDown"', 'optima')
                    ),
                    array(
                        'id'        => 'mm_dropdown_link_hover_bg',
                        'default'   => 'rgba(0,0,0,0)',
                        'type'      => 'color_picker',
                        'title'     => esc_html__('Link Hover Background Color', 'optima'),
                        'desc'      => esc_html__('For type "DropDown"', 'optima')
                    ),
                    array(
                        'id'        => 'mm_wide_dropdown_bg',
                        'default'   => '#fff',
                        'type'      => 'color_picker',
                        'title'     => esc_html__('Background Color', 'optima'),
                        'desc'      => esc_html__('For type "Wide"', 'optima')
                    ),
                    array(
                        'id'        => 'mm_wide_dropdown_heading_color',
                        'default'   => Optima_Options::get_color_default('heading_color'),
                        'type'      => 'color_picker',
                        'title'     => esc_html__('Heading Color', 'optima'),
                        'desc'      => esc_html__('For type "Wide"', 'optima')
                    ),
                    array(
                        'id'        => 'mm_wide_dropdown_link_color',
                        'default'   => Optima_Options::get_color_default('body_color'),
                        'type'      => 'color_picker',
                        'title'     => esc_html__('Link Color', 'optima'),
                        'desc'      => esc_html__('For type "Wide"', 'optima')
                    ),
                    array(
                        'id'        => 'mm_wide_dropdown_link_bg',
                        'default'   => 'rgba(0,0,0,0)',
                        'type'      => 'color_picker',
                        'title'     => esc_html__('Link Background Color', 'optima'),
                        'desc'      => esc_html__('For type "Wide"', 'optima')
                    ),
                    array(
                        'id'        => 'mm_wide_dropdown_link_hover_color',
                        'default'   => Optima_Options::get_color_default('secondary_color'),
                        'type'      => 'color_picker',
                        'title'     => esc_html__('Link Hover Color', 'optima'),
                        'desc'      => esc_html__('For type "Wide"', 'optima')
                    ),
                    array(
                        'id'        => 'mm_wide_dropdown_link_hover_bg',
                        'default'   => 'rgba(0,0,0,0)',
                        'type'      => 'color_picker',
                        'title'     => esc_html__('Link Hover Background Color', 'optima'),
                        'desc'      => esc_html__('For type "Wide"', 'optima')
                    )
                )
            ),
            array(
                'name'      => 'header_mobile_styling_sections',
                'title'     => esc_html__('Header Mobile', 'optima'),
                'icon'      => 'fa fa-bars',
                'fields'    => array(
                    array(
                        'id'        => 'header_mb_background',
                        'default'   => '#fff',
                        'type'      => 'color_picker',
                        'title'     => esc_html__('Background Color', 'optima'),
                        'desc'      => esc_html__('For Mobile Header', 'optima')
                    ),
                    array(
                        'id'        => 'header_mb_text_color',
                        'default'   => Optima_Options::get_color_default('body_color'),
                        'type'      => 'color_picker',
                        'title'     => esc_html__('Text Color', 'optima'),
                        'desc'      => esc_html__('For Mobile Header', 'optima')
                    ),
                    array(
                        'type'    => 'notice',
                        'class'   => 'no-format la-section-title',
                        'content' => sprintf('<h3>%s</h3>', esc_html__('Mobile Menu Styling', 'optima'))
                    ),
                    array(
                        'id'        => 'mb_background',
                        'default'   => '#fff',
                        'type'      => 'color_picker',
                        'title'     => esc_html__('Background Color', 'optima'),
                        'desc'      => esc_html__('For Mobile Menu', 'optima')
                    ),
                    array(
                        'id'        => 'mb_lv_1_color',
                        'default'   => Optima_Options::get_color_default('secondary_color'),
                        'type'      => 'color_picker',
                        'title'     => esc_html__('Menu Level 1 Color', 'optima'),
                        'desc'      => esc_html__('For Mobile Menu', 'optima')
                    ),
                    array(
                        'id'        => 'mb_lv_1_bg_color',
                        'default'   => 'rgba(0,0,0,0)',
                        'type'      => 'color_picker',
                        'title'     => esc_html__('Menu Level 1 Background Color', 'optima'),
                        'desc'      => esc_html__('For Mobile Menu', 'optima')
                    ),
                    array(
                        'id'        => 'mb_lv_1_hover_color',
                        'default'   => Optima_Options::get_color_default('primary_color'),
                        'type'      => 'color_picker',
                        'title'     => esc_html__('Menu Level 1 Hover Color', 'optima'),
                        'desc'      => esc_html__('For Mobile Menu', 'optima')
                    ),
                    array(
                        'id'        => 'mb_lv_1_hover_bg_color',
                        'default'   => '#2635c4',
                        'type'      => 'color_picker',
                        'title'     => esc_html__('Menu Level 1 Hover Background Color', 'optima'),
                        'desc'      => esc_html__('For Mobile Menu', 'optima')
                    ),
                    array(
                        'id'        => 'mb_lv_2_color',
                        'default'   => Optima_Options::get_color_default('secondary_color'),
                        'type'      => 'color_picker',
                        'title'     => esc_html__('Menu Level 2 Color', 'optima'),
                        'desc'      => esc_html__('For Mobile Menu', 'optima')
                    ),
                    array(
                        'id'        => 'mb_lv_2_bg_color',
                        'default'   => 'rgba(0,0,0,0)',
                        'type'      => 'color_picker',
                        'title'     => esc_html__('Menu Level 2 Background Color', 'optima'),
                        'desc'      => esc_html__('For Mobile Menu', 'optima')
                    ),
                    array(
                        'id'        => 'mb_lv_2_hover_color',
                        'default'   => '#fff',
                        'type'      => 'color_picker',
                        'title'     => esc_html__('Menu Level 2 Hover Color', 'optima'),
                        'desc'      => esc_html__('For Mobile Menu', 'optima')
                    ),
                    array(
                        'id'        => 'mb_lv_2_hover_bg_color',
                        'default'   => Optima_Options::get_color_default('primary_color'),
                        'type'      => 'color_picker',
                        'title'     => esc_html__('Menu Level 2 Hover Background Color', 'optima'),
                        'desc'      => esc_html__('For Mobile Menu', 'optima')
                    )
                )
            )
        )
    );
    return $sections;
}