<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Field: Sorter
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
class LaStudio_Framework_Field_sorter extends LaStudio_Framework_Field_Base {

  public function __construct( $field, $value = '', $unique = '' ) {
    parent::__construct( $field, $value, $unique );
  }

  public function output(){

    echo $this->element_before();

    $value          = $this->element_value();
    $value          = ( ! empty( $value ) ) ? $value : $this->field['default'];
    $enabled        = ( ! empty( $value['enabled'] ) ) ? $value['enabled'] : array();
    $disabled       = ( ! empty( $value['disabled'] ) ) ? $value['disabled'] : array();
    $enabled_title  = ( isset( $this->field['enabled_title'] ) ) ? $this->field['enabled_title'] : __( 'Enabled Modules', 'la-framework' );
    $disabled_title = ( isset( $this->field['disabled_title'] ) ) ? $this->field['disabled_title'] : __( 'Disabled Modules', 'la-framework' );

    echo '<div class="la-modules">';
    echo '<h3>'. $enabled_title .'</h3>';
    echo '<ul class="la-enabled">';
    if( ! empty( $enabled ) ) {
      foreach( $enabled as $en_id => $en_name ) {
        echo '<li><input type="hidden" name="'. $this->element_name( '[enabled]['. $en_id .']' ) .'" value="'. $en_name .'"/><label>'. $en_name .'</label></li>';
      }
    }
    echo '</ul>';
    echo '</div>';

    echo '<div class="la-modules">';
    echo '<h3>'. $disabled_title .'</h3>';
    echo '<ul class="la-disabled">';
    if( ! empty( $disabled ) ) {
      foreach( $disabled as $dis_id => $dis_name ) {
        echo '<li><input type="hidden" name="'. $this->element_name( '[disabled]['. $dis_id .']' ) .'" value="'. $dis_name .'"/><label>'. $dis_name .'</label></li>';
      }
    }
    echo '</ul>';
    echo '</div>';
    echo '<div class="clear"></div>';

    echo $this->element_after();

  }

}
