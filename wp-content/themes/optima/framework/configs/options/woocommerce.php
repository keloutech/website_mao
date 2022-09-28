<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}


/**
 * WooCommerce settings
 *
 * @param array $sections An array of our sections.
 * @return array
 */
function optima_options_section_woocommerce( $sections )
{
    $sections['woocommerce'] = array(
        'name' => 'woocommerce_panel',
        'title' => esc_html__('WooCommerce', 'optima'),
        'icon' => 'fa fa-shopping-cart',
        'sections' => array(
            array(
                'name'      => 'woocommerce_general_section',
                'title'     => esc_html__('General WooCommerce', 'optima'),
                'icon'      => 'fa fa-check',
                'fields'    => array(
                    array(
                        'id'        => 'layout_archive_product',
                        'type'      => 'image_select',
                        'title'     => esc_html__('WooCommerce Layout', 'optima'),
                        'desc'      => esc_html__('Controls the layout of shop page, product category, product tags and search page', 'optima'),
                        'default'   => 'col-1c',
                        'radio'     => true,
                        'options'   => Optima_Options::get_config_main_layout_opts(true, false)
                    ),
                    array(
                        'id'        => 'catalog_mode',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'off',
                        'title'     => esc_html__('Catalog Mode', 'optima'),
                        'desc'      => esc_html__('Turn on to disable the shopping functionality of WooCommerce.', 'optima'),
                        'options'   => Optima_Options::get_config_radio_onoff(false)
                    ),
                    array(
                        'id'        => 'catalog_mode_price',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'off',
                        'title'     => esc_html__('Catalog Mode Price', 'optima'),
                        'desc'      => esc_html__('Turn on to do not show product price', 'optima'),
                        'options'   => Optima_Options::get_config_radio_onoff(false),
                        'dependency' => array('catalog_mode_on', '==', 'true')
                    ),
                    array(
                        'id'        => 'woocommerce_shop_page_type',
                        'default'   => 'grid',
                        'title'     => esc_html__('Shop display as type', 'optima'),
                        'desc'      => esc_html__('Controls the type display of product for the shop page', 'optima'),
                        'type'      => 'select',
                        'options'   => array(
                            'grid'        => esc_html__('Grid', 'optima'),
                            'list'        => esc_html__('List', 'optima')
                        )
                    ),
                    array(
                        'id'        => 'shop_catalog_grid_style',
                        'default'   => 'default',
                        'title'     => esc_html__('Grid Style', 'optima'),
                        'desc'      => esc_html__('Controls the type display of product for the shop page', 'optima'),
                        'type'      => 'select',
                        'options'   => array(
                            'default'  => esc_html__('Default', 'optima'),
                            '1'        => esc_html__('Style 01', 'optima'),
                            '2'        => esc_html__('Style 02', 'optima'),
                            '3'        => esc_html__('Style 03', 'optima')
                        )
                    ),
                    array(
                        'id'        => 'woocommerce_shop_page_columns',
                        'default'   => array(
                            'xlg' => 4,
                            'lg' => 4,
                            'md' => 3,
                            'sm' => 2,
                            'xs' => 1,
                            'mb' => 1
                        ),
                        'title'     => esc_html__('WooCommerce Number of Product Columns', 'optima'),
                        'desc'      => esc_html__('Controls the number of columns for the main shop page', 'optima'),
                        'type'      => 'column_responsive'
                    ),
                    array(
                        'id'        => 'product_per_page_allow',
                        'default'   => '12,15,30',
                        'title'     => esc_html__('WooCommerce Number of Products per Page Allow', 'optima'),
                        'desc'      => esc_html__('Controls the number of products that display per page.', 'optima'),
                        'info'      => esc_html__('Comma-separated. ( i.e: 3,6,9)', 'optima'),
                        'type'      => 'text'
                    ),
                    array(
                        'id'        => 'product_per_page_default',
                        'default'   => 12,
                        'title'     => esc_html__('WooCommerce Number of Products per Page', 'optima'),
                        'desc'      => esc_html__('The value of field must be as one value of setting above', 'optima'),
                        'type'      => 'number',
                        'attributes'=> array(
                            'min' => 1,
                            'max' => 100
                        )
                    ),
                    array(
                        'id'        => 'woocommerce_enable_crossfade_effect',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'off',
                        'title'     => esc_html__('WooCommerce Crossfade Image Effect', 'optima'),
                        'desc'      => esc_html__('Turn on to display the product crossfade image effect on the product.', 'optima'),
                        'options'   => Optima_Options::get_config_radio_onoff(false)
                    ),
                    array(
                        'id'        => 'woocommerce_toggle_grid_list',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'on',
                        'title'     => esc_html__('WooCommerce Product Grid / List View', 'optima'),
                        'desc'      => esc_html__('Turn on to display the grid/list toggle on the main shop page and archive shop pages.', 'optima'),
                        'options'   => Optima_Options::get_config_radio_onoff(false)
                    ),
                    array(
                        'id'        => 'woocommerce_show_rating_on_catalog',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'off',
                        'title'     => esc_html__('WooCommerce Show Ratings', 'optima'),
                        'desc'      => esc_html__('Turn on to display the ratings on the main shop page and archive shop pages.', 'optima'),
                        'options'   => Optima_Options::get_config_radio_onoff(false)
                    ),
                    array(
                        'id'        => 'woocommerce_show_quickview_btn',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'off',
                        'title'     => esc_html__('WooCommerce Show Quick View Button', 'optima'),
                        'options'   => Optima_Options::get_config_radio_onoff(false)
                    ),
                    array(
                        'id'        => 'woocommerce_show_wishlist_btn',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'off',
                        'title'     => esc_html__('WooCommerce Show Wishlist Button', 'optima'),
                        'options'   => Optima_Options::get_config_radio_onoff(false)
                    ),
                    array(
                        'id'        => 'woocommerce_show_compare_btn',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'off',
                        'title'     => esc_html__('WooCommerce Show Compare Button', 'optima'),
                        'options'   => Optima_Options::get_config_radio_onoff(false)
                    )
                )
            ),
            array(
                'name'      => 'woocommerce_single_section',
                'title'     => esc_html__('Product Page Settings', 'optima'),
                'icon'      => 'fa fa-check',
                'fields'    => array(
                    array(
                        'id'        => 'layout_single_product',
                        'type'      => 'image_select',
                        'radio'     => true,
                        'title'     => esc_html__('Product Page Layout', 'optima'),
                        'desc'      => esc_html__('Controls the layout for detail product page', 'optima'),
                        'default'   => 'col-1c',
                        'options'   => Optima_Options::get_config_main_layout_opts(true, false)
                    ),
                    array(
                        'id'        => 'woocommerce_product_page_design',
                        'default'   => '1',
                        'title'     => esc_html__('Product Page Design', 'optima'),
                        'type'      => 'select',
                        'options'   => array(
                            '1'        => esc_html__('Design 01', 'optima'),
                            '2'        => esc_html__('Design 02', 'optima')
                        )
                    ),
                    array(
                        'id'        => 'product_sharing',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'on',
                        'title'     => esc_html__('Product Sharing Option', 'optima'),
                        'desc'      => esc_html__('Turn on to show social sharing on the product page', 'optima'),
                        'options'   => Optima_Options::get_config_radio_onoff(false)
                    ),
                    array(
                        'id'        => 'product_popup',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'on',
                        'title'     => esc_html__('Product Image Popup', 'optima'),
                        'options'   => Optima_Options::get_config_radio_onoff(false)
                    ),
                    array(
                        'id'        => 'related_products',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'on',
                        'title'     => esc_html__('WooCommerce Related Products', 'optima'),
                        'desc'      => esc_html__('Turn on to show related products on the product page', 'optima'),
                        'options'   => Optima_Options::get_config_radio_onoff(false)
                    ),
                    array(
                        'id'        => 'related_products_columns',
                        'default'   => array(
                            'xlg' => 4,
                            'lg' => 4,
                            'md' => 3,
                            'sm' => 2,
                            'xs' => 1,
                            'mb' => 1
                        ),
                        'title'     => esc_html__('WooCommerce Related Product Number of Columns', 'optima'),
                        'desc'      => esc_html__('Controls the number of columns for the related', 'optima'),
                        'type'      => 'column_responsive',
                        'dependency' => array('related_products_on', '==', 'true')
                    ),
                    array(
                        'id'        => 'upsell_products',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'on',
                        'title'     => esc_html__('WooCommerce Up-sells Products', 'optima'),
                        'desc'      => esc_html__('Turn on to show Up-sells products on the product page', 'optima'),
                        'options'   => Optima_Options::get_config_radio_onoff(false)
                    ),
                    array(
                        'id'        => 'upsell_products_columns',
                        'default'   => array(
                            'xlg' => 4,
                            'lg' => 4,
                            'md' => 3,
                            'sm' => 2,
                            'xs' => 1,
                            'mb' => 1
                        ),
                        'title'     => esc_html__('WooCommerce Up-sells Product Number of Columns', 'optima'),
                        'desc'      => esc_html__('Controls the number of columns for the Up-sells', 'optima'),
                        'type'      => 'column_responsive',
                        'dependency' => array('upsell_products_on', '==', 'true')
                    ),
                )
            ),
            array(
                'name'      => 'woocommerce_cart_section',
                'title'     => esc_html__('Cart Page Settings', 'optima'),
                'icon'      => 'fa fa-shopping-cart',
                'fields'    => array(
                    array(
                        'id'        => 'crosssell_products',
                        'type'      => 'radio',
                        'class'     => 'la-radio-style',
                        'default'   => 'on',
                        'title'     => esc_html__('WooCommerce Cross-sells Products', 'optima'),
                        'desc'      => esc_html__('Turn on to show Cross-sells products on the product page', 'optima'),
                        'options'   => Optima_Options::get_config_radio_onoff(false)
                    ),
                    array(
                        'id'        => 'crosssell_products_columns',
                        'default'   => array(
                            'xlg' => 4,
                            'lg' => 4,
                            'md' => 3,
                            'sm' => 2,
                            'xs' => 1,
                            'mb' => 1
                        ),
                        'title'     => esc_html__('WooCommerce Cross-sells Product Number of Columns', 'optima'),
                        'desc'      => esc_html__('Controls the number of columns for the Cross-sells', 'optima'),
                        'type'      => 'column_responsive',
                        'dependency' => array('crosssell_products_on', '==', 'true')
                    )
                )
            )
        )
    );
    return $sections;
}