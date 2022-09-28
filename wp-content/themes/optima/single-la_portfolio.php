<?php
get_header();

the_post();

$portfolio_style = Optima()->settings->get('portfolio_design', '1');
$current_design = Optima()->settings->get_post_meta(get_the_ID(), 'portfolio_design');
if(!empty($current_design) && $current_design != 'inherit'){
    $portfolio_style = $current_design;
}
do_action( 'optima/action/before_render_main' ); ?>
<div id="main" class="site-main">
    <div class="container">
        <div class="row">
            <main id="site-content" class="<?php echo esc_attr(Optima()->layout->get_main_content_css_class('col-xs-12 site-content'))?>">
                <div class="site-content-inner">

                    <?php do_action( 'optima/action/before_render_main_inner' );?>

                    <div class="page-content">
                        <div class="single-post-content single-portfolio-content clearfix">
                            <?php

                            do_action( 'optima/action/before_render_main_content' );

                            if($portfolio_style != 'use_vc'){
                                get_template_part('templates/portfolios/single/single', $portfolio_style);
                            }
                            else{
                                the_content();
                            }
                            do_action( 'optima/action/after_render_main_content' );

                            ?>
                        </div>
                    </div>

                    <?php do_action( 'optima/action/after_render_main_inner' );?>
                </div>
            </main>
            <!-- #site-content -->
            <?php get_sidebar();?>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="portfolio-nav">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-4">
                <?php
                echo get_previous_post_link(
                    '<div class="nav-previous">%link</div>',
                    '<i class="fa-angle-left"></i>',
                    true,
                    '',
                    'la_portfolio_category'
                );
                ?>
            </div>
            <div class="col-xs-4">
                <?php
                $post_terms = wp_get_post_terms( get_the_ID(), 'la_portfolio_category' );
                if ( is_array( $post_terms ) && isset( $post_terms[0] ) && is_object( $post_terms[0] ) ) {
                    $term_id = $post_terms[0]->term_id;
                    echo '<div class="nav-parents">';
                    echo sprintf('<a href="%s"><i class="optima-icon-grid-outline"></i></a>',
                        esc_url(get_term_link($term_id, 'la_portfolio_category'))
                    );
                    echo '</div>';
                }
                ?>
            </div>
            <div class="col-xs-4">
                <?php
                echo get_next_post_link(
                    '<div class="nav-next">%link</div>',
                    '<i class="fa-angle-right"></i>',
                    true,
                    '',
                    'la_portfolio_category'
                );
                ?>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<!-- .site-main -->
<?php do_action( 'optima/action/after_render_main' ); ?>
<?php get_footer();?>