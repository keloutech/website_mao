<?php
global $optima_loop;
$layout             = isset($optima_loop['loop_layout']) ? $optima_loop['loop_layout'] : 'grid';
$style              = isset($optima_loop['loop_style']) ? $optima_loop['loop_style'] : 1;
$thumbnail_size     = !empty($optima_loop['image_size']) ? $optima_loop['image_size'] : 'thumbnail';
$title_tag          = !empty($optima_loop['title_tag']) ? $optima_loop['title_tag'] : 'h3';

$show_excerpt_length     = ( isset($optima_loop['excerpt_length']) && 0 < absint($optima_loop['excerpt_length']) ) ? true : false;

$post_class         = array('loop-item','grid-item','post-item');
$post_class[] = ( $show_excerpt_length ? 'show' : 'hide' ) .  '-excerpt';
?>
<article <?php post_class($post_class); ?>>
    <div class="item-inner">
        <div class="item-inner-wrap">
            <div class="item-info clearfix">
                <header class="entry-header">
                    <?php the_title( sprintf( '<%s class="entry-title"><a href="%s">',$title_tag, esc_url( get_the_permalink() ) ), sprintf('</a></%s>', $title_tag) ); ?>
                </header>
                <div class="entry-meta clearfix">
                    <?php
                    optima_entry_meta_item_postdate();
                    optima_entry_meta_item_author();
                    optima_entry_meta_item_category_list();
                    ?>
                </div>
                <?php if($show_excerpt_length): ?>
                    <div class="entry-excerpt"><?php the_excerpt(); ?></div>
                <?php endif; ?>
                <footer class="entry-meta-footer clearfix">
                    <a class="link-readmore" href="<?php the_permalink();?>"><?php esc_html_e('Read more', 'optima'); ?></a>
                </footer>
            </div>
        </div>
    </div>
</article>