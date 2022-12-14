<?php
/**
 * Digital Download functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Digital_Download
 */

//define theme version
if ( ! defined( 'DIGITAL_DOWNLOAD_THEME_VERSION' ) ) {
	$theme_data = wp_get_theme();	
	define ( 'DIGITAL_DOWNLOAD_THEME_VERSION', $theme_data->get( 'Version' ) );
}

/**
 * Custom Functions.
 */
require get_template_directory() . '/inc/custom-functions.php';

/**
 * Standalone Functions.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Template Functions.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom functions for selective refresh.
 */
require get_template_directory() . '/inc/partials.php';

/**
 * Custom Controls
 */
require get_template_directory() . '/inc/custom-controls/custom-control.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Widgets
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Metabox
 */
require get_template_directory() . '/inc/metabox.php';

/**
 * Plugin Recommendation
*/
require get_template_directory() . '/inc/tgmpa/recommended-plugins.php';

/**
 * Add EDD related functions
*/
if( digital_download_is_edd_activated() )
require get_template_directory() . '/inc/edd-functions.php';

/**
 * Subtitles related functions
*/
if( digital_download_is_subtitles_activated() )
require get_template_directory() . '/inc/subtitle-functions.php'; 

/**
 * Companion Filters
*/
if( digital_download_is_rtc_activated() )
require get_template_directory() . '/inc/companion-functions.php';