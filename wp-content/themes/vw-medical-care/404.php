<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package VW Medical Care
 */

get_header(); ?>

<div id="content-vw">
	<div class="container">
    	<h1><?php printf( '<strong>%s</strong> %s', esc_html__( '404','vw-medical-care' ), esc_html__( 'Not Found', 'vw-medical-care' ) ) ?></h1>	
		<p class="text-404"><?php esc_html_e( 'Looks like you have taken a wrong turn&hellip', 'vw-medical-care' ); ?></p>
		<p class="text-404"><?php esc_html_e( 'Dont worry&hellip it happens to the best of us.', 'vw-medical-care' ); ?></p>
		<div class="error-btn">
    		<a class="view-more" href="<?php echo esc_url(home_url()); ?>"><?php esc_html_e( 'Return to the home page', 'vw-medical-care' ); ?><i class="fa fa-angle-right"></i></a>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<?php get_footer(); ?>