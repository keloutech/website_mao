<?php if ( ! defined( 'ABSPATH' ) ) { die; }

if(!class_exists('Optima_MegaMenu_Init')){
    class Optima_MegaMenu_Init{

        protected static $fields = array();

        protected static $default_metakey = '';

        private static $instance = null;

        public static function get_instance() {
            if ( null === static::$instance ) {
                static::$instance = new self();
            }
            return static::$instance;
        }
        private function __construct( ) {
            add_action( 'wp_loaded',                        array( $this, 'loadWalkerEdit' ), 9);
            add_filter( 'wp_setup_nav_menu_item',           array( $this, 'setupNavMenuItem' ));
            add_action( 'wp_nav_menu_item_custom_fields',   array( $this, 'addCustomFields' ), 10, 4);
            add_action( 'wp_update_nav_menu_item',          array( $this, 'updateMenuItem' ), 10, 3);

            $query_args = array(
                'post_type'    => 'la_block',
                'orderby'   => 'title',
                'order'     => 'ASC',
                'posts_per_page' => 20
            );

            self::$default_metakey = '_mm_meta';
            self::$fields = array(
                'icon' => array(
                    'id'    => 'icon',
                    'type'  => 'icon',
                    'title' => esc_html__('Custom Icon','optima')
                ),
                'nolink' => array(
                    'id'    => 'nolink',
                    'type'  => 'switcher',
                    'title' => esc_html__("Don't link",'optima')
                ),
                'only_icon' => array(
                    'id'    => 'only_icon',
                    'type'  => 'switcher',
                    'title' => esc_html__("Show Only Icon",'optima')
                ),
                'hide' => array(
                    'id'    => 'hide',
                    'type'  => 'switcher',
                    'title' => esc_html__("Don't show a link",'optima')
                ),
                'menu_type' => array(
                    'id'    => 'menu_type',
                    'type'  => 'select',
                    'title' => esc_html__('Menu Type','optima'),
                    'options' => array(
                        'narrow'      => esc_html__('Narrow','optima'),
                        'wide'  => esc_html__('Wide','optima')
                    ),
                    'default' => 'narrow'
                ),
                'submenu_position' => array(
                    'id'    => 'submenu_position',
                    'type'  => 'select',
                    'title' => esc_html__('SubMenu Position','optima'),
                    'info' => esc_html__('Apply for parent with "Menu Type" is "narrow"','optima'),
                    'options' => array(
                        'right'     => esc_html__('Right','optima'),
                        'left'      => esc_html__('Left','optima'),
                    ),
                    'default'   => 'right'
                ),
                'popup_max_width' => array(
                    'id'    => 'popup_max_width',
                    'type'  => 'number',
                    'title' => esc_html__('Popup Max Width','optima'),
                    'after' => 'px'
                ),
                'popup_column' => array(
                    'id'    => 'popup_column',
                    'type'  => 'select',
                    'title' => esc_html__('Popup Columns','optima'),
                    'options' => array(
                        '1'         => esc_html__('1 Column','optima'),
                        '2'         => esc_html__('2 Columns','optima'),
                        '3'         => esc_html__('3 Columns','optima'),
                        '4'         => esc_html__('4 Columns','optima'),
                        '5'         => esc_html__('5 Columns','optima'),
                        '6'         => esc_html__('6 Columns','optima')
                    ),
                    'default'   => '4'
                ),
                'item_column' => array(
                    'id'    => 'item_column',
                    'type'  => 'text',
                    'title' => esc_html__('Columns','optima'),
                    'desc' => esc_html__('will occupy x columns of parent popup columns', 'optima')
                ),
                'block' => array(
                    'id'            => 'block',
                    'type'           => 'select',
                    'title'         => esc_html__('Custom Block Before Menu Item','optima'),
                    'options'       => 'posts',
                    'query_args'    => $query_args,
                    'default_option' => esc_html__('Select a block','optima')
                ),
                'block2' => array(
                    'id'            => 'block2',
                    'type'          => 'select',
                    'title'         => esc_html__('Custom Block After Menu Item','optima'),
                    'options'       => 'posts',
                    'query_args'    => $query_args,
                    'default_option' => esc_html__('Select a block','optima')
                ),
                'popup_background' => array(
                    'id'           => 'popup_background',
                    'type'         => 'background',
                    'title' 	   => esc_html__('Popup Background','optima')
                ),
                'tip_label' => array(
                    'id'        => 'tip_label',
                    'type'      => 'text',
                    'title' 	=> esc_html__('Tip Label','optima')
                ),
                'tip_color' => array(
                    'id'        => 'tip_color',
                    'type'      => 'color_picker',
                    'title' 	=> esc_html__('Tip Color','optima')
                ),
                'tip_background_color' => array(
                    'id'        => 'tip_background_color',
                    'type'      => 'color_picker',
                    'title' 	=> esc_html__('Tip Background','optima')
                )
            );
        }

        public function loadWalkerEdit() {
            add_filter( 'wp_edit_nav_menu_walker', array( $this, 'findWalkerEdit' ), 99 );
        }

        public function findWalkerEdit( $walker ) {
            $walker = 'Optima_MegaMenu_Walker_Edit';
            return $walker;
        }

        public function setupNavMenuItem($menu_item){
            $meta_value = Optima()->settings->get_post_meta($menu_item->ID, '', self::$default_metakey, true);
            foreach ( self::$fields as $key => $value ){
                $menu_item->$key = isset($meta_value[$key]) ? $meta_value[$key] : '';
            }
            return $menu_item;
        }

        public function updateMenuItem( $menu_id, $menu_item_db_id, $menu_item_args ) {
            if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
                return;
            }
            check_admin_referer( 'update-nav_menu', 'update-nav-menu-nonce' );

            $key = self::$default_metakey;

            if ( ! empty( $_POST[$key][$menu_item_db_id] ) ) {
                $value = $_POST[$key][$menu_item_db_id];
            }
            else {
                $value = null;
            }

            if(!empty($value)){
                update_post_meta( $menu_item_db_id, $key, $value );
            }
            else {
                delete_post_meta( $menu_item_db_id, $key );
            }
        }

        public function addCustomFields( $id, $item, $depth, $args ) {
            if(function_exists('la_fw_add_element')){
                ?><div class="lastudio-megamenu-settings description-wide la-content">
                <h3><?php esc_html_e('MegaMenu Settings','optima');?></h3>
                <div class="lastudio-megamenu-custom-fields">
                    <?php
                    foreach ( self::$fields as $key => $field ) {
                        $unique     = self::$default_metakey . '['.$item->ID.']';
                        $default    = ( isset( $field['default'] ) ) ? $field['default'] : '';
                        $elem_id    = ( isset( $field['id'] ) ) ? $field['id'] : '';

                        $field['name'] = $unique. '[' . $elem_id . ']';
                        $field['id'] = $elem_id . '_' . $item->ID;
                        $elem_value =  isset($item->$key) ? $item->$key : $default;
                        echo la_fw_add_element( $field, $elem_value, $unique );
                    }
                    ?>
                </div>
                </div><?php
            }
        }
    }
}