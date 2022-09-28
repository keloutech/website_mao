<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Wpxon_Blog
 */ 
get_header();
?>
    <div class="main-content">
        <div class="container">  
            <div class="row"> 
                <div class="col-md-8">
                    <div class="row">
                        <?php 
                        if ( have_posts() ) : 
                            /* Start the Loop */
                            while ( have_posts() ) : the_post(); 
                                get_template_part( 'template-parts/content' ); 
                                // If comments are open or we have at least one comment, load up the comment template.
                                if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                                endif; 
                            endwhile; 
                        else :
                            echo '<div class="col-md-12">';
                            get_template_part( 'template-parts/content', 'none' );
                            echo '</div>';
                        endif;
                        ?>  
                    </div>
                    <div class="row mt30">
                        <?php wpxon_pagination(); ?>
                    </div> 
                </div>
                <div class="col-md-4">
                    <aside class="sidebar pdl-35-large-dis">
                        <?php get_sidebar(); ?>
                    </aside>
                </div>
            </div> 
        </div>
    </div>
<?php get_footer();
