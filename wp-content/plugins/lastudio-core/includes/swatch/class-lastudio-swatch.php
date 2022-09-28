<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

if(!class_exists('LaStudio_Swatch')){

    class LaStudio_Swatch{

        public static $instance = null;

        public static $image_width = 40;
        public static $image_height = 40;

        public static function register() {
            if ( null === self::$instance ) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        private function __construct(){
            if(!$this->is_active_woocommerce()){
                return;
            }

            require_once 'functions.php';

            if(is_admin()){
                add_action( 'created_term', array($this, 'saveTermMeta'), 10, 3 );
                add_action( 'edit_term', array($this, 'saveTermMeta'), 10, 3 );
            }
            add_action('admin_init', array( $this, 'admin_init'), 99);

            add_action( 'woocommerce_product_write_panel_tabs', array($this, 'product_write_panel_tabs'), 99 );
            add_action( 'woocommerce_product_data_panels', array($this, 'product_data_panel_wrap'), 99 );
            //add_action( 'woocommerce_product_write_panels', array($this, 'product_data_panel_wrap'), 99 );
            add_action( 'woocommerce_process_product_meta', array($this, 'process_meta_box'), 1, 2 );

            add_action( 'wp_ajax_get_product_variations', array($this, 'get_product_variations') );
            add_action( 'wp_ajax_nopriv_get_product_variations', array($this, 'get_product_variations') );
            add_action( 'woocommerce_delete_product_transients', array($this, 'on_deleted_transient'), 10, 1 );

            add_action( 'wp_ajax_la_render_swatches_panel', array($this, 'ajax_render_swatches_panel') );

            add_action( 'wp_enqueue_scripts', array($this, 'enqueue') );
            add_action( 'admin_enqueue_scripts', array($this, 'admin_enqueue') );

            add_action( 'widgets_init', array( $this, 'override_woocommerce_widgets' ), 15 );
        }

        public function is_active_woocommerce(){
            include_once ABSPATH . 'wp-admin/includes/plugin.php';
            return is_plugin_active('woocommerce/woocommerce.php');
        }

        public function admin_enqueue(){
            wp_enqueue_script( 'la-swatches', LaStudio_Plugin::$plugin_dir_url . 'assets/js/swatches-admin.js', array('jquery'), false, true );
        }

        public function enqueue(){
//            wp_enqueue_style( 'la-swatches', LaStudio_Plugin::$plugin_dir_url . 'assets/css/swatches.css' );
            wp_enqueue_script( 'la-swatches', LaStudio_Plugin::$plugin_dir_url . 'assets/js/swatches.js', array('jquery'), false, true );
            wp_localize_script('la-swatches', 'la_swatches', array(
                'ajax_url' => admin_url( 'admin-ajax.php' )
            ) );
        }

        public function admin_init(){
            $attribute_taxonomies = wc_get_attribute_taxonomies();
            if ( $attribute_taxonomies ) {
                foreach ( $attribute_taxonomies as $tax ) {

                    add_action( 'pa_' . $tax->attribute_name . '_add_form_fields', array(&$this, 'addFormFields') );
                    add_action( 'pa_' . $tax->attribute_name . '_edit_form_fields', array(&$this, 'editFormFields'), 10, 2 );

                    add_filter( 'manage_edit-pa_' . $tax->attribute_name . '_columns', array(&$this, 'addThumbToTable') );
                    add_filter( 'manage_pa_' . $tax->attribute_name . '_custom_column', array(&$this, 'showThumbToTable'), 10, 3 );
                }
            }
        }

        public function addFormFields($taxonomy){
            $unique_id = 'la_swatches';
            echo '<div class="la-framework la-taxonomy la-taxonomy-add-fields">';
            echo la_fw_add_element(array(
                'id'             => 'type',
                'type'           => 'select',
                'title'          => esc_html__('Swatch Type', 'la-studio'),
                'default'        => 'none',
                'attributes'     => array(
                    'data-depend-id' => 'la_swatches_type'
                ),
                'options'        => array(
                    'none'          => esc_html__('None', 'la-studio'),
                    'color'         => esc_html__('Color Swatch', 'la-studio'),
                    'photo'         => esc_html__('Photo', 'la-studio'),
                )
            ), '', $unique_id);
            echo la_fw_add_element(array(
                'id'    => 'color',
                'type'  => 'color_picker',
                'title' => esc_html__('Color', 'la-studio'),
                'rgba'  => false,
                'dependency' => array('la_swatches_type', '==' , 'color')
            ), '', $unique_id);
            echo la_fw_add_element(array(
                'id'    => 'photo',
                'type'  => 'image',
                'title' => esc_html__('Photo', 'la-studio'),
                'dependency' => array('la_swatches_type', '==' , 'photo')
            ), '', $unique_id);
            echo '</div>';
        }
        public function editFormFields($term, $taxonomy){
            $unique_id = 'la_swatches';
            $data = get_term_meta($term->term_id, 'la_swatches', true);
            $type = 'none';
            $color = $photo = '';
            if(isset($data['type'])){
                $type = $data['type'];
            }
            if(isset($data['color'])){
                $color = $data['color'];
            }
            if(isset($data['photo'])){
                $photo = $data['photo'];
            }

            echo '<tr><td colspan="2" style="padding: 0"><div class="la-framework la-taxonomy la-taxonomy-edit-fields">';
            echo la_fw_add_element(array(
                'id'             => 'type',
                'type'           => 'select',
                'title'          => esc_html__('Swatch Type', 'la-studio'),
                'default'        => 'none',
                'attributes'     => array(
                    'data-depend-id' => 'la_swatches_type'
                ),
                'options'        => array(
                    'none'          => esc_html__('None', 'la-studio'),
                    'color'         => esc_html__('Color Swatch', 'la-studio'),
                    'photo'         => esc_html__('Photo', 'la-studio'),
                )
            ), $type, $unique_id);
            echo la_fw_add_element(array(
                'id'    => 'color',
                'type'  => 'color_picker',
                'title' => esc_html__('Color', 'la-studio'),
                'rgba'  => false,
                'dependency' => array('la_swatches_type', '==' , 'color')
            ), $color, $unique_id);
            echo la_fw_add_element(array(
                'id'    => 'photo',
                'type'  => 'image',
                'title' => esc_html__('Photo', 'la-studio'),
                'dependency' => array('la_swatches_type', '==' , 'photo')
            ), $photo, $unique_id);
            echo '</div></td></tr>';
        }
        public function saveTermMeta($term_id, $tt_id, $taxonomy){
            if ( isset( $_POST['la_swatches'] ) ) {
                $data = $_POST['la_swatches'];
                update_term_meta( $term_id, 'la_swatches', $data );
            }
        }
        //Registers a column for this attribute taxonomy for this image
        public function addThumbToTable( $columns ) {
            $new_columns = array();
            if(isset($columns['cb'])){
                $new_columns['cb'] = $columns['cb'];
                $new_columns['la_swatches'] = __( 'Thumbnail', 'la-studio' );
                unset( $columns['cb'] );
                $columns = array_merge( $new_columns, $columns );
            }
            return $columns;
        }

        public function showThumbToTable( $columns, $column, $id ) {
            if ( $column == 'la_swatches' ) :
                $data = get_term_meta($id, 'la_swatches', true);
                $output = '';
                if(isset($data['type'])){
                    $type = $data['type'];

                    if($type == 'color'){
                        if(isset($data['color'])){
                            $output .= '<span class="type-color" style="background-color:'. $data['color'] .'"></span>';
                        }else{
                            $output .= '<span class="type-none">Not Set</span>';
                        }
                    }elseif($type == 'photo'){
                        if(isset($data['photo']) && wp_attachment_is_image($data['photo'])){
                            $output .= wp_get_attachment_image($data['photo'], array( self::$image_width, self::$image_height));
                        }else{
                            $output .= '<span class="type-none">'.__('Not Set', 'la-studio').'</span>';
                        }
                    }else{
                        $output .= '<span class="type-none">'.__('None', 'la-studio').'</span>';
                    }

                }else{
                    $output .= '<span class="type-none">'.__('None', 'la-studio').'</span>';
                }
                $columns .= $output;
            endif;
            return $columns;
        }

        public function product_write_panel_tabs() {
            ?>
            <li class="tab_la_swatches show_if_variable"><a href="#panel_la_swatches"><?php esc_html_e('La Swatches', 'la-studio') ?></a></li>
            <?php
        }

        public function product_data_panel_wrap() {
            global $post;
            ?>
            <div id="panel_la_swatches" class="panel tab_la_swatches woocommerce_options_panel wc-metaboxes-wrapper">
                <?php $this->render_product_tab_content(); ?>
            </div>
            <?php
        }

        public function render_product_tab_content(  ) {
            global $post;
            $post_id = $post->ID;
            $variation_attribute_found = true;

            $unique_id = 'la_swatch_data';

            $default_type = array(
                'none' => esc_html__('None', 'la-studio'),
                'term_options' => esc_html__('Taxonomy Colors and Images', 'la-studio'),
                'product_custom' => esc_html__('Custom Colors and Images', 'la-studio')
            );
            $default_layout = array(
                'default' => esc_html__('Default', 'la-studio'),
                'only_label' => esc_html__('Show Only Label', 'la-studio')
            );

            $default_sub_type = array(
                'color'    => esc_html__('Color Swatch', 'la-studio'),
                'photo'    => esc_html__('Image Swatch', 'la-studio')
            );

            $product = wc_get_product($post_id);
            $product_type_array = array('variable', 'variable-subscription');

            if ( !in_array( $product->get_type(), $product_type_array ) ) {
                $variation_attribute_found = false;
            }

            $attributes_name = wp_list_pluck( wc_get_attribute_taxonomies(),'attribute_label' ,'attribute_name' );
            $product_swatches_data = get_post_meta( $post_id, '_la_swatch_data', true);
            if(!$product_swatches_data){
                $product_swatches_data = array();
            }

            ?>
            <div id="panel_la_swatches_inner" class="options_group la-content">
                <?php if ( ! $variation_attribute_found ) : ?>
                    <div id="message" class="inline notice woocommerce-message">
                        <p><?php _e( 'Before you can add a swatches you need to add some variation attributes on the <strong>Attributes</strong> tab.', 'la-studio' ); ?></p>
                        <p>
                            <a class="button-primary" href="<?php echo esc_url( apply_filters( 'woocommerce_docs_url', 'https://docs.woocommerce.com/document/variable-product/', 'product-variations' ) ); ?>" target="_blank"><?php _e( 'Learn more', 'la-studio' ); ?></a>
                        </p>
                    </div>

                <?php else : ?>
                    <div class="fields_header">
                        <table class="widefat">
                            <thead>
                            <th class="attribute_swatch_label">
                                <?php _e( 'Product Attribute Name', 'la-studio' ); ?>
                            </th>
                            <th class="attribute_swatch_type">
                                <?php _e( 'Attribute Control Type', 'la-studio' ); ?>
                            </th>
                            </thead>
                        </table>
                    </div>
                    <div class="fields">
                        <?php

                        $attributes = $product->get_variation_attributes();
                        if(!empty($attributes)){
                            foreach ( $attributes as $taxonomy_key => $attribute_list ){
                                if(empty($attribute_list)){
                                    continue;
                                }
                                $attribute_terms = array();
                                $current_is_tax = taxonomy_exists($taxonomy_key);
                                $key_attr = md5( str_replace( '-', '_', sanitize_title( $taxonomy_key ) ) );
                                $tax_title = $taxonomy_key;
                                if($current_is_tax){
                                    $tax_title = $attributes_name[str_replace('pa_', '', $taxonomy_key)];
                                    $terms = get_terms( $taxonomy_key, array('hide_empty' => false) );
                                    foreach( $terms as $term ){
                                        if ( in_array( $term->slug, $attribute_list ) ) {
                                            $attribute_terms[] = array('id' => md5( $term->slug ), 'label' => $term->name, 'old_id' => $term->slug);
                                        }
                                    }
                                }else{
                                    foreach ( $attribute_list as $term ) {
                                        $attribute_terms[] = array('id' => ( md5( sanitize_title( strtolower( $term ) ) ) ), 'label' => esc_html( $term ), 'old_id' => esc_attr( sanitize_title( $term ) ));
                                    }
                                }
                                if(empty($attribute_terms)){
                                    continue;
                                }

                                $parent_type = 'none';
                                $parent_layout = 'default';
                                if(!empty($product_swatches_data[$key_attr]['type'])){
                                    $parent_type = $product_swatches_data[$key_attr]['type'];
                                }
                                if(!empty($product_swatches_data[$key_attr]['layout'])){
                                    $parent_layout = $product_swatches_data[$key_attr]['layout'];
                                }
                                if($current_is_tax){
                                    $default_parent_type = $default_type;
                                }else{
                                    $default_parent_type = $default_type;
                                    unset($default_parent_type['term_options']);
                                }
                                ?>
                                <div class="field">
                                    <div class="la_swatch_field_meta">
                                        <table class="widefat">
                                            <tbody>
                                            <tr>
                                                <td class="attribute_swatch_label">
                                                    <strong><a class="la_swatch_field row-title" href="javascript:;"><?php echo esc_html($tax_title) ?></a></strong>
                                                </td>
                                                <td class="attribute_swatch_type"><?php echo $default_parent_type[$parent_type]; ?></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="la_swatch_field_form_mask">
                                        <div class="field_form">
                                            <?php

                                            echo la_fw_add_element(array(
                                                'id'             => $key_attr . '_type',
                                                'type'           => 'select',
                                                'name'           => $unique_id . '[' . $key_attr . ']' . '[type]',
                                                'title'          => esc_html__('Type', 'la-studio'),
                                                'default'        => 'none',
                                                'class'          => 'la-parent-type-class',
                                                'options'        => $default_parent_type
                                            ), $parent_type);
                                            echo la_fw_add_element(array(
                                                'id'             => $key_attr . '_layout',
                                                'type'           => 'select',
                                                'name'           => $unique_id . '[' . $key_attr . ']' . '[layout]',
                                                'title'          => esc_html__('Layout', 'la-studio'),
                                                'default'        => 'default',
                                                'options'        => $default_layout,
                                                'dependency' => array( $key_attr . '_type', '!=' , 'none')
                                            ), $parent_layout);
                                            ?>
                                            <div class="la-element la-field-fieldset" data-controller="<?php echo esc_attr($key_attr) ?>_type" data-condition="==" data-value="product_custom">
                                                <div class="la-title"><h4><?php esc_html_e('Attribute Configuration', 'la-studio') ?></h4></div>
                                                <div class="la-fieldset">
                                                    <div class="la-inner">
                                                        <div class="product_custom">
                                                            <div class="fields_header">
                                                                <table class="widefat">
                                                                    <thead>
                                                                    <th class="attribute_swatch_preview">
                                                                        <?php _e( 'Preview', 'la-studio' ); ?>
                                                                    </th>
                                                                    <th class="attribute_swatch_label">
                                                                        <?php _e( 'Attribute', 'la-studio' ); ?>
                                                                    </th>
                                                                    <th class="attribute_swatch_type">
                                                                        <?php _e( 'Type', 'la-studio' ); ?>
                                                                    </th>
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                            <div class="fields">
                                                                <?php foreach($attribute_terms as $attribute_term): ?>
                                                                    <?php
                                                                    $key_sub_attr = $attribute_term['id'];
                                                                    $current_attribute_type = 'color';
                                                                    $current_attribute_color =  '#fff';
                                                                    $current_attribute_photo =  0;
                                                                    if(!empty($product_swatches_data[$key_attr]['attributes'][$key_sub_attr]['type'])){
                                                                        $current_attribute_type = $product_swatches_data[$key_attr]['attributes'][$key_sub_attr]['type'];
                                                                    }
                                                                    if(!empty($product_swatches_data[$key_attr]['attributes'][$key_sub_attr]['color'])){
                                                                        $current_attribute_color = $product_swatches_data[$key_attr]['attributes'][$key_sub_attr]['color'];
                                                                    }
                                                                    if(!empty($product_swatches_data[$key_attr]['attributes'][$key_sub_attr]['photo'])){
                                                                        $current_attribute_photo = $product_swatches_data[$key_attr]['attributes'][$key_sub_attr]['photo'];
                                                                    }
                                                                    ?>
                                                                    <div class="sub_field field">
                                                                        <div class="la_swatch_field_meta">
                                                                            <table class="widefat">
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td class="attribute_swatch_preview">
                                                                                        <span class="attr-prev-type-color"<?php if($current_attribute_type == 'photo') echo ' style="display:none"' ?> style="background-color:<?php echo $current_attribute_color?>"></span>
                                                                                        <span class="attr-prev-type-image"<?php if($current_attribute_type == 'color') echo ' style="display:none"' ?>>
                                                                                            <?php
                                                                                            if($thumb_url = wp_get_attachment_image_url($current_attribute_photo, array(self::$image_width, self::$image_height))){
                                                                                                printf('<img src="%s" alt=""/>', $thumb_url);
                                                                                            }else{
                                                                                                echo '<span></span>';
                                                                                            }
                                                                                            ?>
                                                                                        </span>
                                                                                    </td>
                                                                                    <td class="attribute_swatch_label"><?php echo $attribute_term['label']; ?></td>
                                                                                    <td class="attribute_swatch_type">
                                                                                        <?php echo $default_sub_type[$current_attribute_type]; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        <div class="la_swatch_field_form_mask">
                                                                            <div class="field_form">
                                                                                <?php
                                                                                echo la_fw_add_element(array(
                                                                                    'id'             => $key_attr . '_attributes_' . $key_sub_attr . '_type',
                                                                                    'type'           => 'select',
                                                                                    'name'           => $unique_id . '[' . $key_attr . ']' . '[attributes]['. $key_sub_attr . '][type]',
                                                                                    'title'          => esc_html__('Attribute Color or Image', 'la-studio'),
                                                                                    'default'        => 'color',
                                                                                    'options'        => $default_sub_type
                                                                                ), $current_attribute_type);
                                                                                echo la_fw_add_element(array(
                                                                                    'id'            => $key_attr . '_attributes_' . $key_sub_attr . '_color',
                                                                                    'type'          => 'color_picker',
                                                                                    'name'          => $unique_id . '[' . $key_attr . ']' . '[attributes]['. $key_sub_attr . '][color]',
                                                                                    'title'         => esc_html__('Color', 'la-studio'),
                                                                                    'rgba'          => false,
                                                                                    'dependency'    => array($key_attr . '_attributes_' . $key_sub_attr . '_type', '==' , 'color')
                                                                                ), $current_attribute_color);
                                                                                echo la_fw_add_element(array(
                                                                                    'id'            => $key_attr . '_attributes_' . $key_sub_attr . '_photo',
                                                                                    'type'          => 'image',
                                                                                    'name'          => $unique_id . '[' . $key_attr . ']' . '[attributes]['. $key_sub_attr . '][photo]',
                                                                                    'title'         => esc_html__('Photo', 'la-studio'),
                                                                                    'dependency'    => array($key_attr . '_attributes_' . $key_sub_attr . '_type', '==' , 'photo')
                                                                                ), $current_attribute_photo);
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php endforeach; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php
        }

        public function ajax_render_swatches_panel(){
            die();
        }

        public function process_meta_box( $post_id, $post ) {
            $la_swatch_data = isset( $_POST['la_swatch_data'] ) ? $_POST['la_swatch_data'] : false;
            if(!empty($la_swatch_data)){
                update_post_meta( $post_id, '_la_swatch_data', $la_swatch_data );
                update_post_meta( $post_id, '_swatch_type', 'pickers' );
            }else{
                delete_post_meta( $post_id , '_swatch_type', 'pickers');
            }
        }


        public function get_product_variations() {
            if ( !isset( $_POST['product_id'] ) || empty( $_POST['product_id'] ) ) {
                wp_send_json_error();
                die();
            }

            $product = wc_get_product( $_POST['product_id'] );
            $variations = $this->wc_swatches_get_available_variations( $product );

            wp_send_json_success( $variations );
            die();
        }

        /**
         * Get an array of available variations for the a product.
         * Use this function as it's faster than the core implementation.
         * @return array
         */
        private function wc_swatches_get_available_variations( $product ) {
            global $wpdb;

            $transient_name = 'la_swatches_av_' . $product->get_id();
            $transient_data = get_transient($transient_name);
            if (!empty($transient_data)){
                return $transient_data;
            }

            $available_variations = array();

            //Get the children all in one call.
            //This will prime the WP_Post cache so calls to get_child are much faster.

            $args = array(
                'post_parent' => $product->get_id(),
                'post_type' => 'product_variation',
                'orderby' => 'menu_order',
                'order' => 'ASC',
                'post_status' => 'publish',
                'numberposts' => -1,
                'no_found_rows' => true
            );
            $children = get_posts( $args );

            foreach ( $children as $child ) {
                $variation = $product->get_child( $child );

                // Hide out of stock variations if 'Hide out of stock items from the catalog' is checked
                if ( empty( $variation->variation_id ) || ( 'yes' === get_option( 'woocommerce_hide_out_of_stock_items' ) && !$variation->is_in_stock() ) ) {
                    continue;
                }

                // Filter 'woocommerce_hide_invisible_variations' to optionally hide invisible variations (disabled variations and variations with empty price)
                if ( apply_filters( 'woocommerce_hide_invisible_variations', false, $product->get_id(), $variation ) && !$variation->variation_is_visible() ) {
                    continue;
                }

                $available_variations[] = array(
                    'variation_id' => $variation->variation_id,
                    'variation_is_active' => $variation->variation_is_active(),
                    'attributes' => $variation->get_variation_attributes(),
                );
            }
            set_transient( $transient_name, $available_variations, DAY_IN_SECONDS * 30 );
            return $available_variations;
        }

        public function on_deleted_transient( $product_id ) {
            delete_transient( 'la_swatches_av_' . $product_id );
        }

        public function override_woocommerce_widgets(){
            if ( class_exists( 'WC_Widget_Layered_Nav' ) ) {
                unregister_widget( 'WC_Widget_Layered_Nav' );
                register_widget( 'LaStudio_Swatch_Widget' );
            }
        }
    }
}