<?php
global $optima_loop;
$thumbnail_size = (isset($optima_loop['image_size']) && !empty($optima_loop['image_size']) ? $optima_loop['image_size'] : 'thumbnail');
$title_tag      = (isset($optima_loop['title_tag']) && !empty($optima_loop['title_tag']) ? $optima_loop['title_tag'] : 'h3');

$metadata       = Optima()->settings->get_post_meta(get_the_ID());
$role           = isset($metadata['role']) ? $metadata['role'] : '';
$skills         = isset($metadata['skills']) ? $metadata['skills'] : array();
$post_class     = array('loop-item','grid-item','team-member-item');
?>
<article <?php post_class($post_class)?>>
    <div class="item-inner">
        <div class="item--image">
            <a href="<?php the_permalink()?>"><?php
                Optima()->images->the_post_thumbnail(get_the_ID(), $thumbnail_size);
            ?><div class="item--overlay"></div></a>
        </div>
        <div class="item--info">
            <div class="row">
                <div class="col-xs-12">
                    <div class="item--title-role">
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
                <div class="col-xs-12 col-sm-6">
                    <div class="entry-excerpt"><?php the_excerpt();?></div>
                    <?php Optima()->template->member_social_template(get_the_ID()); ?>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <?php
                    if(!empty($skills)){
                        echo '<div class="vc_progress_bar">';
                        foreach( $skills as $skill ){
                            if(!empty($skill['title']) && !empty($skill['value'])){
                                printf( '<div class="vc_general vc_single_bar"><small class="vc_label">%1$s<span class="vc_label_units">%2$s%3$s</span></small><span class="vc_bar" data-percentage-value="%2$s" data-value="%2$s"></span></div>',
                                    esc_html($skill['title']),
                                    esc_attr($skill['value']),
                                    '%'
                                );
                            }
                        }
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</article>