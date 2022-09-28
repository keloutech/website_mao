<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Field: Typography
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
class LaStudio_Framework_Field_typography extends LaStudio_Framework_Field_Base {

  public function __construct( $field, $value = '', $unique = '' ) {
    parent::__construct( $field, $value, $unique );
  }

  public function output() {

    echo $this->element_before();

    $defaults_value = array(
      'family'  => 'Arial',
      'variant' => 'regular',
      'font'    => 'websafe',
    );

    $default_variants = apply_filters( 'la_websafe_fonts_variants', array(
      'regular',
      'italic',
      '700',
      '700italic',
      'inherit'
    ));

    $websafe_fonts = apply_filters( 'la_websafe_fonts', array(
      'Arial',
      'Arial Black',
      'Comic Sans MS',
      'Impact',
      'Lucida Sans Unicode',
      'Tahoma',
      'Trebuchet MS',
      'Verdana',
      'Courier New',
      'Lucida Console',
      'Georgia, serif',
      'Palatino Linotype',
      'Times New Roman'
    ));

    $value         = wp_parse_args( $this->element_value(), $defaults_value );
    $family_value  = $value['family'];
    $variant_value = $value['variant'];
    $is_variant    = ( isset( $this->field['variant'] ) && $this->field['variant'] === false ) ? false : true;
    $is_chosen     = ( isset( $this->field['chosen'] ) && $this->field['chosen'] === false ) ? '' : 'chosen ';
    $google_json   = la_get_google_fonts();
    $chosen_rtl    = ( is_rtl() && ! empty( $is_chosen ) ) ? 'chosen-rtl ' : '';

    if( is_object( $google_json ) ) {

      $googlefonts = array();

      foreach ( $google_json->items as $key => $font ) {
        $googlefonts[$font->family] = $font->variants;
      }

      $is_google = ( array_key_exists( $family_value, $googlefonts ) ) ? true : false;

      $la_attr = '';

      if(!empty( $this->field['attributes']['data-customize-setting-link'] )){
        $la_attr .= ' data-la-customize-setting-link="' . $this->field['attributes']['data-customize-setting-link'] . '"';
        $la_attr .= ' data-la-customize-setting-key="'. (( isset( $this->field['id'] ) ) ? $this->field['id'] : '') .'"';
        unset($this->field['attributes']['data-customize-setting-link']);
      }

      echo '<div class="la-parent-fields" '. $la_attr .'>';

      echo '<label class="la-typography-family">';
      echo '<select name="'. $this->element_name( '[family]' ) .'" class="'. $is_chosen . $chosen_rtl .'la-typo-family la-child-field" data-atts="family"'. $this->element_attributes() .'>';

      do_action( 'lastudio/action/framework/field/typography_family', $family_value, $this );

      echo '<optgroup label="'. __( 'Web Safe Fonts', 'la-studio' ) .'">';
      foreach ( $websafe_fonts as $websafe_value ) {
        echo '<option value="'. $websafe_value .'" data-variants="'. implode( '|', $default_variants ) .'" data-type="websafe"'. selected( $websafe_value, $family_value, true ) .'>'. $websafe_value .'</option>';
      }
      echo '</optgroup>';

      echo '<optgroup label="'. __( 'Google Fonts', 'la-studio' ) .'">';
      foreach ( $googlefonts as $google_key => $google_value ) {
        echo '<option value="'. $google_key .'" data-variants="'. implode( '|', $google_value ) .'" data-type="google"'. selected( $google_key, $family_value, true ) .'>'. $google_key .'</option>';
      }
      echo '</optgroup>';

      echo '</select>';
      echo '</label>';

      if( ! empty( $is_variant ) ) {

        $variants = ( $is_google ) ? $googlefonts[$family_value] : $default_variants;
        $variants = ( $value['font'] === 'google' || $value['font'] === 'websafe' ) ? $variants : array( 'regular' );

        echo '<label class="la-typography-variant">';
        echo '<select name="'. $this->element_name( '[variant][]' ) .'" class="'. $is_chosen . $chosen_rtl .'la-typo-variant la-child-field" data-atts="variant" multiple="multiple" style="width: 230px">';
        foreach ( $variants as $variant ) {
          echo '<option value="'. $variant .'"'. $this->checked( $variant_value, $variant, 'selected' ) .'>'. $variant .'</option>';
        }
        echo '</select>';
        echo '</label>';

      }

      echo '<input type="text" name="'. $this->element_name( '[font]' ) .'" class="la-typo-font hidden la-child-field" data-atts="font" value="'. $value['font'] .'" />';

      echo '</div>';
    } else {

      echo __( 'Error! Can not load json file.', 'la-studio' );

    }

    echo $this->element_after();

  }

}
