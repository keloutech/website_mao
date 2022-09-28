<?php get_header(); ?>
<?php do_action( 'optima/action/before_render_main' ); ?>
<div id="main" class="site-main">
    <div class="container">
        <div class="row">
            <main id="site-content" class="<?php echo esc_attr(Optima()->layout->get_main_content_css_class('col-xs-12 site-content'))?>">
                <div class="site-content-inner">
                    <?php
                    do_action( 'optima/action/before_render_main_inner' );
                    ?>
                    <div id="blog_content_container" class="main--loop-container">
                        <?php
                        do_action( 'optima/action/before_render_main_content' );

                        if(have_posts()){

                            do_action('optima/action/before_main_loop');

                            while(have_posts()){
                                the_post();
                                get_template_part('content', 'search');
                            }

                            do_action('optima/action/after_main_loop');

                        }

                        else{
                            get_template_part('content','none');
                        }

                        /**
                         * Display pagination and reset loop
                         */

                        optima_the_pagination();

                        wp_reset_postdata();

                        ?>

                        <?php
                        do_action( 'optima/action/after_render_main_content' );
                        ?>

                    </div>

                    <?php
                    do_action( 'optima/action/after_render_main_inner' );
                    ?>
                </div>
            </main>
            <?php get_sidebar();?>
        </div>
    </div>
</div>
<?php do_action( 'optima/action/after_render_main' ); ?>
<?php get_footer();?>