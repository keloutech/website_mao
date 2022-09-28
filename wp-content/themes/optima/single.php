<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
?>
<?php get_header(); ?>

<?php do_action( 'optima/action/before_render_main' ); ?>

<?php
$enable_related = Optima()->settings->get('blog_related_posts', 'off');
$related_style = Optima()->settings->get('blog_related_design', 1);
$max_related = (int) Optima()->settings->get('blog_related_max_post', 1);
$related_by = Optima()->settings->get('blog_related_by', 'category');
?>

<div id="main" class="site-main">
    <div class="container">
        <div class="row">
            <main id="site-content" class="<?php echo esc_attr(Optima()->layout->get_main_content_css_class('col-xs-12 site-content'))?>">
                <div class="site-content-inner">

                    <?php do_action( 'optima/action/before_render_main_inner' );?>

                    <div class="page-content">

                        <div class="single-post-detail clearfix">
                            <?php

                            do_action( 'optima/action/before_render_main_content' );

                            if( have_posts() ):  the_post(); ?>

                                <article id="post-<?php the_ID(); ?>" <?php post_class('single-post-content'); ?>>
                                    <?php
                                    if('above' == Optima()->settings->get('blog_post_title')){
                                        the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header>' );
                                    }
                                    ?>
                                    <?php
                                        if(Optima()->settings->get('featured_images_single') == 'on'){
                                            optima_single_post_thumbnail();
                                        }
                                    ?>
                                    <?php
                                        if('below' == Optima()->settings->get('blog_post_title') ){
                                            the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header>' );
                                        }
                                    ?>

                                    <div class="entry-meta clearfix"><?php optima_entry_meta();?></div><!-- .entry-meta -->

                                    <div class="entry-content">
                                        <?php

                                        the_content( sprintf(
                                            esc_html__( 'Continue reading %s', 'optima' ),
                                            the_title( '<span class="screen-reader-text">', '</span>', false )
                                        ) );

                                        wp_link_pages( array(
                                            'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'optima' ) . '</span>',
                                            'after'       => '</div>',
                                            'link_before' => '<span>',
                                            'link_after'  => '</span>',
                                            'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'optima' ) . ' </span>%',
                                            'separator'   => '<span class="screen-reader-text">, </span>',
                                        ) );
                                        ?>
                                    </div><!-- .entry-content -->

                                    <footer class="entry-footer">
                                        <div class="entry-meta-footer clearfix">
                                            <?php the_tags('<span class="tags-list"><i class="fa fa-tags"></i>',', ','</span>') ;?>
                                            <?php
                                            if(Optima()->settings->get('blog_social_sharing_box') == 'on'){
                                                echo '<div class="la-sharing-posts"><span class="m-sharing-box"><i class="fa fa-share-alt"></i></span>';
                                                optima_social_sharing(get_the_permalink(), get_the_title(), (has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : ''));
                                                echo '</div>';
                                            }
                                            ?>
                                        </div>

                                        <?php edit_post_link( null, '<span class="edit-link hidden">', '</span>' ); ?>

                                    </footer><!-- .entry-footer -->

                                </article><!-- #post-## -->

                            <?php

                                if(Optima()->settings->get('blog_pn_nav') == 'on'){
                                    the_post_navigation( array(
                                        'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Next article', 'optima' ) . '</span> ' .
                                            '<span class="post-title">%title</span>',
                                        'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Previous article', 'optima' ) . '</span> ' .
                                            '<span class="post-title">%title</span>'
                                    ) );
                                    echo '<div class="clearfix"></div>';
                                }

                                if(Optima()->settings->get('blog_author_info') == 'on'){
                                    get_template_part( 'author-bio' );
                                }

                                if(Optima()->settings->get('blog_comments') == 'on' && ( comments_open() || get_comments_number() ) ){
                                    comments_template();
                                }

                            endif;

                            do_action( 'optima/action/after_render_main_content' );

                            wp_reset_postdata();

                            if($enable_related == 'on'){
                                $related_args = array(
                                    'posts_per_page' => $max_related,
                                    'post__not_in' => array( get_the_ID() )
                                );
                                if($related_by == 'random'){
                                    $related_args['orderby'] = 'rand';
                                }
                                if($related_by == 'category'){
                                    $cats = wp_get_post_terms( get_the_ID(), 'category' );
                                    if ( is_array( $cats ) && isset( $cats[0] ) && is_object( $cats[0] ) ) {
                                        $related_args['category__in'] = array($cats[0]->term_id);
                                    }
                                }
                                if($related_by == 'tag'){
                                    $tags = wp_get_post_terms( get_the_ID(), 'tag' );
                                    if ( is_array( $tags ) && isset( $tags[0] ) && is_object( $tags[0] ) ) {
                                        $related_args['tag__in'] = array($tags[0]->term_id);
                                    }
                                }
                                if($related_by == 'both'){
                                    $cats = wp_get_post_terms( get_the_ID(), 'category' );
                                    if ( is_array( $cats ) && isset( $cats[0] ) && is_object( $cats[0] ) ) {
                                        $related_args['category__in'] = array($cats[0]->term_id);
                                    }
                                    $tags = wp_get_post_terms( get_the_ID(), 'tag' );
                                    if ( is_array( $tags ) && isset( $tags[0] ) && is_object( $tags[0] ) ) {
                                        $related_args['tag__in'] = array($tags[0]->term_id);
                                    }
                                }

                                $related_query = new WP_Query($related_args);
                            }

                            if($enable_related == 'on' && ($related_style == 1 || $related_style == 2)){

                                if($related_query->have_posts()){

                                    printf('<hr/><h3 class="title-related">%s</h3>', esc_html__('Related Post', 'optima'));
                                    $classes = array('la-related-posts');
                                    $classes[] = 'style-' . $related_style;
                                    if($related_style == 2){
                                        $classes[] = 'la-slick-slider';
                                        $classes[] = 'showposts-loop';
                                    }

                                    echo '<div class="'.esc_attr(implode(' ', $classes) ).'">';

                                    while($related_query->have_posts()) {
                                        $related_query->the_post();
                                        ?>
                                        <div class="post-item">
                                            <?php if(has_post_thumbnail()):?>
                                                <div class="item-thumbnail">
                                                    <a href="<?php the_permalink();?>"><?php the_post_thumbnail('thumbnail');?></a>
                                                </div>
                                            <?php endif;?>
                                            <div class="item-info">
                                                <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                                                <div class="entry-meta">
                                                    <?php
                                                    optima_entry_meta_item_postdate();
                                                    optima_entry_meta_item_author();
                                                    ?>
                                                </div>
                                                <div class="entry-excerpt"><?php
                                                    if($related_style == 1){
                                                        add_filter('excerpt_length', create_function('','return 10;'), 1010);
                                                    }
                                                    the_excerpt();
                                                    if($related_style == 1){
                                                        remove_all_filters('excerpt_length', 1010);
                                                    }
                                                ?></div>
                                                <?php if( $related_style == 2 ):?>
                                                    <footer class="entry-meta-footer clearfix">
                                                        <a class="link-readmore" href="<?php the_permalink();?>"><?php esc_html_e('Read more', 'optima'); ?></a>
                                                        <?php
                                                        if(Optima()->settings->get('blog_social_sharing_box') == 'on'){
                                                            echo '<div class="la-sharing-posts"><span class="m-sharing-box"><i class="fa fa-share-alt"></i></span>';
                                                            optima_social_sharing(get_the_permalink(), get_the_title(), (has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : ''));
                                                            echo '</div>';
                                                        }
                                                        ?>
                                                    </footer>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                            <?php
                                    }

                                    echo '</div><hr/>';
                                    wp_reset_postdata();
                                }
                            }

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
<?php
if($enable_related == 'on' && $related_style == 3){
    if($related_query->have_posts()) {
        ?>
<div class="clearfix la-related-posts style-3">
    <div class="container">
        <h4 class="title-related"><?php esc_html_e('Related Post', 'optima') ?></h4>
        <?php LaStudio_Shortcodes_Helper::getSliderConfigs() ?>
        <div class="grid-items md-grid-2-items xs-grid-1-items la-slick-slider" data-slider_config="<?php echo esc_attr(json_encode(array(
            'slidesToShow' => 2,
            'responsive' => array(
                array(
                    'breakpoint' => 800,
                    'settings' => array(
                        'slidesToShow' => 1
                    )
                )
            )
        )));?>">
            <?php while($related_query->have_posts()): $related_query->the_post();?>
                <div class="loop-item grid-item post-item">
                    <div class="item-inner">
                        <div class="item-info">
                            <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                            <div class="entry-meta">
                                <?php
                                optima_entry_meta_item_postdate();
                                optima_entry_meta_item_author();
                                ?>
                            </div>
                            <div class="entry-excerpt"><?php
                                the_excerpt();
                                ?></div>
                            <footer class="entry-meta-footer clearfix">
                                <a class="link-readmore" href="<?php the_permalink();?>"><?php esc_html_e('Read more', 'optima'); ?></a>
                            </footer>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>
<?php
    }
wp_reset_postdata();
}
?>
<!-- .site-main -->
<?php do_action( 'optima/action/after_render_main' ); ?>
<?php get_footer();?>
