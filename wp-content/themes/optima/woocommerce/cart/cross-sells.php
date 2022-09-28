<?php
/**
 * Cross-sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cross-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if(Optima()->settings->get('crosssell_products', 'off') != 'on'){
	return;
}

if ( $cross_sells ) :

$columns = shortcode_atts(
    array('xlg'=> 1, 'lg'=> 1,'md'=> 1,'sm'=> 1,'xs'=> 1, 'mb' => 1),
    Optima()->settings->get('crosssell_products_columns')
);
$design = Optima()->settings->get('shop_catalog_grid_style', '1');
$loopCssClass = array('products','grid-items', 'la-slick-slider');
$loopCssClass[] = 'products-grid';
$loopCssClass[] = 'products-grid-' . $design;
$slide_configs = Optima_Helper::get_slick_slider_config(array_merge(array('arrows' => true), $columns));

	?>
	<div class="cross-sells">
		<div class="row">
			<div class="col-xs-12">
				<h2 class="heading--title"><?php esc_html_e( 'You may be interested in&hellip;', 'optima' ); ?></h2>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<ul class="<?php echo esc_attr(implode(' ', $loopCssClass)) ?>" data-slider_config="<?php echo esc_attr($slide_configs)?>">
					<?php foreach ( $cross_sells as $cross_sell ) : ?>

						<?php
						$post_object = get_post( $cross_sell->get_id() );

						setup_postdata( $GLOBALS['post'] =& $post_object );

						wc_get_template_part( 'content', 'product' ); ?>

					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
<?php endif;
wp_reset_postdata();
