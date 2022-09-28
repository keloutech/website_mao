<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
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
 * @version     3.2.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post,$product;

$enable_zoom    = ( Optima()->settings->get('single_product_zoom', 'off') == 'on' ) ? 1 : 0;
$zoom_type      = Optima()->settings->get('single_product_zoom_type', 'inner');
$enable_popup    = ( Optima()->settings->get('product_popup', 'off') == 'on' ) ? 1 : 0;

if(isset($_GET['product_quickview'])){
	$enable_popup = 0;
}

$image_size = apply_filters( 'single_product_large_thumbnail_size', 'shop_single' );

?>
<div class="product--large-image woocommerce-product-gallery__image" data-zoom="<?php echo esc_attr($enable_zoom)?>" data-popup="<?php echo esc_attr($enable_popup);?>" data-zoom_type="<?php echo esc_attr($zoom_type);?>">
	<?php
	if ( has_post_thumbnail() ) {
		$props            = wc_get_product_attachment_props( get_post_thumbnail_id(), $post );
		$image       	= get_the_post_thumbnail( get_the_ID(), $image_size, array(
			'title'	 => $props['title'],
			'alt'    => $props['alt'],
		) );
		echo apply_filters(
			'woocommerce_single_product_image_html',
			sprintf(
				'<a href="%s" title="%s" class="%s" data-rel="la:productimage">%s</a>',
				esc_url( $props['url'] ),
				esc_attr( $product->get_title() ),
				($enable_popup ? 'la-popup-slideshow zoom' : ''),
				$image
			)
			, $post->ID
		);

	} else {
		echo apply_filters(
			'woocommerce_single_product_image_html',
			sprintf(
				'<a href="%1$s" class="%2$s" data-rel="la:productimage"><img src="%1$s" alt=%3$s" /></a>',
				wc_placeholder_img_src(),
				($enable_popup ? 'la-popup-slideshow zoom' : ''),
				esc_attr__( 'Placeholder', 'optima' )
			),
			$post->ID
		);
	}
	?>
</div><!-- main-image-zoom -->