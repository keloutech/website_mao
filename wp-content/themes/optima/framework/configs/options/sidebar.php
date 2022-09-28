<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}


/**
 * Sidebar settings
 *
 * @param array $sections An array of our sections.
 * @return array
 */
function optima_options_section_sidebar( $sections )
{
    $sections['sidebar'] = array(
        'name'          => 'sidebar_panel',
        'title'         => esc_html__('Sidebars', 'optima'),
        'icon'          => 'fa fa-exchange',
        'sections' => array(
            array(
                'name'      => 'sidebar_add_section',
                'title'     => esc_html__('Add Sidebar', 'optima'),
                'icon'      => 'fa fa-plus',
                'fields'    => array(
                    array(
                        'id'        => 'add_sidebars',
                        'type'      => 'group',
                        'title'     => esc_html__('Add New Sidebar', 'optima'),
                        'button_title'    => esc_html__('Add','optima'),
                        'accordion_title' => 'sidebar_id',
                        'fields'    => array(
                            array(
                                'id'        => 'sidebar_id',
                                'type'      => 'text',
                                'default'   => esc_html__('Sidebar ID', 'optima'),
                                'title'     => esc_html__('Title', 'optima')
                            ),
                            array(
                                'id'        => 'sidebar_desc',
                                'type'      => 'text',
                                'title'     => esc_html__('Description', 'optima')
                            )
                        )
                    )
                )
            ),
            array(
                'name'      => 'sidebar_page_panel',
                'title'     => esc_html__('Pages', 'optima'),
                'fields'    => array(
                    array(
                        'id'        => 'pages_global_sidebar',
                        'type'      => 'switcher',
                        'default'   => false,
                        'title'     => esc_html__('Activate Global Sidebar For Pages', 'optima'),
                        'desc'      => esc_html__('Turn on if you want to use the same sidebars on all pages. This option overrides the page options.', 'optima')
                    ),
                    array(
                        'id'             => 'pages_sidebar',
                        'type'           => 'select',
                        'title'          => esc_html__('Global Page Sidebar', 'optima'),
                        'desc'           => esc_html__('Select sidebar that will display on all pages.', 'optima'),
                        'class'          => 'chosen',
                        'options'        => 'sidebars',
                        'default_option' => esc_html__('None', 'optima')
                    )
                )
            ),
            array(
                'name'      => 'sidebar_portfolio_posts_panel',
                'title'     => esc_html__('Portfolio Posts', 'optima'),
                'fields'    => array(
                    array(
                        'id'        => 'portfolio_global_sidebar',
                        'type'      => 'switcher',
                        'default'   => false,
                        'title'     => esc_html__('Activate Global Sidebar For Portfolio Posts', 'optima'),
                        'desc'      => esc_html__('Turn on if you want to use the same sidebars on all portfolio posts. This option overrides the portfolio post options.', 'optima')
                    ),
                    array(
                        'id'             => 'portfolio_sidebar',
                        'type'           => 'select',
                        'title'          => esc_html__('Global Portfolio Post Sidebar', 'optima'),
                        'desc'           => esc_html__('Select sidebar that will display on all portfolio posts.', 'optima'),
                        'class'          => 'chosen',
                        'options'        => 'sidebars',
                        'default_option' => esc_html__('None', 'optima')
                    )
                )
            ),
            array(
                'name'      => 'sidebar_portfolio_archive_panel',
                'title'     => esc_html__('Portfolio Archive', 'optima'),
                'fields'    => array(
                    array(
                        'id'        => 'portfolio_archive_global_sidebar',
                        'type'      => 'switcher',
                        'default'   => false,
                        'title'     => esc_html__('Activate Global Sidebar For Portfolio Archive', 'optima'),
                        'desc'      => esc_html__('Turn on if you want to use the same sidebars on all portfolio archive & taxonomy. This option overrides the portfolio options.', 'optima')
                    ),
                    array(
                        'id'             => 'portfolio_archive_sidebar',
                        'type'           => 'select',
                        'title'          => esc_html__('Global Portfolio Archive Sidebar', 'optima'),
                        'desc'           => esc_html__('Select sidebar that will display on all portfolio archive & taxonomy.', 'optima'),
                        'class'          => 'chosen',
                        'options'        => 'sidebars',
                        'default_option' => esc_html__('None', 'optima')
                    )
                )
            ),
            array(
                'name'      => 'sidebar_posts_panel',
                'title'     => esc_html__('Blog Posts', 'optima'),
                'fields'    => array(
                    array(
                        'id'        => 'posts_global_sidebar',
                        'type'      => 'switcher',
                        'default'   => false,
                        'title'     => esc_html__('Activate Global Sidebar For Blog Posts', 'optima'),
                        'desc'      => esc_html__('Turn on if you want to use the same sidebars on all blog posts. This option overrides the blog post options.', 'optima')
                    ),
                    array(
                        'id'             => 'posts_sidebar',
                        'type'           => 'select',
                        'title'          => esc_html__('Global Blog Post Sidebar', 'optima'),
                        'desc'           => esc_html__('Select sidebar that will display on all blog posts.', 'optima'),
                        'class'          => 'chosen',
                        'options'        => 'sidebars',
                        'default_option' => esc_html__('None', 'optima')
                    )
                )
            ),
            array(
                'name'      => 'sidebar_blog_post_panel',
                'title'     => esc_html__('Blog Archive', 'optima'),
                'fields'    => array(
                    array(
                        'id'        => 'blog_archive_global_sidebar',
                        'type'      => 'switcher',
                        'default'   => false,
                        'title'     => esc_html__('Activate Global Sidebar For Blog Archive', 'optima'),
                        'desc'      => esc_html__('Turn on if you want to use the same sidebars on all post category & tag. This option overrides the posts options.', 'optima')
                    ),
                    array(
                        'id'             => 'blog_archive_sidebar',
                        'type'           => 'select',
                        'title'          => esc_html__('Global Blog Archive Sidebar', 'optima'),
                        'desc'           => esc_html__('Select sidebar that will display on all post category & tag.', 'optima'),
                        'class'          => 'chosen',
                        'options'        => 'sidebars',
                        'default_option' => esc_html__('None', 'optima')
                    )
                )
            ),
            array(
                'name'      => 'sidebar_search_panel',
                'title'     => esc_html__('Search Page', 'optima'),
                'fields'    => array(
                    array(
                        'id'             => 'search_sidebar',
                        'type'           => 'select',
                        'title'          => esc_html__('Search Page Sidebar', 'optima'),
                        'desc'           => esc_html__('Select sidebar that will display on the search results page.', 'optima'),
                        'class'          => 'chosen',
                        'options'        => 'sidebars',
                        'default_option' => esc_html__('None', 'optima')
                    )
                )
            ),
            array(
                'name'      => 'sidebar_products_panel',
                'title'     => esc_html__('Woocommerce Products', 'optima'),
                'fields'    => array(
                    array(
                        'id'        => 'products_global_sidebar',
                        'type'      => 'switcher',
                        'default'   => false,
                        'title'     => esc_html__('Activate Global Sidebar For WooCommerce Products', 'optima'),
                        'desc'      => esc_html__('Turn on if you want to use the same sidebars on all WooCommerce products. This option overrides the WooCommerce post options.', 'optima')
                    ),
                    array(
                        'id'             => 'products_sidebar',
                        'type'           => 'select',
                        'title'          => esc_html__('Global WooCommerce Product Sidebar', 'optima'),
                        'desc'           => esc_html__('Select sidebar that will display on all WooCommerce products.', 'optima'),
                        'class'          => 'chosen',
                        'options'        => 'sidebars',
                        'default_option' => esc_html__('None', 'optima')
                    )
                )
            ),
            array(
                'name'      => 'sidebar_shop_panel',
                'title'     => esc_html__('Woocommerce Archive', 'optima'),
                'fields'    => array(
                    array(
                        'id'        => 'shop_global_sidebar',
                        'type'      => 'switcher',
                        'default'   => false,
                        'title'     => esc_html__('Activate Global Sidebar For Woocommerce Archive', 'optima'),
                        'desc'      => esc_html__('Turn on if you want to use the same sidebars on all WooCommerce archive( shop,category,tag,search ). This option overrides the WooCommerce taxonomy options.', 'optima')
                    ),
                    array(
                        'id'             => 'shop_sidebar',
                        'type'           => 'select',
                        'title'          => esc_html__('Global WooCommerce Archive Sidebar', 'optima'),
                        'desc'           => esc_html__('Select sidebar that will display on all WooCommerce taxonomy.', 'optima'),
                        'class'          => 'chosen',
                        'options'        => 'sidebars',
                        'default_option' => esc_html__('None', 'optima')
                    )
                )
            )
        )
    );
    return $sections;
}