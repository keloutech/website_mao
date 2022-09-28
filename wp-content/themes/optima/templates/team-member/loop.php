<?php
global $optima_loop;
$thumbnail_size = (isset($optima_loop['image_size']) && !empty($optima_loop['image_size']) ? $optima_loop['image_size'] : 'thumbnail');
$title_tag      = (isset($optima_loop['title_tag']) && !empty($optima_loop['title_tag']) ? $optima_loop['title_tag'] : 'h3');
$role           = Optima()->settings->get_post_meta(get_the_ID(), 'role');
$post_class     = array('loop-item','grid-item','team-member-item');
?>
<article <?php post_class($post_class)?>>
    <div class="item-inner">
        <div class="item--image">
            <a href="<?php the_permalink()?>"><?php
                Optima()->images->the_post_thumbnail(get_the_ID(), $thumbnail_size);
            ?><div class="item--overlay"></div></a>
            <?php Optima()->template->member_social_template(get_the_ID()); ?>
        </div>
        <div class="item--info">
            <?php
            printf(
                '<%1$s class="%4$s"><a href="%2$s">%3$s</a></%1$s>',
                esc_attr($title_tag),
                esc_url(get_the_permalink()),
                get_the_title(),
                'item--title'
            );
            if(!empty($role)){
                printf(
                    '<p class="item--role">%s</p>',
                    esc_html($role)
                );
            }
            ?>
        </div>
    </div>
</article>