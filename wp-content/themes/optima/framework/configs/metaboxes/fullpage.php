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
function optima_metaboxes_section_fullpage( $sections )
{
    $sections['fullpage'] = array(
        'name'      => 'fullpage',
        'title'     => esc_html__('Full Page JS', 'optima'),
        'icon'      => 'laicon-anchor',
        'fields'    => array(
            array(
                'id'            => 'enable_fp',
                'type'          => 'radio',
                'default'       => 'no',
                'class'         => 'la-radio-style',
                'title'         => esc_html__('Enable Full Page', 'optima'),
                'desc'          => esc_html__('This option just apply for page layout 1 column', 'optima'),
                'options'       => Optima_Options::get_config_radio_opts(false)
            ),
            array(
                'id'            => 'fp_section_nav',
                'type'          => 'fieldset',
                'title'         => esc_html__('Navigation', 'optima'),
                'dependency'    => array( 'enable_fp_yes', '==', 'true' ),
                'wrap_class'    => 'la-fieldset-toggle',
                'un_array'      => true,
                'fields'        => array(
                    array(
                        'id'            => 'fp_navigation',
                        'type'          => 'select',
                        'title'         => esc_html__('Section Navigation', 'optima'),
                        'desc'          => esc_html__('This parameter determines the position of navigation bar.', 'optima'),
                        'default'       => 'off',
                        'options'       => array(
                            'off' => esc_html__('Off', 'optima'),
                            'left' => esc_html__('Left', 'optima'),
                            'right' => esc_html__('Right', 'optima')
                        )
                    ),
                    array(
                        'id'            => 'fp_sectionnavigationstyle',
                        'type'          => 'select',
                        'title'         => esc_html__('Section Navigation Style', 'optima'),
                        'desc'          => esc_html__('This parameter determines section navigation style.', 'optima'),
                        'default'       => 'default',
                        'options'       => array(
                            '1'               => esc_html__('Style 01', 'optima'),
                            '2'               => esc_html__('Style 02', 'optima')
                        ),
                        'dependency'    => array( 'fp_navigation', '!=', 'off' )
                    ),
                    /*
                    array(
                        'id'            => 'fp_showactivetooltip',
                        'type'          => 'radio',
                        'default'       => 'no',
                        'class'         => 'la-radio-style',
                        'title'         => esc_html__('Show Active Tooltip', 'optima'),
                        'desc'          => esc_html__('This parameter shows a persistent tooltip for the actively viewed section in the vertical navigation.', 'optima'),
                        'options'       => Optima_Options::get_config_radio_opts(false),
                        'dependency'    => array( 'fp_navigation', '!=', 'off' )
                    ),
                    array(
                        'id'            => 'fp_bigsectionnavigation',
                        'type'          => 'radio',
                        'default'       => 'no',
                        'class'         => 'la-radio-style',
                        'title'         => esc_html__('Bigger Navigation', 'optima'),
                        'desc'          => esc_html__('This parameter sets bigger navigation bullets.', 'optima'),
                        'options'       => Optima_Options::get_config_radio_opts(false),
                        'dependency'    => array( 'fp_navigation', '!=', 'off' )
                    ),
                    */
                    array(
                        'id'            => 'fp_slidenavigation',
                        'type'          => 'select',
                        'title'         => esc_html__('Slides Navigation', 'optima'),
                        'desc'          => esc_html__('This parameter determines the position of landscape navigation bar for sliders.', 'optima'),
                        'default'       => 'off',
                        'options'       => array(
                            'off'   => esc_html__('Off', 'optima'),
                            'left'  => esc_html__('Top', 'optima'),
                            'bottom'   => esc_html__('Bottom', 'optima')
                        )
                    ),
                    array(
                        'id'            => 'fp_slidenavigationstyle',
                        'type'          => 'select',
                        'title'         => esc_html__('Slide Navigation Style', 'optima'),
                        'desc'          => esc_html__('This parameter determines section navigation style.', 'optima'),
                        'default'       => 'default',
                        'options'       => array(
                            '1'               => esc_html__('Style 01', 'optima'),
                            '2'               => esc_html__('Style 02', 'optima')
                        ),
                        'dependency'    => array( 'fp_slidenavigation', '!=', 'off' )
                    ),
                    /*
                    array(
                        'id'            => 'fp_bigslidenavigation',
                        'type'          => 'radio',
                        'default'       => 'no',
                        'class'         => 'la-radio-style',
                        'title'         => esc_html__('Bigger Slide Navigation', 'optima'),
                        'desc'          => esc_html__('This parameter sets bigger slide navigation bullets .', 'optima'),
                        'options'       => Optima_Options::get_config_radio_opts(false),
                        'dependency'    => array( 'fp_slidenavigation', '!=', 'off' )
                    ),
                    array(
                        'id'            => 'fp_controlarrows',
                        'type'          => 'radio',
                        'default'       => 'yes',
                        'class'         => 'la-radio-style',
                        'title'         => esc_html__('Control Arrows', 'optima'),
                        'desc'          => esc_html__('This parameter determines whether to use control arrows for the slides to move right or left.', 'optima'),
                        'options'       => Optima_Options::get_config_radio_opts(false)
                    ),
                    */
                    array(
                        'id'            => 'fp_lockanchors',
                        'type'          => 'radio',
                        'default'       => 'no',
                        'class'         => 'la-radio-style',
                        'title'         => esc_html__('Lock Anchors', 'optima'),
                        'desc'          => esc_html__('This parameter determines whether anchors in the URL will have any effect.', 'optima'),
                        'options'       => Optima_Options::get_config_radio_opts(false)
                    ),
                    array(
                        'id'            => 'fp_animateanchor',
                        'type'          => 'radio',
                        'default'       => 'yes',
                        'class'         => 'la-radio-style',
                        'title'         => esc_html__('Animate Anchor', 'optima'),
                        'desc'          => esc_html__('This parameter defines whether the load of the site when given anchor (#) will scroll with animation to its destination.', 'optima'),
                        'options'       => Optima_Options::get_config_radio_opts(false)
                    ),
                    array(
                        'id'            => 'fp_keyboardscrolling',
                        'type'          => 'radio',
                        'default'       => 'yes',
                        'class'         => 'la-radio-style',
                        'title'         => esc_html__('Keyboard Scrolling', 'optima'),
                        'desc'          => esc_html__('This parameter defines if the content can be navigated using the keyboard.', 'optima'),
                        'options'       => Optima_Options::get_config_radio_opts(false)
                    ),
                    array(
                        'id'            => 'fp_recordhistory',
                        'type'          => 'radio',
                        'default'       => 'yes',
                        'class'         => 'la-radio-style',
                        'title'         => esc_html__('Record History', 'optima'),
                        'desc'          => esc_html__('This parameter defines whether to push the state of the site to the browsers history, so back button will work on section navigation.', 'optima'),
                        'options'       => Optima_Options::get_config_radio_opts(false)
                    )
                ),
            ),
            array(
                'id'            => 'fp_section_scroll',
                'type'          => 'fieldset',
                'title'         => esc_html__('Scrolling', 'optima'),
                'dependency'    => array( 'enable_fp_yes', '==', 'true' ),
                'wrap_class'    => 'la-fieldset-toggle',
                'un_array'      => true,
                'fields'        => array(
                    array(
                        'id'            => 'fp_autoscrolling',
                        'type'          => 'radio',
                        'default'       => 'yes',
                        'class'         => 'la-radio-style',
                        'title'         => esc_html__('Auto Scrolling', 'optima'),
                        'desc'          => esc_html__('This parameter defines whether to use the automatic scrolling or the normal one.', 'optima'),
                        'options'       => Optima_Options::get_config_radio_opts(false)
                    ),
                    array(
                        'id'            => 'fp_fittosection',
                        'type'          => 'radio',
                        'default'       => 'yes',
                        'class'         => 'la-radio-style',
                        'title'         => esc_html__('Fit To Section', 'optima'),
                        'desc'          => esc_html__('This parameter determines whether or not to fit sections to the viewport or not.', 'optima'),
                        'options'       => Optima_Options::get_config_radio_opts(false)
                    ),
                    array(
                        'id'            => 'fp_fittosectiondelay',
                        'type'          => 'number',
                        'default'       => 1000,
                        'title'         => esc_html__('Fit To Section Delay', 'optima'),
                        'desc'          => esc_html__('The delay in miliseconds for section fitting.', 'optima'),
                        'dependency'    => array( 'fp_fittosection_yes', '==', 'true' )
                    ),
                    array(
                        'id'            => 'fp_scrollbar',
                        'type'          => 'radio',
                        'default'       => 'no',
                        'class'         => 'la-radio-style',
                        'title'         => esc_html__('Scroll Bar', 'optima'),
                        'desc'          => esc_html__('This parameter determines whether to use the scrollbar for the site or not.', 'optima'),
                        'options'       => Optima_Options::get_config_radio_opts(false)
                    ),
                    array(
                        'id'            => 'fp_scrolloverflow',
                        'type'          => 'radio',
                        'default'       => 'no',
                        'class'         => 'la-radio-style',
                        'title'         => esc_html__('Scroll Overflow', 'optima'),
                        'desc'          => esc_html__('This parameter defines whether or not to create a scroll for the section in case the content is bigger than the height of it.', 'optima'),
                        'options'       => Optima_Options::get_config_radio_opts(false)
                    ),
                    array(
                        'id'            => 'fp_hidescrollbars',
                        'type'          => 'radio',
                        'default'       => 'no',
                        'class'         => 'la-radio-style',
                        'title'         => esc_html__('Hide Scrollbars', 'optima'),
                        'desc'          => esc_html__('This parameter hides scrollbar even if the scrolling is enabled inside the sections.', 'optima'),
                        'options'       => Optima_Options::get_config_radio_opts(false),
                        'dependency'    => array( 'fp_scrolloverflow_yes', '==', 'true' )
                    ),
                    array(
                        'id'            => 'fp_fadescrollbars',
                        'type'          => 'radio',
                        'default'       => 'no',
                        'class'         => 'la-radio-style',
                        'title'         => esc_html__('Fade Scrollbars', 'optima'),
                        'desc'          => esc_html__('This parameter fades scrollbar when unused.', 'optima'),
                        'options'       => Optima_Options::get_config_radio_opts(false),
                        'dependency'    => array( 'fp_scrolloverflow_yes', '==', 'true' )
                    ),
                    array(
                        'id'            => 'fp_interactivescrollbars',
                        'type'          => 'radio',
                        'default'       => 'no',
                        'class'         => 'la-radio-style',
                        'title'         => esc_html__('Interactive Scrollbars', 'optima'),
                        'desc'          => esc_html__('This parameter makes scrollbar draggable and user can interact with it.', 'optima'),
                        'options'       => Optima_Options::get_config_radio_opts(false),
                        'dependency'    => array( 'fp_scrolloverflow_yes', '==', 'true' )
                    ),
                    array(
                        'id'            => 'fp_bigsectionsdestination',
                        'type'          => 'select',
                        'title'         => esc_html__('Big Sections Destination', 'optima'),
                        'desc'          => esc_html__('This parameter defines how to scroll to a section which size is bigger than the viewport.', 'optima'),
                        'default'       => 'default',
                        'options'       => array(
                            'default'   => esc_html__('Default', 'optima'),
                            'top'       => esc_html__('Top', 'optima'),
                            'bottom'    => esc_html__('Bottom', 'optima')
                        )
                    ),
                    array(
                        'id'            => 'fp_contvertical',
                        'type'          => 'radio',
                        'default'       => 'no',
                        'class'         => 'la-radio-style',
                        'title'         => esc_html__('Continuous Vertical', 'optima'),
                        'desc'          => esc_html__('This parameter determines vertical scrolling is continuous.', 'optima'),
                        'options'       => Optima_Options::get_config_radio_opts(false)
                    ),
                    array(
                        'id'            => 'fp_loopbottom',
                        'type'          => 'radio',
                        'default'       => 'no',
                        'class'         => 'la-radio-style',
                        'title'         => esc_html__('Loop Bottom', 'optima'),
                        'desc'          => esc_html__('This parameter determines whether to use the scrollbar for the site or not.', 'optima'),
                        'options'       => Optima_Options::get_config_radio_opts(false),
                        'dependency'    => array( 'fp_contvertical_no', '==', 'true' )
                    ),
                    array(
                        'id'            => 'fp_looptop',
                        'type'          => 'radio',
                        'default'       => 'no',
                        'class'         => 'la-radio-style',
                        'title'         => esc_html__('Loop Top', 'optima'),
                        'desc'          => esc_html__('This parameter determines whether to use the scrollbar for the site or not.', 'optima'),
                        'options'       => Optima_Options::get_config_radio_opts(false),
                        'dependency'    => array( 'fp_contvertical_no', '==', 'true' )
                    ),
                    array(
                        'id'            => 'fp_loophorizontal',
                        'type'          => 'radio',
                        'default'       => 'yes',
                        'class'         => 'la-radio-style',
                        'title'         => esc_html__('Loop Slides', 'optima'),
                        'desc'          => esc_html__('This parameter defines whether horizontal sliders will loop after reaching the last or previous slide or not.', 'optima'),
                        'options'       => Optima_Options::get_config_radio_opts(false)
                    ),
                    array(
                        'id'            => 'fp_easing',
                        'type'          => 'select',
                        'title'         => esc_html__('Easing', 'optima'),
                        'desc'          => esc_html__('This parameter determines the transition effect.', 'optima'),
                        'default'       => 'css3_ease',
                        'options'       => array(
                            'css3_ease'             => esc_html__('CSS3 - Ease', 'optima'),
                            'css3_linear'           => esc_html__('CSS3 - Linear', 'optima'),
                            'css3_ease-in'          => esc_html__('CSS3 - Ease In', 'optima'),
                            'css3_ease-out'         => esc_html__('CSS3 - Ease Out', 'optima'),
                            'css3_ease-in-out'      => esc_html__('CSS3 - Ease In Out', 'optima'),
                            'js_linear'             => esc_html__('Linear', 'optima'),
                            'js_swing'              => esc_html__('Swing', 'optima'),
                            'js_easeInQuad'         => esc_html__('Ease In Quad', 'optima'),
                            'js_easeOutQuad'        => esc_html__('Ease Out Quad', 'optima'),
                            'js_easeInOutQuad'      => esc_html__('Ease In Out Quad', 'optima'),
                            'js_easeInCubic'        => esc_html__('Ease In Cubic', 'optima'),
                            'js_easeOutCubic'       => esc_html__('Ease Out Cubic', 'optima'),
                            'js_easeInOutCubic'     => esc_html__('Ease In Out Cubic', 'optima'),
                            'js_easeInQuart'        => esc_html__('Ease In Quart', 'optima'),
                            'js_easeOutQuart'       => esc_html__('Ease Out Quart', 'optima'),
                            'js_easeInOutQuart'     => esc_html__('Ease In Out Quart', 'optima'),
                            'js_easeInQuint'        => esc_html__('Ease In Quint', 'optima'),
                            'js_easeOutQuint'       => esc_html__('Ease Out Quint', 'optima'),
                            'js_easeInOutQuint'     => esc_html__('Ease In Out Quint', 'optima'),
                            'js_easeInExpo'         => esc_html__('Ease In Expo', 'optima'),
                            'js_easeOutExpo'        => esc_html__('Ease Out Expo', 'optima'),
                            'js_easeInOutExpo'      => esc_html__('Ease In Out Expo', 'optima'),
                            'js_easeInSine'         => esc_html__('Ease In Sine', 'optima'),
                            'js_easeOutSine'        => esc_html__('Ease Out Sine', 'optima'),
                            'js_easeInOutSine'      => esc_html__('Ease In Out Sine', 'optima'),
                            'js_easeInCirc'         => esc_html__('Ease In Circ', 'optima'),
                            'js_easeOutCirc'        => esc_html__('Ease Out Circ', 'optima'),
                            'js_easeInOutCirc'      => esc_html__('Ease In Out Circ', 'optima'),
                            'js_easeInElastic'      => esc_html__('Ease In Elastic', 'optima'),
                            'js_easeOutElastic'     => esc_html__('Ease Out Elastic', 'optima'),
                            'js_easeInOutElastic'   => esc_html__('Ease In Out Elastic', 'optima'),
                            'js_easeInBack'         => esc_html__('Ease In Back', 'optima'),
                            'js_easeOutBack'        => esc_html__('Ease Out Back', 'optima'),
                            'js_easeInOutBack'      => esc_html__('Ease In Out Back', 'optima'),
                            'js_easeInBounce'       => esc_html__('Ease In Bounce', 'optima'),
                            'js_easeOutBounce'      => esc_html__('Ease Out Bounce', 'optima'),
                            'js_easeInOutBounce'    => esc_html__('Ease In Out Bounce', 'optima')
                        )
                    ),
                    array(
                        'id'            => 'fp_scrollingspeed',
                        'type'          => 'number',
                        'default'       => 700,
                        'title'         => esc_html__('Scrolling Speed', 'optima'),
                        'desc'          => esc_html__('Speed in miliseconds for the scrolling transitions.', 'optima')
                    )
                )
            ),
            array(
                'id'            => 'fp_section_design',
                'type'          => 'fieldset',
                'title'         => esc_html__('Design', 'optima'),
                'dependency'    => array( 'enable_fp_yes', '==', 'true' ),
                'wrap_class'    => 'la-fieldset-toggle',
                'un_array'      => true,
                'fields'        => array(
                    array(
                        'id'            => 'fp_verticalcentered',
                        'type'          => 'radio',
                        'default'       => 'yes',
                        'class'         => 'la-radio-style',
                        'title'         => esc_html__('Vertically Centered', 'optima'),
                        'desc'          => esc_html__('This parameter determines whether to center the content vertically.', 'optima'),
                        'options'       => Optima_Options::get_config_radio_opts(false)
                    ),
                    array(
                        'id'        => 'fp_respwidth',
                        'type'      => 'slider',
                        'default'   => 0,
                        'title'     => esc_html__('Responsive Width', 'optima' ),
                        'desc'      => esc_html__('Normal scroll will be used under the defined width in pixels. (autoScrolling: false)', 'optima'),
                        'options'   => array(
                            'step'    => 1,
                            'min'     => 0,
                            'max'     => 1920,
                            'unit'    => 'px'
                        )
                    ),
                    array(
                        'id'        => 'fp_respheight',
                        'type'      => 'slider',
                        'default'   => 0,
                        'title'     => esc_html__('Responsive Height	', 'optima' ),
                        'desc'      => esc_html__('Normal scroll will be used under the defined height in pixels. (autoScrolling: false)', 'optima'),
                        'options'   => array(
                            'step'    => 1,
                            'min'     => 0,
                            'max'     => 5000,
                            'unit'    => 'px'
                        )
                    ),
                    array(
                        'id'        => 'fp_padding',
                        'type'      => 'spacing',
                        'title'     => esc_html__('Padding', 'optima'),
                        'desc'      => esc_html__('Defines top/bottom padding for each section. Useful in case of using fixed header/footer', 'optima'),
                        'unit' 	    => 'px',
                        'default'   => array(
                            'top' => 0,
                            'bottom' => 0
                        )
                    )
                )
            )
        )
    );
    return $sections;
}