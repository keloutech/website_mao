<?php
$show_cart      = (Optima_Helper::is_active_woocommerce() && Optima()->settings->get('header_show_cart') == 'yes' && !Optima()->settings->get('enable_shop_catalog_mode', false));
$show_wishlist  = (Optima_Helper::is_active_woocommerce() && Optima()->settings->get('header_show_wishlist') == 'yes' && function_exists('yith_wcwl_object_id'));
$show_search    = (Optima()->settings->get('header_show_search') == 'yes') ? true : false;

$custom_text = Optima()->settings->get('header_custom_text');
$store_email = Optima()->settings->get('store_email');
$store_phone = Optima()->settings->get('store_phone');

$block_middle = (int) Optima()->settings->get('header7_block_top');

?>
<div id="top-area" class="top-area<?php if($block_middle){ echo ' has-middle-block';} ?>">
    <div class="container">
        <div class="top-area-left pull-left">
            <?php if(!empty($custom_text)) printf('<div class="top-area-customtext">%s</div>', esc_html($custom_text))?>
            <?php if(has_nav_menu('top-nav')): ?>
            <nav class="top-area-nav">
                <?php wp_nav_menu(array(
                    'theme_location' => 'top-nav',
                    'container' => false
                ));
                ?>
            </nav>
            <?php endif;?>
        </div>
        <div class="top-area-right pull-right">
            <?php
            if(!empty($store_email) || !empty($store_phone)){
                echo '<div class="la-contact-info inline-item">';
                if(!empty($store_phone)){
                    printf('<div class="la-contact-item la-contact-phone">%s</div>', esc_html($store_phone));
                }
                if(!empty($store_email)){
                    printf('<div class="la-contact-item la-contact-email">%s</div>', esc_html($store_email));
                }
                echo '</div>';
            }
            ?>
        </div>
    </div>
</div>
<?php if($block_middle): ?>
<div class="header7-middle">
    <div class="header7-middle-inner">
        <div class="container"><?php echo do_shortcode('[la_block id="'. $block_middle .'"]') ?></div>
    </div>
</div>
<?php endif;?>
<header id="masthead" class="site-header">
    <div class="site-header-inner">
        <div class="container">
            <div class="header-main clearfix">
                <div class="header-left">
                    <div class="site-branding">
                        <a href="<?php echo esc_url( home_url( '/'  ) ); ?>" rel="home">
                            <figure class="logo--normal"><?php Optima()->layout->render_logo();?></figure>
                            <figure class="logo--transparency"><?php Optima()->layout->render_transparency_logo();?></figure>
                        </a>
                    </div>
                </div>
                <div class="header-right">
                    <nav class="site-main-nav clearfix" data-container="#masthead .header-main">
                        <?php Optima()->layout->render_main_nav();?>
                    </nav>
                    <?php if($show_cart): ?>
                    <div class="header-toggle-cart">
                        <a href="<?php echo esc_url(wc_get_page_permalink('cart')) ?>"><i class="optima-icon-cart-modern"></i><span class="la-cart-count"><?php echo esc_html( WC()->cart->get_cart_contents_count() ) ?></span></a>
                        <div class="header_shopping_cart">
                            <div class="widget_shopping_cart_content">
                                <div class="cart-loading"></div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php
                    if($show_wishlist){
                        $wishlist_page_id = yith_wcwl_object_id( get_option( 'yith_wcwl_wishlist_page_id' ) );
                        if($wishlist_page_id){
                            printf(
                                '<div class="header-toggle-wishlist"><a href="%s"><i class="optima-icon-heart"></i></a></div>',
                                esc_url(get_the_permalink($wishlist_page_id))
                            );
                        }
                    }
                    ?>
                    <?php if($show_search): ?>
                    <div class="header-toggle-search">
                        <a href="#"><i class="optima-icon-zoom"></i></a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- #masthead -->