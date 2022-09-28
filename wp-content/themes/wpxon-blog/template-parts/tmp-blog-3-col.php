<?php
/**
 * Template Name: Blog 3 Col
 *
 * @package Wpxon_Blog
 */
get_header(); ?>
 
    <div class="main-content">
        <div class="container">
            <div id="masonry-loop" class="row"> 
                <?php  
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
	                $wpxon_post_query = new WP_Query(array( 'post_type'=> 'post','paged' => $paged ));
                    while ( $wpxon_post_query->have_posts() ) : $wpxon_post_query->the_post(); 
                        get_template_part( 'template-parts/content' );  
                    endwhile; 
                ?>  
            </div> 
            <div class="row">
                <?php wpxon_pagination($wpxon_post_query->max_num_pages,"",$paged); ?>
            </div> 
        </div>
    </div>
<?php get_footer();
