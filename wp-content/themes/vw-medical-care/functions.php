<?php
/**
 * VW Medical Care functions and definitions
 *
 * @package VW Medical Care
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

/* Theme Setup */
if ( ! function_exists( 'vw_medical_care_setup' ) ) :
 
function vw_medical_care_setup() {

	$GLOBALS['content_width'] = apply_filters( 'vw_medical_care_content_width', 640 );
	
	load_theme_textdomain( 'vw-medical-care', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('vw-medical-care-homepage-thumb',240,145,true);
	
    register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'vw-medical-care' ),
	) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', vw_medical_care_font_url() ) );
}
endif;

add_action( 'after_setup_theme', 'vw_medical_care_setup' );

/* Theme Widgets Setup */
function vw_medical_care_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'vw-medical-care' ),
		'description'   => __( 'Appears on blog page sidebar', 'vw-medical-care' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'vw-medical-care' ),
		'description'   => __( 'Appears on page sidebar', 'vw-medical-care' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'vw-medical-care' ),
		'description'   => __( 'Appears on page sidebar', 'vw-medical-care' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 1', 'vw-medical-care' ),
		'description'   => __( 'Appears on footer 1', 'vw-medical-care' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 2', 'vw-medical-care' ),
		'description'   => __( 'Appears on footer 2', 'vw-medical-care' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 3', 'vw-medical-care' ),
		'description'   => __( 'Appears on footer 3', 'vw-medical-care' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 4', 'vw-medical-care' ),
		'description'   => __( 'Appears on footer 4', 'vw-medical-care' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Top Bar Social Media', 'vw-medical-care' ),
		'description'   => __( 'Appears on top bar', 'vw-medical-care' ),
		'id'            => 'social-links',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'vw_medical_care_widgets_init' );

/* Theme Font URL */
function vw_medical_care_font_url() {
	$font_url = '';
	$font_family = array();
	$font_family[] = 'PT Sans:400,400i,700,700i';
	$font_family[] = 'Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i';
	
	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}

/* Theme enqueue scripts */
function vw_medical_care_scripts() {
	wp_enqueue_style( 'vw-medical-care-font', vw_medical_care_font_url(), array() );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/assets/css/bootstrap.css' );
	wp_enqueue_style( 'vw-medical-care-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/css/fontawesome-all.css' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery') ,'',true);
	wp_enqueue_script( 'vw-medical-care-custom-scripts-jquery', get_template_directory_uri() . '/assets/js/custom.js', array('jquery') );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/* Enqueue the Dashicons script */
	wp_enqueue_style( 'dashicons' );
}
add_action( 'wp_enqueue_scripts', 'vw_medical_care_scripts' );

function vw_medical_care_ie_stylesheet(){
	wp_enqueue_style('vw-medical-care-ie', get_template_directory_uri().'/css/ie.css');
	wp_style_add_data( 'vw-medical-care-ie', 'conditional', 'IE' );
}
add_action('wp_enqueue_scripts','vw_medical_care_ie_stylesheet');

function vw_medical_care_sanitize_dropdown_pages( $page_id, $setting ) {
  	// Ensure $input is an absolute integer.
  	$page_id = absint( $page_id );
  	// If $page_id is an ID of a published page, return it; otherwise, return the default.
  	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

/*radio button sanitization*/
function vw_medical_care_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

/* Excerpt Limit Begin */
function vw_medical_care_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

define('VW_MEDICAL_CARE_CREDIT','https://www.vwthemes.com/themes/free-medical-wordpress-theme/','vw-medical-care');
if ( ! function_exists( 'vw_medical_care_credit' ) ) {
	function vw_medical_care_credit(){
		echo "<a href=".esc_url(VW_MEDICAL_CARE_CREDIT)." target='_blank'>".esc_html__('Hospital WordPress Theme ','vw-medical-care')."</a>";
	}
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'vw_medical_care_loop_columns');
	if (!function_exists('vw_medical_care_loop_columns')) {
		function vw_medical_care_loop_columns() {
		return 3; // 3 products per row
	}
}

/* Implement the Custom Header feature. */
require get_template_directory() . '/inc/custom-header.php';

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Customizer additions. */
require get_template_directory() . '/inc/customizer.php';

/* Customizer additions. */
require get_template_directory() . '/inc/social-widgets/social-icon.php';