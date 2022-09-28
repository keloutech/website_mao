<?php

global $optima_loop;

$loop_layout = Optima()->settings->get('portfolio_display_type', 'grid');
$loop_style = Optima()->settings->get('portfolio_display_style', '1');

$optima_loop['loop_layout'] = $loop_layout;
$optima_loop['loop_style'] = $loop_style;
$optima_loop['responsive_column'] = Optima()->settings->get('portfolio_column', array('xlg'=> 1, 'lg'=> 1,'md'=> 1,'sm'=> 1,'xs'=> 1));
$optima_loop['image_size'] = Optima_Helper::get_image_size_from_string(Optima()->settings->get('portfolio_thumbnail_size', 'full'),'full');
$optima_loop['title_tag'] = 'h4';
$optima_loop['excerpt_length'] = 15;

echo '<div id="archive_portfolio_listing" class="la-portfolio-listing">';

if( have_posts() ){

    get_template_part("templates/portfolios/{$loop_layout}/start", $loop_style);

    while( have_posts() ){

        the_post();

        get_template_part("templates/portfolios/{$loop_layout}/loop", $loop_style);

    }

    get_template_part("templates/portfolios/{$loop_layout}/end", $loop_style);

}

echo '</div>';
/**
 * Display pagination and reset loop
 */

optima_the_pagination();

wp_reset_postdata();