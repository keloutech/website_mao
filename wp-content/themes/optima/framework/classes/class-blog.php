<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

class Optima_Blog {

    public function __construct(){

        add_filter( 'excerpt_length', array( $this, 'excerpt_length' ), 100 );
        add_filter( 'excerpt_more', array( $this, 'excerpt_more' ) );

        add_action('optima/action/before_main_loop', array( $this, 'before_main_loop' ), 10 );
        add_action('optima/action/after_main_loop', array( $this, 'after_main_loop' ), 10 );

    }

    public function excerpt_more( ){
        return '&hellip;';
    }

    public function excerpt_length( $length ) {

        // Normal blog posts excerpt length.
        if ( ! is_null( Optima()->settings->get( 'blog_excerpt_length' ) ) ) {
            $length = Optima()->settings->get( 'blog_excerpt_length' );
        }

        return $length;

    }

    public function before_main_loop(){

        global $wp_query, $wp_rewrite;

        $blog_design = Optima()->settings->get('blog_design', 'grid_1');
        $blog_columns = wp_parse_args( (array) Optima()->settings->get('blog_post_column'), array('lg'=> 1,'md'=> 1,'sm'=> 1,'xs'=> 1, 'mb' => 1) );
        $blog_masonry = ( Optima()->settings->get('blog_masonry') == 'on' ) ? true : false;
        $blog_pagination_type = Optima()->settings->get('blog_pagination_type', 'pagination');
        $css_classes = array( 'la-loop', 'showposts-loop', 'blog-main-loop' );
        $css_classes[] = 'blog-pagination-type-' . $blog_pagination_type;
        $css_classes[] = 'blog-' . $blog_design;
        if( false === strpos( $blog_design, 'list') ){
            $css_classes[] = 'grid-items';
            foreach( $blog_columns as $screen => $value ){
                $css_classes[] = $screen . '-grid-'. $value .'-items';
            }
        }
        if($blog_masonry){
            $css_classes[] = 'la-isotope-container';
        }
        $page_path = '';
        if($blog_pagination_type == 'infinite_scroll'){
            $css_classes[] = 'la-infinite-container';
        }
        if($blog_pagination_type == 'load_more'){
            $css_classes[] = 'la-infinite-container infinite-show-loadmore';
        }
        if($blog_pagination_type == 'infinite_scroll' || $blog_pagination_type == 'load_more'){
            $page_link = get_pagenum_link();
            if ( !$wp_rewrite->using_permalinks() || is_admin() || strpos($page_link, '?') ) {
                if (strpos($page_link, '?') !== false)
                    $page_path = apply_filters( 'get_pagenum_link', $page_link . '&amp;paged=');
                else
                    $page_path = apply_filters( 'get_pagenum_link', $page_link . '?paged=');
            }
            else {
                $page_path = apply_filters( 'get_pagenum_link', $page_link . user_trailingslashit( $wp_rewrite->pagination_base . "/" ));
            }
        }
        ?>
        <div
            class="<?php echo esc_attr(implode(' ', $css_classes)); ?>"
            data-item_selector=".post-item"
            data-page_num="<?php echo esc_attr( get_query_var('paged') ? get_query_var('paged') : 1 ) ?>"
            data-page_num_max="<?php echo esc_attr( $wp_query->max_num_pages ? $wp_query->max_num_pages : 1 ) ?>"
            data-path="<?php echo esc_url( $page_path ) ?>">
<?php
    }

    public function after_main_loop(){
        echo '</div><!-- ./end-main-loop -->';
    }

}