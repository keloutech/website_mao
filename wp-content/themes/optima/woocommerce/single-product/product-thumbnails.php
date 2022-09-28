<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
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

global $post, $product;

if ( $attachment_ids = $product->get_gallery_image_ids() ) {

	?>
	<div class="product--thumbnails thumbnails">
		<?php
		$size_shop_single = apply_filters( 'single_product_large_thumbnail_size', 'shop_single' );
		$size_shop_thumbnail = apply_filters('single_product_small_thumbnail_size', 'shop_thumbnail');


		if (has_post_thumbnail()) {
			$main_image_full_url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
			if ($main_image_full_url) {
				$main_image_id = get_post_thumbnail_id($post->ID);
				$main_image_standard = wp_get_attachment_image_src($main_image_id, $size_shop_single);
				$main_image = wp_get_attachment_image($main_image_id, $size_shop_thumbnail);
				echo apply_filters(
					'woocommerce_single_product_image_thumbnail_html',
					sprintf(
						'<a href="%s" data-standard="%s">%s</a>',
						$main_image_full_url,
						(isset($main_image_standard[0]) ? $main_image_standard[0] : '#'),
						$main_image
					),
					$main_image_id,
					$post->ID
				);
			}
		}
        $tmp = '';
		foreach ($attachment_ids as $attachment_id) {
			$image_link = wp_get_attachment_url($attachment_id);
			if (!$image_link)
				continue;

			$image = wp_get_attachment_image($attachment_id, $size_shop_thumbnail);
			$large_image_url = wp_get_attachment_image_src($attachment_id, $size_shop_single);
            $tmp .= sprintf('<a href="%s" class="la-popup-slideshow" data-rel="la:productimage"></a>',
                $image_link
            );
			echo apply_filters(
				'woocommerce_single_product_image_thumbnail_html',
				sprintf(
					'<a href="%s" data-standard="%s">%s</a>',
					$image_link,
					(isset($large_image_url[0]) ? $large_image_url[0] : '#'),
					$image
				),
				$attachment_id,
				$post->ID
			);
		}
		?></div><div class="hide"><?php printf($tmp); ?></div><!-- .thumbnails -->
	<?php
}