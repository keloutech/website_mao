<?php
if(!has_post_thumbnail()){
    return;
}
global $optima_loop;

$thumbnail_size = isset($optima_loop['image_size']) && !empty($optima_loop['image_size']) ? $optima_loop['image_size'] : 'thumbnail';
$title_tag      = isset($optima_loop['title_tag']) && !empty($optima_loop['title_tag']) ? $optima_loop['title_tag'] : 'h3';
$category       = wp_get_post_terms(get_the_ID(), 'la_portfolio_category', array( 'fields' => 'names' ) );
$post_class     = array('loop-item','portfolio-item');
?>
<article <?php post_class($post_class); ?>>
    <div class="item-inner">
        <div class="item-inner2">
            <div class="item--thumbnail">
                <a href="<?php the_permalink()?>" style="background-image: url(<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')) ?>);">
                    <span class="hidden"><?php the_title();?></span>
                </a>
            </div>
            <div class="item--info">
                <header class="entry-header">
                    <?php the_title( sprintf( '<%s class="entry-title"><a href="%s">',$title_tag, esc_url( get_the_permalink() ) ), sprintf('</a></%s>', $title_tag) ); ?>
                </header>
                <div class="entry-tax-list"><?php if(!empty($category) && !empty($category[0])){
                        echo esc_html( $category[0] );
                    } ?></div>
                <div class="item-excerpt"><?php
                    echo esc_html(wp_trim_words(Optima()->settings->get_post_meta(get_the_ID(), 'short_description'), 30))
                    ?></div>
                <a class="link-discover" href="<?php the_permalink()?>"><?php esc_html_e('Discover', 'optima') ?></a>
            </div>
        </div>
    </div>
</article>