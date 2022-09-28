<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

class Optima_Admin {

    public function __construct(){
        $this->init_page_options();
        $this->init_meta_box();
        $this->init_shortcode_manager();
        Optima_MegaMenu_Init::get_instance();
        add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts') );
        add_action( 'customize_register', array( $this, 'override_customize_control') );
        add_action( 'registered_post_type', array( $this, 'remove_revslider_metabox') );
        add_action( 'admin_init', array( $this, 'admin_init' ) );
        add_action( 'admin_menu', array( $this, 'admin_menu') );
    }

    public function admin_scripts(){
        wp_enqueue_style('optima-admin-css', Optima::$template_dir_url. '/assets/admin/css/admin.css');
        wp_enqueue_script('optima-admin-theme', Optima::$template_dir_url . '/assets/admin/js/admin.js', array( 'jquery'), false, true );
    }

    public function init_page_options(){
        $options = !empty(Optima()->options()->sections) ? Optima()->options()->sections : array();
        if(class_exists('LaStudio_Options')) {
            $settings = array(
                'menu_title' => esc_html__('Theme Options', 'optima'),
                'menu_type' => 'theme',
                'menu_slug' => 'theme_options',
                'ajax_save' => true,
                'show_reset_all' => true,
                'disable_header' => false,
                'framework_title' => esc_html__('Optima', 'optima')
            );
            if(!empty($options)){
                LaStudio_Options::instance( $settings, $options, Optima::get_option_name());
            }
        }
        if(class_exists('LaStudio_Customize') && function_exists('la_convert_option_to_customize')){
            if(!empty($options)){
                $customize_options = la_convert_option_to_customize($options);
                LaStudio_Customize::instance( $customize_options, Optima::get_option_name());
            }
        }
    }

    public function init_meta_box(){
        $default_metabox_opts = !empty(Optima()->options()->metabox_sections) ? Optima()->options()->metabox_sections : array();
        if(!class_exists('LaStudio_Metabox')){
            return;
        }
        if(empty($default_metabox_opts)){
            return;
        }

        $metaboxes = array();

        /**
         * Pages
         */
        $metaboxes[] = array(
            'id'        => Optima::get_original_option_name(),
            'title'     => esc_html__('Page Options', 'optima'),
            'post_type' => 'page',
            'context'   => 'normal',
            'priority'  => 'high',
            'sections'  => Optima()->options()->get_metabox_by_sections(array(
                'layout',
                'header',
                'page_title_bar',
                'footer',
                'additional',
                'fullpage'
            ))
        );

        /**
         * Post
         */
        $metaboxes[] = array(
            'id'        => Optima::get_original_option_name(),
            'title'     => esc_html__('Post Options', 'optima'),
            'post_type' => 'post',
            'context'   => 'normal',
            'priority'  => 'high',
            'sections'  => Optima()->options()->get_metabox_by_sections(array(
                'post',
                'layout',
                'header',
                'page_title_bar',
                'footer',
                'additional'
            ))
        );

        $metaboxes[] = array(
            'id'        => Optima::get_original_option_name(),
            'title'     => esc_html__('Product View Options', 'optima'),
            'post_type' => 'product',
            'context'   => 'normal',
            'priority'  => 'default',
            'sections'  => Optima()->options()->get_metabox_by_sections(array(
                'layout',
                'header',
                'page_title_bar',
                'footer',
                'additional'
            ))
        );
        /**
         * Portfolio
         */
        $metaboxes[] = array(
            'id'        => Optima::get_original_option_name(),
            'title'     => esc_html__('Portfolio Options', 'optima'),
            'post_type' => 'la_portfolio',
            'context'   => 'normal',
            'priority'  => 'high',
            'sections'  => Optima()->options()->get_metabox_by_sections(array(
                'portfolio',
                'layout',
                'header',
                'page_title_bar',
                'footer',
                'additional'
            ))
        );
        /**
         * Testimonial
         */
        $metaboxes[] = array(
            'id'        => Optima::get_original_option_name(),
            'title'     => esc_html__('Testimonial Information', 'optima'),
            'post_type' => 'la_testimonial',
            'context'   => 'normal',
            'priority'  => 'high',
            'sections'  => Optima()->options()->get_metabox_by_sections(array(
                'testimonial'
            ))
        );

        /**
         * Member
         */

        $metaboxes[] = array(
            'id'        => Optima::get_original_option_name(),
            'title'     => esc_html__('Page Options', 'optima'),
            'post_type' => 'la_team_member',
            'context'   => 'normal',
            'priority'  => 'high',
            'sections'  => Optima()->options()->get_metabox_by_sections(array(
                'member',
                'layout',
                'header',
                'page_title_bar',
                'footer',
                'additional'
            ))
        );
        LaStudio_Metabox::instance($metaboxes);
    }

