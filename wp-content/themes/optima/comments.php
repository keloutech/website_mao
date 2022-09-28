<?php
if ( post_password_required() ) {
	return;
}

?>

<div id="comments" class="comments-area clearfix">
	<div class="comments-container">
		<?php if ( have_comments() ) : ?>
			<div class="comments-title">
				<h3><?php esc_html_e('Comment','optima')?> (<?php echo get_comments_number();?>)</h3>
			</div>
			<ul class="commentlist">
				<?php
				wp_list_comments( array(
					'callback' => 'optima_comment_form_callback',
					'style'      => 'ul',
					'avatar_size'=> 70,
				) );
				?>
			</ul><!-- .comment-list -->
			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				echo '<div class="pagination">';
				paginate_comments_links( array(
						'prev_text' => '&larr;',
						'next_text' => '&rarr;',
						'type'      => 'list'
				));
				echo '</div>';
			endif; ?>
		<?php else:?>
			<p class="woocommerce-noreviews"><?php esc_html_e( 'There are no reviews yet.','optima' ); ?></p>
		<?php endif;?>
	</div>
	<?php
	if ( comments_open() ){
		comment_form(array(
			'class_submit' => 'btn btn-primary'
		));
	}else{
		echo '<div class="clearfix"></div><p class="no-comments">'. esc_html__( 'Comments are closed.', 'optima' ) .'</p>';
	}?>

</div><!-- #comments -->