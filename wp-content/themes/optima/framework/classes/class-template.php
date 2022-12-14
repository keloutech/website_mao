<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

class Optima_Template{

    public static $instance = null;

    public static function get_instance() {
        if ( null === self::$instance ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct() {
        add_filter( 'body_class', array( $this, 'body_classes' ) );
    }

    public function body_classes( $classes ) {

        if(is_rtl()){
            $classes[] = 'rtl';
        }

        $classes[] = 'optima-body';
        $classes[] = 'lastudio-optima';

        $context = (array) Optima()->get_current_context();

        $site_layout                = Optima()->layout->get_site_layout();
        $header_layout              = Optima()->layout->get_header_layout();
        $footer_layout              = Optima()->layout->get_footer_layout();
        $page_title_bar_layout      = Optima()->layout->get_page_title_bar_layout();

        $main_fullwidth             = Optima()->settings->get_setting_by_context('main_full_width','no');
        $header_full_width          = Optima()->settings->get_setting_by_context('header_full_width', 'no');
        $header_transparency        = Optima()->settings->get_setting_by_context('header_transparency', 'no');

        $footer_full_width          = Optima()->settings->get_setting_by_context('footer_full_width','no');

        $classes[] = esc_attr( 'header-v' . $header_layout);
        $classes[] = esc_attr( 'footer-v' . $footer_layout);


        if(in_array('is_404', $context)){
            $classes[] = 'body-col-1c';
            $classes[] = 'page-title-vhide';
        }
        else{
            $classes[] = esc_attr( 'body-' . $site_layout);
            $classes[] = esc_attr( 'page-title-v' . $page_title_bar_layout);
        }

        if($header_transparency == 'yes'){
            if($header_layout != 7){
                $classes[] = 'enable-header-transparency';
            }else{
                $classes[] = 'enable-header7-transparency';
            }
        }
        if($header_layout != 9 && $header_layout != 10){
            $classes[] = 'enable-header-sticky';
        }

        if($header_full_width == 'yes'){
            $classes[] = 'enable-header-fullwidth';
        }
        if($main_fullwidth == 'yes'){
            $classes[] = 'enable-main-fullwidth';
        }
        if($footer_full_width == 'yes'){
            $classes[] = 'enable-footer-fullwidth';
        }
        if(Optima()->settings->get('page_loading_animation', 'off') == 'on'){
            $classes[] = 'site-loading';
        }

        if($site_layout == 'col-1c'){
            $blog_small_layout = Optima()->settings->get('blog_small_layout', 'off');
            if(is_singular('post')){
                $single_small_layout_global = Optima()->settings->get('single_small_layout', 'off');
                $single_small_layout = Optima()->settings->get_post_meta( get_queried_object_id() , 'small_layout' );
                if($single_small_layout == 'on'){
                    $classes[] = 'enable-small-layout';
                }else{
                    if($single_small_layout_global == 'on'){
                        $classes[] = 'enable-small-layout';
                    }else{
                        if($blog_small_layout == 'on'){
                            $classes[] = 'enable-small-layout';
                        }
                    }
                }
            }
            if(in_array('is_category', $context) || in_array('is_tag', $context)){
                $blog_archive_small_layout = Optima()->settings->get_post_meta( get_queried_object_id() , 'small_layout' );
                if($blog_archive_small_layout == 'on'){
                    $classes[] = 'enable-small-layout';
                }else{
                    if($blog_small_layout == 'on'){
                        $classes[] = 'enable-small-layout';
                    }
                }
            }
        }

        if(in_array('is_page', $context)){
            $metadata = Optima()->settings->get_post_meta(get_the_ID());
            $enable_fp = (isset($metadata['enable_fp']) ? $metadata['enable_fp'] : '');
            $fp_nav_style = (isset($metadata['fp_sectionnavigationstyle']) ? $metadata['fp_sectionnavigationstyle'] : '1');
            $fp_slide_style = (isset($metadata['fp_slidenavigationstyle']) ? $metadata['fp_slidenavigationstyle'] : '1');

            $fp_bigsectionnavigation = (isset($metadata['fp_bigsectionnavigation']) ? $metadata['fp_bigsectionnavigation'] : '');
            $fp_bigslidenavigation = (isset($metadata['fp_bigslidenavigation']) ? $metadata['fp_bigslidenavigation'] : '');

            if($site_layout == 'col-1c' && ($enable_fp == 'yes' || $enable_fp == 'on')){
                $classes[] = 'la-enable-fullpage';
                if($fp_bigsectionnavigation == 'yes' || $fp_bigsectionnavigation == 'on'){
                    $classes[] = 'fp-big-nav';
                }
                if($fp_bigslidenavigation == 'yes' || $fp_bigslidenavigation == 'on'){
                    $classes[] = 'fp-big-slide-nav';
                }
            }
            if(!empty($metadata['fp_navigation'])){
                $classes[] = 'fp-nav-control-position-' . $metadata['fp_navigation'];
            }
            $classes[] = 'fp-nav-control-type-' .$fp_nav_style;
            $classes[] = 'fp-slide-control-type-' .$fp_slide_style;
        }

        if(in_array('is_404', $context)){
            $classes[] = 'enable-header-transparency';
        }

        return $classes;
    }
    
    public function comment_template( $comment, $args, $depth ){
        $GLOBALS['comment'] = $comment;
        switch ( $comment->comment_type ) :
            case 'pingback' :
            case 'trackback' :
                ?>
                <li id="pingback-comment-<?php comment_ID(); ?>">
                <p class="cmt-pingback"><?php esc_html_e( 'Pingback:', 'optima' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( 'Edit', 'optima' ), '<span class="ping-meta"><span class="edit-link">', '</span></span>' ); ?></p>
                <?php
                break;
            default :
                // Proceed with normal comments.
                ?>
            <li id="li-comment-<?php echo esc_attr(get_comment_ID()); ?>" <?php comment_class('clearfix'); ?>>
                <div id="comment-<?php echo esc_attr(get_comment_ID()); ?>" class="comment_container clearfix">
                    <?php echo get_avatar( $comment, $args['avatar_size'] ); ?>
                    <div class="comment-text">
                        <div class="comment-author"><?php comment_author_link(); ?></div>
                        <div class="meta"><?php
                            printf( '<time datetime="%1$s">%2$s</time>',
                                get_comment_time( 'c' ),
                                sprintf( esc_html_x( '%1$s', '1: date', 'optima' ), get_comment_date() )
                            );
                            edit_comment_link( esc_html__( 'Edit', 'optima' ), ' <span class="edit-link">', '</span>' ); ?>
                            <?php if ( '0' == $comment->comment_approved ) : ?>
                                <em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'optima' ); ?></em>
                            <?php endif; ?></div>
                        <div class="description"><?php comment_text(); ?></div>
                        <div class="comment-footer"><div class="reply"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></div></div>
                    </div>
                </div>
                <?php
                break;
        endswitch;
    }

    public function member_social_template( $post_id ) {
        $output = '<div class="item--social member-social">';
        if(($facebook = Optima()->settings->get_post_meta($post_id, 'facebook')) && !empty($facebook)){
            $output .= sprintf('<a class="social-facebook facebook" href="%s"><i class="fa fa-facebook"></i></a>', esc_url($facebook));
        }
        if(($twitter = Optima()->settings->get_post_meta($post_id, 'twitter')) && !empty($twitter)){
            $output .= sprintf('<a class="social-twitter twitter" href="%s"><i class="fa fa-twitter"></i></a>', esc_url($twitter));
        }
        if(($pinterest = Optima()->settings->get_post_meta($post_id, 'pinterest')) && !empty($pinterest)){
            $output .= sprintf('<a class="social-pinterest pinterest" href="%s"><i class="fa fa-pinterest-p"></i></a>', esc_url($pinterest));
        }
        if(($linkedin = Optima()->settings->get_post_meta($post_id, 'linkedin')) && !empty($linkedin)){
            $output .= sprintf('<a class="social-linkedin linkedin" href="%s"><i class="fa fa-linkedin"></i></a>', esc_url($linkedin));
        }
        if(($dribbble = Optima()->settings->get_post_meta($post_id, 'dribbble')) && !empty($dribbble)){
            $output .= sprintf('<a class="social-dribbble dribbble" href="%s"><i class="fa fa-dribbble"></i></a>', esc_url($dribbble));
        }
        if(($gplus = Optima()->settings->get_post_meta($post_id, 'google_plus')) && !empty($gplus)){
            $output .= sprintf('<a class="social-google-plus google-plus" href="%s"><i class="fa fa-google-plus"></i></a>', esc_url($gplus));
        }
        if(($youtube = Optima()->settings->get_post_meta($post_id, 'youtube')) && !empty($youtube)){
            $output .= sprintf('<a class="social-youtube youtube" href="%s"><i class="fa fa-youtube-play"></i></a>', esc_url($youtube));
        }
        if(($email = Optima()->settings->get_post_meta($post_id, 'email')) && !empty($email)){
            $output .= sprintf('<a class="social-email email" href="%s"><i class="fa fa-envelope-o"></i></a>', esc_url('mailto:'.$email));
        }
        $output .= '</div>';
        echo ( $output );
    }

}
