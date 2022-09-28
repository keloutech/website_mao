<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Field: Notice
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
class LaStudio_Framework_Field_la_demo_importer extends LaStudio_Framework_Field_Base {


  public function get_theme_name(){
    if(!empty($this->field['theme_name'])){
      $theme_name = $this->field['theme_name'];
    }
    else{
      $theme_name = sanitize_key(wp_get_theme()->get('Name'));
    }
    return $theme_name;
  }

  public function output(){

    echo $this->element_before();
    if(isset($this->field['demo']) && is_array($this->field['demo'])){
      echo '<div class="demo-importer-message"></div>';
      echo '<div class="demo-importer-message-info"></div>';
      echo '<div class="theme-browser"><div class="themes">';
      $options_name = $this->get_theme_name() . '_imported_demos';
      $demo_installed = get_option( $options_name );
      foreach( $this->field['demo'] as $key => $demo ){
        //'title','slider','content','widget','option','preview'
        $class = 'wrap-importer theme';

        if(isset($demo_installed[$key])){
          $class .= ' imported';
          $more_detail = esc_html__('Demo Imported', 'la-studio');
          $btn_import = esc_html__('Imported', 'la-studio');
          $btn_import_class = 'button button-secondary';
          $btn_reimport_class = 'button button-primary reimporter-button';
          if(isset($demo_installed['active_import']) && $key == $demo_installed['active_import']){
            $class .= ' active';
          }

        }else{
          $class .= ' not-imported';
          $more_detail = esc_html__('Import Demo', 'la-studio');
          $btn_import = esc_html__('Import Demo', 'la-studio');
          $btn_import_class = 'button button-primary importer-button';
          $btn_reimport_class = 'button button-secondary reimporter-button';
        }
        ?>
        <div class="<?php echo esc_attr($class)?>" data-demo-id="<?php echo esc_attr($key)?>">
          <div class="theme-screenshot">
            <img src="<?php echo esc_url($demo['preview'])?>" alt="<?php echo esc_attr($demo['title'])?>"/>
          </div>
          <span class="more-details"><?php echo esc_html($more_detail);?></span>
          <h2 class="theme-name"><span><?php esc_html_e('Active:', 'la-studio');?></span> <?php echo esc_html( $demo['title'] )?></h2>
          <div class="theme-actions">
            <div class="importer-buttons">
              <span class="spinner"><?php esc_html_e('Please Wait...', 'la-studio');?></span>
              <span data-title="<?php echo esc_attr('Import Demo Content?', 'la-studio')?>" class="<?php echo esc_attr($btn_import_class)?>"><?php echo esc_html($btn_import);?></span>
              <span data-title="<?php echo esc_attr('Re-Import Content?', 'la-studio')?>" class="<?php echo esc_attr($btn_reimport_class)?>"><?php esc_html_e('Re-Import', 'la-studio')?></span>
            </div>
          </div>
          <div class="theme-extra-options hidden">
            <label>
              <input class="checkbox extra-import-options" type="checkbox"/><?php esc_html_e('Without Content', 'la-studio')?>
            </label>
          </div>
        </div>
        <?php
      }
      echo '</div></div>';
    }
    echo $this->element_after();
  }

}
