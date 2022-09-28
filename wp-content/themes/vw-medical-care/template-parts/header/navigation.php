<?php
/**
 * The template part for header
 *
 * @package VW Medical Care 
 * @subpackage vw_medical_care
 * @since VW Medical Care 1.0
 */
?>

<div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','vw-medical-care'); ?></a></div>
<div id="header" class="menubar">
	<div class="nav">
		<?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
	</div>
</div>