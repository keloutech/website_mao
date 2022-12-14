<?php
/**
 * Template part for displaying downloads in home page and in download page.
 * 
 * @package Digital_Download
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'item' ); ?> itemscope itemtype="http://schema.org/Product">
	<div class="download-holder">
        <?php 
            get_template_part( 'edd_templates/shortcode-content-image' );  
            get_template_part( 'edd_templates/shortcode-content-title' );
            get_template_part( 'edd_templates/shortcode-content-price' );
            get_template_part( 'edd_templates/shortcode-content-cart-button' ); 
        ?>
    </div><!-- .download-holder -->            
</article><!-- #post-<?php the_ID(); ?> -->