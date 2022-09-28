<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}


/**
 * Additional code settings
 *
 * @param array $sections An array of our sections.
 * @return array
 */
function optima_options_section_additional_code( $sections )
{
    $sections['additional_code'] = array(
        'name'          => 'additional_code_panel',
        'title'         => esc_html__('Additional Code', 'optima'),
        'icon'          => 'fa fa-code',
        'fields'        => array(
            array(
                'id'        => 'google_key',
                'type'      => 'text',
                'title'     => esc_html__('Google API Key', 'optima'),
                'desc'      => esc_html__('Type your Google API Key here.', 'optima')
            ),
            array(
                'id'        => 'la_custom_css',
                'type'      => 'ace_editor',
                'mode'      => 'css',
                'class'     => 'la-customizer-section-large',
                'title'     => esc_html__('Custom CSS', 'optima'),
                'desc'      => esc_html__('Paste your custom CSS code here.', 'optima'),
            ),
            array(
                'id'        => 'header_js',
                'type'      => 'ace_editor',
                'mode'      => 'javascript',
                'title'     => esc_html__('Header Javascript Code', 'optima'),
                'desc'      => esc_html__('Paste your custom JS code here. The code will be added to the header of your site.', 'optima')
            ),
            array(
                'id'        => 'footer_js',
                'type'      => 'ace_editor',
                'mode'      => 'javascript',
                'title'     => esc_html__('Footer Javascript Code', 'optima'),
                'desc'     => esc_html__('Paste your custom JS code here. The code will be added to the footer of your site.', 'optima')
            )
        )
    );
    return $sections;
}