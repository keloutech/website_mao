<?php
global $optima_loop;
$loop_id = isset($optima_loop['loop_id']) ? $optima_loop['loop_id'] : uniqid('la-showposts-');
$layout = isset($optima_loop['loop_layout']) ? $optima_loop['loop_layout'] : 'grid';
$style = isset($optima_loop['loop_style']) ? $optima_loop['loop_style'] : 1;
$responsive_column = isset($optima_loop['responsive_column']) ? $optima_loop['responsive_column'] : array('xlg'=> 1, 'lg'=> 1,'md'=> 1,'sm'=> 1,'xs'=> 1);
$slider_configs = isset($optima_loop['slider_configs']) ? $optima_loop['slider_configs'] : '';

$loopCssClass = array('la-loop','showposts-loop');
$loopCssClass[] = 'loop-style-' . $style;
$loopCssClass[] = 'showposts-' . $layout;

if($layout != 'list'){
    $loopCssClass[] = 'grid-items';
    $loopCssClass[] = 'blog-grid_' . $style;

}else{
    if($layout == 'list'){
        if($style != 1){
            $loopCssClass[] = 'showposts-loop-list_' . $style;
        }else{
            $loopCssClass[] = 'showposts-loop-list';
        }
    }
}
if(!empty($slider_configs)){
    $loopCssClass[] = 'la-slick-slider';
}else{
    if($layout != 'list'){
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
    echo ' data-item_selector=".post-item"';
    echo ' data-config_isotope="'.esc_attr(json_encode(array(

        ))).'"';
}
?>>