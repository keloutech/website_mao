<?php
if(!has_post_thumbnail()){
    return;
}
global $optima_loop;
if(!isset($optima_loop['loop_index'])){
    $optima_loop['loop_index'] = 0;
}
$optima_loop['loop_index']++;
$loop_index     = isset($optima_loop['loop_index']) ? $optima_loop['loop_index'] : 1;
$thumbnail_size = isset($optima_loop['image_size']) && !empty($optima_loop['image_size']) ? $optima_loop['image_size'] : 'thumbnail';
$title_tag      = isset($optima_loop['title_tag']) && !empty($optima_loop['title_tag']) ? $optima_loop['title_tag'] : 'h3';
$post_class     = array('loop-item','grid-item','portfolio-item');
$category       = wp_get_post_terms(get_the_ID(), 'la_portfolio_category', array( 'fields' => 'names' ) );
?>
<article <?php post_class($post_class); ?>>
    <div class="item-inner">
        <div class="item--thumbnail">
            <a href="<?php the_permalink()?>">
            <?php
            Optima()->images->the_post_thumbnail(get_the_ID(), $thumbnail_size);
            ?>
            </a>
        </div>
        <div class="item--info">
            <div class="item--info-inner item--holder">
                <header class="entry-header">
                    <?php the_title( sprintf( '<%s class="entry-title"><a href="%s">',$title_tag, esc_url( get_the_permalink() ) ), sprintf('</a></%s>', $title_tag) ); ?>
                </header>
                <div class="entry-tax-list"><?php if(!empty($category)){
                        echo esc_html( implode(', ', $category));
                    } ?></div>
            </div>
        </div>
        <a class="item--link-overlay" href="<?php the_permalink()?>"></a>
    </div>
</article>