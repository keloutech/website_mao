<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}


/**
 * Portfolio settings
 *
 * @param array $sections An array of our sections.
 * @return array
 */
function optima_options_section_portfolio( $sections )
{
    $sections['portfolio'] = array(
        'name' => 'portfolio_panel',
        'title' => esc_html__('Portfolio', 'optima'),
        'icon' => 'fa fa-th',
        'sections' => array(
            array(
                'name'      => 'portfolio_general_section',
                'title'     => esc_html__('General Setting', 'optima'),
                'icon'      => 'fa fa-check',
                'fields'    => array(
                    array(
                        'id'        => 'layout_archive_portfolio',
                        'type'      => 'image_select',
                        'title'     => esc_html__('Archive Portfolio Layout', 'optima'),
                        'desc'      => esc_html__('Controls the layout of archive portfolio page', 'optima'),
                        'default'   => 'col-1c',
                        'radio'     => true,
                        'options'   => Optima_Options::get_config_main_layout_opts(true, false)
                    ),
                    array(
                        'id'        => 'main_full_width_archive_portfolio',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'inherit',
                        'title'     => esc_html__('100% Main Width', 'optima'),
                        'desc'      => esc_html__('[Portfolio] Turn on to have the main area display at 100% width according to the window size. Turn off to follow site width.', 'optima'),
                        'options'   => Optima_Options::get_config_radio_opts()
                    ),
                    array(
                        'id'            => 'main_space_archive_portfolio',
                        'type'          => 'spacing',
                        'title'         => esc_html__('Custom Main Space', 'optima'),
                        'desc'          => esc_html__('[Portfolio]Leave empty if you not need', 'optima'),
                        'unit' 	        => 'px'
                    ),
                    array(
                        'id'        => 'portfolio_display_type',
                        'default'   => 'grid',
                        'title'     => esc_html__('Display Type as', 'optima'),
                        'desc'      => esc_html__('Controls the type display of portfolio for the archive page', 'optima'),
                        'type'      => 'select',
                        'options'   => array(
                            'grid'           => esc_html__('Grid', 'optima'),
                            'masonry'        => esc_html__('Masonry', 'optima')
                        )
                    ),
                    array(
                        'id'        => 'portfolio_display_style',
                        'default'   => '1',
                        'title'     => esc_html__('Select Style', 'optima'),
                        'type'      => 'select',
                        'options'   => array(
                            '1'           => esc_html__('Style 01', 'optima'),
                            '2'           => esc_html__('Style 02', 'optima'),
                            '3'           => esc_html__('Style 03', 'optima'),
                            '4'           => esc_html__('Style 04', 'optima'),
                            '5'           => esc_html__('Style 05', 'optima'),
                            '6'           => esc_html__('Style 06', 'optima'),
                            '7'           => esc_html__('Style 07', 'optima')
                        )
                    ),
                    array(
                        'id'        => 'portfolio_column',
                        'type'      => 'column_responsive',
                        'title'     => esc_html__('Portfolio Column', 'optima'),
                        'default'   => array(
                            'xlg' => 3,
                            'lg' => 3,
                            'md' => 2,
                            'sm' => 2,
                            'xs' => 1,
                            'mb' => 1
                        )
                    ),
                    array(
                        'id'        => 'portfolio_per_page',
                        'type'      => 'number',
                        'default'   => 10,
                        'attributes'=> array(
                            'min' => 1,
                            'max' => 100
                        ),
                        'title'     => esc_html__('Total Portfolio will be display in a page', 'optima')
                    ),
                    array(
                        'id'        => 'portfolio_thumbnail_size',
                        'type'      => 'text',
                        'default'   => 'full',
                        'title'     => esc_html__('Portfolio Thumbnail size', 'optima'),
                        'desc'      => esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'optima')
                    )
                )
            ),
            array(
                'name'      => 'single_portfolio_general_section',
                'title'     => esc_html__('Portfolio Single', 'optima'),
                'icon'      => 'fa fa-check',
                'fields'    => array(
                    array(
                        'id'        => 'layout_single_portfolio',
                        'type'      => 'image_select',
                        'title'     => esc_html__('Single Portfolio Layout', 'optima'),
                        'desc'      => esc_html__('Controls the layout of portfolio detail page', 'optima'),
                        'default'   => 'col-1c',
                        'radio'     => true,
                        'options'   => Optima_Options::get_config_main_layout_opts(true, false)
                    ),
                    array(
                        'id'        => 'single_portfolio_design',
                        'default'   => '1',
                        'title'     => esc_html__('Select Design', 'optima'),
                        'type'      => 'select',
                        'options'   => array(
                            '1'           => esc_html__('Design 01', 'optima'),
                            '2'           => esc_html__('Design 02', 'optima'),
                            '3'           => esc_html__('Design 03', 'optima'),
                            '4'           => esc_html__('Design 04', 'optima'),
                            '5'           => esc_html__('Design 05', 'optima'),
                            'use_vc'      => esc_html__('Show only post content', 'optima')
                        )
                    ),
                    array(
                        'id'        => 'single_portfolio_nextprev',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'on',
                        'title'     => esc_html__('Show Next / Previous Portfolio', 'optima'),
                        'desc'      => esc_html__('Turn on to display next/previous portfolio', 'optima'),
                        'options'   => Optima_Options::get_config_radio_onoff(false)
                    )
                )
            )
        )
    );
    return $sections;
}