<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
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
 * @version     2.0.0
 */
?>
<?php
$view_mode = Optima()->settings->get('shop_catalog_display_type', 'grid');
$columns = shortcode_atts(
    array(
        'xlg'	=> 1,
        'lg' 	=> 1,
        'md' 	=> 1,
        'sm' 	=> 1,
        'xs' 	=> 1,
        'mb' 	=> 1
    ),
    Optima()->settings->get('woocommerce_shop_page_columns')
);

$view_mode = apply_filters('optima/filter/catalog_view_mode', $view_mode);

$design = Optima()->settings->get("shop_catalog_grid_style", '1');

$loopCssClass = array();
$loopCssClass[] = 'products';
$loopCssClass[] = 'products-' . $view_mode;
$loopCssClass[] = "products-grid-{$design}";
$loopCssClass[] = 'grid-items';
foreach( $columns as $screen => $value ){
    $loopCssClass[]  =  sprintf('%s-grid-%s-items', $screen, $value);
}
?>
<div class="row">
    <div class="col-xs-12">
        <ul class="<?php echo esc_attr(implode(' ', $loopCssClass)) ?>">