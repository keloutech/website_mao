<?php
add_action( 'tgmpa_register', 'optima_register_required_plugins' );

if(!function_exists('optima_register_required_plugins')){

	function optima_register_required_plugins() {
		$plugins = array();

		$plugins[] = array(
			'name'					=> esc_html__('LA Studio Core','optima'),
			'slug'					=> 'lastudio-core',
			'source'				=> get_template_directory() . '/plugins/lastudio-core.zip',
			'required'				=> true,
			'version'				=> '2.0.3'
		);

		$plugins[] = array(
			'name'					=> esc_html__('WPBakery Visual Composer','optima'),
			'slug'					=> 'js_composer',
			'source'				=> get_template_directory() . '/plugins/js_composer.zip',
			'required'				=> true,
			'version'				=> '5.4.2'
		);

		$plugins[] = array(
			'name'					=> esc_html__('Optima Package Demo Data','optima'),
			'slug'					=> 'optima-demo-data',
			'source'				=> 'https://github.com/la-studioweb/optima/raw/master/optima-demo-data.zip',
			'required'				=> false,
			'version'				=> '1.1'
		);

		$plugins[] = array(
			'name'     				=> esc_html__('WooCommerce','optim
			a'),
			'slug'     				=> 'woocommerce',
			'required' 				=> false,
			'version'				=> '3.2.1'
		);

		$plugins[] = array(
			'name'					=> esc_html__('Slider Revolution','optima'),
			'slug'					=> 'revslider',
			'source'				=> get_template_directory() . '/plugins/revslider.zip',
			'required'				=> false,
			'version'				=> '5.4.6'
		);

		$plugins[] = array(
			'name'     				=> esc_html__('Envato Market', 'optima'),
			'slug'     				=> 'envato-market',
			'source'   				=> 'https://envato.github.io/wp-envato-market/dist/envato-market.zip',
			'required' 				=> false,
			'version' 				=> '1.0.0-RC2'
		);

		$plugins[] = array(
			'name' 					=> esc_html__('Contact Form 7', 'optima'),
			'slug' 					=> 'contact-form-7',
			'required' 				=> false
		);

		$plugins[] = array(
			'name'     				=> esc_html__('YITH WooCommerce Wishlist','optima'),
			'slug'     				=> 'yith-woocommerce-wishlist',
			'required' 				=> false
		);
		$plugins[] = array(
			'name'     				=> esc_html__('Instagram Feed','optima'),
			'slug'     				=> 'instagram-feed',
			'required' 				=> false
		);
		$plugins[] = array(
			'name' 					=> esc_html__('Easy Forms for MailChimp by YIKES', 'optima'),
			'slug' 					=> 'yikes-inc-easy-mailchimp-extender',
			'required' 				=> false
		);

		$config = array(
			'id'           				=> 'optima',
			'default_path' 				=> '',
			'menu'         				=> 'tgmpa-install-plugins',
			'has_notices'  				=> true,
			'dismissable'  				=> true,
			'dismiss_msg'  				=> '',
			'is_automatic' 				=> false,
			'message'      				=> ''
		);

		tgmpa( $plugins, $config );

	}

}