<?php
$show_cart      = (Optima_Helper::is_active_woocommerce() && Optima()->settings->get('header_show_cart') == 'yes' && !Optima()->settings->get('enable_shop_catalog_mode', false));
$show_wishlist  = (Optima_Helper::is_active_woocommerce() && Optima()->settings->get('header_show_wishlist') == 'yes' && function_exists('yith_wcwl_object_id'));
$show_search    = (Optima()->settings->get('header_show_search') == 'yes') ? true : false;
$aside_sidebar_name = apply_filters('optima/filter/aside_widget_bottom', 'aside-widget');
?>
<aside id="header_aside" class="header--aside">
    <div class="header-aside-wrapper">
        <a class="btn-aside-toggle" href="#"><i class="optima-icon-simple-close"></i></a>
        <div class="header-aside-inner">
            <nav class="header-aside-nav menu--accordion">
                <div class="nav-inner">
                    <?php
                    $menu_aside_args = array(
                        'theme_location' => 'aside-nav'
                    );
                    wp_nav_menu(array_merge(array(
                        'container' => false,
                        'menu_class' => 'menu accordion-menu'
                    ), $menu_aside_args));
                    ?>
                </div>
            </nav>
            <?php if(is_active_sidebar($aside_sidebar_name)): ?>
                <div class="header-widget-bottom">
                    <?php
                    dynamic_sidebar($aside_sidebar_name);
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</aside>
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
                    <?php if($show_search): ?>
                        <div class="header-search-form">
                            <?php get_search_form();?>
                        </div>
                    <?php endif; ?>
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
                    <div class="header-toggle-menu">
                        <a class="btn-aside-toggle" href="#"><i class="optima-icon-menu"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- #masthead -->