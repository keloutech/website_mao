<?php

$view_mode = Optima()->settings->get('woocommerce_shop_page_type', 'grid');


$view_mode = apply_filters('optima/filter/catalog_view_mode', $view_mode);

$per_page_array = apply_filters('optima/filter/product_per_page_array', Optima()->settings->get('product_per_page_allow', '9,15,30'));
$per_page = apply_filters('optima/filter/product_per_page', Optima()->settings->get('product_per_page_default', 9));
$per_page_array = explode(',', $per_page_array);
$per_page_array = array_map('trim', $per_page_array);
$per_page_array = array_map('absint', $per_page_array);
asort($per_page_array);
$current_url = add_query_arg(null, null);
$current_url = remove_query_arg(array('page', 'paged', 'mode_view'), $current_url);
$current_url = preg_replace('/\/page\/\d+/', '', $current_url);
?>
<div class="wc-toolbar-container">
    <div class="wc-toolbar wc-toolbar-top clearfix">
        <?php if(!is_product()): ?>
            <div class="shop-filter-toggle">
                <i class="optima-icon-menu"></i><span><?php esc_html_e('Product Filter', 'optima'); ?></span>
            </div>
            <div class="wc-toolbar-left">
                <?php woocommerce_result_count();?>
                <div class="wc-view-count">
                    <p><?php esc_html_e('Show', 'optima'); ?></p>
                    <ul><?php
                        foreach ($per_page_array as $val){?><li
                            <?php echo ($per_page == $val ? ' class="active"' : '')?>><a href="<?php echo esc_url(add_query_arg('per_page', $val, $current_url)); ?>"><?php echo sprintf( esc_html__( '%s' , 'optima'), $val ) ?></a></li>
                        <?php }
                        ?></ul>
                </div>
            </div>
            <div class="wc-toolbar-right">
                <div class="wc-view-toggle">
                <span data-view_mode="grid"<?php
                if ($view_mode == 'grid') {
                    echo ' class="active"';
                }
                ?>><i title="<?php esc_attr_e('Grid view', 'optima') ?>" class="fa-th"></i></span>
                <span data-view_mode="list"<?php
                if ($view_mode == 'list') {
                    echo ' class="active"';
                }
                ?>><i title="<?php esc_attr_e('List view', 'optima') ?>" class="fa-list"></i></span>
                </div>
                <?php woocommerce_catalog_ordering();?>
            </div>
        <?php endif; ?>
    </div><!-- .wc-toolbar -->
</div>

<?php if(is_woocommerce() && !is_product()){
    $layout = Optima()->layout->get_site_layout();
    if($layout == 'col-1c' && is_active_sidebar('sidebar-shop-filter')){
        ?>
        <div class="sidebar-product-filters">
            <a href="#" class="btn-close-sidebarfilter"><i class="optima-icon-simple-close"></i></a>
            <div class="sidebar-inner">
                <?php dynamic_sidebar('sidebar-shop-filter');?>
            </div>
        </div>
<?php
    }
}