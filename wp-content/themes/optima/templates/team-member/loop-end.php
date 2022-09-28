<?php
/*
 * Template loop-end
 */
global $optima_member_loop_index, $optima_loop;
$optima_member_loop_index = '';
$loop_style = isset($optima_loop['loop_style']) ? $optima_loop['loop_style'] : 1;
?>
</div>
<?php
if($loop_style == 9){
    echo '<div class="member-info-09"></div>';
}
?>
<!-- .team-member-loop -->
