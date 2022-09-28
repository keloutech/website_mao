<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
	<input autocomplete="off" type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search here&hellip;', 'placeholder', 'optima' ); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'optima' ); ?>" />
	<button class="search-button" type="submit"><i class="optima-icon-zoom"></i></button>
</form>
<!-- .search-form -->