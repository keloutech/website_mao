<?php
$footer_layout = Optima()->layout->get_footer_layout();
$number_col = absint(substr(ltrim($footer_layout),0,1));
if($number_col < 1) $number_col = 1;
?>
<footer id="colophon" class="site-footer la-footer-<?php echo esc_attr($footer_layout)?>">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <?php
                for ( $i = 1; $i <= $number_col; $i++ ){
                    echo '<div class="footer-column footer-column-'.esc_attr($i).'">';
                        dynamic_sidebar( apply_filters('optima/filter/footer_column_'. $i, 'f-col-'. $i, $footer_layout));
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>
    <?php if(Optima()->settings->get('enable_footer_copyright','no') == 'yes'): ?>
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-inner">
                <?php echo Optima_Helper::remove_js_autop( Optima()->settings->get('footer_copyright') );?>
            </div>
        </div>
    </div>
    <?php endif; ?>
</footer>
<!-- #colophon -->