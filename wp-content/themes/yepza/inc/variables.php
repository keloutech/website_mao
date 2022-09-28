<?php

$yepzaPostsPagesArray = array(
	'select' => __('Select a post/page', 'yepza'),
);

$yepzaPostsPagesArgs = array(
	
	// Change these category SLUGS to suit your use.
	'ignore_sticky_posts' => 1,
	'post_type' => array('post', 'page'),
	'orderby' => 'date',
	'posts_per_page' => -1,
	'post_status' => 'publish',
	
);
$yepzaPostsPagesQuery = new WP_Query( $yepzaPostsPagesArgs );
	
if ( $yepzaPostsPagesQuery->have_posts() ) :
							
	while ( $yepzaPostsPagesQuery->have_posts() ) : $yepzaPostsPagesQuery->the_post();
			
		$yepzaPostsPagesId = get_the_ID();
		if(get_the_title() != ''){
				$yepzaPostsPagesTitle = get_the_title();
		}else{
				$yepzaPostsPagesTitle = get_the_ID();
		}
		$yepzaPostsPagesArray[$yepzaPostsPagesId] = $yepzaPostsPagesTitle;
	   
	endwhile; wp_reset_postdata();
							
endif;

$yepzaYesNo = array(
	'select' => __('Select', 'yepza'),
	'yes' => __('Yes', 'yepza'),
	'no' => __('No', 'yepza'),
);

$yepzaSliderType = array(
	'select' => __('Select', 'yepza'),
	'header' => __('WP Custom Header', 'yepza'),
	'header-one' => __('yepza Header', 'yepza'),
);

$yepzaServiceLayouts = array(
	'select' => __('Select', 'yepza'),
	'one' => __('One', 'yepza'),
	'two' => __('Two', 'yepza'),
);

$yepzaAvailableCats = array( 'select' => __('Select', 'yepza') );

$yepza_categories_raw = get_categories( array( 'orderby' => 'name', 'order' => 'ASC', 'hide_empty' => 0, ) );

foreach( $yepza_categories_raw as $category ){
	
	$yepzaAvailableCats[$category->term_id] = $category->name;
	
}

$yepzaBusinessLayoutType = array( 'select' => __('Select', 'yepza'), 'one' => __('One', 'yepza'), 'two' => __('Two', 'yepza') );
