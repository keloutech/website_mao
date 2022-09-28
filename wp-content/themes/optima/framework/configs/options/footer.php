<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}


/**
 * Footer settings
 *
 * @param array $sections An array of our sections.
 * @return array
 */
function optima_options_section_footer( $sections )
{
    $sections['footer'] = array(
        'name'          => 'footer_panel',
        'title'         => esc_html__('Footer', 'optima'),
        'icon'          => 'fa fa-arrow-down',
        'sections' => array(
            array(
                'name'      => 'footer_layout_sections',
                'title'     => esc_html__('Layout', 'optima'),
                'icon'      => 'fa fa-cog fa-spin',
                'fields'    => array(
                    array(
                        'id'        => 'footer_layout',
                        'type'      => 'image_select',
                        'default'   => '1col',
                        'title'     => esc_html__('Footer Layout', 'optima'),
                        'radio'     => true,
                        'options'   => Optima_Options::get_config_footer_layout_opts()
                    ),
                    array(
                        'id'        => 'footer_full_width',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'no',
                        'title'     => esc_html__('100% Footer Width', 'optima'),
                        'desc'      => esc_html__('Turn on to have the footer area display at 100% width according to the window size. Turn off to follow site width.', 'optima'),
                        'options'   => Optima_Options::get_config_radio_opts(false)
                    ),
                    array(
                        'id'        => 'enable_footer_copyright',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'yes',
                        'title'     => esc_html__('Enable Footer Copyright', 'optima'),
                        'options'   => Optima_Options::get_config_radio_opts(false)
                    ),
                    array(
                        'id'        => 'footer_copyright',
                        'type'      => 'ace_editor',
                        'mode'      => 'html',
                        'class'     => 'la-customizer-section-large',
                        'title'     => esc_html__('Footer Copyright', 'optima'),
                        'desc'      => esc_html__('Paste your custom HTML code here.', 'optima')
                    )
                )
            ),
            array(
                'name'      => 'footer_styling_sections',
                'title'     => esc_html__('Footer Styling', 'optima'),
                'icon'      => 'fa fa-paint-brush',
                'fields'    => array(
                    array(
                        'id'        => 'footer_background',
                        'type'      => 'background',
                        'title'     => esc_html__('Background', 'optima'),
                        'desc'      => esc_html__('For footer', 'optima')
                    ),
                    array(
                        'id'        => 'footer_text_color',
                        'type'      => 'color_picker',
                        'default'   => '#9395a0',
                        'title'     => esc_html__('Text Color', 'optima'),
                        'desc'      => esc_html__('For footer', 'optima')
                    ),
                    array(
                        'id'        => 'footer_heading_color',
                        'type'      => 'color_picker',
                        'default'   => '#fff',
                        'title'     => esc_html__('Heading Color', 'optima'),
                        'desc'      => esc_html__('For footer', 'optima')
                    ),
                    array(
                        'id'        => 'footer_link_color',
                        'type'      => 'color_picker',
                        'default'   => '#9395a0',
                        'title'     => esc_html__('Link Color', 'optima'),
                        'desc'      => esc_html__('For footer', 'optima')
                    ),
                    array(
                        'id'        => 'footer_link_hover_color',
                        'type'      => 'color_picker',
                        'default'   => '#fff',
                        'title'     => esc_html__('Link Hover Color', 'optima'),
                        'desc'      => esc_html__('For footer', 'optima')
                    )
                )
            ),
            array(
                'name'      => 'footer_copyright_sections',
                'title'     => esc_html__('Footer Copyright Styling', 'optima'),
                'icon'      => 'fa fa-paint-brush',
                'fields'    => array(
                    array(
                        'id'        => 'footer_copyright_background_color',
                        'type'      => 'color_picker',
                        'default'   => '#000',
                        'title'     => esc_html__('Background Color', 'optima'),
                        'desc'      => esc_html__('For Footer Copyright', 'optima')
                    ),
                    array(
                        'id'        => 'footer_copyright_text_color',
                        'type'      => 'color_picker',
                        'default'   => '#fff',
                        'title'     => esc_html__('Text Color', 'optima'),
                        'desc'      => esc_html__('For Footer Copyright', 'optima')
                    ),
                    array(
                        'id'        => 'footer_copyright_link_color',
                        'type'      => 'color_picker',
                        'default'   => '#fff',
                        'title'     => esc_html__('Link Color', 'optima'),
                        'desc'      => esc_html__('For Footer Copyright', 'optima')
                    ),
                    array(
                        'id'        => 'footer_copyright_link_hover_color',
                        'type'      => 'color_picker',
                        'default'   => '#fff',
                        'title'     => esc_html__('Link Hover Color', 'optima'),
                        'desc'      => esc_html__('For Footer Copyright', 'optima')
                    )
                )
            )
        )
    );
    return $sections;
}