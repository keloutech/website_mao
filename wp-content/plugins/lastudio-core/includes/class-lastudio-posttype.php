<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

class LaStudio_PostType
{

    public $post_types = array();
    public $taxonomies = array();

    public function __construct( $post_types = array(), $taxonomies = array() )
    {
        $this->post_types = $post_types;

        $this->taxonomies = $taxonomies;

        add_action( 'init', array( $this, 'load' ) );
    }

    public function load(){
        if( !empty( $this->post_types ) ) {
            foreach ( $this->post_types as $post_type => $args ) {
                if( !empty($args ) ) {
                    register_post_type( $post_type, $args );
                }
            }
        }
        if( !empty( $this->taxonomies ) ) {
            foreach ( $this->taxonomies as $taxonomy => $args ) {
                if( !empty($args) && !empty($args['post_type']) && !empty( $args['args'] ) ) {
                    register_taxonomy( $taxonomy, $args['post_type'], $args['args'] );
                }
            }
        }
    }
}