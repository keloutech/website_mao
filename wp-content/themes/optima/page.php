<?php get_header(); ?>
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

                        if( have_posts() ):  the_post();

                            $enable_fp = Optima()->settings->get_post_meta(get_the_ID(), 'enable_fp');

                            if(Optima()->layout->get_site_layout() == 'col-1c' && ($enable_fp == 'yes' || $enable_fp == 'on')){
                                echo '<div id="la_full_page">';
                            }
                            else{
                                echo '<div class="not-active-fullpage">';
                            }

                            the_content();

                            echo '</div>';

                            wp_link_pages(
                                array(
                                    'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'optima' ) . '</span>',
                                    'after' => '</div>',
                                    'link_before' => '<span>',
                                    'link_after' => '</span>'
                                )
                            );

                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;

                        endif;

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
