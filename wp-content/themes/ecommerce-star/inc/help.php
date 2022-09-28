<?php
if(!function_exists('ecommerce_star_submenu_page_callback')){
function ecommerce_star_submenu_page_callback() {
 ?>
<div class="wrap" >

	<div class="welcome-panel">
	
	<h2><?php esc_html_e("We have assembled a guide to get you started:", 'ecommerce-star'); ?> </h2>
	
	<div class="welcome-panel-column">
	
	<h2 id="getting-started"><?php esc_html_e('Getting Started', 'ecommerce-star'); ?> </h2>
	
	<br />
	<a class="button button-primary" href="<?php echo ECOMMERCE_STAR_THEME_DOC; ?>" target="_blank"><?php esc_html_e('Download Demo Content', 'ecommerce-star'); ?></a>

	<h3><?php echo esc_html__('How to install Demo :-', 'ecommerce-star'); ?></h3>
	<p><?php echo esc_html__('Download demo content .zip file. Unzip the content. Install one click demo import. Appearance-> Import Demo Data. Add Data file, customizer and settings files manually. Click import. ', 'ecommerce-star'); ?> </p>
	<p><b><?php echo esc_html__('Set Home page and main menu manually as described below.', 'ecommerce-star'); ?></b></p>
	
	<h3><?php echo esc_html__('Set Home Page :-', 'ecommerce-star'); ?></h3>
	<p><?php echo esc_html__('Settings -> Reading -> Select a static page, select home page and save settings.', 'ecommerce-star'); ?> </p>

	
	<h3><?php echo esc_html__('Create Menus :-', 'ecommerce-star'); ?></h3>
	<p><?php echo esc_html__('Appearance > Menu and Click View all locations. Theme has 2 menu areas called Top and Footer. Create and assign menus. Click save.', 'ecommerce-star'); ?> </p>			
	
	<h3><?php echo esc_html__('Add Wishlist, Compare support :-', 'ecommerce-star'); ?></h3>
	<p><?php echo esc_html__('Install YITH WishList, YITH quick view and YITH Compare plugins.', 'ecommerce-star'); ?> </p>
	
	</div>
	
	
	
	<div class="welcome-panel-column">
	
	<h2><?php esc_html_e('Next Steps', 'ecommerce-star'); ?> </h2>
	
	<h3><?php echo esc_html__('Add Header Contact and Social links :-', 'ecommerce-star'); ?></h3>
	<p><?php echo esc_html__('Customizer  -> Theme Options -> Header, Add phone, email, Work Hours Edit My Account Link', 'ecommerce-star'); ?> </p>

	<h3><?php echo esc_html__('Add sub header with Image :-', 'ecommerce-star'); ?></h3>
	<p><?php echo esc_html__('Customizer  -> Theme Options -> Sub Header.', 'ecommerce-star'); ?> </p>
	
	<h3><?php echo esc_html__('Enable / Disable WooCommerce popup cart | my account :-', 'ecommerce-star'); ?></h3>
	<p><?php echo esc_html__('Customizer  -> Theme Options -> Popup cart.', 'ecommerce-star'); ?> </p>		
	
	<h3><?php echo esc_html__('Change site layout / Sidebar positions :-', 'ecommerce-star'); ?></h3>
	<p><?php echo esc_html__('Customizer  -> Theme Options -> Layout', 'ecommerce-star'); ?> </p>
	
	<h3><?php echo esc_html__('Format UI elements :-', 'ecommerce-star'); ?></h3>
	<p><?php echo esc_html__('Customizer  -> Theme Options -> Buttons and UI elements', 'ecommerce-star'); ?> </p>		

	
	<h3><?php echo esc_html__('Change Fonts :-', 'ecommerce-star'); ?></h3>
	<p><?php echo esc_html__('Customizer  -> Theme Options -> Fonts. Change fonts', 'ecommerce-star'); ?> </p>

	
	<h3><?php echo esc_html__('Change Footer Credits / Colours :-', 'ecommerce-star'); ?></h3>
	<p><?php echo esc_html__('Customizer  -> Theme Options -> Footer. Edit text.', 'ecommerce-star'); ?> </p>
	
	</div>
	
	
	<div class="welcome-panel-column">
		<h2><?php esc_html_e('More Actions', 'ecommerce-star'); ?> </h2>
		
		<h3><?php echo esc_html__('Change Header style to box shadow | border etc: :-', 'ecommerce-star'); ?></h3>
		<p><?php echo esc_html__('Edit page. Righ hand side, you will find page options Select desired header style from page options.', 'ecommerce-star'); ?> </p>
		
		<h3><?php echo esc_html__('Creating Product pages :-', 'ecommerce-star'); ?></h3>
		<p><?php echo esc_html__('Add shortcode widget and use product shortcodes', 'ecommerce-star'); echo esc_html__(' https://docs.woocommerce.com/document/woocommerce-shortcodes/', 'ecommerce-star'); ?> </p>			
		
		<a class="button button-primary button-hero" href="<?php echo ECOMMERCE_STAR_THEME_URI; ?>" target="_blank"><?php esc_html_e('See Premium Features', 'ecommerce-star'); ?></a>		
	</div>	
	

	</div>

</div> 
 <?php
 }
}
