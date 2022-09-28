<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
$class = array('product-item', 'grid-item', 'product');


?>
<li <?php post_class($class); ?>>
	<div class="item-inner clearfix">
		<div class="product--thumbnail item--image">
			<div class="item--image-holder">
				<a href="<?php the_permalink();?>">
					<?php woocommerce_template_loop_product_thumbnail();?>
				</a>
			</div>
		</div>
		<div class="product--info">
			<h3 class="product--title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
			<span class="price"><?php echo $product->get_price_html(); ?></span>
		</div>
	</div>
</li>