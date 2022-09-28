<?php
$show_featured_image    = (Optima()->settings->get('featured_images_blog') == 'on') ? true : false;
$show_format_content    = false;
$thumbnail_size         = Optima()->settings->get('blog_thumbnail_size', 'full');
$content_display_type   = ( Optima()->settings->get('blog_content_display', 'excerpt') == 'excerpt') ? 'excerpt' : 'full';
$post_class             = array('loop-item','grid-item','post-item');
if($show_featured_image){
    $show_format_content    = (Optima()->settings->get('format_content_blog') == 'on') ? true : false;
}

if($show_featured_image){
    $post_class[] = 'show-featured-image';
}else{
    $post_class[] = 'hide-featured-image';
}
if($show_format_content){
    $post_class[] = 'show-format-content';
}else{
    $post_class[] = 'hide-format-content';
}
if($content_display_type != 'full' && !Optima()->settings->get('blog_excerpt_length')){
    $post_class[] = 'hide-excerpt';
}

?>
<article <?php post_class($post_class); ?>>
    <div class="item-inner">
        <div class="item-inner-wrap">
            <?php
            if($show_featured_image){
                if( has_post_thumbnail()){ ?>
                    <div class="entry-thumbnail">
                        <a href="<?php the_permalink();?>">
                            <?php Optima()->images->the_post_thumbnail(get_the_ID(), $thumbnail_size); ?>
                        </a>
                    </div>
                    <?php
                }
            }
            ?>
            <div class="item-info">
                <header class="entry-header">
                    <?php the_title( sprintf( '<h3 class="entry-title h4"><a href="%s">', esc_url( get_the_permalink() ) ), '</a></h3>' ); ?>
                </header>
                <div class="entry-meta clearfix">
                    <?php optima_entry_meta_item_postdate(); ?>
                </div>
                <div class="entry-excerpt">
                    <?php the_excerpt(); ?>
                </div>
                <footer class="entry-meta-footer clearfix">
                    <a class="link-readmore" href="<?php the_permalink();?>"><?php esc_html_e('Read more', 'optima'); ?></a>
                </footer>
            </div>
        </div>
    </div>
</article>