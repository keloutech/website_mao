<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

class Optima_Options {

    public $section_names           = array();
    public $metabox_section_names   = array();

    public $sections                = array();
    public $metabox_sections        = array();

    public static $color_default = array();

    private static $fields;

    private static $instance = null;

    private function __construct() {

        self::$color_default = array(
            'text_color' => '#8a8a8a',
            'body_color' => '#8a8a8a',
            'heading_color' => '#343538',
            'primary_color' => '#526df9',
            'secondary_color' => '#232324',
            'three_color' => '#b5b7c4',
            'border_color' => 'rgba(169,174,189,0.30)'
        );

        $this->section_names = array(
            'general',
            'fonts',
            'header',
            'page_title_bar',
            'sidebar',
            'footer',
            'blog',
            'woocommerce',
            'portfolio',
            'social_media',
            'additional_code',
            'backup'
        );
        $this->metabox_section_names = array(
            'portfolio',
            'post',
            'member',
            'testimonial',
            'layout',
            'header',
            'page_title_bar',
            'footer',
            'additional',
            'fullpage'
        );

        // Include the section files.
        $this->include_files();

        // Set the $sections.
        $this->set_sections();

        // Set the $fields.
        $this->set_fields();

    }

    public static function get_instance() {
        if ( null === self::$instance ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function get_color_default( $key ){
        if(!empty($key)){
            if(!empty(self::$color_default) && array_key_exists( $key, self::$color_default )){
                return self::$color_default[$key];
            }
        }
        return '';
    }
    /**
     * Include required files.
     *
     * @access public
     */
    public function include_files() {

        foreach ( $this->section_names as $section ) {
            include_once Optima::$template_dir_path . '/framework/configs/options/' . $section . '.php';
        }

        foreach ( $this->metabox_section_names as $section ) {
            include_once Optima::$template_dir_path . '/framework/configs/metaboxes/' . $section . '.php';
        }
    }

    /**
     * Get a flat array of our fields.
     * This will contain simply the field IDs and nothing more than that.
     * We'll be using this to check if a setting belongs to options or not.
     *
     * @access public
     * @return array
     */
    public function fields_array() {

        // Get the options object.
        $new_options = Optima::$options;
        $fields = array();

        foreach ( $new_options->sections as $section ) {
            if( empty($section['sections']) && empty($section['fields']) ) {
                continue;
            }

            if(!empty($section['sections'])){
                foreach( $section['sections'] as $sub_section ) {
                    if(empty($sub_section['fields'])){
                        continue;
                    }
                    foreach($sub_section['fields'] as $field){
                        if(empty($field['id'])){
                            continue;
                        }
                        $fields[] = $field['id'];
                    }
                }
            }
            if(!empty($section['fields'])){
                foreach($section['fields'] as $field){
                    if(empty($field['id'])){
                        continue;
                    }
                    $fields[] = $field['id'];
                }
            }
        }

        return $fields;
    }

    /**
     * Sets the fields.
     *
     * @access public
     */
    public function set_sections() {

        $sections = array();
        foreach ( $this->section_names as $section ) {
            $sections = call_user_func( 'optima_options_section_' . $section, $sections );
        }
        $this->sections = apply_filters( 'optima_options_sections', $sections );

        $metabox_sections = array();
        foreach ( $this->metabox_section_names as $metabox ) {
            $metabox_sections = call_user_func( 'optima_metaboxes_section_' . $metabox, $metabox_sections );
        }
        $this->metabox_sections = apply_filters( 'optima_metaboxes_sections', $metabox_sections );
    }

    /**
     * Sets the fields.
     *
     * @access public
     */
    public function set_fields() {

        // Start parsing the sections.
        foreach ( $this->sections as $section ) {
            if( empty($section['sections']) && empty($section['fields']) ) {
                continue;
            }

            if(!empty($section['sections'])){
                foreach( $section['sections'] as $sub_section ) {
                    if(empty($sub_section['fields'])){
                        continue;
                    }
                    foreach($sub_section['fields'] as $field){
                        if(empty($field['id'])){
                            continue;
                        }
                        self::$fields[ $field['id'] ] = $field;
                    }
                }
            }
            if(!empty($section['fields'])){
                foreach($section['fields'] as $field){
                    if(empty($field['id'])){
                        continue;
                    }
                    self::$fields[ $field['id'] ] = $field;
                }
            }
        }
    }

    /**
     * Returns the static $fields property.
     *
     * @static
     * @access public
     * @return array
     */
    public static function get_option_fields() {
        return self::$fields;
    }

    public function get_metabox_by_sections( $section_name = array() ){
        $sections = array();
        if(!empty($this->metabox_sections) && !empty($section_name)){
            foreach( $section_name as $item ){
                if(!empty($this->metabox_sections[$item])){
                    $sections[$item] = $this->metabox_sections[$item];
                }
            }
        }
        return $sections;
    }

    public static function get_config_main_layout_opts( $image_select = true, $inherit = false ){
        $options =  array(
            'col-1c'    => $image_select ? esc_url( Optima::$template_dir_url . '/assets/images/theme_options/col-1c.png')    : esc_attr__('1 column', 'optima'),
            'col-2cl'   => $image_select ? esc_url( Optima::$template_dir_url . '/assets/images/theme_options/col-2cl.png')   : esc_attr__('2 columns left (3-9)', 'optima'),
            'col-2cr'   => $image_select ? esc_url( Optima::$template_dir_url . '/assets/images/theme_options/col-2cr.png')   : esc_attr__('2 columns right (9-3)', 'optima'),
            'col-2cl-l'   => $image_select ? esc_url( Optima::$template_dir_url . '/assets/images/theme_options/col-2cl-l.png')   : esc_attr__('2 columns left (4-8)', 'optima'),
            'col-2cr-l'   => $image_select ? esc_url( Optima::$template_dir_url . '/assets/images/theme_options/col-2cr-l.png')   : esc_attr__('2 columns right (8-4)', 'optima')
        );
        if($inherit){
            $inherit = array(
                'inherit' => $image_select ? esc_url( Optima::$template_dir_url . '/assets/images/theme_options/inherit.png') : esc_attr__('Inherit','optima')
            );
            $options = $inherit + $options;
        }
        return $options;
    }

    public static function get_config_header_layout_opts( $image_select = true, $inherit = false ){
        $options =  array(
            '1'     => $image_select ? esc_url( Optima::$template_dir_url . '/assets/images/theme_options/header-1.jpg')            : esc_attr__('Header Layout 01', 'optima'),
            '2'     => $image_select ? esc_url( Optima::$template_dir_url . '/assets/images/theme_options/header-2.jpg')            : esc_attr__('Header Layout 02', 'optima'),
            '3'     => $image_select ? esc_url( Optima::$template_dir_url . '/assets/images/theme_options/header-3.jpg')            : esc_attr__('Header Layout 03', 'optima'),
            '4'     => $image_select ? esc_url( Optima::$template_dir_url . '/assets/images/theme_options/header-4.jpg')            : esc_attr__('Header Layout 04', 'optima'),
            '5'     => $image_select ? esc_url( Optima::$template_dir_url . '/assets/images/theme_options/header-5.jpg')            : esc_attr__('Header Layout 05', 'optima'),
            '6'     => $image_select ? esc_url( Optima::$template_dir_url . '/assets/images/theme_options/header-6.jpg')            : esc_attr__('Header Layout 06', 'optima'),
            '7'     => $image_select ? esc_url( Optima::$template_dir_url . '/assets/images/theme_options/header-divider.jpg')      : esc_attr__('Header with Divider', 'optima'),
            '8'     => $image_select ? esc_url( Optima::$template_dir_url . '/assets/images/theme_options/header-simple.jpg')       : esc_attr__('Header Simple', 'optima'),
            '9'     => $image_select ? esc_url( Optima::$template_dir_url . '/assets/images/theme_options/header-vertical-1.jpg')   : esc_attr__('Header Vertical 01', 'optima'),
            '10'     => $image_select ? esc_url( Optima::$template_dir_url . '/assets/images/theme_options/header-vertical-2.jpg')  : esc_attr__('Header Vertical 02', 'optima')
        );
        if($inherit){
            $inherit = array(
                'inherit' => $image_select ? esc_url( Optima::$template_dir_url . '/assets/images/theme_options/header-inherit.png') : esc_attr__('Inherit','optima')
            );
            $options = $inherit + $options;
        }
        return $options;
    }

    public static function get_config_footer_layout_opts( $image_select = true, $inherit = false ){
        $options =  array(
            '1col'     => $image_select ? esc_url( Optima::$template_dir_url . '/assets/images/theme_options/footer-1col-12.png')    : esc_attr__('Footer 1 column', 'optima'),
            '2col48'     => $image_select ? esc_url( Optima::$template_dir_url . '/assets/images/theme_options/footer-2cols-4-8.png')    : esc_attr__('Footer 2 columns (4-8)', 'optima'),
            '2col66'     => $image_select ? esc_url( Optima::$template_dir_url . '/assets/images/theme_options/footer-2cols-6-6.png')    : esc_attr__('Footer 2 columns (6-6)', 'optima'),
            '3col444'     => $image_select ? esc_url( Optima::$template_dir_url . '/assets/images/theme_options/footer-3cols-4-4-4.png')    : esc_attr__('Footer 3 columns (4-4-4)', 'optima'),
            '4col3333'     => $image_select ? esc_url( Optima::$template_dir_url . '/assets/images/theme_options/footer-4cols-3-3-3-3.png')    : esc_attr__('Footer 4 columns (3-3-3-3)', 'optima')
        );
        if($inherit){
            $inherit = array(
                'inherit' => $image_select ? esc_url( Optima::$template_dir_url . '/assets/images/theme_options/footer-inherit.png') : esc_attr__('Inherit','optima')
            );
            $options = $inherit + $options;
        }
        return $options;
    }

    public static function get_config_radio_opts( $inherit = true ){
        $options = array();
        if($inherit){
            $options['inherit'] = esc_html__('Inherit', 'optima');
        }
        $options['yes'] = esc_html__('Yes', 'optima');
        $options['no'] = esc_html__('No', 'optima');
        return $options;
    }

    public static function get_config_radio_onoff( $inherit = true ){
        $options = array();
        if($inherit){
            $options['inherit'] = esc_html__('Inherit', 'optima');
        }
        $options['on'] = esc_html__('On', 'optima');
        $options['off'] = esc_html__('Off', 'optima');
        return $options;
    }

    public static function get_config_page_title_bar_opts( $image_select = true, $inherit = false ) {
        $options =  array(
            '1'     => $image_select ? esc_url( Optima::$template_dir_url . '/assets/images/theme_options/title-bar-style-1.jpg')    : esc_attr__('Title & Breadcrumbs Centered', 'optima'),
            '11'     => $image_select ? esc_url( Optima::$template_dir_url . '/assets/images/theme_options/title-bar-style-11.jpg')    : esc_attr__('Title & Breadcrumbs Center - Breadcrumbs at bottom', 'optima'),
            '2'     => $image_select ? esc_url( Optima::$template_dir_url . '/assets/images/theme_options/title-bar-style-2.jpg')    : esc_attr__('Title & Breadcrumbs In Left', 'optima'),
            '3'     => $image_select ? esc_url( Optima::$template_dir_url . '/assets/images/theme_options/title-bar-style-3.jpg')    : esc_attr__('Title & Breadcrumbs In Right', 'optima'),
            '4'     => $image_select ? esc_url( Optima::$template_dir_url . '/assets/images/theme_options/title-bar-style-4.jpg')    : esc_attr__('Title Left & Breadcrumbs Right', 'optima'),
            '5'     => $image_select ? esc_url( Optima::$template_dir_url . '/assets/images/theme_options/title-bar-style-5.jpg')    : esc_attr__('Title Right & Breadcrumbs Left', 'optima')
        );
        if($inherit){
            $inherit = array(
                'inherit' => $image_select ? esc_url( Optima::$template_dir_url . '/assets/images/theme_options/title-bar-inherit.png') : esc_attr__('Inherit','optima'),
                'hide' => $image_select ? esc_url( Optima::$template_dir_url . '/assets/images/theme_options/title-bar-inherit.png') : esc_attr__('Hidden','optima')
            );
            $options = $inherit + $options;
        }
        return $options;
    }
}