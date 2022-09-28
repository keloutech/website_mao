<?php
/*
Plugin Name:    LA Studio Core
Plugin URI:     https://themeforest.net/user/la-studio/?ref=la-studio
Description:    (VERSION 2) This plugin use only for LA Studio theme
Author:         LA Studio
Author URI:     https://themeforest.net/user/la-studio/?ref=la-studio
Version:        2.0.3
Text Domain:    la-studio
*/

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

defined( 'LA_TEXTDOMAIN' ) or  define( 'LA_TEXTDOMAIN',     'la-studio' );

define('LA_OPTIONS_DEBUG_LIGHT', false);
define('LA_OPTIONS_DEBUG', false);

if(!class_exists('LaStudio_Plugin')) {

    class LaStudio_Plugin {

        const VERSION = '2.0.3';

        public static $plugin_dir_path = '';

        public static $plugin_dir_url = '';

        protected static $instance = null;

        public $post_type_allow = array();

        public $taxonomy_allow = array();

        public static function get_instance() {

            // If the single instance hasn't been set yet, set it now.
            if ( null == self::$instance ) {
                self::$instance = new self;
            }

            return self::$instance;

        }

        private function __construct() {

            if ( '' === self::$plugin_dir_path ) {
                self::$plugin_dir_path = plugin_dir_path(__FILE__);
            }
            if ( '' === self::$plugin_dir_url ) {
                self::$plugin_dir_url = plugin_dir_url(__FILE__);
            }

            add_action( 'after_setup_theme', array( &$this, 'load_core_text_domain' ) );
            add_action( 'admin_enqueue_scripts', array( &$this, 'admin_enqueue' ), 999 );
            add_action( 'wp_enqueue_scripts', array( &$this, 'enqueue' ) );
            add_action( 'customize_controls_enqueue_scripts', array( &$this, 'admin_customize_enqueue' ) );
            add_filter( 'vc_enqueue_font_icon_element', array( $this, 'add_fonts_to_visual_composer') );
            add_filter( 'vc_iconpicker-type-nucleo_outline', array( $this, 'get_nucleooutline_font_icon') );

            $this->post_type_allow = apply_filters( 'lastudio/core/post_type_allow', array(
                'la_block'          => array(
                    'label'                 => __( 'Custom Block', 'la-studio' ),
                    'supports'              => array( 'title', 'editor'),
                    'menu_icon'             => 'dashicons-slides',
                    'public'                => true,
                    'show_ui'               => true,
                    'show_in_menu'          => true,
                    'menu_position'         => 6,
                    'show_in_admin_bar'     => false,
                    'show_in_nav_menus'     => false,
                    'can_export'            => true,
                    'has_archive'           => false,
                    'exclude_from_search'   => true,
                    'publicly_queryable'    => false,
                    'capability_type'       => 'page'
                ),
                'la_testimonial'    => array(
                    'label'                 => __( 'Testimonial', 'la-studio' ),
                    'supports'              => array('title'),
                    'menu_icon'             => 'dashicons-testimonial',
                    'public'                => true,
                    'show_ui'               => true,
                    'show_in_menu'          => true,
                    'menu_position'         => 7,
                    'show_in_admin_bar'     => false,
                    'show_in_nav_menus'     => false,
                    'can_export'            => true,
                    'has_archive'           => false,
                    'exclude_from_search'   => true,
                    'publicly_queryable'    => false,
                    'capability_type'       => 'page',
                    'rewrite'               => array( 'slug' => 'testimonial' )
                ),
                'la_portfolio'      => array(
                    'label'                 => __( 'Portfolio', 'la-studio' ),
                    'supports'              => array('title', 'editor', 'thumbnail'),
                    'menu_icon'             => 'dashicons-portfolio',
                    'public'                => true,
                    'menu_position'         => 8,
                    'can_export'            => true,
                    'has_archive'           => true,
                    'exclude_from_search'   => false,
                    'rewrite'               => array( 'slug' => 'portfolio' )
                ),
                'la_team_member'    => array(
                    'label'                 => __( 'Team Member', 'la-studio' ),
                    'supports'              => array('title', 'editor', 'thumbnail'),
                    'menu_icon'             => 'dashicons-groups',
                    'public'                => true,
                    'show_ui'               => true,
                    'show_in_menu'          => true,
                    'menu_position'         => 8,
                    'show_in_admin_bar'     => false,
                    'show_in_nav_menus'     => false,
                    'can_export'            => true,
                    'has_archive'           => false,
                    'exclude_from_search'   => true,
                    'publicly_queryable'    => true,
                    'capability_type'       => 'page',
                    'rewrite'               => array( 'slug' => 'team-member' )
                )
            ));

            $this->taxonomy_allow = apply_filters( 'lastudio/core/taxonomy_type_allow', array(
                'la_portfolio_category' => array(
                    'post_type' => 'la_portfolio',
                    'args'  => array(
                        'hierarchical'      => true,
                        'show_in_nav_menus' => true,
                        'labels'            => array(
                            'name'          => __( 'Portfolio Categories', 'la-studio' ),
                            'singular_name' => __( 'Portfolio Category', 'la-studio' )
                        ),
                        'query_var'         => true,
                        'show_admin_column' => true,
                        'rewrite'           => array('slug' => 'portfolio-category')
                    )
                ),
                'la_portfolio_skill' => array(
                    'post_type' => 'la_portfolio',
                    'args'  => array(
                        'hierarchical'      => true,
                        'show_in_nav_menus' => true,
                        'labels'            => array(
                            'name'          => __( 'Portfolio Skills', 'la-studio' ),
                            'singular_name' => __( 'Portfolio Skill', 'la-studio' )
                        ),
                        'query_var'         => true,
                        'show_admin_column' => true,
                        'rewrite'           => array('slug' => 'portfolio-skill')
                    )
                )
            ));

            new LaStudio_PostType( $this->post_type_allow, $this->taxonomy_allow );

            LaStudio_Swatch::register();

            LaStudio_Shortcodes::register();
        }

        function load_core_text_domain() {
            load_plugin_textdomain( 'la-studio', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
        }

        public function admin_enqueue(){

            wp_deregister_script('jquery-chosen');
            wp_deregister_style('jquery-chosen');

            // admin utilities
            wp_enqueue_media();
            // wp core styles
            wp_enqueue_style( 'wp-color-picker' );
            wp_enqueue_style( 'wp-jquery-ui-dialog' );

            // framework core styles
            wp_enqueue_style( 'lastudio-admin', self::$plugin_dir_url . 'assets/css/admin.css');
            wp_enqueue_style( 'font-awesome', self::$plugin_dir_url . 'assets/css/font-awesome.css');
            wp_enqueue_style( 'nucleo-outline', self::$plugin_dir_url . 'assets/css/font-nucleo-outline.min.css');

            if ( is_rtl() ) {
                wp_enqueue_style( 'lastudio-admin-rtl', self::$plugin_dir_url . 'assets/css/admin-rtl.css', array());
            }

            // wp core scripts
            wp_enqueue_script( 'wp-color-picker' );
            wp_enqueue_script( 'jquery-ui-dialog' );
            wp_enqueue_script( 'jquery-ui-sortable' );
            wp_enqueue_script( 'jquery-ui-accordion' );

            // framework core scripts

            if(!wp_script_is('ace-editor','registered')){
                //wp_enqueue_script( 'ace-editor', '//cdnjs.cloudflare.com/ajax/libs/ace/1.2.6/ace.js', array('jquery'), '1.2.6', true );
                wp_register_script( 'ace-editor', self::$plugin_dir_url .'assets/js/vendors/ace.js', array('jquery'), self::VERSION, true);
                wp_register_script( 'ace-editor-mode-css', self::$plugin_dir_url .'assets/js/vendors/mode-css.js', array( 'ace-editor' ), self::VERSION, true );
                wp_register_script( 'ace-editor-mode-javascript', self::$plugin_dir_url .'assets/js/vendors/mode-javascript.js', array( 'ace-editor' ), self::VERSION, true );
                wp_register_script( 'ace-editor-mode-html', self::$plugin_dir_url .'assets/js/vendors/mode-html.js', array( 'ace-editor' ), self::VERSION, true );
                wp_register_script( 'ace-editor-language_tools', self::$plugin_dir_url .'assets/js/vendors/ext-language_tools.js', array( 'ace-editor' ), self::VERSION, true );
            }

            wp_enqueue_script( 'lastudio-admin-plugin',    self::$plugin_dir_url . 'assets/js/admin-plugin.js', array(), self::VERSION, true );
            wp_enqueue_script( 'lastudio-admin',  self::$plugin_dir_url . 'assets/js/admin.js',  array( 'lastudio-admin-plugin', 'ace-editor' ), self::VERSION, true );

        }

        public function admin_customize_enqueue(){
            wp_enqueue_script( 'lastudio-admin-customizer', self::$plugin_dir_url .'/assets/js/customize.js', array( 'jquery','customize-preview' ), '', true );
        }

        public function enqueue(){
            $url = 'https://maps.googleapis.com/maps/api/js';
            $key = apply_filters('lastudio/google_map_api', '');
            if(!empty($key)){
                $url = add_query_arg('key',$key, $url);
            }
            wp_register_script( 'googleapis', $url, array() , null, false );
            wp_register_style( 'nucleo-outline', self::$plugin_dir_url . 'assets/css/font-nucleo-outline.min.css');
            wp_register_script( 'lastudio-parallax-row',  self::$plugin_dir_url . 'assets/js/parallax.js',  array( 'jquery' ), self::VERSION, true );
        }

        public function add_fonts_to_visual_composer( $font_name ){
            if( 'nucleo_outline' == $font_name ){
                wp_enqueue_style('nucleo-outline');
            }
        }

        public function get_nucleooutline_font_icon( $icons = array() ) {
            global $wp_filesystem;
            if (empty($wp_filesystem)) {
                require_once(ABSPATH . '/wp-admin/includes/file.php');
                WP_Filesystem();
            }
            $json_file = LaStudio_Plugin::$plugin_dir_path . 'assets/fonts/font-nucleo-object.json';
            if(file_exists($json_file)){
                $file_data = $wp_filesystem->get_contents( $json_file );
                if( !is_wp_error( $file_data ) ) {
                    $file_data = json_decode( $file_data, true);
                    return array_merge( $icons, $file_data );
                }
            }
            return $icons;
        }
    }
}

include_once 'functions/helpers.php';
include_once 'functions/actions.php';
include_once 'functions/sanitize.php';
include_once 'functions/validate.php';

/**
 * Include the autoloader.
 */
include_once 'includes/class-autoload.php';

new LaStudio_Autoload();

LaStudio_Plugin::get_instance();
//add_action( 'plugins_loaded', array( 'LaStudio_Plugin', 'get_instance' ) );