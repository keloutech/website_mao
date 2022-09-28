<?php if ( ! defined( 'ABSPATH' ) ) { die; }

add_filter('LaStudio/global_loop_variable', 'optima_set_loop_variable');
if(!function_exists('optima_set_loop_variable')){
    function optima_set_loop_variable( $var = ''){
        return 'optima_loop';
    }
}

add_filter('lastudio/google_map_api', 'optima_add_googlemap_api');
if(!function_exists('optima_add_googlemap_api')){
    function optima_add_googlemap_api( $key = '' ){
        return Optima()->settings->get('google_key', $key);
    }
}

add_filter('optima/filter/page_title', 'optima_override_page_title_bar_title');
if(!function_exists('optima_override_page_title_bar_title')){
    function optima_override_page_title_bar_title( $title ){

        $_tmp = '<header><div class="page-title h4">%s</div></header>';

        $context = (array) Optima()->get_current_context();

        if(in_array('is_singular', $context)){
            $custom_title = Optima()->settings->get_post_meta( get_queried_object_id(), 'page_title_custom');
            if(!empty( $custom_title) ){
                return sprintf($_tmp, $custom_title);
            }
        }

        if(in_array('is_tax', $context) || in_array('is_category', $context) || in_array('is_tag', $context)){
            $custom_title = Optima()->settings->get_term_meta( get_queried_object_id(), 'page_title_custom');
            if(!empty( $custom_title) ){
                return sprintf($_tmp, $custom_title);
            }
        }

        return $title;
    }
}

add_action( 'pre_get_posts', 'optima_set_posts_per_page_for_portfolio_cpt' );
if(!function_exists('optima_set_posts_per_page_for_portfolio_cpt')){
    function optima_set_posts_per_page_for_portfolio_cpt( $query ) {
        if ( !is_admin() && $query->is_main_query() && is_post_type_archive( 'la_portfolio' ) ) {
            $pf_per_page = (int) Optima()->settings->get('portfolio_per_page', 9);
            $query->set( 'posts_per_page', $pf_per_page );
        }
    }
}