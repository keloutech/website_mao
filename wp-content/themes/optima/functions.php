<?php

/**
 * Require plugins vendor
 */

require_once get_template_directory() . '/plugins/tgm-plugin-activation/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/plugins/plugins.php';

/**
 * Include the main class.
 */

include_once get_template_directory() . '/framework/classes/class-optima.php';


Optima::$template_dir_path   = get_template_directory();
Optima::$template_dir_url    = get_template_directory_uri();
Optima::$stylesheet_dir_path = get_stylesheet_directory();
Optima::$stylesheet_dir_url  = get_stylesheet_directory_uri();

/**
 * Include the autoloader.
 */
include_once Optima::$template_dir_path . '/framework/classes/class-autoload.php';

new Optima_Autoload();

/**
 * load functions for later usage
 */

require_once Optima::$template_dir_path . '/framework/functions/functions.php';

new Optima_Multilingual();

if(!function_exists('optima_init_options')){
    function optima_init_options(){
        Optima::$options = Optima_Options::get_instance();
    }
    optima_init_options();
}

if(!function_exists('Optima')){
    function Optima(){
        return Optima::get_instance();
    }
}

new Optima_Scripts();

new Optima_Admin();

new Optima_WooCommerce();

Optima_Visual_Composer::get_instance();

/**
 * Set the $content_width global.
 */
global $content_width;
if ( ! is_admin() ) {
    if ( ! isset( $content_width ) || empty( $content_width ) ) {
        $content_width = (int) Optima()->layout->get_content_width();
    }
}



require_once Optima::$template_dir_path . '/framework/functions/extra-functions.php';