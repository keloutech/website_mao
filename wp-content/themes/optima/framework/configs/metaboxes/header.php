<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}


/**
 * MetaBox
 *
 * @param array $sections An array of our sections.
 * @return array
 */
function optima_metaboxes_section_header( $sections )
{
    $sections['header'] = array(
        'name'      => 'header',
        'title'     => esc_html__('Header', 'optima'),
        'icon'      => 'laicon-header',
        'fields'    => array(
            array(
                'id'            => 'hide_header',
                'type'          => 'radio',
                'default'       => 'no',
                'class'         => 'la-radio-style',
                'title'         => esc_html__('Hide header', 'optima'),
                'options'       => Optima_Options::get_config_radio_opts(false)
            ),
            array(
                'id'            => 'header_layout',
                'type'          => 'select',
                'class'         => 'chosen',
                'title'         => esc_html__('Header Layout', 'optima'),
                'desc'          => esc_html__('Controls the layout of the header.', 'optima'),
                'default'       => 'inherit',
                'options'       => Optima_Options::get_config_header_layout_opts(false, true),
                'dependency'    => array( 'hide_header_no', '==', 'true' )
            ),
            array(
                'id'            => 'header_full_width',
                'type'          => 'radio',
                'default'       => 'inherit',
                'class'         => 'la-radio-style',
                'title'         => esc_html__('100% Header Width', 'optima'),
                'desc'          => esc_html__('Turn on to have the header area display at 100% width according to the window size. Turn off to follow site width.', 'optima'),
                'options'       => Optima_Options::get_config_radio_opts(),
                'dependency'    => array( 'hide_header_no', '==', 'true' )
            ),
            array(
                'id'            => 'header_transparency',
                'type'          => 'radio',
                'default'       => 'inherit',
                'class'         => 'la-radio-style',
                'title'         => esc_html__('Enable Header Transparency', 'optima'),
                'options'       => Optima_Options::get_config_radio_opts(),
                'dependency'    => array( 'hide_header_no', '==', 'true' )
            )
        )
    );
    return $sections;
}