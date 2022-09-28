<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

class Optima_Init{

    public function __construct(){
        add_action( 'after_setup_theme', array( $this, 'load_textdomain' ) );
        add_action( 'after_setup_theme', array( $this, 'add_theme_supports' ) );
        add_action( 'after_setup_theme', array( $this, 'register_nav_menus' ) );
        add_action( 'after_setup_theme', array( $this, 'set_default_options' ) );

        add_action( 'widgets_init', array( $this, 'widget_init' ) );

        // Add contact methods for author page.
        add_filter( 'user_contactmethods', array( $this, 'modify_contact_methods' ) );
    }

    public function load_textdomain(){
        load_theme_textdomain( 'optima', Optima::$template_dir_path . '/languages' );
        load_child_theme_textdomain( 'optima', Optima::$stylesheet_dir_path . '/languages' );
    }

    public function add_theme_supports(){
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'custom-header' );
        add_theme_support( 'custom-background' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'post-formats', array(
            'quote',
            'image',
            'video',
            'link',
            'audio',
            'gallery'
        ) );
        add_theme_support( 'menus' );
        add_theme_support( 'woocommerce');

    }

    public function register_nav_menus(){
        register_nav_menus( array(
            'top-nav'    => esc_attr__( 'Top Navigation', 'optima' ),
            'main-nav'   => esc_attr__( 'Main Navigation', 'optima' ),
            'aside-nav'   => esc_attr__( 'Aside Navigation', 'optima' )
        ) );
    }

    public function set_default_options(){
        if(!get_option(Optima()->get_option_name())){
            add_option(
                Optima()->get_option_name(),
                json_decode('{"layout":"col-2cl","page_title_bar_layout":"1","layout_blog":"col-2cl","blog_design":"grid_1","blog_post_column":{"xlg":"1","lg":"1","md":"1","sm":"1","xs":"1","mb":"1"},"featured_images_blog":"on","blog_thumbnail_size":"full","format_content_blog":"off","blog_content_display":"excerpt","blog_excerpt_length":"100","blog_masonry":"off","blog_pagination_type":"pagination","layout_single_post":"inherit","page_title_bar_layout_single":"off","featured_images_single":"off","blog_pn_nav":"on","blog_post_title":"off","blog_author_info":"on","blog_social_sharing_box":"on","blog_related_posts":"on","blog_related_design":"1","blog_related_by":"random","blog_related_max_post":"1","blog_comments":"on","social_links":{"1":{"title":"Facebook","icon":"fa fa-facebook","link":"#"},"2":{"title":"Twitter","icon":"fa fa-twitter","link":"#"},"3":{"title":"Pinterest","icon":"fa fa-pinterest-p","link":"#"}},"sharing_facebook":true,"sharing_twitter":true,"sharing_google_plus":true,"sharing_pinterest":true}',true)
            );
        }
        remove_image_size('yith-woocompare-image');
        add_editor_style( 'editor-style.css' );
    }

    public function widget_init(){
        register_widget('Optima_Widget_Contact_Info');
        register_widget('Optima_Widget_Twitter_Feed');
        register_sidebar(array(
            'name'          => esc_attr__( 'Sidebar Widget Area', 'optima' ),
            'id'            => 'sidebar-primary',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title"><span>',
            'after_title'   => '</span></h4>'
        ));
        register_sidebar(array(
            'name'          => esc_attr__( 'Sidebar Shop Filter', 'optima' ),
            'id'            => 'sidebar-shop-filter',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title"><span>',
            'after_title'   => '</span></h4>'
        ));
        register_sidebar(array(
            'name'          => esc_attr__( 'Aside Header Widget Area', 'optima' ),
            'id'            => 'aside-widget',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title"><span>',
            'after_title'   => '</span></h4>'
        ));
        register_sidebar( array(
            'name'          => esc_attr__( 'Footer Widget Area Column 1', 'optima' ),
            'id'            => 'f-col-1',
            'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-inner">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<h4 class="h3 widget-title"><span>',
            'after_title'   => '</span></h4>'
        ) );
        register_sidebar( array(
            'name'          => esc_attr__( 'Footer Widget Area Column 2', 'optima' ),
            'id'            => 'f-col-2',
            'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-inner">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<h4 class="h3 widget-title"><span>',
            'after_title'   => '</span></h4>'
        ) );
        register_sidebar( array(
            'name'          => esc_attr__( 'Footer Widget Area Column 3', 'optima' ),
            'id'            => 'f-col-3',
            'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-inner">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<h4 class="h3 widget-title"><span>',
            'after_title'   => '</span></h4>',
        ) );
        register_sidebar( array(
            'name'          => esc_attr__( 'Footer Widget Area Column 4', 'optima' ),
            'id'            => 'f-col-4',
            'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-inner">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<h4 class="h3 widget-title"><span>',
            'after_title'   => '</span></h4>'
        ) );
        register_sidebar(array(
            'name'          => esc_attr__( 'Custom Block Top', 'optima' ),
            'id'            => 'la-custom-block-top',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="h3 widget-title"><span>',
            'after_title'   => '</span></h4>'
        ));
        register_sidebar(array(
            'name'          => esc_attr__( 'Custom Block Inner Top', 'optima' ),
            'id'            => 'la-custom-block-inner-top',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="h3 widget-title"><span>',
            'after_title'   => '</span></h4>'
        ));
        register_sidebar(array(
            'name'          => esc_attr__( 'Custom Block Inner Bottom', 'optima' ),
            'id'            => 'la-custom-block-inner-bottom',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="h3 widget-title"><span>',
            'after_title'   => '</span></h4>'
        ));
        register_sidebar(array(
            'name'          => esc_attr__( 'Custom Block Bottom', 'optima' ),
            'id'            => 'la-custom-block-bottom',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="h3 widget-title"><span>',
            'after_title'   => '</span></h4>'
        ));
        
        $dynamic_sidebar = Optima()->settings->get('add_sidebars');
        if(!empty($dynamic_sidebar)){
            foreach($dynamic_sidebar as $sidebar){
                if(empty($sidebar['sidebar_id'])){
                    continue;
                }
                register_sidebar(array(
                    'name'          => esc_html($sidebar['sidebar_id']),
                    'id'            => sanitize_title($sidebar['sidebar_id']),
                    'description'   => sprintf(__('ID:{{%s}} ', 'optima'), sanitize_title($sidebar['sidebar_id'])) . (!empty($sidebar['sidebar_desc']) ? esc_html($sidebar['sidebar_desc']) : ''),
                    'before_widget' => '<div id="%1$s" class="widget %2$s">',
                    'after_widget'  => '</div>',
                    'before_title'  => '<h4 class="h3 widget-title"><span>',
                    'after_title'   => '</span></h4>',
                ));
            }
        }
    }

    public function modify_contact_methods( $profile_fields ) {
        // Add new fields.
        $profile_fields['author_custom']   = esc_html__('Custom Message (Author Page)', 'optima');
        $profile_fields['author_facebook'] = esc_html__('Facebook (Author Page)', 'optima');
        $profile_fields['author_twitter']  = esc_html__('Twitter (Author Page)','optima');
        $profile_fields['author_pinterest']  = esc_html__('Pinterest (Author Page)','optima');
        $profile_fields['author_linkedin'] = esc_html__('LinkedIn (Author Page)','optima');
        $profile_fields['author_gplus']    = esc_html__('Google+ (Author Page)','optima');
        $profile_fields['author_dribble']  = esc_html__('Dribble (Author Page)','optima');

        return $profile_fields;
    }

}