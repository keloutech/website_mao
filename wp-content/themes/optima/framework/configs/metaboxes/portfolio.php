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
function optima_metaboxes_section_portfolio( $sections )
{
    $sections['portfolio'] = array(
        'name'      => 'portfolio',
        'title'     => esc_html__('Portfolio', 'optima'),
        'icon'      => 'laicon-file',
        'fields'    => array(
            array(
                'id'        => 'short_description',
                'type'      => 'textarea',
                'title'     => esc_html__('Short Description', 'optima')
            ),
            array(
                'id'        => 'portfolio_design',
                'type'      => 'select',
                'title'     => esc_html__('Portfolio Single Design', 'optima'),
                'options'    => array(
                    'inherit' => esc_html__('Inherit', 'optima'),
                    '1' => esc_html__('Design 01', 'optima'),
                    '2' => esc_html__('Design 02', 'optima'),
                    '3' => esc_html__('Design 03', 'optima'),
                    '4' => esc_html__('Design 04', 'optima'),
                    '5' => esc_html__('Design 05', 'optima'),
                    'use_vc' => esc_html__('Show only post content', 'optima')
                )
            ),
            array(
                'id'        => 'gallery',
                'type'      => 'gallery',
                'title'     => esc_html__('Gallery', 'optima')
            ),
            array(
                'id'        => 'client',
                'type'      => 'text',
                'title'     => esc_html__('Client Name', 'optima')
            ),
            array(
                'id'        => 'timeline',
                'type'      => 'text',
                'title'     => esc_html__('Timeline', 'optima')
            ),
            array(
                'id'        => 'location',
                'type'      => 'text',
                'title'     => esc_html__('Location', 'optima')
            ),
            array(
                'id'        => 'website',
                'type'      => 'text',
                'title'     => esc_html__('Website', 'optima')
            ),
            array(
                'id'        => 'additional',
                'type'      => 'textarea',
                'title'     => esc_html__('Additional', 'optima'),
                'desc'      => esc_html__('For Portfolio Single 03', 'optima')
            )
        )
    );
    return $sections;
}