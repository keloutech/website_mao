<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

if(!class_exists('Optima_WooCommerce')) {

    class Optima_WooCommerce{

        public static $shop_page_id = -1;

        public function __construct(){

            if(!class_exists('WooCommerce')) return;

            self::$shop_page_id = wc_get_page_id('shop');

            add_filter('optima/get_site_layout', array( $this, 'set_site_layout') );
            add_filter('optima/filter/sidebar_primary_name', array( $this, 'set_sidebar_for_shop'), 20 );
            add_filter('optima/setting/get_setting_by_context', array( $this, 'override_setting_by_context'), 20, 3);

            add_action('init', array( $this, 'set_cookie_default' ), 1 );
            add_action('init', array( $this, 'custom_handling_empty_cart' ), 1 );

            add_filter('body_class', array( $this, 'add_body_class' ), 999 );
            add_filter('woocommerce_add_to_cart_fragments', array( $this, 'modify_ajax_cart_fragments'));

            /**
             * In Plugin
             */
            add_filter('woocommerce_show_page_title', '__return_false');
            add_action('woocommerce_after_single_product', array( $this, 'add_script_to_quickview'));
            add_action('yith_woocompare_after_main_table', array( $this, 'add_script_to_compare'));
            add_action('init', array( $this, 'disable_plugin_hooks'));

            add_filter('woocommerce_placeholder_img_src', array( $this, 'change_placeholder') );
            /**
             * In Loop
             */


            /** FOR CATALOG */
            add_filter('subcategory_archive_thumbnail_size', array( $this, 'modifyProductThumbnailSize') );
            add_action('woocommerce_before_subcategory_title', create_function('', ' echo "<div class=\"cat-img\">";'), 9);
            add_action('woocommerce_before_subcategory_title', array( $this, 'add_script_resize_image_in_loop' ), 9 );
            add_action('woocommerce_before_subcategory_title', array( $this, 'add_shop_now_to_catalog'), 10);
            add_action('woocommerce_before_subcategory_title', array( $this, 'remove_script_resize_image_in_loop' ), 11 );
            add_action('woocommerce_before_subcategory_title', create_function('', ' echo "</div>";'), 11);
            add_action('woocommerce_shop_loop_subcategory_title', create_function('', ' echo "<div class=\"cat-information\">";'), 1);
            add_action('woocommerce_shop_loop_subcategory_title', array( $this, 'add_desc_to_catalog'), 11);
            add_action('woocommerce_shop_loop_subcategory_title', array( $this, 'add_shop_now_to_catalog'), 15);
            add_action('woocommerce_shop_loop_subcategory_title', create_function('', ' echo "</div>";'), 20);


            /** END FOR CATALOG */

            remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
            remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);

            remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
            remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
            remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
            remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);

            add_filter('single_product_archive_thumbnail_size', array( $this, 'modifyProductThumbnailSize') );

            add_filter('loop_shop_per_page', array($this,'changePerPageDefault'));
            add_action('woocommerce_before_shop_loop', array( $this, 'renderToolbar') );

            add_action('product_cat_class', array( $this, 'addClassToProductCategoryItem' ), 10, 3 );
            add_filter('post_class', array( $this, 'addPostClassToLoop'), 30, 3 );

            add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 1 );
            add_action('woocommerce_before_shop_loop_item_title', array( $this, 'add_script_resize_image_in_loop' ), 1 );
            add_action('woocommerce_before_shop_loop_item_title', array( $this, 'add_second_thumbnail_to_loop' ), 10 );
            add_action('woocommerce_before_shop_loop_item_title', create_function('', ' echo "<div class=\"item--overlay\"></div>";'), 20 );
            add_action('woocommerce_before_shop_loop_item_title', array( $this, 'remove_script_resize_image_in_loop' ), 21 );
            add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 30 );
            add_action('woocommerce_before_shop_loop_item_title', array( $this, 'add_quick_view_btn' ), 60 );

            add_action('woocommerce_shop_loop_item_title', array( $this, 'shop_loop_item_title' ), 10 );
            add_action('woocommerce_after_shop_loop_item_title', array( $this, 'shop_loop_item_excerpt' ), 15 );

            add_action('optima/action/shop_loop_item_action', create_function('', ' echo "<div class=\"wrap-addto\">";'), 4 );
            add_action('optima/action/shop_loop_item_action', array( $this, 'add_quick_view_btn' ), 10 );
            add_action('optima/action/shop_loop_item_action', array( $this, 'add_wishlist_btn' ), 15 );
            add_action('optima/action/shop_loop_item_action', array( $this, 'add_compare_btn' ), 16 );
            add_action('optima/action/shop_loop_item_action', create_function('', 'echo "</div>";'), 20 );

            add_action('optima/action/shop_loop_item_action', 'woocommerce_template_loop_add_to_cart', 20 );

            /**
             * Product Page
             */
            add_action('wp_head', array($this, 'checkConditionShowUpsellAndCrosssell'));

            add_action('woocommerce_before_single_product_summary', array( $this, 'addCountUpTimerToSingleProduct' ), 30);

            add_action('woocommerce_single_product_summary', array( $this, 'add_wishlist_btn' ), 45);
            add_action('woocommerce_single_product_summary', array( $this, 'add_compare_btn' ), 45);

            remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
            add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 25);


            add_filter('woocommerce_product_description_heading', '__return_empty_string');
            add_filter('woocommerce_product_additional_information_heading', '__return_empty_string');

            add_filter('woocommerce_product_tabs', array( $this, 'addCustomTabs'));


            /**
             * Cart Page
             */
            add_action('woocommerce_before_cart', array( $this, 'addProgressBarToCartPage' ), 10 );

            /**
             * Checkout
             */
            add_action('wp_head', array( $this, 'addProgressBarToCheckoutPage' ), 10 );

        }

        public function add_body_class($classes){

            return $classes;
        }

        public function set_site_layout($layout){
            if(is_checkout() || is_cart()){
                $layout = 'col-1c';
            }
            if (!is_user_logged_in() && is_account_page()) {
                $layout = 'col-1c';
            }
            return $layout;
        }

        public function set_sidebar_for_shop( $sidebar ){

            $context = (array) Optima()->get_current_context();

            if( in_array( 'is_woocommerce', $context ) ){
                if(in_array( 'is_archive', $context ) ){

                    $sidebar = Optima()->settings->get('shop_sidebar', $sidebar);

                    if(Optima()->settings->get('shop_global_sidebar', false)){
                        /*
                         * Return global sidebar if option will be enable
                         * We don't need more checking in context
                         */
                        return $sidebar;
                    }

                    if(in_array( 'is_shop', $context)){
                        if( $single_sidebar = Optima()->settings->get_post_meta( Optima()->get_page_id(), 'sidebar') && !empty($single_sidebar) ){
                            $sidebar = $single_sidebar;
                        }
                    }
                    if(in_array( 'is_product_taxonomy', $context)){
                        if( $tax_sidebar = Optima()->settings->get_term_meta( get_queried_object_id(), 'sidebar') && !empty($tax_sidebar) ){
                            $sidebar = $tax_sidebar;
                        }
                    }
                }

                elseif(in_array('is_product', $context)){
                    $sidebar = Optima()->settings->get('products_sidebar', $sidebar);

                    if(Optima()->settings->get('products_global_sidebar', false)){
                        /*
                         * Return global sidebar if option will be enable
                         * We don't need more checking in context
                         */
                        return $sidebar;
                    }
                    if( $single_sidebar = Optima()->settings->get_post_meta( get_the_ID(), 'sidebar') && !empty($single_sidebar) ){
                        $sidebar = $single_sidebar;
                    }
                }
            }

            return $sidebar;
        }

        public function custom_handling_empty_cart(){
            if (isset($_REQUEST['clear-cart'])) {
                global $woocommerce;
                $woocommerce->cart->empty_cart();
            }
        }

        public function change_placeholder($src){
            return esc_url( get_template_directory_uri() . '/assets/images/wc-placeholder.png' );
        }

        /*
         * Loop
         */

        public function renderToolbar(){
            wc_get_template( 'loop/toolbar.php' );
        }

        public function addClassToProductCategoryItem( $classes, $class, $category ){
            $classes[] = 'grid-item';
            return $classes;
        }

        public function add_shop_now_to_catalog(){
            echo '<span>'. esc_html__('Shop Now', 'optima') .'</span>';
        }

        public function add_desc_to_catalog( $category ){
            if(!empty($category->description)){
                printf(
                    '<div class="cat-des">%s</div>',
                    esc_html(wp_trim_words($category->description, 5))
                );
            }
        }

        public function addPostClassToLoop($classes, $class, $post_id){
            if ( ! $post_id || 'product' !== get_post_type( $post_id ) ) {
                return $classes;
            }

            global $optima_loop;
            $product = wc_get_product( $post_id );

            if ( $product ) {

                $show_image = false;
                if( 'on' == Optima()->settings->get('woocommerce_enable_crossfade_effect') ){
                    $show_image = true;
                }
                if(isset($optima_loop['disable_alt_image']) && true == $optima_loop['disable_alt_image']){
                    $show_image = false;
                }
                if($show_image && (($galleries = $product->get_gallery_image_ids()) && !empty($galleries[0]))){
                    $classes[] = 'thumb-has-effect';
                }else{
                    $classes[] = 'thumb-no-effect';
                }
                $classes[] = 'prod-rating-' . esc_attr(Optima()->settings->get('woocommerce_show_rating_on_catalog', 'off'));
            }

            return $classes;
        }

        public function add_script_resize_image_in_loop(){
            global $optima_loop;
            if(!empty($optima_loop['image_size'])) {
                Optima()->images->before_resize();
            }
        }

        public function remove_script_resize_image_in_loop(){
            global $optima_loop;
            if(!empty($optima_loop['image_size'])) {
                Optima()->images->after_resize();
            }
        }

        public function modifyProductThumbnailSize($size){
            global $optima_loop;
            if(!empty($optima_loop['image_size'])){
                return $optima_loop['image_size'];
            }
            return $size;
        }

        public function add_second_thumbnail_to_loop(){
            global $optima_loop, $product;
            $show_image = false;
            if( 'on' == Optima()->settings->get('woocommerce_enable_crossfade_effect') ){
                $show_image = true;
            }
            if(isset($optima_loop['disable_alt_image']) && true == $optima_loop['disable_alt_image']){
                $show_image = false;
            }
            if($show_image){
                $ids = $product->get_gallery_image_ids();
                if(!empty($ids) && isset($ids[0])){
                    echo wp_get_attachment_image( $ids[0], apply_filters( 'single_product_archive_thumbnail_size', 'shop_catalog' ) ,false , array('class'=>'wp-alt-image'));
                }
            }
        }

        public function add_quick_view_btn(){
            if( 'on' == Optima()->settings->get('woocommerce_show_quickview_btn', 'off') ){
                global $product;
                printf(
                    '<a class="%s" href="%s" data-href="%s" title="%s">%s</a>',
                    'quickview button la-quickview-button',
                    esc_url(get_the_permalink($product->get_id())),
                    esc_url(add_query_arg('product_quickview', $product->get_id(), get_the_permalink($product->get_id()))),
                    esc_attr__('Quick View', 'optima'),
                    esc_attr__('Quick View', 'optima')
                );
            }
        }

        public function add_compare_btn(){
            global $yith_woocompare, $product;
            if (!empty($yith_woocompare->obj) && Optima()->settings->get('woocommerce_show_compare_btn', 'off') == 'on') {

                $action_add = 'yith-woocompare-add-product';
                if (is_object($yith_woocompare->obj) && get_class($yith_woocompare->obj) == 'YITH_Woocompare_Frontend') {
                    $action_add = $yith_woocompare->obj->action_add;
                }
                $url_args = array('action' => $action_add, 'id' => $product->get_id());
                $url = apply_filters('yith_woocompare_add_product_url', wp_nonce_url(add_query_arg($url_args), $action_add));

                printf(
                    '<a class="%s" href="%s" title="%s" rel="nofollow" data-product_title="%s" data-product_id="%s">%s</a>',
                    'add_compare button',
                    esc_url($url),
                    esc_attr('Add to Compare', 'optima'),
                    esc_attr($product->get_title()),
                    esc_attr($product->get_id()),
                    esc_attr('Add to Compare', 'optima')
                );
            }
        }

        public function add_wishlist_btn(){

            if (function_exists('YITH_WCWL') && Optima()->settings->get('woocommerce_show_wishlist_btn', 'off') == 'on') {
                global $product;
                $default_wishlists = is_user_logged_in() ? YITH_WCWL()->get_wishlists(array('is_default' => true)) : false;
                if (!empty($default_wishlists)) {
                    $default_wishlist = $default_wishlists[0]['ID'];
                } else {
                    $default_wishlist = false;
                }

                if (YITH_WCWL()->is_product_in_wishlist($product->get_id(), $default_wishlist)) {
                    $text = esc_html__('View Wishlist', 'optima');
                    $class = 'add_wishlist button added';
                    $url = YITH_WCWL()->get_wishlist_url('');
                } else {
                    $text = esc_html__('Add to Wishlist', 'optima');
                    $class = 'add_wishlist button';
                    $url = add_query_arg('add_to_wishlist', $product->get_id(), YITH_WCWL()->get_wishlist_url(''));
                }

                printf(
                    '<a class="%s" href="%s" title="%s" rel="nofollow" data-product_title="%s" data-product_id="%s">%s</a>',
                    esc_attr($class),
                    esc_url($url),
                    esc_attr($text),
                    esc_attr($product->get_title()),
                    esc_attr($product->get_id()),
                    esc_attr($text)
                );
            }
        }


        public function shop_loop_item_title(){
            the_title( sprintf( '<h3 class="product--title"><a href="%s">', esc_url( get_the_permalink() ) ), '</a></h3>' );
        }

        public function shop_loop_item_excerpt(){
            echo '<div class="item--excerpt">';
            the_excerpt();
            echo '</div>';
        }

        public function changePerPageDefault($cols){
            $per_page_array = apply_filters('optima/filter/product_per_page_array', Optima()->settings->get('product_per_page_allow', '9,15,30'));
            $per_page = apply_filters('optima/filter/product_per_page', Optima()->settings->get('product_per_page_default', 9));
            $per_page_array = explode(',', $per_page_array);
            $per_page_array = array_map('trim', $per_page_array);
            $per_page_array = array_map('absint', $per_page_array);
            asort($per_page_array);
            if (count($per_page_array) > 0 && in_array($per_page, $per_page_array)) {
                $cols = $per_page;
            }
            return $cols;
        }

        public function set_cookie_default(){
            if (isset($_GET['per_page']) && $per_page = $_GET['per_page']) {
                add_filter('optima/filter/product_per_page', array( $this, 'getParameterPerPage'));
            }
        }

        public function getParameterPerPage($per_page) {
            if (isset($_GET['per_page']) && ($_per_page = $_GET['per_page'])) {
                $per_page = $_per_page;
            }
            return $per_page;
        }
        /*
         * Single
         */

        public function addCountUpTimerToSingleProduct(){
            if(!isset($_GET['product_quickview']) && Optima()->settings->get('show_product_countdown')){
                global $product;
                if(!empty($product->sale_price_dates_to)){
                    echo do_shortcode('[la_countdown countdown_opts="sday,shr,smin,ssec" datetime="'. date('Y/m/d H:i:s', $product->sale_price_dates_to) .'"]');
                }
            }
        }

        public function checkConditionShowUpsellAndCrosssell(){
            if ( Optima()->settings->get('related_products', 'off') != 'on' ) {
                remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
            }
            if ( Optima()->settings->get('upsell_products', 'off') != 'on' ) {
                remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
            }
        }

        public function addCustomTabs($tabs){
            if ( Optima()->settings->get('woocommerce_product_enable_customtab', 'off') == 'on' ) {
                $tabs['custom_tab'] = array(
                    'title' => Optima()->settings->get('woocommerce_product_customtab_title', ''),
                    'priority' => 50,
                    'callback' => array( $this, 'getCustomTabsContent')
                );
            }
            return $tabs;
        }

        public function getCustomTabsContent(){
            echo Optima_Helper::remove_js_autop( Optima()->settings->get('woocommerce_product_customtab_content', ''));
        }

        public function add_script_to_quickview(){
            global $product;
            if (isset($_GET['product_quickview']) && is_product() && $product->is_type('variable')) {
                wp_print_scripts('underscore');
                wc_get_template('single-product/add-to-cart/variation.php');
                ?>
                <script type="text/javascript">
                    /* <![CDATA[ */
                    var _wpUtilSettings = <?php echo json_encode(array(
                        'ajax' => array('url' => admin_url( 'admin-ajax.php', 'relative' ))
                    ));?>;
                    var wc_add_to_cart_variation_params = <?php echo json_encode(array(
                        'i18n_no_matching_variations_text' => esc_attr__( 'Sorry, no products matched your selection. Please choose a different combination.', 'optima' ),
                        'i18n_make_a_selection_text'       => esc_attr__( 'Select product options before adding this product to your cart.', 'optima' ),
                        'i18n_unavailable_text'            => esc_attr__( 'Sorry, this product is unavailable. Please choose a different combination.', 'optima' )
                    )); ?>;
                    /* ]]> */
                </script>
                <script type="text/javascript" src="<?php echo esc_url(includes_url('js/wp-util.min.js')) ?>"></script>
                <script type="text/javascript" src="<?php echo esc_url(WC()->plugin_url()) . '/assets/js/frontend/add-to-cart-variation.min.js' ?>"></script>
                <?php
            }
        }
        public function add_script_to_compare(){
            echo '<script type="text/javascript">var redirect_to_cart=true;</script>';
        }

        /*
         * Cart
         */

        public function modify_ajax_cart_fragments( $fragments ){
            $fragments['span.la-cart-count'] = sprintf('<span class="la-cart-count">%s</span>', WC()->cart->get_cart_contents_count());
            $text = '<span class="la-cart-text">'. esc_html__('%s items', 'optima') .'</span>';
            $fragments['span.la-cart-text'] = sprintf($text, WC()->cart->get_cart_contents_count());
            $fragments['span.la-cart-total-price'] = sprintf('<span class="la-cart-total-price">%s</span>', WC()->cart->get_cart_total());
            return $fragments;
        }


        public function addProgressBarToCartPage(){
            ?>
            <div class="row section-checkout-step">
                <div class="col-xs-12">
                    <ul>
                        <li class="step-1 first"><span class="step-num optima-icon-cart-modern-in"></span><span class="step-name"><?php esc_html_e('Your Cart', 'optima') ?></span>
                        </li><li class="step-2"><span class="step-num optima-icon-card-edit"></span><span class="step-name"><?php esc_html_e('Check out', 'optima') ?></span>
                        </li><li class="step-3 last"><span class="step-num optima-icon-card-edit"></span><span class="step-name"><?php esc_html_e('order complete', 'optima') ?></span></li>
                    </ul>
                </div>
            </div>
            <?php
        }
        /*
         * Checkout
         */

        public function addProgressBarToCheckoutPage(){
            if(is_checkout()){
                add_action('optima/action/before_render_main_content', array( $this, 'addProgressBarToCartPage' ), 999 );
            }
        }

        /*
         * Other
         */
        public function disable_plugin_hooks() {
            global $yith_wcwl, $yith_woocompare;
            if (is_object($yith_wcwl) && is_object($yith_wcwl->wcwl_init) && get_class($yith_wcwl->wcwl_init) == 'YITH_WCWL_Init') {
                remove_action('wp_head', array($yith_wcwl->wcwl_init, 'add_button'));
            }
            if (is_object($yith_woocompare) && is_object($yith_woocompare->obj) && get_class($yith_woocompare->obj) == 'YITH_Woocompare_Frontend') {
                remove_action('woocommerce_single_product_summary', array($yith_woocompare->obj, 'add_compare_link'), 35);
                remove_action('woocommerce_after_shop_loop_item', array($yith_woocompare->obj, 'add_compare_link'), 20);
            }
        }

        /**
         * @Todo We need check override setting from shop global
         */
        public function override_setting_by_context( $value, $key, $context ){
            if(!in_array('is_woocommerce', $context)){
                return $value;
            }
            /*
             * The first, we need check page title bar
             */
            $value = $this->override_page_title_bar_setting( $value, $key, $context );
            return $value;
        }

        private function override_page_title_bar_setting( $value, $key, $context ){

            if(!in_array('is_product_taxonomy', $context) && !in_array('is_product', $context) && !in_array('is_shop', $context)){
                return $value;
            }

            $array_key_allow = array(
                'page_title_bar_style',
                'page_title_bar_layout',
                'page_title_bar_background',
                'page_title_bar_heading_color',
                'page_title_bar_text_color',
                'page_title_bar_link_color',
                'page_title_bar_link_hover_color',
                'page_title_bar_spacing',
                'page_title_bar_spacing_tablet',
                'page_title_bar_spacing_mobile'
            );
            $arr2 = array(
                'page_title_bar_background',
                'page_title_bar_heading_color',
                'page_title_bar_text_color',
                'page_title_bar_link_color',
                'page_title_bar_link_hover_color',
                'page_title_bar_spacing',
                'page_title_bar_spacing_tablet',
                'page_title_bar_spacing_mobile'
            );

            if( !in_array($key, $array_key_allow) ){
                return $value;
            }

            $func = 'get_post_meta';
            $current_id = get_queried_object_id();
            if(in_array('is_product_taxonomy', $context)){
                $func = 'get_term_meta';
            }
            if(in_array('is_shop', $context)){
                $current_id = self::$shop_page_id;
            }
            if($key == 'page_title_bar_layout'){
                $new_value = Optima()->settings->$func($current_id, $key);
                if($new_value != 'inherit'){
                    return $new_value;
                }
            }
            if( Optima()->settings->$func($current_id, 'page_title_bar_style') == 'yes' && in_array($key, $arr2)){
                return $value;
            }
            $enable_override = Optima()->settings->get('woo_override_page_title_bar', 'off');
            if($enable_override == 'on'){
                $new_key = 'woo_' . $key;
                return Optima()->settings->get($new_key, $value);
            }
            return $value;
        }
    }
}