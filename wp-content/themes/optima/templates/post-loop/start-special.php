<?php
global $optima_loop;
$layout = isset($optima_loop['loop_layout']) ? $optima_loop['loop_layout'] : 'grid';
$style = isset($optima_loop['loop_style']) ? $optima_loop['loop_style'] : 1;

$loopCssClass = array('la-loop','showposts-loop');

$loopCssClass[] = 'blog-special_' . $style;

?>
<div class="<?php echo esc_attr(implode(' ', $loopCssClass)) ?>">
    <div class="row">
        <div class="blog-special-left col-xs-12 col-sm-6">