<?php
$show_featured_image    = (Optima()->settings->get('featured_images_blog') == 'on') ? true : false;
$show_format_content    = false;
$thumbnail_size         = Optima_Helper::get_image_size_from_string(Optima()->settings->get('blog_thumbnail_size', 'full'), 'full');
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
                $flag_format_content = false;
                if($show_format_content){
                    switch(get_post_format()){
                        case 'link':
                            $link = Optima()->settings->get_post_meta( get_the_ID(), 'format_link' );
                            if(!empty($link)){
                                printf(
                                    '<div class="entry-thumbnail format-link" %2$s><div class="format-content">%1$s</div><a class="post-link-overlay" href="%1$s"></a></div>',
                                    esc_url($link),
                                    ''
                                    /* has_post_thumbnail() ? 'style="background-image:url('.Optima()->images->get_post_thumbnail_url(get_the_ID()).')"' : '' */
                                );
                                $flag_format_content = true;
                            }
                            break;
                        case 'quote':
                            $quote_content = Optima()->settings->get_post_meta(get_the_ID(), 'format_quote_content');
                            $quote_author = Optima()->settings->get_post_meta(get_the_ID(), 'format_quote_author');
                            $quote_background = Optima()->settings->get_post_meta(get_the_ID(), 'format_quote_background');
                            $quote_color = Optima()->settings->get_post_meta(get_the_ID(), 'format_quote_color');
                            if(!empty($quote_content)){
                                $quote_content = '<p class="format-quote-content">'. $quote_content .'</p>';
                                if(!empty($quote_author)){
                                    $quote_content .= '<span class="quote-author">'. $quote_author .'</span>';
                                }
                                $styles = array();
                                $styles[] = 'background-color:' . $quote_background;
                                $styles[] = 'color:' . $quote_color;
                                printf(
                                    '<div class="entry-thumbnail format-quote" style="%3$s"><div class="format-content">%1$s</div><a class="post-link-overlay" href="%2$s"></a></div>',
                                    $quote_content,
                                    get_the_permalink(),
                                    esc_attr( implode(';', $styles) )
                                );
                                $flag_format_content = true;
                            }

                            break;

                        case 'gallery':
                            $ids = Optima()->settings->get_post_meta(get_the_ID(), 'format_gallery');
                            $ids = explode(',', $ids);
                            $ids = array_map('trim', $ids);
                            $ids = array_map('absint', $ids);
                            $__tmp = '';
                            if(!empty( $ids )){
                                foreach($ids as $image_id){
                                    $__tmp .= sprintf('<div><a href="%1$s">%2$s</a></div>',
                                        get_the_permalink(),
                                        Optima()->images->get_attachment_image( $image_id, $thumbnail_size)
                                    );
                                }
                            }
                            if(has_post_thumbnail()){
                                $__tmp .= sprintf('<div><a href="%1$s">%2$s</a></div>',
                                    get_the_permalink(),
                                    Optima()->images->get_post_thumbnail(get_the_ID(), $thumbnail_size )
                                );
                            }
                            if(!empty($__tmp)){
                                printf(
                                    '<div class="entry-thumbnail format-gallery"><div class="la-slick-slider" data-slider_config="%1$s">%2$s</div></div>',
                                    esc_attr(json_encode(array(
                                        'slidesToShow' => 1,
                                        'slidesToScroll' => 1,
                                        'dots' => false,
                                        'arrows' => true,
                                        'speed' => 300,
                                        'autoplay' => false,
                                        'prevArrow'=> '<button type="button" class="slick-prev"><i class="fa fa-chevron-left"></i></button>',
                                        'nextArrow'=> '<button type="button" class="slick-next"><i class="fa fa-chevron-right"></i></button>'
                                    ))),
                                    $__tmp
                                );
                                $flag_format_content = true;
                            }
                            break;

                        case 'audio':
                        case 'video':
                            $embed_source = Optima()->settings->get_post_meta(get_the_ID(), 'format_embed');
                            $embed_aspect_ration = Optima()->settings->get_post_meta(get_the_ID(), 'format_embed_aspect_ration');
                            if(!empty($embed_source)){
                                $flag_format_content = true;
                                printf(
                                    '<div class="entry-thumbnail format-embed"><div class="la-media-wrapper la-media-aspect-%2$s">%1$s</div></div>',
                                    balanceTags($embed_source, true),
                                    esc_attr($embed_aspect_ration ? $embed_aspect_ration : 'origin')
                                );
                            }
                            break;
                    }
                }
                if(!$flag_format_content && has_post_thumbnail()){ ?>
                    <div class="entry-thumbnail blog-item-has-effect">
                        <a href="<?php the_permalink();?>">
                            <?php Optima()->images->the_post_thumbnail(get_the_ID(), $thumbnail_size); ?>
                            <span class="pf-icon pf-icon-<?php echo get_post_format() ? get_post_format() : 'standard' ?>"></span>
                            <div class="item--overlay"></div>
                        </a>
                    </div>
                <?php
                }
            }
            ?>
            <div class="item-info">
                <header class="entry-header">
                    <?php the_title( sprintf( '<h3 class="entry-title"><a href="%s">', esc_url( get_the_permalink() ) ), '</a></h3>' ); ?>
                </header>
                <div class="entry-meta clearfix">
                    <?php
                    if(has_post_format()){
                        $icon_class = '';
                        switch ( get_post_format() ){
                            case 'link':
                                $icon_class = 'fa-link';
                                break;
                            case 'video':
                                $icon_class = 'fa-play-circle-o';
                                break;
                            case 'audio':
                                $icon_class = 'fa-music';
                                break;
                            case 'gallery':
                                $icon_class = 'fa-picture-o';
                                break;
                            case 'image':
                                $icon_class = 'fa-picture-o';
                                break;
                            case 'quote':
                                $icon_class = 'fa-quote-left';
                                break;
                            case 'chat':
                                $icon_class = 'fa-comments';
                                break;
                        }
                        if(!empty($icon_class)){
                            echo '<div class="post-format-icon"><i class="'.esc_attr($icon_class).'"></i></div>';
                        }
                    }
                    optima_entry_meta();
                    ?>
                </div>
                <?php
                if($content_display_type != 'full'){
                    if( Optima()->settings->get('blog_excerpt_length') ){
                        echo '<div class="entry-excerpt">';
                        the_excerpt();
                        echo '</div>';
                    }
                }
                else{
                    echo '<div class="entry-content">';
                    the_content( esc_html__( 'Continue reading', 'optima' ) );
                    wp_link_pages( array(
                        'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'optima' ) . '</span>',
                        'after'       => '</div>',
                        'link_before' => '<span>',
                        'link_after'  => '</span>',
                        'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'optima' ) . ' </span>%',
                        'separator'   => '<span class="screen-reader-text">, </span>',
                    ) );
                    echo '</div>';
                }
                ?>
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
            </div>
        </div>
    </div>
</article>