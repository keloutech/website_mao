<?php
global $optima_loop;
$loop_style     = isset($optima_loop['loop_style']) ? $optima_loop['loop_style'] : 1;
$title_tag      = (isset($optima_loop['title_tag']) && !empty($optima_loop['title_tag']) ? $optima_loop['title_tag'] : 'div');
$role           = Optima()->settings->get_post_meta(get_the_ID(),'role');
$content        = Optima()->settings->get_post_meta(get_the_ID(),'content');
$avatar         = Optima()->settings->get_post_meta(get_the_ID(),'avatar');
$rating         = Optima()->settings->get_post_meta(get_the_ID(),'rating');
$post_class     = array('loop-item','grid-item','testimonial-item');
?>
<div <?php post_class($post_class)?>>
    <div class="item-inner">
        <div class="item--info">
            <div class="item--excerpt"><?php echo esc_html($content);?></div>
            <div class="item--title-role">
                <?php
                printf(
                    '<%1$s class="%4$s">%3$s</%1$s>',
                    esc_attr($title_tag),
                    'javascript:;',
                    get_the_title(),
                    'item--title'
                );
                if(!empty($role)){
                    printf(
                        '<p class="item--role">%s</p>',
                        esc_html($role)
                    );
                }
                if(!empty($rating) && $loop_style != 11){
                    printf(
                        '<p class="item--rating"><span class="star-rating"><span style="width: %1$s"></span></span></p>',
                        esc_attr(absint($rating) * 10) . '%'
                    );
                }
                ?>
            </div>
        </div>
        <?php if($loop_style != 11): ?>
        <div class="item--image"><?php
        if($avatar){
            echo wp_get_attachment_image($avatar, 'full');
        }
        ?></div>
        <?php endif; ?>
    </div>
</div>