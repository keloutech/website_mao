(function($) {
    'use strict';

    $(document).ready(function(){
        $( '#panel_la_swatches').LA_FRAMEWORK_RELOAD_PLUGINS();


        $(document)
            .on('click', '.la_swatch_field_meta', function(e){
                e.preventDefault();
                $(this).toggleClass('open-form');
            })

            .on('change', '.tab_la_swatches .fields .sub_field select', function(e){
                var $this = $(this);
                $this.closest('.sub_field').find('.attribute_swatch_type').html($this.find('option:selected').text());
                if($this.val() == 'color'){
                    $this.closest('.sub_field').find('.attr-prev-type-color').show();
                    $this.closest('.sub_field').find('.attr-prev-type-image').hide();
                }else{
                    $this.closest('.sub_field').find('.attr-prev-type-color').hide();
                    $this.closest('.sub_field').find('.attr-prev-type-image').show();
                }
            })
            .on('change', '.tab_la_swatches .fields .sub_field input.wp-color-picker', function(){
                var $this = $(this);
                $this.closest('.sub_field').find('.attr-prev-type-color').css('background-color', $this.val());
            })
            .on('change', '.tab_la_swatches .fields .sub_field .la-field-image input', function(){
                var $this = $(this);
                $this.closest('.sub_field').find('.attr-prev-type-image').html($this.closest('.la-fieldset').find('.la-preview').html());
            })
            .on('change', '.tab_la_swatches .fields .la-parent-type-class', function(){
                var $this = $(this);
                $this.closest('.field').find('> .la_swatch_field_meta .attribute_swatch_type').html($this.find('option:selected').text());
            })
            .on('reload', '#variable_product_options', function(e){

                if($('#panel_la_swatches_inner').length == 0){
                    return;
                }
                $( '#woocommerce-product-data' ).block({
                    message: null,
                    overlayCSS: {
                        background: '#fff',
                        opacity: 0.6
                    }
                });
                var this_page = window.location.toString().replace( 'post-new.php?', 'post.php?post=' + woocommerce_admin_meta_boxes.post_id + '&action=edit&' );
                $( '#panel_la_swatches' ).load( this_page + ' #panel_la_swatches_inner', function() {
                    $( '#panel_la_swatches').trigger('reload');
                    $( '#panel_la_swatches').LA_FRAMEWORK_DEPENDENCY();
                    $( '#panel_la_swatches').LA_FRAMEWORK_RELOAD_PLUGINS();
                });
            })
            .on('woocommerce_variations_saved', '#woocommerce-product-data' ,function(e){
                if($('#panel_la_swatches_inner').length == 0){
                    return;
                }
                $( '#woocommerce-product-data' ).block({
                    message: null,
                    overlayCSS: {
                        background: '#fff',
                        opacity: 0.6
                    }
                });
                var this_page = window.location.toString().replace( 'post-new.php?', 'post.php?post=' + woocommerce_admin_meta_boxes.post_id + '&action=edit&' );
                $( '#panel_la_swatches' ).load( this_page + ' #panel_la_swatches_inner', function() {
                    $( '#panel_la_swatches').trigger('reload');
                    $( '#panel_la_swatches').LA_FRAMEWORK_DEPENDENCY();
                    $( '#panel_la_swatches').LA_FRAMEWORK_RELOAD_PLUGINS();
                });
            })
    })
})(jQuery);