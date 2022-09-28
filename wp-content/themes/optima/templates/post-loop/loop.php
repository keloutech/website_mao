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
            <?php if(has_post_thumbnail()) :?>
                <div class="entry-thumbnail blog-item-has-effect">
                    <a href="<?php the_permalink();?>">
                        <?php Optima()->images->the_post_thumbnail(get_the_ID(), $thumbnail_size); ?>
                        <span class="pf-icon pf-icon-standard"></span>
                        <div class="item--overlay"></div>
                    </a>
                </div>
            <?php endif; ?>
            <div class="item-info clearfix">
                <header class="entry-header">
                    <?php the_title( sprintf( '<%s class="entry-title"><a href="%s">',$title_tag, esc_url( get_the_permalink() ) ), sprintf('</a></%s>', $title_tag) ); ?>
                </header>
                <?php if( in_array($layout, array('grid', 'masonry')) && $style == 3): ?>
                    <div class="entry-meta-footer clearfix">
                        <?php
                        optima_entry_meta_item_postdate();
                        optima_entry_meta_item_author();
                        if(Optima()->settings->get('blog_social_sharing_box') == 'on'){
                            echo '<div class="la-sharing-posts"><span class="m-sharing-box"><i class="fa fa-share-alt"></i></span>';
                            optima_social_sharing(get_the_permalink(), get_the_title(), (has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : ''));
                            echo '</div>';
                        }
                        ?>
                    </div>
                    <?php if($show_excerpt_length): ?>
                        <div class="entry-excerpt"><?php the_excerpt(); ?></div>
                    <?php endif; ?>
                <?php else: ?>
                    <div class="entry-meta clearfix">
                        <div class="pull-left"><?php
                            optima_entry_meta_item_postdate();
                            optima_entry_meta_item_author();
                            if(!in_array($layout, array('grid', 'masonry')) && $style != 4){
                                optima_entry_meta_item_category_list();
                            }
                        ?></div>
                        <div class="pull-right"><?php
                            if(!in_array($layout, array('grid', 'masonry')) && $style != 4){
                                optima_entry_meta_item_comment_post_link();
                                optima_entry_meta_item_post_love();
                            }
                        ?></div>
                    </div>
                    <?php if($show_excerpt_length): ?>
                        <div class="entry-excerpt"><?php the_excerpt(); ?></div>
                    <?php endif; ?>
                    <footer class="entry-meta-footer clearfix">
                        <a class="link-readmore" href="<?php the_permalink();?>"><?php esc_html_e('Read more', 'optima'); ?></a>
                        <?php
                        if(Optima()->settings->get('blog_social_sharing_box') == 'on'){
                            echo '<div class="la-sharing-posts"><span class="m-sharing-box"><i class="fa fa-share-alt"></i></span>';
                            optima_social_sharing(get_the_permalink(), get_the_title(), (has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : ''));
                            echo '</div>';
                        }
                        ?>
                    </footer>
                <?php endif; ?>
            </div>
        </div>
    </div>
</article>