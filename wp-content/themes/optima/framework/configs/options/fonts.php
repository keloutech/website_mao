<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}


/**
 * Fonts settings
 *
 * @param array $sections An array of our sections.
 * @return array
 */
function optima_options_section_fonts( $sections )
{
    $sections['fonts'] = array(
        'name'          => 'fonts_panel',
        'title'         => esc_html__('Fonts', 'optima'),
        'icon'          => 'fa fa-font',
        'fields'        => array(
            array(
                'id'        => 'body_font_size',
                'type'      => 'slider',
                'default'    => 16,
                'title'     => esc_html__( 'Body Font Size', 'optima' ),
                'options'   => array(
                    'step'    => 1,
                    'min'     => 10,
                    'max'     => 20,
                    'unit'    => 'px'
                )
            ),
            array(
                'id'        => 'font_source',
                'type'      => 'radio',
                'default'   => '1',
                'title'     => esc_html__('Font Sources', 'optima'),
                'options'   => array(
                    '1' => esc_html__('Standard + Google Webfonts', 'optima'),
                    '2' => esc_html__('Google Custom', 'optima'),
                    '3' => esc_html__('Adobe Typekit', 'optima'),
                )
            ),
            array(
                'id'        => 'main_font',
                'type'      => 'typography',
                'default'   => array(
                    'family' => esc_html__('Source Sans Pro', 'optima'),
                    'font' => 'google',
                ),
                'title' => esc_html__('Body Font', 'optima'),
                'dependency' => array('font_source_1', '==', 'true'),
                'variant' => true
            ),
            array(
                'id'        => 'secondary_font',
                'type'      => 'typography',
                'default'   => array(
                    'family' => esc_html__('Montserrat', 'optima'),
                    'font' => 'google',
                ),
                'title' => esc_html__('Heading Font', 'optima'),
                'dependency' => array('font_source_1', '==', 'true'),
                'variant' => true
            ),
            array(
                'id'        => 'highlight_font',
                'type'      => 'typography',
                'default'   => array(
                    'family' => esc_html__('Playfair Display', 'optima'),
                    'font' => 'google',
                ),
                'title' => esc_html__('Highlight Font', 'optima'),
                'dependency' => array('font_source_1', '==', 'true'),
                'variant' => true
            ),
            array(
                'id'            => 'font_google_code',
                'type'          => 'text',
                'title'         => esc_html__('Font Google code', 'optima'),
                'dependency'    => array('font_source_2', '==', 'true')
            ),
            array(
                'id'            => 'main_google_font_face',
                'type'          => 'text',
                'title'         => esc_html__('Body Google Font Face', 'optima'),
                'after'         => 'e.g : open sans',
                'desc'          => esc_html__('Enter your Google Font Name for the theme\'s Body Typography', 'optima'),
                'dependency'    => array('font_source_2', '==', 'true')
            ),
            array(
                'id'            => 'secondary_google_font_face',
                'type'          => 'text',
                'title'         => esc_html__('Heading Google Font Face', 'optima'),
                'after'         => 'e.g : open sans',
                'desc'          => esc_html__('Enter your Google Font Name for the theme\'s Heading Typography', 'optima'),
                'dependency'    => array('font_source_2', '==', 'true')
            ),
            array(
                'id'            => 'highlight_google_font_face',
                'type'          => 'text',
                'title'         => esc_html__('Highlight Google Font Face', 'optima'),
                'after'         => 'e.g : open sans',
                'desc'          => esc_html__('Enter your Google Font Name for the theme\'s Highlight Typography', 'optima'),
                'dependency'    => array('font_source_2', '==', 'true')
            ),
            array(
                'id'            => 'font_typekit_kit_id',
                'type'          => 'text',
                'title'         => esc_html__('Typekit ID', 'optima'),
                'dependency'    => array('font_source_3', '==', 'true')
            ),
            array(
                'id'            => 'main_typekit_font_face',
                'type'          => 'text',
                'title'         => esc_html__('Body Typekit Font Face', 'optima'),
                'after'         => 'e.g : futura-pt',
                'desc'          => esc_html__('Enter your Typekit Font Name for the theme\'s Body Typography', 'optima'),
                'dependency'    => array('font_source_3', '==', 'true')
            ),
            array(
                'id'            => 'secondary_typekit_font_face',
                'type'          => 'text',
                'title'         => esc_html__('Heading Typekit Font Face', 'optima'),
                'after'         => 'e.g : futura-pt',
                'desc'          => esc_html__('Enter your Typekit Font Name for the theme\'s Heading Typography', 'optima'),
                'dependency'    => array('font_source_3', '==', 'true')
            ),
            array(
                'id'            => 'highlight_typekit_font_face',
                'type'          => 'text',
                'title'         => esc_html__('Highlight Typekit Font Face', 'optima'),
                'after'         => 'e.g : futura-pt',
                'desc'          => esc_html__('Enter your Typekit Font Name for the theme\'s Highlight Typography', 'optima'),
                'dependency'    => array('font_source_3', '==', 'true')
            )
        )
    );
    return $sections;
}