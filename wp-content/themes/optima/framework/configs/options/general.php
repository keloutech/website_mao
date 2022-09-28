<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}


/**
 * General settings
 *
 * @param array $sections An array of our sections.
 * @return array
 */
function optima_options_section_general( $sections ) {
    $sections['general'] = array(
        'name'          => 'general_panel',
        'title'         => esc_html__('General', 'optima'),
        'icon'          => 'fa fa-tachometer',
        'sections' => array(
            array(
                'name'      => 'general_sections',
                'title'     => esc_html__('General', 'optima'),
                'icon'      => 'fa fa-check',
                'fields'    => array(
                    array(
                        'id'        => 'layout',
                        'title'     => esc_html__('Global Layout', 'optima'),
                        'type'      => 'image_select',
                        'radio'     => true,
                        'default'   => 'col-1c',
                        'desc'      => esc_html__('Select main content and sidebar alignment. Choose between 1, 2 or 3 column layout.', 'optima'),
                        'options'   => Optima_Options::get_config_main_layout_opts(true, false)
                    ),
                    array(
                        'id'        => 'main_full_width',
                        'type'      => 'radio',
                        'default'   => 'no',
                        'class'     => 'la-radio-style',
                        'title'     => esc_html__('100% Main Width', 'optima'),
                        'desc'      => esc_html__('Turn on to have the main area display at 100% width according to the window size. Turn off to follow site width.', 'optima'),
                        'options'   => Optima_Options::get_config_radio_opts(false)
                    ),
                    array(
                        'id'            => 'main_space',
                        'type'          => 'spacing',
                        'title'         => esc_html__('Custom Main Space', 'optima'),
                        'desc'          => esc_html__('Leave empty if you not need', 'optima'),
                        'unit' 	        => 'px',
                        'default'       => array(
                            'top'       => '70',
                            'bottom'    => '30'
                        )
                    ),
                    array(
                        'id'        => 'google_rich_snippets',
                        'type'      => 'radio',
                        'default'   => 'no',
                        'class'     => 'la-radio-style',
                        'title'     => esc_html__('Breadcrumbs Google Rich Snippets', 'optima'),
                        'desc'      => esc_html__('Turn on to the Google Rich Snippets in the Breadcrumbs.', 'optima'),
                        'options'   => Optima_Options::get_config_radio_opts(false)
                    ),
                    array(
                        'id'        => 'backtotop_btn',
                        'type'      => 'radio',
                        'default'   => 'no',
                        'class'     => 'la-radio-style',
                        'title'     => esc_html__('"Back to top" Button', 'optima'),
                        'desc'      => esc_html__('Turn on to show "Back to top" button', 'optima'),
                        'options'   => Optima_Options::get_config_radio_opts(false)
                    )
                )
            ),
            array(
                'name'      => 'favicon_sections',
                'title'     => esc_html__('Custom Favicon', 'optima'),
                'icon'      => 'fa fa-check',
                'fields'    => array(
                    array(
                        'id'        => 'favicon',
                        'type'      => 'image',
                        'title'     => esc_html__('Favicon', 'optima'),
                        'desc'      => esc_html__('Favicon for your website at 16px x 16px.', 'optima')
                    ),
                    array(
                        'id'        => 'favicon_iphone',
                        'type'      => 'image',
                        'title'     => esc_html__('Apple iPhone Icon Upload', 'optima'),
                        'desc'      => esc_html__('Favicon for Apple iPhone at 57px x 57px.', 'optima')
                    ),
                    array(
                        'id'        => 'favicon_ipad',
                        'type'      => 'image',
                        'title'     => esc_html__('Apple iPad Icon Upload', 'optima'),
                        'desc'      => esc_html__('Favicon for Apple iPad at 72px x 72px.', 'optima')
                    )
                )
            ),
            array(
                'name'      => 'logo_sections',
                'title'     => esc_html__('Logo', 'optima'),
                'icon'      => 'fa fa-check',
                'fields'    => array(
                    array(
                        'id'        => 'logo',
                        'type'      => 'image',
                        'title'     => esc_html__('Default Logo', 'optima'),
                        'desc'      => esc_html__('Select an image file for your logo.', 'optima')
                    ),
                    array(
                        'id'        => 'logo_2x',
                        'type'      => 'image',
                        'title'     => esc_html__('Retina Default Logo', 'optima'),
                        'desc'      => esc_html__('Select an image file for the retina version of the logo. It should be exactly 2x the size of the main logo.', 'optima')
                    ),
                    array(
                        'id'        => 'logo_transparency',
                        'type'      => 'image',
                        'title'     => esc_html__('Transparency Header Logo', 'optima'),
                        'desc'      => esc_html__('Select an image file for your transparency header logo.', 'optima')
                    ),
                    array(
                        'id'        => 'logo_transparency_2x',
                        'type'      => 'image',
                        'title'     => esc_html__('Retina Transparency Logo', 'optima'),
                        'desc'      => esc_html__('Select an image file for the retina version of the logo. It should be exactly 2x the size of the transparency header logo.', 'optima')
                    ),
                    array(
                        'id'        => 'logo_mobile',
                        'type'      => 'image',
                        'title'     => esc_html__('Mobile Logo', 'optima'),
                        'desc'      => esc_html__('Select an image file for your mobile logo.', 'optima')
                    ),
                    array(
                        'id'        => 'logo_mobile_2x',
                        'type'      => 'image',
                        'title'     => esc_html__('Retina Mobile Logo', 'optima'),
                        'desc'      => esc_html__('Select an image file for the retina version of the logo. It should be exactly 2x the size of the mobile logo.', 'optima')
                    )
                )
            ),
            array(
                'name'      => 'color_sections',
                'title'     => esc_html__('Colors', 'optima'),
                'icon'      => 'fa fa-paint-brush',
                'fields'    => array(
                    array(
                        'id'        => 'body_background',
                        'type'      => 'background',
                        'title'     => esc_html__('Body Background', 'optima')
                    ),
                    array(
                        'id'        => 'text_color',
                        'default'   => Optima_Options::get_color_default('text_color'),
                        'type'      => 'color_picker',
                        'title'     => esc_html__('Text Color', 'optima')
                    ),
                    array(
                        'id'        => 'heading_color',
                        'default'   => Optima_Options::get_color_default('heading_color'),
                        'type'      => 'color_picker',
                        'title'     => esc_html__('Heading Color', 'optima')
                    ),
                    array(
                        'id'        => 'primary_color',
                        'default'   => Optima_Options::get_color_default('primary_color'),
                        'type'      => 'color_picker',
                        'title'     => esc_html__('Primary Color', 'optima')
                    ),
                    array(
                        'id'        => 'secondary_color',
                        'default'   => Optima_Options::get_color_default('secondary_color'),
                        'type'      => 'color_picker',
                        'title'     => esc_html__('Secondary Color', 'optima')
                    ),
                    array(
                        'id'        => 'three_color',
                        'default'   => Optima_Options::get_color_default('three_color'),
                        'type'      => 'color_picker',
                        'title'     => esc_html__('Three Color', 'optima')
                    ),
                    array(
                        'id'        => 'border_color',
                        'default'   => Optima_Options::get_color_default('border_color'),
                        'type'      => 'color_picker',
                        'title'     => esc_html__('Border Color', 'optima')
                    )
                )
            ),
            array(
                'name'      => 'loading_sections',
                'title'     => esc_html__('Page Loading', 'optima'),
                'icon'      => 'fa fa-refresh fa-spin',
                'fields'    => array(
                    array(
                        'id'        => 'page_loading_animation',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'off',
                        'title'     => esc_html__('Page Loading Animation', 'optima'),
                        'desc'      => esc_html__('Turn on to show the icon/images loading animation before view site', 'optima'),
                        'options'   => Optima_Options::get_config_radio_onoff(false)
                    ),
                    array(
                        'id'        => 'page_loading_style',
                        'type'      => 'select',
                        'default'   => '1',
                        'title'     => esc_html__('Page Loading Style', 'optima'),
                        'options'   => array(
                            '1'         => esc_html__('Style 1', 'optima'),
                            '2'         => esc_html__('Style 2', 'optima'),
                            '3'         => esc_html__('Style 3', 'optima'),
                            '4'         => esc_html__('Style 4', 'optima'),
                            'custom'    => esc_html__('Custom image', 'optima')
                        ),
                        'dependency' => array('page_loading_animation_on', '==', 'true'),
                    ),
                    array(
                        'id'        => 'page_loading_custom',
                        'type'      => 'image',
                        'title'     => esc_html__('Custom Page Loading Image', 'optima'),
                        'add_title' => esc_html__('Add Image', 'optima'),
                        'dependency'=> array('page_loading_animation_on|page_loading_style', '==|==', 'true|custom'),
                    )
                )
            )
        )
    );
    return $sections;
}