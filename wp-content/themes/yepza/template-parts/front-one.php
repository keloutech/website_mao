<div class="frontPageContainer">
	
	<div class="frontPageServices">
		
		<div class="frontPageWelcome">
		
			<?php
			
				$yepzaWelcomePostTitle = '';
				$yepzaWelcomePostDesc = '';

				if( '' != get_theme_mod('yepza_welcome_post') && 'select' != get_theme_mod('yepza_welcome_post') ){

					$yepzaWelcomePostId = get_theme_mod('yepza_welcome_post');

					if( ctype_alnum($yepzaWelcomePostId) ){

						$yepzaWelcomePost = get_post( $yepzaWelcomePostId );

						$yepzaWelcomePostTitle = $yepzaWelcomePost->post_title;
						$yepzaWelcomePostDesc = $yepzaWelcomePost->post_excerpt;
						$yepzaWelcomePostContent = $yepzaWelcomePost->post_content;

					}

				}			
			
			?>
			
			<h1><?php echo esc_html($yepzaWelcomePostTitle); ?></h1>
			<div class="frontWelcomeContent">
				<p>
					<?php 
					
						if( '' != $yepzaWelcomePostDesc ){
							
							echo esc_html($yepzaWelcomePostDesc);
							
						}else{
							
							echo esc_html($yepzaWelcomePostContent);
							
						}
					
					?>
				</p>
			</div><!-- .frontWelcomeContent -->			
			
		</div><!-- .frontPageWelcome -->
		
		<div class="frontPageServiceItems">
			
			<?php

				$yepza_left_cat = '';

				if(get_theme_mod('yepza_services_cat')){
					$yepza_left_cat = get_theme_mod('yepza_services_cat');
					$yepza_left_cat_num = -1;
				}else{
					$yepza_left_cat = 0;
					$yepza_left_cat_num = 5;
				}		

				$yepza_left_args = array(
				   // Change these category SLUGS to suit your use.
				   'ignore_sticky_posts' => 1,
				   'post_type' => array('post'),
				   'posts_per_page'=> $yepza_left_cat_num,
				   'cat' => $yepza_left_cat
				);

				$yepza_left = new WP_Query($yepza_left_args);		

				if ( $yepza_left->have_posts() ) : while ( $yepza_left->have_posts() ) : $yepza_left->the_post();
   			?> 			
			<div class="frontPageServiceItem">
				
				<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('home-posts');
						}else{
							echo '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/frontitemimage.png" />';
						}						
				?>
				<?php the_title( '<h3><a href="' . esc_url( get_permalink() ) . '">', '</a></h3>' ); ?>
				<p>
					<?php  
						
						//$frontPostExcerpt = '';
						//$frontPostExcerpt = get_the_excerpt();
					
						if( has_excerpt() ){
							echo esc_html(get_the_excerpt());
						}else{
							echo esc_html(yepzalimitedstring(get_the_content(), 50));
						}
					
					?>
				</p>				
				
			</div><!-- .frontPageServiceItem -->
			<?php endwhile; wp_reset_postdata(); endif;?>
			
		</div><!-- .frontPageServiceItems -->
		
	</div><!-- .frontPageServices -->
	
	<div class="frontPagePortfolio">
		
		<h1><?php _e('Portfolio', 'yepza'); ?></h1>
		
		<div class="frontPagePortfolioItems">
			
			<?php

				$yepza_portfolio_cat = '';

				if(get_theme_mod('yepza_portfolio_cat')){
					$yepza_portfolio_cat = get_theme_mod('yepza_portfolio_cat');
					$yepza_portfolio_cat_num = -1;
				}else{
					$yepza_portfolio_cat = 0;
					$yepza_portfolio_cat_num = 5;
				}		

				$yepza_portfolio_args = array(
				   // Change these category SLUGS to suit your use.
				   'ignore_sticky_posts' => 1,
				   'post_type' => array('post'),
				   'posts_per_page'=> $yepza_portfolio_cat_num,
				   'cat' => $yepza_portfolio_cat
				);

				$yepza_portfolio = new WP_Query($yepza_portfolio_args);		

				if ( $yepza_portfolio->have_posts() ) : while ( $yepza_portfolio->have_posts() ) : $yepza_portfolio->the_post();
   			?>			
			<div class="frontPagePortfolioItem">
				
				<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail();
						}else{
							echo '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/service.jpg" />';
						}						
				?>
				<?php the_title( '<h3>', '</h3>' ); ?>				
				
			</div><!-- .frontPagePortfolioItem -->
			<?php endwhile; wp_reset_postdata(); endif;?>
			
		</div><!-- .frontPagePortfolioItems -->
		
	</div><!-- .frontPagePortfolio -->
	
	<div class="frontPageNews">
		
			<h1><?php _e('News', 'yepza'); ?></h1>
			
			<?php

				$yepza_right_cat = '';

				if(get_theme_mod('yepza_news_cat')){
					$yepza_right_cat = get_theme_mod('yepza_news_cat');
				}else{
					$yepza_right_cat = 0;
				}		

				$yepza_right_args = array(
				   // Change these category SLUGS to suit your use.
				   'ignore_sticky_posts' => 1,
				   'post_type' => array('post'),
				   'posts_per_page'=> 4,
				   'cat' => $yepza_right_cat
				);

				$yepza_right = new WP_Query($yepza_right_args);		

				if ( $yepza_right->have_posts() ) : while ( $yepza_right->have_posts() ) : $yepza_right->the_post();
   			?> 			
			<div class="frontNewsItem">
				
				<?php the_title( '<h3>', '</h3>' ); ?>
				<p>
					<?php  
						
						//$frontPostExcerpt = '';
						//$frontPostExcerpt = get_the_excerpt();
					
						if( has_excerpt() ){
							echo esc_html(get_the_excerpt());
						}else{
							echo esc_html(yepzalimitedstring(get_the_content(), 100));
						}
					
					?>				
				</p>
				<p class="readmore"><a href="<?php echo esc_url(get_the_permalink()); ?>">Read More</a></p>
				
			</div><!-- .frontNewsItem -->
			<?php endwhile; wp_reset_postdata(); endif;?>			
		
	</div><!-- .frontPageNews -->	
	
</div><!-- .frontPageContainer -->	