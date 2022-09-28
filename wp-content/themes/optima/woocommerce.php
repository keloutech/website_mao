<?php
if(is_singular( 'product' ) && isset($_GET['product_quickview'])){
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);
    remove_all_actions('woocommerce_after_single_product_summary');
    while ( have_posts() ) : the_post();

        wc_get_template_part( 'content', 'single-quickview' );

    endwhile;
}
else{
    get_header();
    ?>
    <?php do_action( 'optima/action/before_render_main' ); ?>
    <div id="main" class="site-main">
        <div class="container">
            <div class="row">
                <main id="site-content" class="<?php echo esc_attr(Optima()->layout->get_main_content_css_class('col-xs-12 site-content'))?>">
                    <div class="site-content-inner">

                        <?php do_action( 'optima/action/before_render_main_inner' );?>

                        <div class="page-content">
                            <?php

                            do_action( 'optima/action/before_render_main_content' );

                            if ( is_singular( 'product' ) ) {

                                while ( have_posts() ) : the_post();

                                    wc_get_template_part( 'content', 'single-product' );

                                endwhile;

                            } else { ?>

                                <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

                                    <h1 class="page-title"><?php woocommerce_page_title(); ?></h1>

                                <?php endif; ?>

                                <?php do_action( 'woocommerce_archive_description' ); ?>

                                <?php if ( have_posts() ) : ?>

                                    <?php do_action('woocommerce_before_shop_loop'); ?>

                                    <?php woocommerce_product_subcategories( array( 'before' => '<div class="product-categories-wrapper"><ul class="products catalog-grid-1 grid-items xlg-grid-4-items lg-grid-3-items md-grid-3-items sm-grid-2-items xs-grid-1-items mb-grid-1-items">', 'after' => '</ul></div>' ) ); ?>

                                    <?php woocommerce_product_loop_start(); ?>

                                    <?php while ( have_posts() ) : the_post(); ?>

                                        <?php wc_get_template_part( 'content', 'product' ); ?>

                                    <?php endwhile; // end of the loop. ?>

                                    <?php woocommerce_product_loop_end(); ?>

                                    <?php do_action('woocommerce_after_shop_loop'); ?>

                                <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => '<div class="product-categories-wrapper"><ul class="products catalog-grid-1 grid-items xlg-grid-4-items lg-grid-3-items md-grid-3-items sm-grid-2-items xs-grid-1-items mb-grid-1-items">', 'after' => '</ul></div>' ) ) ) : ?>

                                    <?php wc_get_template( 'loop/no-products-found.php' ); ?>

                                <?php endif;

                            }

                            do_action( 'optima/action/after_render_main_content' );

                            ?>
                        </div>

                        <?php do_action( 'optima/action/after_render_main_inner' );?>
                    </div>
                </main>
                <!-- #site-content -->
                <?php get_sidebar();?>
            </div>
        </div>
    </div>
    <!-- .site-main -->
    <?php do_action( 'optima/action/after_render_main' ); ?>
    <?php get_footer();?>
<?php } ?>