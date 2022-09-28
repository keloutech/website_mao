<?php
if(!has_post_thumbnail()){
    return;
}
global $optima_loop;
$loop_index     = isset($optima_loop['loop_index']) ? $optima_loop['loop_index'] : 1;
$thumbnail_size = isset($optima_loop['image_size']) && !empty($optima_loop['image_size']) ? $optima_loop['image_size'] : 'thumbnail';
$title_tag      = isset($optima_loop['title_tag']) && !empty($optima_loop['title_tag']) ? $optima_loop['title_tag'] : 'h3';
$post_class     = array('loop-item','grid-item','portfolio-item', 'item-overlay-effect');

?>
<article <?php post_class($post_class); ?>>
    <div class="item-inner">
        <div class="item--thumbnail">
            <a href="<?php the_permalink()?>">
            <?php
            Optima()->images->the_post_thumbnail(get_the_ID(), 'full');
            ?>
            </a>
        </div>
        <div class="item--info item--holder">
            <div class="item--info-inner">
                <header class="entry-header">
                    <?php the_title( sprintf( '<%s class="entry-title"><a href="%s">',$title_tag, esc_url( get_the_permalink() ) ), sprintf('</a></%s>', $title_tag) ); ?>
                </header>
            </div>
        </div>
        <a class="item--link-overlay" href="<?php the_permalink()?>"></a>
    </div>
</article>