<?php
/**
 * VW Medical Care Theme Customizer
 *
 * @package VW Medical Care
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_medical_care_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/customize-homepage/class-customize-homepage.php' );

	//add home page setting pannel
	$wp_customize->add_panel( 'vw_medical_care_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'VW Settings', 'vw-medical-care' ),
	) );

	// Layout
	$wp_customize->add_section( 'vw_medical_care_left_right', array(
    	'title'      => __( 'General Settings', 'vw-medical-care' ),
		'panel' => 'vw_medical_care_panel_id'
	) );

	$wp_customize->add_setting('vw_medical_care_theme_options',array(
        'default' => __('Right Sidebar','vw-medical-care'),
        'sanitize_callback' => 'vw_medical_care_sanitize_choices'	        
	));
	$wp_customize->add_control('vw_medical_care_theme_options',array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-medical-care'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-medical-care'),
        'section' => 'vw_medical_care_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-medical-care'),
            'Right Sidebar' => __('Right Sidebar','vw-medical-care'),
            'One Column' => __('One Column','vw-medical-care'),
            'Three Columns' => __('Three Columns','vw-medical-care'),
            'Four Columns' => __('Four Columns','vw-medical-care'),
            'Grid Layout' => __('Grid Layout','vw-medical-care')
        ),
	) );

	$wp_customize->add_setting('vw_medical_care_page_layout',array(
        'default' => __('Right Sidebar','vw-medical-care'),
        'sanitize_callback' => 'vw_medical_care_sanitize_choices'	        
	));
	$wp_customize->add_control('vw_medical_care_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-medical-care'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-medical-care'),
        'section' => 'vw_medical_care_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-medical-care'),
            'Right Sidebar' => __('Right Sidebar','vw-medical-care'),
            'One Column' => __('One Column','vw-medical-care')
        ),
	) );

	//Topbar
	$wp_customize->add_section( 'vw_medical_care_topbar', array(
    	'title'      => __( 'Topbar Settings', 'vw-medical-care' ),
		'panel' => 'vw_medical_care_panel_id'
	) );

	$wp_customize->add_setting('vw_medical_care_header_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_header_text',array(
		'label'	=> __('Add Text','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( 'Do you have any question?', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_header_search',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_medical_care_header_search',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Search','vw-medical-care'),
       'section' => 'vw_medical_care_topbar',
    ));
    
	//Slider
	$wp_customize->add_section( 'vw_medical_care_slidersettings' , array(
    	'title'      => __( 'Slider Section', 'vw-medical-care' ),
		'panel' => 'vw_medical_care_panel_id'
	) );

	$wp_customize->add_setting('vw_medical_care_slider_arrows',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_medical_care_slider_arrows',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','vw-medical-care'),
       'section' => 'vw_medical_care_slidersettings',
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'vw_medical_care_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_medical_care_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_medical_care_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'vw-medical-care' ),
			'description' => __('Slider image size (1500 x 590)','vw-medical-care'),
			'section'  => 'vw_medical_care_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//Contact us
	$wp_customize->add_section( 'vw_medical_care_contact', array(
    	'title'      => __( 'Contact us', 'vw-medical-care' ),
		'panel' => 'vw_medical_care_panel_id'
	) );

	$wp_customize->add_setting('vw_medical_care_call_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_call_text',array(
		'label'	=> __('Add Call Text','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( 'Phone No.', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_contact',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_call',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_call',array(
		'label'	=> __('Add Phone No.','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '+00 987 654 1230', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_contact',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_address_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_address_text',array(
		'label'	=> __('Add Location Text','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( 'Hospital Address', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_contact',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_address',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_address',array(
		'label'	=> __('Add Location','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '123 dummy street opp to dummy appartment, DUMMY', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_contact',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_email_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_email_text',array(
		'label'	=> __('Add Email Text','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( 'Email Address', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_contact',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_email',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_email',array(
		'label'	=> __('Add Email','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( 'example@gmail.com', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_contact',
		'type'=> 'text'
	));
    
	//Facilities section
	$wp_customize->add_section( 'vw_medical_care_facilities_section' , array(
    	'title'      => __( 'Our Facilities Section', 'vw-medical-care' ),
		'priority'   => null,
		'panel' => 'vw_medical_care_panel_id'
	) );

	$categories = get_categories();
	$cat_post = array();
	$cat_post[]= 'select';
	$i = 0;	
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_medical_care_facilities',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_medical_care_sanitize_choices',
	));
	$wp_customize->add_control('vw_medical_care_facilities',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display facilities','vw-medical-care'),
		'description' => __('Image Size (250 x 250)','vw-medical-care'),
		'section' => 'vw_medical_care_facilities_section',
	));

	//Content Craetion
	$wp_customize->add_section( 'vw_medical_care_content_section' , array(
    	'title' => __( 'Customize Home Page', 'vw-medical-care' ),
		'priority' => null,
		'panel' => 'vw_medical_care_panel_id'
	) );

	$wp_customize->add_setting('vw_medical_care_content_creation_main_control', array(
		'sanitize_callback' => 'esc_html',
	) );

	$homepage= get_option( 'page_on_front' );

	$wp_customize->add_control(	new vw_medical_care_Content_Creation( $wp_customize, 'vw_medical_care_content_creation_main_control', array(
		'options' => array(
			esc_html__( 'First select static page in homepage setting for front page.Below given edit button is to customize Home Page. Just click on the edit option, add whatever elements you want to include in the homepage, save the changes and you are good to go.','vw-medical-care' ),
		),
		'section' => 'vw_medical_care_content_section',
		'button_url'  => admin_url( 'post.php?post='.$homepage.'&action=edit'),
		'button_text' => esc_html__( 'Edit', 'vw-medical-care' ),
	) ) );

	//Footer Text
	$wp_customize->add_section('vw_medical_care_footer',array(
		'title'	=> __('Footer','vw-medical-care'),
		'panel' => 'vw_medical_care_panel_id',
	));	
	
	$wp_customize->add_setting('vw_medical_care_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_medical_care_footer_text',array(
		'label'	=> __('Copyright Text','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( 'Copyright 2019, .....', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_footer',
		'type'=> 'text'
	));	
}

add_action( 'customize_register', 'vw_medical_care_customize_register' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Medical_Care_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Medical_Care_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new VW_Medical_Care_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'VW Medical Care', 'vw-medical-care' ),
					'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-medical-care' ),
					'pro_url'  => esc_url('https://www.vwthemes.com/themes/medical-wordpress-theme/'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-medical-care-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-medical-care-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Medical_Care_Customize::get_instance();