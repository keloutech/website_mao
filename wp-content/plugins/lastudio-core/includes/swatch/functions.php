<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

if(!function_exists('wc_dropdown_variation_attribute_options')){
    function wc_dropdown_variation_attribute_options( $args = array() ) {
        la_swatches_variation_attribute_options( $args );
    }
}

if(!function_exists('la_swatches_variation_attribute_options')){
    function la_swatches_variation_attribute_options( $args = array() ) {
        $args = wp_parse_args( apply_filters( 'woocommerce_dropdown_variation_attribute_options_args', $args ), array(
            'options' => false,
            'attribute' => false,
            'product' => false,
            'selected' => false,
            'name' => '',
            'id' => '',
            'class' => '',
            'show_option_none' => __( 'Choose an option', 'la-studio' )
        ) );

        $options = $args['options'];
        $product = $args['product'];
        $attribute = $args['attribute'];
        $name = $args['name'] ? $args['name'] : 'attribute_' . sanitize_title( $attribute );
        $id = $args['id'] ? $args['id'] : sanitize_title( $attribute );

        $config = new LaStudio_Swatch_Attribute_Configuration_Object( $product, $attribute );

        if ( $config->get_type() == 'radio' ) :
            do_action( 'la_swatches_before_picker', $config );
            echo '<div id="picker_' . esc_attr( $id ) . '" class="radio-select select swatch-control">';
            $args['hide'] = true;
            wc_core_dropdown_variation_attribute_options( $args );
            wc_radio_variation_attribute_options( $args );
            echo '</div>';

        elseif ( $config->get_type() != 'none' && $config->get_type() != 'default' ) :

            if ( $config->get_label_layout() == 'label_above' ) :
                echo '<div class="attribute_' . $id . '_picker_label swatch-label">&nbsp;</div>';
            endif;
            do_action( 'la_swatches_before_picker', $config );

            echo '<div id="picker_' . esc_attr( $id ) . '" class="select swatch-control">';
            $args['hide'] = true;
            wc_core_dropdown_variation_attribute_options( $args );

            if ( !empty( $options ) ) {
                if ( $product && taxonomy_exists( $attribute ) ) {
                    // Get terms if this is a taxonomy - ordered. We need the names too.
                    $terms = wc_get_product_terms( $product->get_id(), $attribute, array('fields' => 'all') );

                    foreach ( $terms as $term ) {
                        if ( in_array( $term->slug, $options ) ) {
                            if ( $config->get_type() == 'term_options' ) {
                                $swatch_term = new LaStudio_Swatch_Term( $config, $term->term_id, $attribute, $args['selected'] == $term->slug, $config->get_size() );
                            } elseif ( $config->get_type() == 'product_custom' ) {
                                $swatch_term = new LaStudio_Swatch_Product_Term( $config, $term->term_id, $attribute, $args['selected'] == $term->slug );
                            }
                            do_action( 'la_swatches_before_picker_item', $swatch_term );
                            echo $swatch_term->get_output();
                            do_action( 'la_swatches_after_picker_item', $swatch_term );
                        }
                    }

                } else {
                    foreach ( $options as $option ) {
                        // This handles < 2.4.0 bw compatibility where text attributes were not sanitized.
                        $selected = sanitize_title( $args['selected'] ) === $args['selected'] ? selected( $args['selected'], sanitize_title( $option ), false ) : selected( $args['selected'], $option, false );
                        $swatch_term = new LaStudio_Swatch_Product_Term( $config, $option, $name, $selected );
                        do_action( 'la_swatches_before_picker_item', $swatch_term );
                        echo $swatch_term->get_output();
                        do_action( 'la_swatches_after_picker_item', $swatch_term );
                    }
                }
            }
            echo '</div>';

            echo '<style>.product--summary .variations tr{ width: 100%;}</style>';

            if ( $config->get_label_layout() == 'label_below' ) :
                echo '<div class="attribute_' . $id . '_picker_label swatch-label">&nbsp;</div>';
            endif;
        else :
            $args['hide'] = false;
            $args['class'] = $args['class'] .= (!empty( $args['class'] ) ? ' ' : '') . 'wc-default-select';
            wc_core_dropdown_variation_attribute_options( $args );
        endif;
    }
}

