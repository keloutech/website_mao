<div class="frontTwoContainer">

	<div class="frontTwoWelcomeContainer">
		
			<?php
			
				$yepzaWelcomePostTitle = '';
				$yepzaWelcomePostDesc = '';

				if( '' != get_theme_mod('yepza_two_welcome_post') && 'select' != get_theme_mod('yepza_two_welcome_post') ){

					$yepzaWelcomePostId = get_theme_mod('yepza_two_welcome_post');

					if( ctype_alnum($yepzaWelcomePostId) ){

						$yepzaWelcomePost = get_post( $yepzaWelcomePostId );

						$yepzaWelcomePostTitle = $yepzaWelcomePost->post_title;
						$yepzaWelcomePostDesc = $yepzaWelcomePost->post_excerpt;
						$yepzaWelcomePostContent = $yepzaWelcomePost->post_content;

					}

				}			
			
			?>
			
			<h1><?php echo esc_html($yepzaWelcomePostTitle); ?></h1>
			<div class="frontTwoWelcomeContent">
				<p>
					<?php 
					
						if( '' != $yepzaWelcomePostDesc ){
							
							echo esc_html($yepzaWelcomePostDesc);
							
						}else{
							
							echo esc_html($yepzaWelcomePostContent);
							
						}
					
					?>
				</p>
			</div><!-- .frontTwoWelcomeContent -->	
		
	</div><!-- .frontTwoWelcomeContainer -->
	
	<div class="frontPageTwoProductsContainer">
		
		<div class="frontPageTwoProductContainer">
			
			<?php
			
				$yepzaProductOneTitle = '';
				$yepzaProductOneDesc = '';

				if( '' != get_theme_mod('yepza_two_product_post_one') && 'select' != get_theme_mod('yepza_two_product_post_one') ){

					$yepzaProductOneId = get_theme_mod('yepza_two_product_post_one');

					if( ctype_alnum($yepzaProductOneId) ){

						$yepzaProductOne = get_post( $yepzaProductOneId );

						$yepzaProductOneTitle = $yepzaProductOne->post_title;
						$yepzaProductOneDesc = $yepzaProductOne->post_excerpt;
						$yepzaProductOneContent = yepzalimitedstring($yepzaProductOne->post_content, 150);
						$yepzaProductOneLink = get_permalink($yepzaProductOneId);
						
						if( has_post_thumbnail( $yepzaProductOneId ) ){
							
							$yepzaProductOneImage = get_the_post_thumbnail( $yepzaProductOneId, 'producttwo' );
							
						}else{
							
							$yepzaProductOneImage = get_template_directory_uri() . '/assets/images/service.jpg';
							
						}

					}

				}			
			
			?>
			<div class="frontPageTwoProductImage">
				<img src="<?php echo esc_url($yepzaProductOneImage); ?>" />
			</div><!-- .frontPageTwoProductImage -->
			<h2><a href="<?php echo esc_url($yepzaProductOneLink); ?>"><?php echo esc_html($yepzaProductOneTitle); ?></a></h2>
			<div class="frontPageTwoProductContent">
				
				<p>
					<?php 
					
						if( '' != $yepzaProductOneDesc ){
							
							echo esc_html($yepzaProductOneDesc);
							
						}else{
							
							echo esc_html($yepzaProductOneContent);
							
						}
					
					?>
				</p>
				
			</div><!-- .frontTwoWelcomeContent -->			
			
		</div><!-- .frontPageTwoProductContainer -->
		
		<div class="frontPageTwoProductContainer">
			
			<?php
			
				$yepzaProductTwoTitle = '';
				$yepzaProductTwoDesc = '';

				if( '' != get_theme_mod('yepza_two_product_post_two') && 'select' != get_theme_mod('yepza_two_product_post_two') ){

					$yepzaProductTwoId = get_theme_mod('yepza_two_product_post_two');

					if( ctype_alnum($yepzaProductTwoId) ){

						$yepzaProductTwo = get_post( $yepzaProductTwoId );

						$yepzaProductTwoTitle = $yepzaProductTwo->post_title;
						$yepzaProductTwoDesc = $yepzaProductTwo->post_excerpt;
						$yepzaProductTwoContent = yepzalimitedstring($yepzaProductTwo->post_content, 150);
						$yepzaProductTwoLink = get_permalink($yepzaProductTwoId);
						
						if( has_post_thumbnail( $yepzaProductTwoId ) ){
							
							$yepzaProductTwoImage = get_the_post_thumbnail( $yepzaProductTwoId, 'producttwo' );
							
						}else{
							
							$yepzaProductTwoImage = get_template_directory_uri() . '/assets/images/service.jpg';
							
						}

					}

				}			
			
			?>
			<div class="frontPageTwoProductImage">
				<img src="<?php echo esc_url($yepzaProductTwoImage); ?>" />
			</div><!-- .frontPageTwoProductImage -->
			<h2><a href="<?php echo esc_url($yepzaProductTwoLink); ?>"><?php echo esc_html($yepzaProductTwoTitle); ?></a></h2>
			<div class="frontPageTwoProductContent">
				
				<p>
					<?php 
					
						if( '' != $yepzaProductTwoDesc ){
							
							echo esc_html($yepzaProductTwoDesc);
							
						}else{
							
							echo esc_html($yepzaProductTwoContent);
							
						}
					
					?>
				</p>
				
			</div><!-- .frontTwoWelcomeContent -->			
			
		</div><!-- .frontPageTwoProductContainer -->
		
		<div class="frontPageTwoProductContainer">
			
			<?php
			
				$yepzaProductThreeTitle = '';
				$yepzaProductThreeDesc = '';

				if( '' != get_theme_mod('yepza_two_product_post_three') && 'select' != get_theme_mod('yepza_two_product_post_three') ){

					$yepzaProductThreeId = get_theme_mod('yepza_two_product_post_three');

					if( ctype_alnum($yepzaProductThreeId) ){

						$yepzaProductThree = get_post( $yepzaProductThreeId );

						$yepzaProductThreeTitle = $yepzaProductThree->post_title;
						$yepzaProductThreeDesc = $yepzaProductThree->post_excerpt;
						$yepzaProductThreeContent = yepzalimitedstring($yepzaProductThree->post_content, 150);
						$yepzaProductThreeLink = get_permalink($yepzaProductThreeId);
						
						if( has_post_thumbnail( $yepzaProductThreeId ) ){
							
							$yepzaProductThreeImage = get_the_post_thumbnail_url( $yepzaProductThreeId, 'producttwo' );
							//echo $yepzaProductThreeImage;
							
						}else{
							
							$yepzaProductThreeImage = get_template_directory_uri() . '/assets/images/service.jpg';
							
						}

					}

				}			
			
			?>
			<div class="frontPageTwoProductImage">
				<img src="<?php echo esc_url($yepzaProductThreeImage); ?>" />
			</div><!-- .frontPageTwoProductImage -->
			<h2><a href="<?php echo esc_url($yepzaProductThreeLink); ?>"><?php echo esc_html($yepzaProductThreeTitle); ?></a></h2>
			<div class="frontPageTwoProductContent">
				
				<p>
					<?php 
					
						if( '' != $yepzaProductThreeDesc ){
							
							echo esc_html($yepzaProductThreeDesc);
							
						}else{
							
							echo esc_html($yepzaProductThreeContent);
							
						}
					
					?>
				</p>
				
			</div><!-- .frontTwoWelcomeContent -->			
			
		</div><!-- .frontPageTwoProductContainer -->		
		
	</div><!-- .frontPageTwoProductsContainer -->
	
</div><!-- .frontPageTwoContainer -->