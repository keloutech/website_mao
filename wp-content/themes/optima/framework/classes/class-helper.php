<?php if ( ! defined( 'ABSPATH' ) ) { die; }

if(!class_exists('Optima_Helper')){

    class Optima_Helper{

        /**
         * A reference to an instance of this class.
         *
         * @since 1.0.0
         * @var   object
         */
        private static $instance = null;

        /**
         * @var array
         */
        public $args = array();

        /**
         * Returns the instance.
         *
         * @since  1.0.0
         * @return object
         */
        public static function get_instance( ) {

            // If the single instance hasn't been set, set it now.
            if ( null == self::$instance ) {
                self::$instance = new self( );
            }

            return self::$instance;
        }

        public static function is_active_plugin( $plugin ){
            include_once ABSPATH . 'wp-admin/includes/plugin.php';
            return is_plugin_active($plugin);
        }

        public static function is_active_woocommerce(){
            return self::is_active_plugin('woocommerce/woocommerce.php');
        }

        public static function compress_text($content, $css = false){
            $content = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $content);
            $content = str_replace(array("\r\n", "\r", "\n", "\t",'  ','	', '	', '	', '                ', '    '), '', $content);
            if($css){
                $content = str_replace(array(';}'), array('}'), $content);
            }
            return $content;
        }

        public static function write_log($log){
            if ( true === WP_DEBUG ) {
                if ( is_array( $log ) || is_object( $log ) ) {
                    error_log( print_r( $log, true ) );
                } else {
                    error_log( $log );
                }
            }
        }

        public static function get_hooks( $hook = '' ) {
            global $wp_filter;

            $hooks = isset( $wp_filter[$hook] ) ? $wp_filter[$hook] : array();

            if (class_exists('WP_Hook') && $hooks instanceof WP_Hook) {
                $hooks = $hooks->callbacks;
            }

            if(empty($hooks)){
                return;
            }

            foreach( $hooks as $key => &$items ) {
                foreach ( $items as &$item ){
                    $item['priority'] = $key;
                }
            }

            $hooks = call_user_func_array( 'array_merge', $hooks );

            foreach( $hooks as $key => &$item ) {
                // function name as string or static class method eg. 'Foo::Bar'
                if ( is_string( $item['function'] ) ) {
                    $ref = strpos( $item['function'], '::' ) ? new ReflectionClass( strstr( $item['function'], '::', true ) ) : new ReflectionFunction( $item['function'] );
                    $item['file'] = $ref->getFileName();
                    $item['line'] = get_class( $ref ) == 'ReflectionFunction'
                        ? $ref->getStartLine()
                        : $ref->getMethod( substr( $item['function'], strpos( $item['function'], '::' ) + 2 ) )->getStartLine();

                    // array( object, method ), array( string object, method ), array( string object, string 'parent::method' )
                } elseif ( is_array( $item['function'] ) ) {

                    $ref = new ReflectionClass( $item['function'][0] );

                    // $item['function'][0] is a reference to existing object
                    $item['function'] = array(
                        is_object( $item['function'][0] ) ? get_class( $item['function'][0] ) : $item['function'][0],
                        $item['function'][1]
                    );
                    $item['file'] = $ref->getFileName();
                    $item['line'] = strpos( $item['function'][1], '::' )
                        ? $ref->getParentClass()->getMethod( substr( $item['function'][1], strpos( $item['function'][1], '::' ) + 2 ) )->getStartLine()
                        : $ref->getMethod( $item['function'][1] )->getStartLine();

                    // closures
                } elseif ( is_callable( $item['function'] ) ) {
                    $ref = new ReflectionFunction( $item['function'] );
                    $item['function'] = get_class( $item['function'] );
                    $item['file'] = $ref->getFileName();
                    $item['line'] = $ref->getStartLine();
                }
            }
            echo '<pre>';
            echo "HOOK NAME : <b>$hook</b><br/>";
            print_r($hooks);
            echo '</pre>';
        }

        public static function remove_js_autop($content, $autop = false){
            if ( $autop ) {
                $content = preg_replace( '/<\/?p\>/', "\n", $content );
                $content = preg_replace( '/<p[^>]*><\\/p[^>]*>/', "", $content );
                $content = wpautop( $content . "\n" );
            }
            return do_shortcode( shortcode_unautop( $content ) );
        }

        public static function hex2rgba( $color, $opacity = false ) {
            $default = 'rgb(0,0,0)';
            if(empty($color)){
                return $default;
            }
            if ($color[0] == '#' ) {
                $color = substr( $color, 1 );
            }
            if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
            } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
            } else {
                return $default;
            }
            $rgb =  array_map('hexdec', $hex);
            if($opacity){
                if(abs($opacity) > 1)
                    $opacity = 1.0;
                $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
            } else {
                $output = 'rgb('.implode(",",$rgb).')';
            }
            return $output;
        }

        public static function get_color_codes( $color ) {
            $ret = array('hex' => '', 'rgba' => '');
            // Trim input string
            $color = trim($color);
            // Return default if no color provided
            if(empty($color)){
                return $ret;
            }
            // Sanitize $color if "#" is provided
            if ($color[0] == '#') {
                // Remove first char
                $color = substr($color, 1);
                // Check if color has 6 or 3 characters and get values
                if (strlen($color) == 6) {
                    $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
                } elseif (strlen( $color ) == 3) {
                    $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
                } else {
                    return $ret;
                }
                // Convert hexadec to rgb
                $ret['hex'] = '#'.$color;
                $ret['rgba'] = implode(",", array_map('hexdec', $hex));
            } else if (substr($color, 0, 4) == 'rgba') {
                $count = preg_match("/^rgba\((\d{1,3}),\s*(\d{1,3}),\s*(\d{1,3}),\s*(\d*(?:\.\d+)?)\)$/i", $color, $rgba);
                // Count should be 5 if successfull
                if (count($rgba) == 5) {
                    $hex = "#";
                    $hex .= str_pad(dechex($rgba[1]), 2, "0", STR_PAD_LEFT);
                    $hex .= str_pad(dechex($rgba[2]), 2, "0", STR_PAD_LEFT);
                    $hex .= str_pad(dechex($rgba[3]), 2, "0", STR_PAD_LEFT);
                    $ret['hex'] = $hex;
                    $ret['rgba'] = $rgba[1].','.$rgba[2].','.$rgba[3];
                }
            } else if (substr($color, 0, 3) == 'rgb') {
                $count = preg_match("/^rgb\((\d{1,3}),\s*(\d{1,3}),\s*(\d{1,3})\)$/i", $color, $rgba);
                // Count should be 5 if successfull
                if (count($rgba) == 4) {
                    $hex = "#";
                    $hex .= str_pad(dechex($rgba[1]), 2, "0", STR_PAD_LEFT);
                    $hex .= str_pad(dechex($rgba[2]), 2, "0", STR_PAD_LEFT);
                    $hex .= str_pad(dechex($rgba[3]), 2, "0", STR_PAD_LEFT);

                    $ret['hex'] = $hex;
                    $ret['rgba'] = $rgba[1].','.$rgba[2].','.$rgba[3];
                }
            }
            // Return calculated values
            return $ret;
        }

        public static function get_image_size_from_string( $size, $default = 'thumbnail' ){
            if(empty($size)){
                return $default;
            }
            $ignore = array(
                'thumbnail',
                'thumb',
                'medium',
                'large',
                'full'
            );
            if(is_string($size) && !in_array($size, $ignore)){
                preg_match_all( '/\d+/', $size, $thumb_matches );
                if ( isset( $thumb_matches[0] ) ) {
                    $thumb_size = array();
                    if ( count( $thumb_matches[0] ) > 1 ) {
                        $thumb_size[] = $thumb_matches[0][0]; // width
                        $thumb_size[] = $thumb_matches[0][1]; // height
                    } elseif ( count( $thumb_matches[0] ) > 0 && count( $thumb_matches[0] ) < 2 ) {
                        $thumb_size[] = $thumb_matches[0][0]; // width
                        $thumb_size[] = 0; //$thumb_matches[0][0]; // height
                    } else {
                        $thumb_size = $default;
                    }
                }else{
                    $thumb_size = $default;
                }
                return $thumb_size;
            }
            return $size;
        }

        public static function get_slick_slider_config($default = array()){
            $configs = array_merge($configs = array(
                'infinite' => false,
                'xlg' => 1,
                'lg' => 1,
                'md' => 1,
                'sm' => 1,
                'xs' => 1,
                'mb' => 1,
                'dots' => false,
                'autoplay' => false,
                'arrows' => false,
                'speed' => 1000,
                'autoplaySpeed' => 3000,
                'custom_nav' => ''
            ), $default);
            $slider_config = array(
                'infinite' => $configs['infinite'],
                'dots' => $configs['dots'],
                'slidesToShow' => $configs['xlg'],
                'slidesToScroll' => $configs['xlg'],
                'autoplay' => $configs['autoplay'],
                'arrows' => $configs['arrows'],
                'speed' => $configs['speed'],
                'autoplaySpeed' => $configs['autoplaySpeed'],
                'responsive' => array(
                    array(
                        'breakpoint' => 1824,
                        'settings' => array(
                            'slidesToShow' => $configs['lg'],
                            'slidesToScroll' => $configs['lg']
                        )
                    ),
                    array(
                        'breakpoint' => 1200,
                        'settings' => array(
                            'slidesToShow' => $configs['md'],
                            'slidesToScroll' => $configs['md']
                        )
                    ),
                    array(
                        'breakpoint' => 992,
                        'settings' => array(
                            'slidesToShow' => $configs['sm'],
                            'slidesToScroll' => $configs['sm']
                        )
                    ),
                    array(
                        'breakpoint' => 768,
                        'settings' => array(
                            'slidesToShow' => $configs['xs'],
                            'slidesToScroll' => $configs['xs']
                        )
                    ),
                    array(
                        'breakpoint' => 480,
                        'settings' => array(
                            'slidesToShow' => $configs['mb'],
                            'slidesToScroll' => $configs['mb']
                        )
                    )
                )
            );
            if(isset($configs['custom_nav']) && !empty($configs['custom_nav'])){
                $slider_config['appendArrows'] = 'jQuery("'.esc_attr($configs['custom_nav']).'")';
            }
            return json_encode($slider_config);
        }

        public static function render_background_atts($options, $echo = true){
            $return = '';
            if(!empty($options) && is_array($options)){
                foreach ($options as $k => $val){
                    if(!empty($val)){
                        if($echo){
                            printf('background-%s: %s;'
                                , esc_attr($k)
                                , ($k == 'image' ? 'url('.esc_url($val).')' : esc_attr($val))
                            );
                        }
                        else{
                            $return .= sprintf('background-%s: %s;'
                                , esc_attr($k)
                                , ($k == 'image' ? 'url('.esc_url($val).')' : esc_attr($val))
                            );
                        }
                    }
                }
            }
            if(!$echo){
                return $return;
            }
        }

        public static function getRemainingTime( $end_date ){
            $days    = floor( ( $end_date - time() ) / 60 / 60 / 24 );
            $hours   = floor( ( $end_date - time() ) / 60 / 60 ) - ( $days * 24 );
            $minutes = floor( ( $end_date - time() ) / 60 ) - ( $hours * 60 );
            $seconds = ( $end_date - time() ) - ( $minutes * 60 );
            return array(
                'gmt' => get_option( 'gmt_offset' ),
                'to'  => $end_date,
                'dd'  => ( $days > 10 ) ? $days : '0' . $days,
                'hh'  => ( $hours > 10 ) ? $hours : '0' . $hours,
                'mm'  => ( $minutes > 10 ) ? $minutes : '0' . $minutes,
                'ss'  => ( $seconds > 10 ) ? $seconds : '0' . $seconds,
            );
        }

        public static function get_google_font_ref_array( $arr_font = array() ){

            $return = array();

            if(!function_exists('la_get_google_fonts')){
                return $return;
            }

            if(!empty($arr_font)){

                $gfs_data = la_get_google_fonts();

                foreach ( $arr_font as $p => $f_name ){
                    $_tmp = array(
                        'family' => $f_name,
                        'category' => '',
                        'variants' => '',
                        'subsets' => ''
                    );
                    foreach( $gfs_data->items as $k => $font ){
                        if(strtolower($f_name) == strtolower($font->family)){
                            $_tmp = array(
                                'family' => $font->family,
                                'category' => $font->category,
                                'variants' => $font->variants,
                                'subsets' => $font->subsets
                            );
                            break;
                        }
                    }
                    $return[$p] = $_tmp;
                }
            }

            return $return;

        }

    }

}