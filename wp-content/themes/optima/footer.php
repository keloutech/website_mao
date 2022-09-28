<?php
$show_search    = (Optima()->settings->get('header_show_search') == 'yes') ? true : false;
?>
<?php if( Optima()->settings->get('backtotop_btn') ): ?>
<div class="clearfix">
    <div class="backtotop-container">
        <a href="#page" class="btn-backtotop btn btn-secondary"><span class="fa-angle-up"></span></a>
    </div>
</div>
<?php endif; ?>
<?php
    Optima()->layout->render_footer_tpl();
?>
    </div><!-- .site-inner -->
</div><!-- #page-->

<?php if($show_search): ?>
    <div class="searchform-fly-overlay">
        <a href="javascript:;" class="btn-close-search"><i class="optima-icon-simple-close"></i></a>
        <div class="searchform-fly">
            <p><?php esc_html_e('Start typing and press Enter to search', 'optima')?></p>
            <?php get_search_form();?>
        </div>
    </div>
<?php endif; ?>

<div class="la-overlay-global"></div>
<?php
do_action('optima/action/after_render_body');
wp_footer();
?>
</body>
</html>