if(!function_exists('wc_core_dropdown_variation_attribute_options')){
    function wc_core_dropdown_variation_attribute_options( $args = array() ) {
        $args = wp_parse_args( apply_filters( 'woocommerce_dropdown_variation_attribute_options_args', $args ), array(
            'options' => false,
            'attribute' => false,
            'product' => false,
            'selected' => false,
            'name' => '',
            'id' => '',
            'class' => '',
            'show_option_none' => __( 'Choose an option', 'la-studio' )
        ) );

        $options = $args['options'];
        $product = $args['product'];
        $attribute = $args['attribute'];
        $name = $args['name'] ? $args['name'] : 'attribute_' . sanitize_title( $attribute );
        $id = $args['id'] ? $args['id'] : sanitize_title( $attribute );
        $class = $args['class'];

        if ( empty( $options ) && !empty( $product ) && !empty( $attribute ) ) {
            $attributes = $product->get_variation_attributes();
            $options = $attributes[$attribute];
        }

        $html = '<select id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . '" name="' . esc_attr( $name ) . '" data-attribute_name="attribute_' . esc_attr( sanitize_title( $attribute ) ) . '">';

        if ( $args['show_option_none'] ) {
            $html .= '<option value="">' . esc_html( $args['show_option_none'] ) . '</option>';
        }

        if ( !empty( $options ) ) {
            if ( $product && taxonomy_exists( $attribute ) ) {
                // Get terms if this is a taxonomy - ordered. We need the names too.
                $terms = wc_get_product_terms( $product->get_id(), $attribute, array('fields' => 'all') );

                foreach ( $terms as $term ) {
                    if ( in_array( $term->slug, $options ) ) {
                        $html .= '<option value="' . esc_attr( $term->slug ) . '" ' . selected( sanitize_title( $args['selected'] ), $term->slug, false ) . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $term->name ) ) . '</option>';
                    }
                }
            } else {
                foreach ( $options as $option ) {
                    // This handles < 2.4.0 bw compatibility where text attributes were not sanitized.
                    $selected = sanitize_title( $args['selected'] ) === $args['selected'] ? selected( $args['selected'], sanitize_title( $option ), false ) : selected( $args['selected'], $option, false );
                    $html .= '<option value="' . esc_attr( $option ) . '" ' . $selected . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $option ) ) . '</option>';
                }
            }
        }

        $html .= '</select>';

        echo apply_filters( 'woocommerce_dropdown_variation_attribute_options_html', $html, $args );
    }
}

if(!function_exists('wc_radio_variation_attribute_options')){
    function wc_radio_variation_attribute_options( $args = array() ) {
        $args = wp_parse_args( apply_filters( 'woocommerce_radio_variation_attribute_options_args', $args ), array(
            'options' => false,
            'attribute' => false,
            'product' => false,
            'selected' => false,
            'name' => '',
            'id' => '',
            'class' => '',
        ) );

        $options = $args['options'];
        $product = $args['product'];
        $attribute = $args['attribute'];
        $name = $args['name'] ? $args['name'] : 'attribute_' . sanitize_title( $attribute ) . '_' . uniqid();
        $id = $args['id'] ? $args['id'] : sanitize_title( $attribute ) . uniqid();
        $class = $args['class'];

        if ( empty( $options ) && !empty( $product ) && !empty( $attribute ) ) {
            $attributes = $product->get_variation_attributes();
            $options = $attributes[$attribute];
        }

        echo '<ul id="radio_select_' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . '" data-attribute_name="attribute_' . esc_attr( sanitize_title( $attribute ) ) . '">';

        if ( !empty( $options ) ) {
            if ( $product && taxonomy_exists( $attribute ) ) {
                // Get terms if this is a taxonomy - ordered. We need the names too.
                $terms = wc_get_product_terms( $product->id, $attribute, array('fields' => 'all') );

                foreach ( $terms as $term ) {
                    if ( in_array( $term->slug, $options ) ) {
                        echo '<li>';
                        echo '<input class="radio-option" name="' . esc_attr( $name ) . '" id="radio_' . esc_attr( $id ) . '_' . esc_attr( $term->slug ) . '" type="radio" data-value="' . esc_attr( $term->slug ) . '" value="' . esc_attr( $term->slug ) . '" ' . checked( sanitize_title( $args['selected'] ), $term->slug, false ) . ' /><label for="radio_' . esc_attr( $id ) . '_' . esc_attr( $term->slug ) . '">' . esc_html( apply_filters( 'woocommerce_variation_option_name', $term->name ) ) . '</label>';
                        echo '</li>';
                    }
                }
            } else {
                foreach ( $options as $option ) {
                    // This handles < 2.4.0 bw compatibility where text attributes were not sanitized.
                    $selected = sanitize_title( $args['selected'] ) === $args['selected'] ? checked( $args['selected'], sanitize_title( $option ), false ) : checked( $args['selected'], $option, false );
                    echo '<li>';
                    echo '<input class="radio-option" name="' . esc_attr( $name ) . '" id="radio_' . esc_attr( $id ) . '_' . esc_attr( $option ) . '" type="radio" data-value="' . esc_attr( $option ) . '" value="' . esc_attr( $option ) . '" ' . $selected . ' /><label for="radio_' . esc_attr( $id ) . '_' . esc_attr( $option ) . '">' . esc_html( apply_filters( 'woocommerce_variation_option_name', $option ) ) . '</label>';
                    echo '</li>';
                }
            }
        }

        echo '</ul>';
    }
}