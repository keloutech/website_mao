<?php
global $optima_loop;
$loop_id = isset($optima_loop['loop_id']) ? $optima_loop['loop_id'] : uniqid('la-show-portfolios-');
$style = isset($optima_loop['loop_style']) ? $optima_loop['loop_style'] : 'default';
$responsive_column = isset($optima_loop['responsive_column']) ? $optima_loop['responsive_column'] : array('xlg'=> 1, 'lg'=> 1,'md'=> 1,'sm'=> 1,'xs'=> 1);

$enable_skill_filter = isset($optima_loop['enable_skill_filter']) ? true : false;
$filter_style = isset($optima_loop['filter_style']) ? $optima_loop['filter_style'] : '1';
$filters = isset($optima_loop['filters']) ? $optima_loop['filters'] : '';

$loopCssClass = array('la-loop','portfolios-loop');
$loopCssClass[] = 'pf-s-' . $style;
$loopCssClass[] = 'pf-masonry';
$loopCssClass[] = 'la-isotope-container';
if($style != 'auto-width'){
    $loopCssClass[] = 'grid-items';
    foreach( $responsive_column as $screen => $value ){
        $loopCssClass[]  =  sprintf('%s-grid-%s-items', $screen, $value);
    }
}
$custom_configs = array();

?>
<?php if($enable_skill_filter): ?>
    <div class="la-isotope-filter-container filter-style-<?php echo esc_attr($filter_style);?>" data-isotope_container="#<?php echo esc_html($loop_id) ?> .la-isotope-container">
        <div class="la-toggle-filter"><?php esc_html_e('All', 'optima'); ?></div><ul><li class="active" data-filter="*"><a href="#"><?php esc_html_e('All', 'optima'); ?></a></li><?php
            if(!empty($filters)){
                $filters = explode(',', $filters);
                foreach($filters as $filter){
                    $category = get_term($filter, 'la_portfolio_skill');
                    if(!is_wp_error($category) && $category){
                        printf('<li data-filter="la_portfolio_skill-%s"><a href="#">%s</a></li>',
                            esc_attr($category->slug),
                            esc_html($category->name)
                        );
                    }
                }
            }
        ?></ul>
    </div>
<?php endif; ?>
<div class="<?php echo esc_attr(implode(' ', $loopCssClass)) ?>"<?php
echo ' data-item_selector=".portfolio-item"';
echo ' data-config_isotope="'.esc_attr(json_encode($custom_configs)).'"';
?>>