<?php
$gallery = Optima()->settings->get_post_meta(get_the_ID(),'gallery');
$client = Optima()->settings->get_post_meta(get_the_ID(),'client');
$timeline = Optima()->settings->get_post_meta(get_the_ID(),'timeline');
$location = Optima()->settings->get_post_meta(get_the_ID(),'location');
$website = Optima()->settings->get_post_meta(get_the_ID(),'website');
$additional = Optima()->settings->get_post_meta(get_the_ID(),'additional');
$short_des = Optima()->settings->get_post_meta(get_the_ID(),'short_description');
if(!empty($gallery)){
    $gallery = explode(',', $gallery);
}
$main_class = 'col-xs-12';
?>
<div class="portfolio-single-page style-3">
    <div class="row">
        <div class="s-portfolio-left col-xs-12 col-md-8 col-md-push-3">
            <h1 class="pf-title h2"><?php the_title();?></h1>
            <div class="entry-tax-list">
                <?php echo get_the_term_list(get_the_ID(), 'la_portfolio_category');?>
            </div>
            <?php if(!empty($short_des)): ?>
                <div class="entry-content"><?php echo ($short_des) ?></div>
            <?php endif; ?>
            <?php
            if(!empty($gallery) && is_array($gallery)){
                echo '<div class="pf-gal-items">';
                $isFirst = true;
                $img_size = 'full';
                Optima()->images->before_resize();
                foreach($gallery as $g_id){
                    printf(
                        '<div class="gal-item %1$s"><a href="%2$s" class="la-popup-slideshow" data-rel="pf:galley">%3$s</a></div>',
                        ($isFirst ? 'large-gi' : ''),
                        wp_get_attachment_image_url($g_id, 'full'),
                        wp_get_attachment_image($g_id, $img_size)
                    );
                    $img_size = array(400,350);
                    $isFirst = false;
                }
                Optima()->images->after_resize();
                echo '</div>';
            }
            ?>
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
            <div class="clearfix"></div>
            <div class="portfolio-social-links"><?php optima_social_sharing(get_the_permalink(), get_the_title(), (has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : '')); ?></div>
        </div>
        <div class="s-portfolio-left col-xs-12 col-md-3 col-md-pull-9">
            <div class="portfolio-meta-datawrap clearfix">
                <div class="portfolio-meta-data">
                    <?php
                    if(!empty($client)){
                        echo sprintf('<div class="meta-item"><div class="meta-icon meta-icon-client"></div><div class="meta-info"><span>%s</span><span>%s</span></div></div>',
                            esc_html__('Client', 'optima'),
                            esc_html($client)
                        );
                    }
                    if(!empty($timeline)){
                        echo sprintf('<div class="meta-item"><div class="meta-icon meta-icon-timeline"></div><div class="meta-info"><span>%s</span><span>%s</span></div></div>',
                            esc_html__('Timeline', 'optima'),
                            esc_html($timeline)
                        );
                    }
                    if(!empty($location)){
                        echo sprintf('<div class="meta-item"><div class="meta-icon meta-icon-location"></div><div class="meta-info"><span>%s</span><span>%s</span></div></div>',
                            esc_html__('Local', 'optima'),
                            esc_html($location)
                        );
                    }
                    if(!empty($website)){
                        echo sprintf('<div class="meta-item"><div class="meta-icon meta-icon-website"></div><div class="meta-info"><span>%s</span><span>%s</span></div></div>',
                            esc_html__('Website', 'optima'),
                            esc_html($website)
                        );
                    }
                    ?>
                </div>
            </div>
            <?php if(!empty($additional)){
                echo '<div class="pf-additional-bottom">';
                echo Optima_Helper::remove_js_autop($additional);
                echo '</div>';
            } ?>
        </div>
    </div>
</div>