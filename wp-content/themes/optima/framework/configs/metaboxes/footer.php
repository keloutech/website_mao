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
function optima_metaboxes_section_footer( $sections )
{
    $sections['footer'] = array(
        'name'      => 'footer',
        'title'     => esc_html__('Footer', 'optima'),
        'icon'      => 'laicon-footer',
        'fields'    => array(
            array(
                'id'            => 'hide_footer',
                'type'          => 'radio',
                'default'       => 'no',
                'class'         => 'la-radio-style',
                'title'         => esc_html__('Hide Footer', 'optima'),
                'options'       => Optima_Options::get_config_radio_opts(false)
            ),

            array(
                'id'            => 'footer_layout',
                'type'          => 'select',
                'class'         => 'chosen',
                'title'         => esc_html__('Footer Layout', 'optima'),
                'desc'          => esc_html__('Controls the layout of the footer.', 'optima'),
                'default'       => 'inherit',
                'options'       => Optima_Options::get_config_footer_layout_opts(false, true),
                'dependency'    => array( 'hide_footer_no', '==', 'true' )
            ),
            array(
                'id'            => 'footer_full_width',
                'type'          => 'radio',
                'default'       => 'inherit',
                'class'         => 'la-radio-style',
                'title'         => esc_html__('100% Footer Width', 'optima'),
                'desc'          => esc_html__('Turn on to have the footer area display at 100% width according to the window size. Turn off to follow site width.', 'optima'),
                'options'       => Optima_Options::get_config_radio_opts(),
                'dependency'    => array( 'hide_footer_no', '==', 'true' )
            ),
            array(
                'id'            => 'enable_footer_copyright',
                'type'          => 'radio',
                'default'       => 'inherit',
                'class'         => 'la-radio-style',
                'title'         => esc_html__('SHOW Footer Copyright', 'optima'),
                'options'       => Optima_Options::get_config_radio_opts()
            )
        )
    );
    return $sections;
}