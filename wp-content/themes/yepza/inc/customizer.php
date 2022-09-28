<?php
/**
 * yepza Theme Customizer
 *
 * @package yepza
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function yepza_customize_register( $wp_customize ) {

	global $yepzaPostsPagesArray, $yepzaYesNo, $yepzaSliderType, $yepzaServiceLayouts, $yepzaAvailableCats, $yepzaBusinessLayoutType;

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'yepza_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'yepza_customize_partial_blogdescription',
		) );
	}
	
	$wp_customize->add_panel( 'yepza_general', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'title'      => __('General Settings', 'yepza'),
		'active_callback' => '',
	) );

	$wp_customize->get_section( 'title_tagline' )->panel = 'yepza_general';
	$wp_customize->get_section( 'background_image' )->panel = 'yepza_general';
	$wp_customize->get_section( 'background_image' )->title = __('Site background', 'yepza');
	$wp_customize->get_section( 'header_image' )->panel = 'yepza_general';
	$wp_customize->get_section( 'header_image' )->title = __('Header Settings', 'yepza');
	$wp_customize->get_control( 'header_image' )->priority = 20;
	$wp_customize->get_control( 'header_image' )->active_callback = 'yepza_show_wp_header_control';	
	$wp_customize->get_section( 'static_front_page' )->panel = 'business_page';
	$wp_customize->get_section( 'static_front_page' )->title = __('Select frontpage type', 'yepza');
	$wp_customize->get_section( 'static_front_page' )->priority = 9;
	$wp_customize->remove_section('colors');
	$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'background_color', 
			array(
				'label'      => __( 'Background Color', 'yepza' ),
				'section'    => 'background_image',
				'priority'   => 9
			) ) 
	);
	//$wp_customize->remove_section('static_front_page');	
	//$wp_customize->remove_section('header_image');	

	/* Upgrade */	
	$wp_customize->add_section( 'business_upgrade', array(
		'priority'       => 8,
		'capability'     => 'edit_theme_options',
		'title'      => __('Upgrade to PRO', 'yepza'),
		'active_callback' => '',
	) );		
	$wp_customize->add_setting( 'yepza_show_sliderr',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new yepza_Customize_Control_Upgrade(
		$wp_customize,
		'yepza_show_sliderr',
		array(
			'label'      => __( 'Show headerr?', 'yepza' ),
			'settings'   => 'yepza_show_sliderr',
			'priority'   => 10,
			'section'    => 'business_upgrade',
			'choices' => '',
			'input_attrs'  => 'yes',
			'active_callback' => ''			
		)
	) );
	
	/* Usage guide */	
	$wp_customize->add_section( 'business_usage', array(
		'priority'       => 9,
		'capability'     => 'edit_theme_options',
		'title'      => __('Theme Usage Guide', 'yepza'),
		'active_callback' => '',
	) );		
	$wp_customize->add_setting( 'yepza_show_sliderrr',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new yepza_Customize_Control_Guide(
		$wp_customize,
		'yepza_show_sliderrr',
		array(

			'label'      => __( 'Show headerr?', 'yepza' ),
			'settings'   => 'yepza_show_sliderrr',
			'priority'   => 10,
			'section'    => 'business_usage',
			'choices' => '',
			'input_attrs'  => 'yes',
			'active_callback' => ''				
		)
	) );
	
	/* Header Section */
	$wp_customize->add_setting( 'header_type',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'yepza_sanitize_slider_type_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'header_type',
		array(
			'label'      => __( 'Header type :', 'yepza' ),
			'settings'   => 'header_type',
			'priority'   => 10,
			'section'    => 'header_image',
			'type'    => 'select',
			'choices' => $yepzaSliderType,
		)
	) );
	
	$wp_customize->add_setting( 'yepza_header_one_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'yepza_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'yepza_header_one_post',
		array(
			'label'      => __( 'Header post :', 'yepza' ),
			'settings'   => 'yepza_header_one_post',
			'priority'   => 30,
			'section'    => 'header_image',
			'type'    => 'select',
			'choices' => $yepzaPostsPagesArray,
			'active_callback' => 'yepza_show_header_one_control'
		)
	) );	
	
	
	/* Business page panel */
	$wp_customize->add_panel( 'business_page', array(
		'priority'       => 20,
		'capability'     => 'edit_theme_options',
		'title'      => __('Home/Front Page Settings', 'yepza'),
		'active_callback' => '',
	) );
	$wp_customize->add_section( 'business_page_layout', array(
		'priority'       => 13,
		'capability'     => 'edit_theme_options',
		'title'      => __('Select layout', 'yepza'),
		'active_callback' => 'yepza_front_page_sections',
		'panel'  => 'business_page',
	) );
	$wp_customize->add_setting( 'business_page_layout_type',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'yepza_sanitize_layout_type',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'business_page_layout_type',
		array(
			'label'      => __( 'Layout type :', 'yepza' ),
			'settings'   => 'business_page_layout_type',
			'priority'   => 10,
			'section'    => 'business_page_layout',
			'type'    => 'select',
			'choices' => $yepzaBusinessLayoutType,
		)
	) );
	
	$wp_customize->add_section( 'business_page_layout_one', array(
		'priority'       => 20,
		'capability'     => 'edit_theme_options',
		'title'      => __('Layout One settings', 'yepza'),
		'active_callback' => 'yepza_front_page_sections',
		'panel'  => 'business_page',
	) );
	$wp_customize->add_setting( 'yepza_show_slider',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'yepza_sanitize_yes_no_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'yepza_show_slider',
		array(
			'label'      => __( 'Show header?', 'yepza' ),
			'settings'   => 'yepza_show_slider',
			'priority'   => 10,
			'section'    => 'business_page_layout_one',
			'type'    => 'select',
			'choices' => $yepzaYesNo,
		)
	) );

	$wp_customize->add_setting( 'yepza_welcome_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'yepza_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'yepza_welcome_post',
		array(
			'label'      => __( 'Welcome post :', 'yepza' ),
			'settings'   => 'yepza_welcome_post',
			'priority'   => 11,
			'section'    => 'business_page_layout_one',
			'type'    => 'select',
			'choices' => $yepzaPostsPagesArray,
		)
	) );
	
	$wp_customize->add_setting( 'yepza_services_cat',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'yepza_sanitize_cat_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'yepza_services_cat',
		array(
			'label'      => __( 'Select category for services :', 'yepza' ),
			'settings'   => 'yepza_services_cat',
			'priority'   => 21,
			'section'    => 'business_page_layout_one',
			'type'    => 'select',
			'choices' => $yepzaAvailableCats,
		)
	) );
	
	

	$wp_customize->add_setting( 'yepza_portfolio_cat',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'yepza_sanitize_cat_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'yepza_portfolio_cat',
		array(
			'label'      => __( 'Select category for portfolio :', 'yepza' ),
			'settings'   => 'yepza_portfolio_cat',
			'priority'   => 21,
			'section'    => 'business_page_layout_one',
			'type'    => 'select',
			'choices' => $yepzaAvailableCats,
		)
	) );
	

	$wp_customize->add_setting( 'yepza_news_cat',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'yepza_sanitize_cat_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'yepza_news_cat',
		array(
			'label'      => __( 'Select category for news :', 'yepza' ),
			'settings'   => 'yepza_news_cat',
			'priority'   => 31,
			'section'    => 'business_page_layout_one',
			'type'    => 'select',
			'choices' => $yepzaAvailableCats,
		)
	) );	
	
	
	
	
	$wp_customize->add_section( 'business_page_layout_two', array(
		'priority'       => 30,
		'capability'     => 'edit_theme_options',
		'title'      => __('Layout Two settings', 'yepza'),
		'active_callback' => 'yepza_front_page_sections',
		'panel'  => 'business_page',
	) );
	$wp_customize->add_setting( 'yepza_show_slider_two',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'yepza_sanitize_yes_no_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'yepza_show_slider_two',
		array(
			'label'      => __( 'Show header?', 'yepza' ),
			'settings'   => 'yepza_show_slider_two',
			'priority'   => 10,
			'section'    => 'business_page_layout_two',
			'type'    => 'select',
			'choices' => $yepzaYesNo,
		)
	) );
	$wp_customize->add_setting( 'yepza_two_welcome_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'yepza_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'yepza_two_welcome_post',
		array(
			'label'      => __( 'Welcome post :', 'yepza' ),
			'settings'   => 'yepza_two_welcome_post',
			'priority'   => 20,
			'section'    => 'business_page_layout_two',
			'type'    => 'select',
			'choices' => $yepzaPostsPagesArray,
		)
	) );	
	
	$wp_customize->add_setting( 'yepza_two_product_post_one',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'yepza_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'yepza_two_product_post_one',
		array(
			'label'      => __( 'Product One :', 'yepza' ),
			'settings'   => 'yepza_two_product_post_one',
			'priority'   => 30,
			'section'    => 'business_page_layout_two',
			'type'    => 'select',
			'choices' => $yepzaPostsPagesArray,
		)
	) );
	$wp_customize->add_setting( 'yepza_two_product_post_two',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'yepza_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'yepza_two_product_post_two',
		array(
			'label'      => __( 'Product Two :', 'yepza' ),
			'settings'   => 'yepza_two_product_post_two',
			'priority'   => 30,
			'section'    => 'business_page_layout_two',
			'type'    => 'select',
			'choices' => $yepzaPostsPagesArray,
		)
	) );
	$wp_customize->add_setting( 'yepza_two_product_post_three',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'yepza_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'yepza_two_product_post_three',
		array(
			'label'      => __( 'Product Three :', 'yepza' ),
			'settings'   => 'yepza_two_product_post_three',
			'priority'   => 30,
			'section'    => 'business_page_layout_two',
			'type'    => 'select',
			'choices' => $yepzaPostsPagesArray,
		)
	) );	
	

	$wp_customize->add_section( 'business_page_quote', array(
		'priority'       => 110,
		'capability'     => 'edit_theme_options',
		'title'      => __('Quote Settings', 'yepza'),
		'active_callback' => '',
		'panel'  => 'yepza_general',
	) );
	$wp_customize->add_setting( 'yepza_show_quote',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'yepza_sanitize_yes_no_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'yepza_show_quote',
		array(
			'label'      => __( 'Show quote?', 'yepza' ),
			'settings'   => 'yepza_show_quote',
			'priority'   => 10,
			'section'    => 'business_page_quote',
			'type'    => 'select',
			'choices' => $yepzaYesNo,
		)
	) );
	$wp_customize->add_setting( 'yepza_quote_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'yepza_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'yepza_quote_post',
		array(
			'label'      => __( 'Select post', 'yepza' ),
			'description' => __( 'Select a post/page you want to show in quote section', 'yepza' ),
			'settings'   => 'yepza_quote_post',
			'priority'   => 11,
			'section'    => 'business_page_quote',
			'type'    => 'select',
			'choices' => $yepzaPostsPagesArray,
		)
	) );	
	
	$wp_customize->add_section( 'business_page_social', array(
		'priority'       => 120,
		'capability'     => 'edit_theme_options',
		'title'      => __('Social Settings', 'yepza'),
		'active_callback' => '',
		'panel'  => 'yepza_general',
	) );	
	$wp_customize->add_setting( 'yepza_show_social',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'yepza_sanitize_yes_no_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'yepza_show_social',
		array(
			'label'      => __( 'Show social?', 'yepza' ),
			'settings'   => 'yepza_show_social',
			'priority'   => 10,
			'section'    => 'business_page_social',
			'type'    => 'select',
			'choices' => $yepzaYesNo,
		)
	) );
	$wp_customize->add_setting( 'business_page_facebook',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_facebook', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Facebook', 'yepza' ),
	  'description' => __( 'Enter your facebook url.', 'yepza' ),
	) );
	$wp_customize->add_setting( 'business_page_flickr',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_flickr', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Flickr', 'yepza' ),
	  'description' => __( 'Enter your flickr url.', 'yepza' ),
	) );
	$wp_customize->add_setting( 'business_page_gplus',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_gplus', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Gplus', 'yepza' ),
	  'description' => __( 'Enter your gplus url.', 'yepza' ),
	) );
	$wp_customize->add_setting( 'business_page_linkedin',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_linkedin', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Linkedin', 'yepza' ),
	  'description' => __( 'Enter your linkedin url.', 'yepza' ),
	) );
	$wp_customize->add_setting( 'business_page_reddit',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_reddit', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Reddit', 'yepza' ),
	  'description' => __( 'Enter your reddit url.', 'yepza' ),
	) );
	$wp_customize->add_setting( 'business_page_stumble',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_stumble', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Stumble', 'yepza' ),
	  'description' => __( 'Enter your stumble url.', 'yepza' ),
	) );
	$wp_customize->add_setting( 'business_page_twitter',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_twitter', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Twitter', 'yepza' ),
	  'description' => __( 'Enter your twitter url.', 'yepza' ),
	) );	
	
}
add_action( 'customize_register', 'yepza_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function yepza_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function yepza_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function yepza_customize_preview_js() {
	wp_enqueue_script( 'yepza-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'yepza_customize_preview_js' );

require get_template_directory() . '/inc/variables.php';

function yepza_sanitize_yes_no_setting( $value ){
	global $yepzaYesNo;
    if ( ! array_key_exists( $value, $yepzaYesNo ) ){
        $value = 'select';
	}
    return $value;	
}

function yepza_sanitize_post_selection( $value ){
	global $yepzaPostsPagesArray;
    if ( ! array_key_exists( $value, $yepzaPostsPagesArray ) ){
        $value = 'select';
	}
    return $value;	
}

function yepza_front_page_sections(){
	
	$value = false;
	
	if( 'page' == get_option( 'show_on_front' ) ){
		$value = true;
	}
	
	return $value;
	
}

function yepza_show_wp_header_control(){
	
	$value = false;
	
	if( 'header' == get_theme_mod( 'header_type' ) ){
		$value = true;
	}
	
	return $value;
	
}

function yepza_show_header_one_control(){
	
	$value = false;
	
	if( 'header-one' == get_theme_mod( 'header_type' ) ){
		$value = true;
	}
	
	return $value;
	
}

function yepza_sanitize_slider_type_setting( $value ){

	global $yepzaSliderType;
    if ( ! array_key_exists( $value, $yepzaSliderType ) ){
        $value = 'select';
	}
    return $value;	
	
}

function yepza_sanitize_cat_setting( $value ){
	
	global $yepzaAvailableCats;
	
	if( ! array_key_exists( $value, $yepzaAvailableCats ) ){
		
		$value = 'select';
		
	}
	return $value;
	
}

function yepza_sanitize_layout_type( $value ){
	
	global $yepzaBusinessLayoutType;
	
	if( ! array_key_exists( $value, $yepzaBusinessLayoutType ) ){
		
		$value = 'select';
		
	}
	return $value;
	
}

add_action( 'customize_register', 'yepza_load_customize_classes', 0 );
function yepza_load_customize_classes( $wp_customize ) {
	
	class yepza_Customize_Control_Upgrade extends WP_Customize_Control {

		public $type = 'yepza-upgrade';
		
		public function enqueue() {

		}

		public function to_json() {
			
			parent::to_json();

			$this->json['link']    = $this->get_link();
			$this->json['value']   = $this->value();
			$this->json['id']      = $this->id;
			$this->json['default'] = $this->default;
			
		}	
		
		public function render_content() {}
		
		public function content_template() { ?>

			<div id="yepza-upgrade-container" class="yepza-upgrade-container">

				<ul>
					<li>More sliders</li>
					<li>More layouts</li>
					<li>Color customization</li>
					<li>Font customization</li>
				</ul>

				<p>
					<a href="https://www.themealley.com/business/">Upgrade</a>
				</p>
									
			</div><!-- .yepza-upgrade-container -->
			
		<?php }	
		
	}
	
	class yepza_Customize_Control_Guide extends WP_Customize_Control {

		public $type = 'yepza-guide';
		
		public function enqueue() {

		}

		public function to_json() {
			
			parent::to_json();

			$this->json['link']    = $this->get_link();
			$this->json['value']   = $this->value();
			$this->json['id']      = $this->id;
			$this->json['default'] = $this->default;
			
		}	
		
		public function render_content() {}
		
		public function content_template() { ?>

			<div id="yepza-upgrade-container" class="yepza-upgrade-container">

				<ol>
					<li>Select 'A static page' for "your homepage displays" in 'select frontpage type' section of 'Home/Front Page settings' tab.</li>
					<li>Enter details for various section like header, welcome, services, quote, social sections.</li>
				</ol>
									
			</div><!-- .yepza-upgrade-container -->
			
		<?php }	
		
	}	

	$wp_customize->register_control_type( 'yepza_Customize_Control_Upgrade' );
	$wp_customize->register_control_type( 'yepza_Customize_Control_Guide' );
	
	
}