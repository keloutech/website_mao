<?php
global $optima_loop;
$loop_id = isset($optima_loop['loop_id']) ? $optima_loop['loop_id'] : uniqid('la-show-portfolios-');
$layout = isset($optima_loop['loop_layout']) ? $optima_loop['loop_layout'] : 'list';
$style = isset($optima_loop['loop_style']) ? $optima_loop['loop_style'] : 1;

$loopCssClass = array('la-loop','portfolios-loop');
$loopCssClass[] = 'loop-style-' . $style;
$loopCssClass[] = 'portfolios-' . $layout;

?>
<div class="<?php echo esc_attr(implode(' ', $loopCssClass)) ?>">