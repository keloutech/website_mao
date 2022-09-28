<?php
global $optima_loop;

$index              = !empty($optima_loop['special_index']) ? absint($optima_loop['special_index']) : 0;
$thumbnail_size     = !empty($optima_loop['image_size']) ? $optima_loop['image_size'] : 'thumbnail';
$thumbnail_size2     = !empty($optima_loop['image_size2']) ? $optima_loop['image_size2'] : 'thumbnail';
$title_tag          = !empty($optima_loop['title_tag']) ? $optima_loop['title_tag'] : 'h3';
$post_class         = array('loop-item','post-item');
$index++;
$optima_loop['special_index'] = $index;
if($index > 1){
    $thumbnail_size = $thumbnail_size2;
}
?>
<article <?php post_class($post_class); ?>>
    <div class="item-inner">
        <div class="item-inner-wrap">
            <?php
            if(has_post_thumbnail()){ ?>
                <div class="entry-thumbnail blog-item-has-effect">
                    <a href="<?php the_permalink();?>">
                        <?php Optima()->images->the_post_thumbnail(get_the_ID(), $thumbnail_size); ?>
                        <span class="pf-icon pf-icon-standard"></span>
                        <div class="item--overlay"></div>
                    </a>
                </div>
                <?php
            }
            ?>
            <div class="item-info">
                <header class="entry-header">
                    <?php the_title( sprintf( '<%s class="entry-title"><a href="%s">',$title_tag, esc_url( get_the_permalink() ) ), sprintf('</a></%s>', $title_tag) ); ?>
                </header>
                <div class="entry-meta clearfix">
                    <?php
                    optima_entry_meta();
                    ?>
                </div>
                <div class="entry-excerpt"><?php the_excerpt(); ?></div>
                <footer class="entry-meta-footer clearfix">
                    <a class="link-readmore" href="<?php the_permalink();?>"><?php esc_html_e('Read more', 'optima'); ?></a>
                </footer>
            </div>
        </div>
    </div>
</article>
<?php if($index == 1): ?>
    </div>
    <div class="blog-special-right col-xs-12 col-sm-6">
<?php endif; ?>