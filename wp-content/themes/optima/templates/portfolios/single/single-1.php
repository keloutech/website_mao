<?php
$gallery = Optima()->settings->get_post_meta(get_the_ID(),'gallery');
$client = Optima()->settings->get_post_meta(get_the_ID(),'client');
$timeline = Optima()->settings->get_post_meta(get_the_ID(),'timeline');
$location = Optima()->settings->get_post_meta(get_the_ID(),'location');
$website = Optima()->settings->get_post_meta(get_the_ID(),'website');
$additional = Optima()->settings->get_post_meta(get_the_ID(),'additional');
if(!empty($gallery)){
    $gallery = explode(',', $gallery);
}
$main_class = 'col-xs-12';
?>
<div class="portfolio-single-page style-1">
    <div class="row">
        <?php
        if(!empty($gallery) && is_array($gallery)){
            $main_class = 's-portfolio-right col-xs-12 col-md-6 padding-left-55 sm-padding-left-15';
            echo '<div class="s-portfolio-left col-xs-12 col-md-6">';
            echo '<div class="pf-gal-items">';
            foreach($gallery as $g_id){
                printf(
                    '<div class="gal-item"><a href="%1$s" class="la-popup-slideshow" data-rel="pf:galley">%2$s</a></div>',
                    wp_get_attachment_image_url($g_id, 'full'),
                    wp_get_attachment_image($g_id, 'full')
                );
            }
            echo '</div>';
            echo '</div>';
        }
        ?>
        <div class="<?php echo esc_attr($main_class)?>">
            <h1 class="pf-title h2"><?php the_title();?></h1>
            <div class="entry-tax-list">
                <?php echo get_the_term_list(get_the_ID(), 'la_portfolio_category');?>
            </div>
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
            <div class="clearfix"></div>
            <div class="portfolio-meta-data">
                <?php
                if(!empty($client)){
                    echo sprintf('<div class="meta-item"><span class="optima-icon-users-circle"></span><span>%s</span></div>', esc_html($client));
                }
                if(!empty($timeline)){
                    echo sprintf('<div class="meta-item"><span class="optima-icon-ui-calendar"></span><span>%s</span></div>', esc_html($timeline));
                }
                if(!empty($location)){
                    echo sprintf('<div class="meta-item"><span class="optima-icon-flag"></span><span>%s</span></div>', esc_html($location));
                }
                if(!empty($website)){
                    echo sprintf('<div class="meta-item"><span class="optima-icon-link2"></span><span>%s</span></div>', esc_html($website));
                }
                ?>
            </div>
            <div class="portfolio-social-links"><?php optima_social_sharing(get_the_permalink(), get_the_title(), (has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : '')); ?></div>
        </div>
    </div>
</div>