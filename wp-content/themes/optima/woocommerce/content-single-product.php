<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
global $product;
$product_design = Optima()->settings->get('woocommerce_product_page_design', 1);
$enable_popup    = ( Optima()->settings->get('product_popup', 'off') == 'on' ) ? 1 : 0;
?>

<div id="product-<?php the_ID(); ?>" <?php post_class('la-p-single-'. $product_design); ?>>
	<?php if($product_design == 2) : ?>
		<div class="la-single-product-page">
			<div class="row">
				<?php if($product_design == 2) : ?>
					<div class="col-xs-12 col-sm-6 p-left">
						<div class="product-main-image">
							<div class="p---large position-relative images ">
								<?php
								/**
								 * woocommerce_before_single_product_summary hook.
								 *
								 * @hooked woocommerce_show_product_sale_flash - 10
								 * @hooked woocommerce_show_product_images - 20
								 */
								do_action( 'woocommerce_before_single_product_summary' );

								if ( $attachment_ids = $product->get_gallery_image_ids() ) {
									$image_size = apply_filters( 'single_product_large_thumbnail_size', 'shop_single' );

									echo '<div class="product--thumbnails">';

									foreach ($attachment_ids as $attachment_id) {
										$props            = wc_get_product_attachment_props( $attachment_id );
										$image       	= wp_get_attachment_image( $attachment_id, $image_size, array(
											'title'	 => $props['title'],
											'alt'    => $props['alt'],
										) );
										echo apply_filters(
											'woocommerce_single_product_image_html',
											sprintf(
												'<a href="%s" title="%s" class="%s" data-rel="la:productimage">%s</a>',
												esc_url( $props['url'] ),
												esc_attr( $product->get_title() ),
												($enable_popup ? 'la-popup-slideshow' : ''),
												$image
											)
											, get_the_ID()
										);
									}

									echo '</div>';
								}

								?>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 p-right">
						<div class="la-custom-pright">
							<div class="la-custom-pright-inner">
								<div class="product--summary">
									<div class="summary entry-summary">
										<?php
										/**
										 * woocommerce_single_product_summary hook.
										 *
										 * @hooked woocommerce_template_single_title - 5
										 * @hooked woocommerce_template_single_rating - 10
										 * @hooked woocommerce_template_single_price - 10
										 * * @hooked woocommerce_template_single_meta - 10
										 * @hooked woocommerce_template_single_excerpt - 20
										 * @hooked woocommerce_template_single_add_to_cart - 30
										 * @hooked woocommerce_template_single_sharing - 50
										 */
										do_action( 'woocommerce_single_product_summary' );
										?>
									</div>
								</div>
								<div class="clearfix"></div>
								<?php woocommerce_output_product_data_tabs() ?>
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	<?php else: ?>
		<div class="row">
			<div class="col-xs-12 col-sm-6 product-main-image">
				<div class="p---large position-relative images ">
					<?php
					/**
					 * woocommerce_before_single_product_summary hook.
					 *
					 * @hooked woocommerce_show_product_sale_flash - 10
					 * @hooked woocommerce_show_product_images - 20
					 */
					do_action( 'woocommerce_before_single_product_summary' );
					do_action( 'woocommerce_product_thumbnails' );
					?>
				</div>
			</div><!-- .product--images -->
			<div class="col-xs-12 col-sm-6 product--summary">
				<div class="summary entry-summary">

					<?php
					/**
					 * woocommerce_single_product_summary hook.
					 *
					 * @hooked woocommerce_template_single_title - 5
					 * @hooked woocommerce_template_single_rating - 10
					 * @hooked woocommerce_template_single_price - 10
					 * * @hooked woocommerce_template_single_meta - 10
					 * @hooked woocommerce_template_single_excerpt - 20
					 * @hooked woocommerce_template_single_add_to_cart - 30
					 * @hooked woocommerce_template_single_sharing - 50
					 */
					do_action( 'woocommerce_single_product_summary' );
					?>

				</div>

			</div><!-- .product-summary -->
		</div>
	<?php endif; ?>

	<div class="row">
		<div class="col-xs-12">
			<?php
			/**
			 * woocommerce_after_single_product_summary hook.
			 *
			 * @hooked woocommerce_output_product_data_tabs - 10
			 * @hooked woocommerce_upsell_display - 15
			 * @hooked woocommerce_output_related_products - 20
			 */

			if($product_design == 2){
				remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
			}

			do_action( 'woocommerce_after_single_product_summary' );
			?>
		</div>
	</div>

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
