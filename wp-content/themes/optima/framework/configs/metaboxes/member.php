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
function optima_metaboxes_section_member( $sections )
{
    $sections['member'] = array(
        'name'      => 'member',
        'title'     => esc_html__('Member Information', 'optima'),
        'icon'      => 'laicon-file',
        'fields'    => array(
            array(
                'id'    => 'role',
                'type'  => 'text',
                'title' => esc_html__('Role', 'optima'),
            ),
            array(
                'id'        => 'rating',
                'type'      => 'slider',
                'default'    => 0,
                'title'     => esc_html__( 'Ratings', 'optima' ),
                'desc'      => esc_html__( 'This field will be display on (Member List 08)', 'optima'),
                'options'   => array(
                    'step'    => 1,
                    'min'     => 0,
                    'max'     => 10
                )
            ),
            array(
                'id'        => 'skills',
                'type'      => 'group',
                'title'     => esc_html__( 'Member Skills', 'optima' ),
                'button_title'    => esc_html__('Add New', 'optima'),
                'desc'      => esc_html__( 'This field will be display on (Member List 09)', 'optima'),
                'fields'    => array(
                    array(
                        'id'        => 'title',
                        'type'      => 'text',
                        'title'     => esc_html__('Skill Title', 'optima')
                    ),
                    array(
                        'id'        => 'value',
                        'type'      => 'slider',
                        'default'    => 90,
                        'title'     => esc_html__( 'Value', 'optima' ),
                        'options'   => array(
                            'step'    => 1,
                            'min'     => 0,
                            'max'     => 100
                        )
                    ),
                )
            ),
            array(
                'id'    => 'phone',
                'type'  => 'text',
                'title' => esc_html__('Phone Number', 'optima'),
            ),
            array(
                'id'    => 'facebook',
                'type'  => 'text',
                'title' => esc_html__('Facebook URL', 'optima'),
            ),
            array(
                'id'    => 'twitter',
                'type'  => 'text',
                'title' => esc_html__('Twitter URL', 'optima'),
            ),
            array(
                'id'    => 'pinterest',
                'type'  => 'text',
                'title' => esc_html__('Pinterest URL', 'optima'),
            ),
            array(
                'id'    => 'linkedin',
                'type'  => 'text',
                'title' => esc_html__('LinkedIn URL', 'optima'),
            ),
            array(
                'id'    => 'dribbble',
                'type'  => 'text',
                'title' => esc_html__('Dribbble URL', 'optima'),
            ),
            array(
                'id'    => 'google_plus',
                'type'  => 'text',
                'title' => esc_html__('Google Plus URL', 'optima'),
            ),
            array(
                'id'    => 'youtube',
                'type'  => 'text',
                'title' => esc_html__('Youtube URL', 'optima'),
            ),
            array(
                'id'    => 'email',
                'type'  => 'text',
                'title' => esc_html__('Email Address', 'optima'),
            )
        )
    );
    return $sections;
}