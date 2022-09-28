<?php
$show_cart      = (Optima_Helper::is_active_woocommerce() && Optima()->settings->get('header_show_cart') == 'yes' && !Optima()->settings->get('enable_shop_catalog_mode', false));
$show_wishlist  = (Optima_Helper::is_active_woocommerce() && Optima()->settings->get('header_show_wishlist') == 'yes' && function_exists('yith_wcwl_object_id'));
$show_search    = (Optima()->settings->get('header_show_search') == 'yes') ? true : false;
$show_social    = (Optima()->settings->get('header_show_social') == 'yes') ? true : false;
?>

<header id="masthead" class="site-header">
    <div class="site-header-inner">
        <div class="container">
            <div id="top-area" class="top-area clearfix">
                <div class="top-area-left pull-left">
                    <?php
                    if($show_social){
                        optima_get_social_media();
                    }
                    ?>
                </div>
                <div class="top-area-right pull-right">
                    <nav class="top-area-nav">
                        <?php wp_nav_menu(array(
                            'theme_location' => 'top-nav',
                            'container' => false
                        ));
                        ?>
                    </nav>
                </div>
            </div>
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
                    <div class="header-right-toggle">
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
    </div>
</header>
<!-- #masthead -->