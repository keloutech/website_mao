<?php
global $optima_loop;
$loop_id = isset($optima_loop['loop_id']) ? $optima_loop['loop_id'] : uniqid('la-show-portfolios-');
$layout = isset($optima_loop['loop_layout']) ? $optima_loop['loop_layout'] : 'grid';
$style = isset($optima_loop['loop_style']) ? $optima_loop['loop_style'] : 1;
$responsive_column = isset($optima_loop['responsive_column']) ? $optima_loop['responsive_column'] : array('xlg'=> 1, 'lg'=> 1,'md'=> 1,'sm'=> 1,'xs'=> 1);
$slider_configs = isset($optima_loop['slider_configs']) ? $optima_loop['slider_configs'] : '';

$loopCssClass = array('la-loop','portfolios-loop');
$loopCssClass[] = 'loop-style-' . $style;
$loopCssClass[] = 'portfolios-' . $layout;

if(!empty($slider_configs)){
    $loopCssClass[] = 'la-slick-slider';
}else{
    if('list' != $layout){
        $loopCssClass[] = 'grid-items';
        foreach( $responsive_column as $screen => $value ){
            $loopCssClass[]  =  sprintf('%s-grid-%s-items', $screen, $value);
        }
    }
    if('masonry' == $layout){
        $loopCssClass[] = 'la-isotope-container';
    }
}
?>
<div class="<?php echo esc_attr(implode(' ', $loopCssClass)) ?>"<?php
if(!empty($slider_configs)){
    echo ' data-slider_config="'. esc_attr( $slider_configs ) .'"';
}
if('masonry' == $layout){
    echo ' data-item_selector=".portfolio-item"';
    echo ' data-config_isotope="'.esc_attr(json_encode(array(

        ))).'"';
}
?>>