    public function init_shortcode_manager(){
        if(class_exists('LaStudio_Shortcode_Manager')){
            $options       = array();
            $options[]     = array(
                'title'      => esc_html__('La Shortcodes', 'optima'),
                'shortcodes' => array(
                    array(
                        'name'      => 'la_dropcap',
                        'title'     => esc_html__('DropCap', 'optima'),
                        'fields'    => array(
                            array(
                                'id'    => 'style',
                                'type'  => 'select',
                                'title' => esc_html__('Design', 'optima'),
                                'options'        => array(
                                    '1'          => esc_html__('Style 1', 'optima')
                                )
                            ),
                            array(
                                'id'    => 'color',
                                'type'  => 'color_picker',
                                'title' => esc_html__('Text Color', 'optima')
                            ),
                            array(
                                'id'    => 'content',
                                'type'  => 'text',
                                'title' => esc_html__('Content', 'optima')
                            )
                        )
                    ),
                    array(
                        'name'      => 'la_quote',
                        'title'     => esc_html__('Custom Quote', 'optima'),
                        'fields'    => array(
                            array(
                                'id'    => 'style',
                                'type'  => 'select',
                                'title' => esc_html__('Design', 'optima'),
                                'options'        => array(
                                    '1'          => esc_html__('Style 1', 'optima'),
                                    '2'          => esc_html__('Style 2', 'optima')
                                )
                            ),
                            array(
                                'id'    => 'author',
                                'type'  => 'text',
                                'title' => esc_html__('Source Name', 'optima')
                            ),
                            array(
                                'id'    => 'link',
                                'type'  => 'text',
                                'title' => esc_html__('Source Link', 'optima')
                            ),
                            array(
                                'id'    => 'content',
                                'type'  => 'textarea',
                                'title' => esc_html__('Content', 'optima')
                            )
                        )
                    ),
                    array(
                        'name'          => 'la_icon_list',
                        'title'         => esc_html__('Icon List', 'optima'),
                        'view'          => 'clone',
                        'clone_id'      => 'la_icon_list_item',
                        'clone_title'   => esc_html__('Add New', 'optima'),
                        'fields'        => array(
                            array(
                                'id'        => 'el_class',
                                'type'      => 'text',
                                'title'     => esc_html__('Extra Class', 'optima'),
                                'desc'     => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'optima'),
                            )
                        ),
                        'clone_fields'  => array(
                            array(
                                'id'        => 'icon',
                                'type'      => 'icon',
                                'default'   => 'fa fa-check',
                                'title'     => esc_html__('Icon', 'optima')
                            ),
                            array(
                                'id'        => 'icon_color',
                                'type'      => 'color_picker',
                                'title'     => esc_html__('Icon Color', 'optima')
                            ),
                            array(
                                'id'        => 'content',
                                'type'      => 'textarea',
                                'title'     => esc_html__('Content', 'optima')
                            ),
                            array(
                                'id'        => 'el_class',
                                'type'      => 'text',
                                'title'     => esc_html__('Extra Class', 'optima'),
                                'desc'     => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'optima'),
                            )
                        )
                    ),
                )
            );
            LaStudio_Shortcode_Manager::instance( $options );
        }
    }

    public function remove_revslider_metabox($post_type){
        add_action('do_meta_boxes', function () use ($post_type) {
            remove_meta_box('mymetabox_revslider_0', $post_type, 'normal');
        });
    }

    public function admin_menu(){
        /*
         * @Todo remove the submenu items
         * @Example: Custom Header,Custom Background
         * We need use global variable `$submenu`
         */

    }

    public function override_customize_control( $wp_customize ) {
        $wp_customize->remove_section('colors');
        $wp_customize->remove_section('header_image');
        $wp_customize->remove_section('background_image');
        $wp_customize->remove_control('display_header_text');
        $wp_customize->remove_control('site_icon');
        $wp_customize->remove_control('custom_css');
    }


    public function admin_init(){
        add_filter('tiny_mce_before_init', array( $this, 'add_control_to_tinymce'));
        add_filter('mce_buttons_2', array( $this, 'add_button_to_tinymce'));
    }

    public function add_button_to_tinymce($buttons){
        array_unshift($buttons, 'styleselect');
        return $buttons;
    }

    public function add_control_to_tinymce($settings){
        $style_formats = array(
            array(
                'title' => esc_html__('Styled Subtitle', 'optima'),
                'inline' => 'small',
                'classes' => 'small'
            ),
            array(
                'title' => esc_html__('Title H1', 'optima'),
                'block' => 'div',
                'classes' => 'h1'
            ),
            array(
                'title' => esc_html__('Title H2', 'optima'),
                'block' => 'div',
                'classes' => 'h2'
            ),
            array(
                'title' => esc_html__('Title H3', 'optima'),
                'block' => 'div',
                'classes' => 'h3'
            ),
            array(
                'title' => esc_html__('Title H4', 'optima'),
                'block' => 'div',
                'classes' => 'h4'
            ),
            array(
                'title' => esc_html__('Title H5', 'optima'),
                'block' => 'div',
                'classes' => 'h5'
            ),
            array(
                'title' => esc_html__('Title H6', 'optima'),
                'block' => 'div',
                'classes' => 'h6'
            ),
            array(
                'title' => esc_html__('Light Title', 'optima'),
                'inline' => 'span',
                'classes' => 'light'
            ),
            array(
                'title' => esc_html__('Highlight Font', 'optima'),
                'inline' => 'span',
                'classes' => 'highlight-font-family'
            )
        );
        $settings['wordpress_adv_hidden'] = false;
        $settings['style_formats'] = json_encode($style_formats);
        return $settings;
    }
}