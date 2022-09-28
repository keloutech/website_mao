<?php

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

$tax_query = WC()->query->get_tax_query();
$meta_query = WC()->query->get_meta_query();

if ( ! empty( $atts['category__in'] ) ) {
    $tax_query[] = array(
        array(
            'taxonomy' 		=> 'product_cat',
            'terms' 		=> explode( ',', $atts['category__in'] ),
            'field' 		=> 'term_id',
            'operator' 		=> $atts['operator']
        )
    );
}
else if ( ! empty( $atts['category'] ) ) {
    $tax_query[] = array(
        array(
            'taxonomy' 		=> 'product_cat',
            'terms'         => array_map( 'sanitize_title', explode( ',', $atts['category'] ) ),
            'field'         => 'slug',
            'operator' 		=> $atts['operator']
        )
    );
}

$query_args = array(
    'post_type'           => 'product',
    'post_status'         => 'publish',
    'ignore_sticky_posts' => 1,
    'posts_per_page'      => $atts['per_page'],
    'orderby'             => $atts['orderby'],
    'order'               => $atts['order'],
    'meta_query'          => $meta_query,
    'tax_query'           => $tax_query,
);

$viewed_products = ! empty( $_COOKIE['woocommerce_recently_viewed'] ) ? (array) explode( '|', $_COOKIE['woocommerce_recently_viewed'] ) : array();
$viewed_products = array_reverse( array_filter( array_map( 'absint', $viewed_products ) ) );

if(!empty($viewed_products)){
    $query_args['post__in'] = $viewed_products;
    if(empty($query_args['orderby'])){
        $query_args['orderby'] = 'post__in';
    }
}

LaStudio_Shortcodes_Helper::getLoopProducts($query_args, $atts, $this->getShortcode());