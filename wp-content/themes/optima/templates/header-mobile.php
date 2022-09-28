<?php
$show_cart      = (Optima_Helper::is_active_woocommerce() && (Optima()->settings->get('header_show_cart', 'no') == 'yes')) ? true : false;
$show_search    = (Optima()->settings->get('header_show_search', 'no') == 'yes') ? true : false;
?>
<div class="site-header-mobile">
    <div class="site-header-inner">
        <div class="container">
            <div class="header-main clearfix">
                <div class="header-left">
                    <div class="site-branding">
                        <a href="<?php echo esc_url( home_url( '/'  ) ); ?>" rel="home">
                            <figure><?php Optima()->layout->render_mobile_logo();?></figure>
                        </a>
                    </div>
                </div>
                <div class="header-right">
                    <?php if($show_cart):?>
                    <div class="header-toggle-cart">
                        <a href="<?php echo esc_url(wc_get_page_permalink('cart')) ?>"><i class="optima-icon-bag"></i><span class="la-cart-count"><?php echo esc_html( WC()->cart->get_cart_contents_count() ) ?></span></a>
                        <div class="header_shopping_cart">
                            <div class="widget_shopping_cart_content">
                                <div class="cart-loading"></div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if($show_search): ?>
                        <div class="header-toggle-search">
                            <a href="#"><i class="optima-icon-zoom"></i></a>
                        </div>
                    <?php endif; ?>
                    <div class="header-toggle-mobilemenu">
                        <a class="btn-mobile-menu-trigger menu-toggle-icon" href="#"><i class="optima-icon-menu"></i></a>
                    </div>
                </div>
                <div class="mobile-menu-wrap">
                    <div id="la_mobile_nav" class="dl-menuwrapper"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .site-header-mobile -->