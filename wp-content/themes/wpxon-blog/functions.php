<?php 
/**
 * Wpxon Blog functions and definitions
 */
define('WPXON_BLOG_NAME', wp_get_theme()->get( 'Name' )); 
define('WPXON_BLOG_DIR', get_template_directory().'/');
define('WPXON_BLOG_URI', get_template_directory_uri().'/');
/**
 * Wpxon Blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Wpxon_Blog
 */
if ( ! function_exists( 'wpxon_setup' ) ) :
	function wpxon_setup() {
		load_theme_textdomain( 'wpxon-blog', get_template_directory() . '/languages' );
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' ); 
		
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' ); 
		// Image size declaration. 
		add_image_size('wpxon-blog',630,360,true); 
		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'mainmenu' => esc_html__( 'Main Menu', 'wpxon-blog' ),
			'mobilemenu' => esc_html__( 'Mobile Menu', 'wpxon-blog' ),
		) );
		// Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		// Custom Logo 
	  	add_theme_support( 'custom-logo', array(
		   'height'      => 39,
		   'width'       => 139,
		   'flex-width'  => true,
	       'flex-height' => true,'header-text' => array( 'logo-area' ),
		) );
		// Custom Header 
		add_theme_support( 'custom-header', array(
			'flex-width'    => true, 
			'flex-height'    => true, 
			'default-image' => '',
		) );  
		
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, icons, and column width.
		 */
		add_editor_style( array( 'assets/css/editor-style.css', wpxon_fonts_url() ) );
	}
endif;
add_action( 'after_setup_theme', 'wpxon_setup' );
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wpxon_content_width() { 
	$GLOBALS['content_width'] = apply_filters( 'wpxon_content_width', 640 );
}
add_action( 'after_setup_theme', 'wpxon_content_width', 0 );
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wpxon_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wpxon-blog' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'wpxon-blog' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget__title">',
		'after_title'   => '</h4>',
	) ); 
}
add_action( 'widgets_init', 'wpxon_widgets_init' );
/**
 * Register custom fonts.
 */
function wpxon_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';
 
	if ( 'off' !== _x( 'on', 'Playfair Display font: on or off', 'wpxon-blog' ) ) {
		$fonts[] = 'Playfair Display:400,700,900';
	}
 
	if ( 'off' !== _x( 'on', 'Poppins font: on or off', 'wpxon-blog' ) ) {
		$fonts[] = 'Poppins:300,400,500,600,700,800,900';
	}
 
	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}
	return $fonts_url;
}
/**
 * Enqueue scripts and styles.
 */
function wpxon_scripts() {
	// Custom fonts
	wp_enqueue_style( 'wpxon-fonts', wpxon_fonts_url(), array(), null );
	// CSS
	wp_enqueue_style( 'font-awesome', WPXON_BLOG_URI . 'assets/css/font-awesome.min.css' );
	wp_enqueue_style( 'bootstrap', WPXON_BLOG_URI . 'assets/css/bootstrap.min.css' );  
	wp_enqueue_style( 'wpxon-style', get_stylesheet_uri() );
	// JS 
	wp_enqueue_script( 'bootstrap', WPXON_BLOG_URI . 'assets/js/bootstrap.js', array('jquery','jquery-masonry'), '20151215', true ); 
	wp_enqueue_script( 'wpxon-custom', WPXON_BLOG_URI . 'assets/js/custom.js', array(), '20151215', true );
	wp_enqueue_script( 'wpxon-navigation', WPXON_BLOG_URI . 'assets/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'wpxon-skip-link-focus-fix', WPXON_BLOG_URI . 'assets/js/skip-link-focus-fix.js', array(), '20151215', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	// inline style css
	$wpxon_custom_css = "";  
    $wpxon_text_color = get_theme_mod( 'header_textcolor' );
    if(isset($wpxon_text_color) && !empty($wpxon_text_color)){ 
        $wpxon_custom_css .= "
            #page-title-wrap .page-title{
                color:#{$wpxon_text_color};
            }
        ";
    } 
    if(is_page()){ 
    	$wpxon_hdr_img_id = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'full',true); 
    	if(has_post_thumbnail()){
    		$wpxon_hdr_img = $wpxon_hdr_img_id[0];
    	}else{
    		$wpxon_hdr_img = get_header_image();	
    	}
    }else{
    	$wpxon_hdr_img = get_header_image();	
    }
    
    if(isset($wpxon_hdr_img) && !empty($wpxon_hdr_img)){ 
        $wpxon_custom_css .= "
			#page-title-wrap{
                background: url({$wpxon_hdr_img}) no-repeat bottom center; 
			}
        ";
    }  
 
    wp_add_inline_style( 'wpxon-style', $wpxon_custom_css );
 
}
add_action( 'wp_enqueue_scripts', 'wpxon_scripts' );
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Custom functions that act independently of the theme templates
 */
require get_template_directory() . '/inc/extras.php';
 
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
 