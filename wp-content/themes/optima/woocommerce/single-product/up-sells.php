<?php
/**
 * Single Product Up-Sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/up-sells.php.
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
 * @version     3.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if($upsells):

$product_cols = shortcode_atts(
    array('xlg'=> 1, 'lg'=> 1,'md'=> 1,'sm'=> 1,'xs'=> 1, 'mb' => 1),
    Optima()->settings->get('upsell_products_columns')
);
$design = Optima()->settings->get('shop_catalog_grid_style', '1');
$loopCssClass = array('products','grid-items');
$loopCssClass[] = 'products-grid';
$loopCssClass[] = 'products-grid-' . $design;
foreach( $product_cols as $screen => $value ){
    $loopCssClass[]  =  sprintf('%s-grid-%s-items', $screen, $value);
}

?>
<div class="up-sells upsells up-sells-product">
    <div class="row">
        <div class="col-xs-12">
            <h3 class="related-product--title text-center"><?php esc_html_e( 'You may also like&hellip;', 'optima' ) ?></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <ul class="<?php echo esc_attr(implode(' ', $loopCssClass)) ?>">
                <?php foreach ( $upsells as $upsell ) : ?>

                    <?php
                    $post_object = get_post( $upsell->get_id() );

                    setup_postdata( $GLOBALS['post'] =& $post_object );

                    wc_get_template_part( 'content', 'product' ); ?>

                <?php endforeach; ?>
            </ul>
        </div>
	</div>
</div>
<?php endif;
wp_reset_postdata();
