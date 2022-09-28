<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}


if(!class_exists('LaStudio_Swatch_Product_Term')){
    class LaStudio_Swatch_Product_Term extends LaStudio_Swatch_Term {

        protected $attribute_options;

        public function __construct($config, $option, $taxonomy, $selected = false) {
            global $_wp_additional_image_sizes;

            $this->label_type = $config->get_label_layout();
            $this->attribute_options = $attribute_options = $config->get_options();

            $this->taxonomy_slug = $taxonomy;
            if (taxonomy_exists($taxonomy)) {
                $this->term = get_term($option, $taxonomy);
                $this->term_label = $this->term->name;
                $this->term_slug = $this->term->slug;
                $this->term_name = $this->term->name;
            } else {
                $this->term = false;
                $this->term_label = $option;
                $this->term_slug = $option;
            }

            $this->selected = $selected;

            $this->size = $attribute_options['size'];
            $the_size = isset($_wp_additional_image_sizes[$this->size]) ? $_wp_additional_image_sizes[$this->size] : $_wp_additional_image_sizes['shop_thumbnail'];
            if (isset($the_size['width']) && isset($the_size['height'])) {
                $this->width = $the_size['width'];
                $this->height = $the_size['height'];
            } else {
                $this->width = 40;
                $this->height = 40;
            }

            $key = md5( sanitize_title($this->term_slug) );
            $old_key = sanitize_title($this->term_slug);
            $lookup_key = '';
            if (isset($attribute_options['attributes'][$key])) {
                $lookup_key = $key;
            } elseif (isset($attribute_options['attributes'][$old_key])) {
                $lookup_key = $old_key;
            }

            $this->type = isset($attribute_options['attributes'][$lookup_key]['type']) ? $attribute_options['attributes'][$lookup_key]['type'] : 'color';
            $this->color = isset($attribute_options['attributes'][$lookup_key]['color']) ? $attribute_options['attributes'][$lookup_key]['color'] : '#FFFFFF;';

            if (isset($attribute_options['attributes'][$lookup_key]['photo']) && $attribute_options['attributes'][$lookup_key]['photo']) {
                $this->thumbnail_id = $attribute_options['attributes'][$lookup_key]['photo'];
                $this->thumbnail_src = current(wp_get_attachment_image_src($this->thumbnail_id, $this->size));
            } else {
                $this->thumbnail_src = WC()->plugin_url() . '/assets/images/placeholder.png';
            }

        }
    }
}