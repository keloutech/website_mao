<?php
/**
 * Displays top navigation
 *
 * @package ecommerce-star
 * @since 1.0

 */
global $ecommerce_star_option;

if ( has_nav_menu( 'top' ) ) : ?>

<div class="navigation-top font-size">
<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'ecommerce-star' ); ?>">
	<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false" >
		<?php
		echo ecommerce_star_get_font( array( 'icon' => 'bars' ) );
		echo ecommerce_star_get_font( array( 'icon' => 'close' ) );
		esc_html_e( 'Menu', 'ecommerce-star' );
		?>
	</button>
	
	<?php
	if(class_exists('WooCommerce') && $ecommerce_star_option['woocommerce_category_menu']) {
	
		wp_nav_menu(
			array(
				'theme_location' => 'top',
				'menu_id'        => 'top-menu',
				'items_wrap' 		=> 	ecommerce_star_nav_wrap(),
			)
		);
	
	} else {
	
		wp_nav_menu(
			array(
				'theme_location' => 'top',
				'menu_id'        => 'top-menu',
			)
		);
		
	}
	?>

</nav><!-- #site-navigation -->

</div>	  

<!-- .navigation-top -->
<?php endif;
