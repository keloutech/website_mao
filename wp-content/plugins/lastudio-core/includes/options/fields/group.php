<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Field: Group
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
class LaStudio_Framework_Field_group extends LaStudio_Framework_Field_Base {

  public function __construct( $field, $value = '', $unique = '' ) {
    parent::__construct( $field, $value, $unique );
  }

  public function output() {

    echo $this->element_before();

    $fields      = array_values( $this->field['fields'] );
    $last_id     = ( is_array( $this->value ) ) ? max( array_keys( $this->value ) ) : 0;
    $acc_title   = ( isset( $this->field['accordion_title'] ) ) ? $this->field['accordion_title'] : __( 'Adding', 'la-studio' );
    $field_title = ( isset( $fields[0]['title'] ) ) ? $fields[0]['title'] : $fields[1]['title'];
    $field_id    = ( isset( $fields[0]['id'] ) ) ? $fields[0]['id'] : $fields[1]['id'];
    $el_class    = ( isset( $this->field['title'] ) ) ? sanitize_title( $field_title ) : 'no-title';
    $search_id   = la_array_search( $fields, 'id', $acc_title );

    if( ! empty( $search_id ) ) {

      $acc_title = ( isset( $search_id[0]['title'] ) ) ? $search_id[0]['title'] : $acc_title;
      $field_id  = ( isset( $search_id[0]['id'] ) ) ? $search_id[0]['id'] : $field_id;

    }

    echo '<div class="la-group la-group-'. $el_class .'-adding hidden">';

      echo '<h4 class="la-group-title"><span class="a-title">'. $acc_title .'</span></h4>';
      echo '<div class="la-group-content">';
      foreach ( $fields as $field ) {
        $field['sub']   = true;
        $unique         = $this->unique .'[_nonce]['. $this->field['id'] .']['. $last_id .']';
        $field_default  = ( isset( $field['default'] ) ) ? $field['default'] : '';
        echo la_fw_add_element( $field, $field_default, $unique );
      }
      echo '<div class="la-element la-text-right la-remove"><a href="#" class="button la-warning-primary la-remove-group">'. __( 'Remove', 'la-studio' ) .'</a></div>';
      echo '</div>';

    echo '</div>';

    echo '<div class="la-groups la-accordion" data-accordion-title="'.( isset( $this->field['accordion_title'] ) ? esc_attr($this->field['accordion_title']) : '' ).'">';

      if( ! empty( $this->value ) ) {

        foreach ( $this->value as $key => $value ) {

          $title = ( isset( $this->value[$key][$field_id] ) ) ? $this->value[$key][$field_id] : '';

          $field_title = ( ! empty( $search_id ) ) ? $acc_title : $field_title;

          echo '<div class="la-group la-group-'. $el_class .'-'. ( $key + 1 ) .'">';
          echo '<h4 class="la-group-title"><span class="a-title">'. $title .'</span></h4>';
          echo '<div class="la-group-content">';

          foreach ( $fields as $field ) {
            $field['sub'] = true;
            $unique = $this->unique . '[' . $this->field['id'] . ']['.$key.']';
            $value  = ( isset( $field['id'] ) && isset( $this->value[$key][$field['id']] ) ) ? $this->value[$key][$field['id']] : '';
            echo la_fw_add_element( $field, $value, $unique );
          }

          echo '<div class="la-element la-text-right la-remove"><a href="#" class="button la-warning-primary la-remove-group">'. __( 'Remove', 'la-studio' ) .'</a></div>';
          echo '</div>';
          echo '</div>';

        }

      }

    echo '</div>';

    echo '<a href="#" class="button button-primary la-add-group">'. $this->field['button_title'] .'</a>';

    echo $this->element_after();

  }

}
