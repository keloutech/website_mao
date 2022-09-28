<?php
	
	$yepzaHeaderPostId = '';
	$yepzaHeaderPostTitle = '';
	$yepzaHeaderPostDesc = '';

	if( '' != get_theme_mod('yepza_header_one_post') && 'select' != get_theme_mod('yepza_header_one_post') ){

		$yepzaHeaderPostId = get_theme_mod('yepza_header_one_post');

		if( ctype_alnum($yepzaHeaderPostId) ){

			$yepzaHeaderPost = get_post( $yepzaHeaderPostId );

			$yepzaHeaderPostTitle = $yepzaHeaderPost->post_title;
			$yepzaHeaderPostDesc = $yepzaHeaderPost->post_excerpt;
			$yepzaHeaderPostContent = $yepzaHeaderPost->post_content;
			$yepzaHeaderPostUrl = get_the_permalink($yepzaHeaderPostId);
			
			$yepzaHeaderPostThumbnail = get_the_post_thumbnail_url($yepzaHeaderPostId,'producttwo');

		}

	}			
	
	if( '' != $yepzaHeaderPostId ):

?>

<div class="header-one-container">

	<div class="header-one-image">
		
		<?php
		
			if( '' != $yepzaHeaderPostThumbnail ){
				
				echo '<img src="' . esc_url($yepzaHeaderPostThumbnail) . '">';
				
			}
		
		?>
		
	</div><!-- .header-one-image -->
	
	<div class="header-one-content">
		
		<h2><?php echo esc_html($yepzaHeaderPostTitle); ?></h2>
		<p>
			<?php 
					
				if( '' != $yepzaHeaderPostDesc ){
							
					echo esc_html($yepzaHeaderPostDesc);
							
				}else{
							
					echo esc_html($yepzaHeaderPostContent);
							
				}
					
			?>		
		</p>
		<?php if( '' != $yepzaHeaderPostUrl ): ?>
		<p>
			<a class="readMore" href="<?php echo esc_url($yepzaHeaderPostUrl); ?>"><?php _e('Read More', 'yepza') ?></a>
		</p>
		<?php endif; ?>
		
	</div><!-- .header-one-content -->
	
</div><!-- .header-one-container -->

<?php endif; ?>