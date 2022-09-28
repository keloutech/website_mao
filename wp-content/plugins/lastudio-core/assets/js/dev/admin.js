;(function ( $, window, document, undefined ) {
  'use strict';

  $.LA_FRAMEWORK = $.LA_FRAMEWORK || {};

  // caching selector
  var $la_body = $('body');

  // caching variables
  var la_is_rtl  = $la_body.hasClass('rtl');

  // ======================================================
  // LA_FRAMEWORK TAB NAVIGATION
  // ------------------------------------------------------
  $.fn.LA_FRAMEWORK_TAB_NAVIGATION = function() {
    return this.each(function() {

      var $this   = $(this),
          $nav    = $this.find('.la-nav'),
          $reset  = $this.find('.la-reset'),
          $expand = $this.find('.la-expand-all');

      var flag = true;

      if($this.hasClass('la-metabox-framework') || $this.hasClass('la-taxonomy-framework')){
        flag = false;
      }

      $nav.find('ul:first a').on('click', function (e) {

        e.preventDefault();

        var $el     = $(this),
            $next   = $el.next(),
            $target = $el.data('section');

        if( $next.is('ul') ) {
          var $parent = $el.closest('li'),
              $parent_siblings = $parent.siblings('li');
          $next.slideToggle( 'fast' );
          $parent_siblings.removeClass('la-tab-active').find('ul').slideUp('fast');
          $parent_siblings.find('a').removeClass('la-section-active');
          $parent.toggleClass('la-tab-active');
          $next.find('> li:first-child > a').trigger('click');
        } else {

          if(!$el.closest('ul').hasClass('la-nav-sub-ul')){
            $nav.find('li.la-sub').removeClass('la-tab-active');
            $nav.find('li.la-sub > ul').slideUp('fast');
          }

          $('#la-tab-'+$target).show().siblings().hide();
          $nav.find('a').removeClass('la-section-active');
          $el.addClass('la-section-active');
          $reset.val($target);
          try{
            if(flag){
              Cookies.set('laframework_active_section', $target);
            }
          }catch (ex){ }
        }
      });

      try{
        var current_target = Cookies.get('laframework_active_section'),
            $current_target = $('a[data-section="'+current_target+'"]');
        if( flag && current_target !== 'undefined' && $current_target.length > 0){
          $current_target.trigger('click');
          var $target_parent = $current_target.parent().parent();
          if($target_parent.hasClass('la-nav-sub-ul')){
            $('ul.la-nav-sub-ul', $nav).removeAttr('style');
            $('li', $nav).removeClass('la-tab-active');
            $target_parent.parent().addClass('la-tab-active');
            $target_parent.slideToggle('fast');
          }
        }
      }catch (ex){}

      $expand.on('click', function (e) {
        e.preventDefault();
        $this.find('.la-body').toggleClass('la-show-all');
        $(this).find('.fa').toggleClass('fa-eye-slash' ).toggleClass('fa-eye');
      });

    });
  };
  // ======================================================

  $.fn.LA_FRAMEWORK_STICKYHEADER = function() {
    if (this.length) {
      var header        = this,
          headerOffset  = header.offset().top;

      $(window).on( 'scroll.laStickyHeader', function(){
        //Update Header Width and Height When Scroll
        var headerHeight  = header.outerHeight(),
            headerWidth   = header.outerWidth();

        if ($(this).scrollTop() > headerOffset - 32) {
          header.addClass('la-sticky-header');
          header.css({
            'width'       : headerWidth + 'px',
            'height'      : headerHeight + 'px'
          });
          $('.la-option-framework').css('padding-top', headerHeight);
        }else {
          header.removeClass('la-sticky-header');
          header.css({
            'width'       : '',
            'height'      : ''
          });
          $('.la-option-framework').css('padding-top', '');
        }
      });
    }
  };


  // ======================================================
  // LA_FRAMEWORK DEPENDENCY
  // ------------------------------------------------------
  $.LA_FRAMEWORK.DEPENDENCY = function( el, param ) {

    // Access to jQuery and DOM versions of element
    var base     = this;
        base.$el = $(el);
        base.el  = el;

    base.init = function () {

      base.ruleset = $.deps.createRuleset();

      // required for shortcode attrs
      var cfg = {
        show: function( el ) {
          el.removeClass('hidden');
        },
        hide: function( el ) {
          el.addClass('hidden');
        },
        log: false,
        checkTargets: false
      };

      if( param !== undefined ) {
        base.depSub();
      } else {
        base.depRoot();
      }

      $.deps.enable( base.$el, base.ruleset, cfg );

    };

    base.depRoot = function() {

      base.$el.each( function() {

        $(this).find('[data-controller]').each( function() {

          var $this       = $(this),
              _controller = $this.data('controller').split('|'),
              _condition  = $this.data('condition').split('|'),
              _value      = $this.data('value').toString().split('|'),
              _rules      = base.ruleset;

          $.each(_controller, function(index, element) {

            var value     = _value[index] || '',
                condition = _condition[index] || _condition[0];

            _rules = _rules.createRule('[data-depend-id="'+ element +'"]', condition, value);
            _rules.include($this);

          });

        });

      });

    };

    base.depSub = function() {

      base.$el.each( function() {

        $(this).find('[data-sub-controller]').each( function() {

          var $this       = $(this),
              _controller = $this.data('sub-controller').split('|'),
              _condition  = $this.data('sub-condition').split('|'),
              _value      = $this.data('sub-value').toString().split('|'),
              _rules      = base.ruleset;

          $.each(_controller, function(index, element) {

            var value     = _value[index] || '',
                condition = _condition[index] || _condition[0];

            _rules = _rules.createRule('[data-sub-depend-id="'+ element +'"]', condition, value);
            _rules.include($this);

          });

        });

      });

    };


    base.init();
  };

  $.fn.LA_FRAMEWORK_DEPENDENCY = function ( param ) {
    return this.each(function () {
      new $.LA_FRAMEWORK.DEPENDENCY( this, param );
    });
  };
  // ======================================================

  // ======================================================
  // LA_FRAMEWORK CHOSEN
  // ------------------------------------------------------
  $.fn.LA_FRAMEWORK_CHOSEN = function() {
    return this.each(function() {
      $(this).chosen({allow_single_deselect: true, disable_search_threshold: 15, width: parseFloat( $(this).actual('width') + 25 ) +'px'});
    });
  };
  // ======================================================

  // ======================================================
  // LA_FRAMEWORK IMAGE SELECTOR
  // ------------------------------------------------------
  $.fn.LA_FRAMEWORK_IMAGE_SELECTOR = function() {
    return this.each(function() {

      $(this).find('label').on('click', function () {
        $(this).siblings().find('input').prop('checked', false);
      });

    });
  };
  // ======================================================

  // ======================================================
  // LA_FRAMEWORK SORTER
  // ------------------------------------------------------
  $.fn.LA_FRAMEWORK_SORTER = function() {
    return this.each(function() {

      var $this     = $(this),
          $enabled  = $this.find('.la-enabled'),
          $disabled = $this.find('.la-disabled');

      $enabled.sortable({
        connectWith: $disabled,
        placeholder: 'ui-sortable-placeholder',
        update: function( event, ui ){

          var $el = ui.item.find('input');

          if( ui.item.parent().hasClass('la-enabled') ) {
            $el.attr('name', $el.attr('name').replace('disabled', 'enabled'));
          } else {
            $el.attr('name', $el.attr('name').replace('enabled', 'disabled'));
          }

        }
      });

      // avoid conflict
      $disabled.sortable({
        connectWith: $enabled,
        placeholder: 'ui-sortable-placeholder'
      });

    });
  };
  // ======================================================

  // ======================================================
  // LA_FRAMEWORK MEDIA UPLOADER / UPLOAD
  // ------------------------------------------------------
  $.fn.LA_FRAMEWORK_UPLOADER = function() {
    return this.each(function() {
      var $this  = $(this),
          $add   = $this.find('.la-add'),
          $input = $this.find('input'),
          wp_media_frame;

      $add.on('click', function( e ) {

        e.preventDefault();

        // Check if the `wp.media.gallery` API exists.
        if ( typeof wp === 'undefined' || ! wp.media || ! wp.media.gallery ) {
          return;
        }

        // If the media frame already exists, reopen it.
        if ( wp_media_frame ) {
          wp_media_frame.open();
          return;
        }

        // Create the media frame.
        wp_media_frame = wp.media({

          // Set the title of the modal.
          title: $add.data('frame-title'),

          // Tell the modal to show only images.
          library: {
            type: $add.data('upload-type')
          },

          // Customize the submit button.
          button: {
            // Set the text of the button.
            text: $add.data('insert-title'),
          }

        });

        // When an image is selected, run a callback.
        wp_media_frame.on( 'select', function() {

          // Grab the selected attachment.
          var attachment = wp_media_frame.state().get('selection').first();
          $input.val( attachment.attributes.url ).trigger('change');

        });

        // Finally, open the modal.
        wp_media_frame.open();

      });

    });

  };
  // ======================================================

  // ======================================================
  // LA_FRAMEWORK IMAGE UPLOADER
  // ------------------------------------------------------
  $.fn.LA_FRAMEWORK_IMAGE_UPLOADER = function() {
    return this.each(function() {

      var $this    = $(this),
          $add     = $this.find('.la-add'),
          $preview = $this.find('.la-image-preview'),
          $remove  = $this.find('.la-remove'),
          $input   = $this.find('input'),
          $img     = $this.find('img'),
          wp_media_frame;

      $add.on('click', function( e ) {

        e.preventDefault();

        // Check if the `wp.media.gallery` API exists.
        if ( typeof wp === 'undefined' || ! wp.media || ! wp.media.gallery ) {
          return;
        }

        // If the media frame already exists, reopen it.
        if ( wp_media_frame ) {
          wp_media_frame.open();
          return;
        }

        // Create the media frame.
        wp_media_frame = wp.media({
          library: {
            type: 'image'
          }
        });

        // When an image is selected, run a callback.
        wp_media_frame.on( 'select', function() {

          var attachment = wp_media_frame.state().get('selection').first().attributes;
          var thumbnail = ( typeof attachment.sizes !== 'undefined' && typeof attachment.sizes.thumbnail !== 'undefined' ) ? attachment.sizes.thumbnail.url : attachment.url;

          $preview.removeClass('hidden');
          $img.attr('src', thumbnail);
          $input.val( attachment.id ).trigger('change');

        });

        // Finally, open the modal.
        wp_media_frame.open();

      });

      // Remove image
      $remove.on('click', function( e ) {
        e.preventDefault();
        $input.val('').trigger('change');
        $preview.addClass('hidden');
      });

    });

  };
  // ======================================================

  // ======================================================
  // LA_FRAMEWORK IMAGE GALLERY
  // ------------------------------------------------------
  $.fn.LA_FRAMEWORK_IMAGE_GALLERY = function() {
    return this.each(function() {

      var $this   = $(this),
          $edit   = $this.find('.la-edit'),
          $remove = $this.find('.la-remove'),
          $list   = $this.find('ul'),
          $input  = $this.find('input'),
          $img    = $this.find('img'),
          wp_media_frame,
          wp_media_click;

      $this.on('click', '.la-add, .la-edit', function( e ) {

        var $el   = $(this),
            what  = ( $el.hasClass('la-edit') ) ? 'edit' : 'add',
            state = ( what === 'edit' ) ? 'gallery-edit' : 'gallery-library';

        e.preventDefault();

        // Check if the `wp.media.gallery` API exists.
        if ( typeof wp === 'undefined' || ! wp.media || ! wp.media.gallery ) {
          return;
        }

        // If the media frame already exists, reopen it.
        if ( wp_media_frame ) {
          wp_media_frame.open();
          wp_media_frame.setState(state);
          return;
        }

        // Create the media frame.
        wp_media_frame = wp.media({
          library: {
            type: 'image'
          },
          frame: 'post',
          state: 'gallery',
          multiple: true
        });

        // Open the media frame.
        wp_media_frame.on('open', function() {

          var ids = $input.val();

          if ( ids ) {

            var get_array = ids.split(',');
            var library   = wp_media_frame.state('gallery-edit').get('library');

            wp_media_frame.setState(state);

            get_array.forEach(function(id) {
              var attachment = wp.media.attachment(id);
              library.add( attachment ? [ attachment ] : [] );
            });

          }
        });

        // When an image is selected, run a callback.
        wp_media_frame.on( 'update', function() {

          var inner  = '';
          var ids    = [];
          var images = wp_media_frame.state().get('library');

          images.each(function(attachment) {

            var attributes = attachment.attributes;
            var thumbnail  = ( typeof attributes.sizes.thumbnail !== 'undefined' ) ? attributes.sizes.thumbnail.url : attributes.url;

            inner += '<li><img src="'+ thumbnail +'"></li>';
            ids.push(attributes.id);

          });

          $input.val(ids).trigger('change');
          $list.html('').append(inner);
          $remove.removeClass('hidden');
          $edit.removeClass('hidden');

        });

        // Finally, open the modal.
        wp_media_frame.open();
        wp_media_click = what;

      });

      // Remove image
      $remove.on('click', function( e ) {
        e.preventDefault();
        $list.html('');
        $input.val('').trigger('change');
        $remove.addClass('hidden');
        $edit.addClass('hidden');
      });

    });

  };
  // ======================================================

  // ======================================================
  // LA_FRAMEWORK TYPOGRAPHY
  // ------------------------------------------------------
  $.fn.LA_FRAMEWORK_TYPOGRAPHY = function() {
    return this.each( function() {
      var typography      = $(this),
          family_select   = typography.find('.la-typo-family'),
          variants_select = typography.find('.la-typo-variant'),
          typography_type = typography.find('.la-typo-font');

      family_select.on('change', function() {

        var _this     = $(this),
            _type     = _this.find(':selected').data('type') || 'custom',
            _variants = _this.find(':selected').data('variants');

        if( variants_select.length ) {

          variants_select.find('option').remove();

          $.each( _variants.split('|'), function( key, text ) {
            variants_select.append('<option value="'+ text +'">'+ text +'</option>');
          });

          variants_select.find('option[value="regular"]').attr('selected', 'selected').trigger('chosen:updated');

        }

        typography_type.val(_type);

      });

    });
  };
  // ======================================================

  // ======================================================
  // LA_FRAMEWORK GROUP
  // ------------------------------------------------------
  $.fn.LA_FRAMEWORK_GROUP = function() {
    return this.each(function() {

      var _this           = $(this),
          field_groups    = _this.find('.la-groups'),
          accordion_group = _this.find('.la-accordion'),
          clone_group     = _this.find('.la-group:first').clone();

      if ( accordion_group.length ) {
        accordion_group.accordion({
          header: '.la-group-title',
          collapsible : true,
          active: false,
          animate: 250,
          heightStyle: 'content',
          icons: {
            'header': 'dashicons dashicons-arrow-right',
            'activeHeader': 'dashicons dashicons-arrow-down'
          },
          beforeActivate: function( event, ui ) {
            $(ui.newPanel).LA_FRAMEWORK_DEPENDENCY( 'sub' );
          }
        });
      }

      field_groups.sortable({
        axis: 'y',
        handle: '.la-group-title',
        helper: 'original',
        cursor: 'move',
        placeholder: 'widget-placeholder',
        start: function( event, ui ) {
          var inside = ui.item.children('.la-group-content');
          if ( inside.css('display') === 'block' ) {
            inside.hide();
            field_groups.sortable('refreshPositions');
          }
        },
        stop: function( event, ui ) {
          ui.item.children( '.la-group-title' ).triggerHandler( 'focusout' );
          accordion_group.accordion({ active:false });
        }
      });

      var i = 0;
      $('.la-add-group', _this).on('click', function( e ) {

        e.preventDefault();

        clone_group.find('input, select, textarea').each( function () {
          this.name = this.name.replace(/\[(\d+)\]/,function(string, id) {
            return '[' + (parseInt(id,10)+1) + ']';
          });
        });

        var cloned = clone_group.clone().removeClass('hidden');
        field_groups.append(cloned);

        if ( accordion_group.length ) {
          field_groups.accordion('refresh');
          field_groups.accordion({ active: cloned.index() });
        }

        field_groups.find('input, select, textarea').each( function () {
          this.name = this.name.replace('[_nonce]', '');
        });

        // run all field plugins
        cloned.LA_FRAMEWORK_DEPENDENCY( 'sub' );
        cloned.LA_FRAMEWORK_RELOAD_PLUGINS();

        i++;

      });

      var group_title_id = field_groups.attr('data-accordion-title');
      if(group_title_id){
        field_groups.on('change keyup', '[data-sub-depend-id="'+group_title_id+'"]', function(e){
          var $_parent = $(this).closest('.la-group'),
              $_heading = $_parent.find('.la-group-title .a-title');
          $_heading.html($(this).val());
        });
      }

      field_groups.on('click', '.la-remove-group', function(e) {
        e.preventDefault();
        $(this).closest('.la-group').remove();
      });

    });
  };
  // ======================================================

  // ======================================================
  // LA_FRAMEWORK RESET CONFIRM
  // ------------------------------------------------------
  $.fn.LA_FRAMEWORK_CONFIRM = function() {
    return this.each( function() {
      $(this).on('click', function( e ) {
        if ( !confirm('Are you sure?') ) {
          e.preventDefault();
        }
      });
    });
  };
  // ======================================================

  // ======================================================
  // LA_FRAMEWORK SAVE OPTIONS
  // ------------------------------------------------------
  $.fn.LA_FRAMEWORK_SAVE = function() {
    return this.each( function() {

      var $this  = $(this),
          $text  = $this.data('save'),
          $value = $this.val(),
          $ajax  = $('#la-save-ajax');

      $(document).on('keydown', function(event) {
        if (event.ctrlKey || event.metaKey) {
          if( String.fromCharCode(event.which).toLowerCase() === 's' ) {
            event.preventDefault();
            $this.trigger('click');
          }
        }
      });

      $this.on('click', function ( e ) {

        if( $ajax.length ) {

          if( typeof tinyMCE === 'object' ) {
            tinyMCE.triggerSave();
          }

          $this.prop('disabled', true).attr('value', $text);

          var serializedOptions = $('#laframework_form').serialize();

          $.post( 'options.php', serializedOptions ).error( function() {
            alert('Error, Please try again.');
          }).success( function() {
            $this.prop('disabled', false).attr('value', $value);
            $ajax.hide().fadeIn().delay(250).fadeOut();
          });

          e.preventDefault();

        } else {

          $this.addClass('disabled').attr('value', $text);

        }

      });

    });
  };
  // ======================================================

  // ======================================================
  // LA_FRAMEWORK SAVE TAXONOMY CLEAR FORM ELEMENTS
  // ------------------------------------------------------
  $.fn.LA_FRAMEWORK_TAXONOMY = function() {
    return this.each( function() {

      var $this   = $(this),
          $parent = $this.parent();

      // Only works in add-tag form
      if( $parent.attr('id') === 'addtag' ) {

        var $submit  = $parent.find('#submit'),
            $name    = $parent.find('#tag-name'),
            $wrap    = $parent.find('.la-framework'),
            $clone   = $wrap.find('.la-element').clone(),
            $list    = $('#the-list'),
            flooding = false;

        $submit.on( 'click', function() {

          if( !flooding ) {

            $list.on( 'DOMNodeInserted', function() {

              if( flooding ) {

                $wrap.empty();
                $wrap.html( $clone );
                $clone = $clone.clone();

                $wrap.LA_FRAMEWORK_RELOAD_PLUGINS();
                $wrap.LA_FRAMEWORK_DEPENDENCY();

                flooding = false;

              }

            });

          }

          flooding = true;

        });

      }

    });
  };
  // ======================================================

  $.fn.LA_FRAMEWORK_ACE = function(){
    this.each( function() {
      var $this = $(this);
      $('.ace-editor', $this ).each( function( index, element ) {
        var area = element,
            params = JSON.parse( $( this ).parent().find( '.localize_data' ).val()),
            editor = $( element ).attr( 'data-editor'),
            aceeditor = ace.edit( editor );
        aceeditor.setTheme( "ace/theme/" + $( element ).attr( 'data-theme' ) );
        aceeditor.getSession().setMode( "ace/mode/" + $( element ).attr( 'data-mode' ) );
        aceeditor.setOptions( params );
        aceeditor.on( 'change', function( e ) {
              $( '#' + area.id ).val( aceeditor.getSession().getValue() );
              if(typeof wp.customize !== "undefined") {
                $( '#' + area.id).trigger('change');
              }
              aceeditor.resize();
            }
        );
      })
    });
  };

  // ======================================================
  // LA_FRAMEWORK UI DIALOG OVERLAY HELPER
  // ------------------------------------------------------
  if( typeof $.widget !== 'undefined' && typeof $.ui !== 'undefined' && typeof $.ui.dialog !== 'undefined' ) {
    $.widget( 'ui.dialog', $.ui.dialog, {
        _createOverlay: function() {
          this._super();
          if ( !this.options.modal ) { return; }
          this._on(this.overlay, {click: 'close'});
        }
      }
    );
  }

  // ======================================================
  // LA_FRAMEWORK ICONS MANAGER
  // ------------------------------------------------------
  $.LA_FRAMEWORK.ICONS_MANAGER = function() {

    var base   = this,
        onload = true,
        $parent;

    base.init = function () {

      $la_body.on('click', '.la-btn-add-icon', function( e ) {

        e.preventDefault();

        var $this   = $(this),
            $dialog = $('#la-icon-dialog'),
            $load   = $dialog.find('.la-dialog-load'),
            $select = $dialog.find('.la-dialog-select'),
            $insert = $dialog.find('.la-dialog-insert'),
            $search = $dialog.find('.la-icon-search');

        // set parent
        $parent = $this.closest('.la-icon-select');

        // open dialog
        $dialog.dialog({
          width: 850,
          height: 700,
          modal: true,
          resizable: false,
          closeOnEscape: true,
          position: {my: 'center', at: 'center', of: window},
          open: function() {

            // fix scrolling
            $la_body.addClass('la-icon-scrolling');

            // fix button for VC
            $('.ui-dialog-titlebar-close').addClass('ui-button');

            // set viewpoint
            $(window).on('resize', function () {

              var height      = $(window).height(),
                  load_height = Math.floor( height - 237 ),
                  set_height  = Math.floor( height - 125 );

              $dialog.dialog('option', 'height', set_height).parent().css('max-height', set_height);
              $dialog.css('overflow', 'auto');
              $load.css( 'height', load_height );

            }).resize();

          },
          close: function() {
            $la_body.removeClass('la-icon-scrolling');
          }
        });

        // load icons
        if( onload ) {

          $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {
              action: 'la-fw-get-icons'
            },
            success: function( content ) {

              $load.html( content );
              onload = false;

              $load.on('click', 'a', function( e ) {

                e.preventDefault();

                var icon = $(this).data('la-icon');

                $parent.find('i').removeAttr('class').addClass(icon);
                $parent.find('input').val(icon).trigger('change');
                $parent.find('.la-icon-preview').removeClass('hidden');
                $parent.find('.la-icon-remove').removeClass('hidden');
                $dialog.dialog('close');

              });

              $search.keyup( function(){

                var value  = $(this).val(),
                    $icons = $load.find('a');

                $icons.each(function() {

                  var $ico = $(this);

                  if ( $ico.data('la-icon').search( new RegExp( value, 'i' ) ) < 0 ) {
                    $ico.hide();
                  } else {
                    $ico.show();
                  }

                });

              });

              $load.find('.la-icon-tooltip').cstooltip({html:true, placement:'top', container:'body'});

            }
          });

        }

      });

      $la_body.on('click', '.la-icon-remove', function( e ) {

        e.preventDefault();

        var $this   = $(this),
            $parent = $this.closest('.la-icon-select');

        $parent.find('.la-icon-preview').addClass('hidden');
        $parent.find('input').val('').trigger('change');
        $this.addClass('hidden');

      });

    };

    // run initializer
    base.init();
  };

  // ======================================================
  // LA_FRAMEWORK SHORTCODE MANAGER
  // ------------------------------------------------------
  $.LA_FRAMEWORK.SHORTCODE_MANAGER = function() {

    var base = this, deploy_atts;

    base.init = function () {

      var $dialog          = $('#la-shortcode-dialog'),
          $insert          = $dialog.find('.la-dialog-insert'),
          $shortcodeload   = $dialog.find('.la-dialog-load'),
          $selector        = $dialog.find('.la-dialog-select'),
          shortcode_target = false,
          shortcode_name,
          shortcode_view,
          shortcode_clone,
          $shortcode_button,
          editor_id;

      $la_body.on('click', '.la-shortcode', function( e ) {

        e.preventDefault();

        // init chosen
        $selector.LA_FRAMEWORK_CHOSEN();

        $shortcode_button = $(this);
        shortcode_target  = $shortcode_button.hasClass('la-shortcode-textarea');
        editor_id         = $shortcode_button.data('editor-id');

        $dialog.dialog({
          width: 850,
          height: 700,
          modal: true,
          resizable: false,
          closeOnEscape: true,
          position: {my: 'center', at: 'center', of: window},
          open: function() {

            // fix scrolling
            $la_body.addClass('la-shortcode-scrolling');

            // fix button for VC
            $('.ui-dialog-titlebar-close').addClass('ui-button');

            // set viewpoint
            $(window).on('resize', function () {

              var height      = $(window).height(),
                  load_height = Math.floor( height - 281 ),
                  set_height  = Math.floor( height - 125 );

              $dialog.dialog('option', 'height', set_height).parent().css('max-height', set_height);
              $dialog.css('overflow', 'auto');
              $shortcodeload.css( 'height', load_height );

            }).resize();

          },
          close: function() {
            shortcode_target = false;
            $la_body.removeClass('la-shortcode-scrolling');
          }
        });

      });

      $selector.on( 'change', function() {

        var $elem_this     = $(this);
        shortcode_name = $elem_this.val();
        shortcode_view = $elem_this.find(':selected').data('view');

        // check val
        if( shortcode_name.length ){

          $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {
              action: 'la-get-shortcode',
              shortcode: shortcode_name
            },
            success: function( content ) {

              $shortcodeload.html( content );
              $insert.parent().removeClass('hidden');

              shortcode_clone = $('.la-shortcode-clone', $dialog).clone();

              $shortcodeload.LA_FRAMEWORK_DEPENDENCY();
              $shortcodeload.LA_FRAMEWORK_DEPENDENCY('sub');
              $shortcodeload.LA_FRAMEWORK_RELOAD_PLUGINS();

            }
          });

        } else {

          $insert.parent().addClass('hidden');
          $shortcodeload.html('');

        }

      });

      $insert.on('click', function ( e ) {

        e.preventDefault();

        var send_to_shortcode = '',
            ruleAttr          = 'data-atts',
            cloneAttr         = 'data-clone-atts',
            cloneID           = 'data-clone-id';

        switch ( shortcode_view ){

          case 'contents':

            $('[' + ruleAttr + ']', '.la-dialog-load').each( function() {
              var _this = $(this), _atts = _this.data('atts');
              send_to_shortcode += '['+_atts+']';
              send_to_shortcode += _this.val();
              send_to_shortcode += '[/'+_atts+']';
            });

            break;

          case 'clone':

            send_to_shortcode += '[' + shortcode_name; // begin: main-shortcode

            // main-shortcode attributes
            $('[' + ruleAttr + ']', '.la-dialog-load .la-element:not(.hidden)').each( function() {
              var _this_main = $(this), _this_main_atts = _this_main.data('atts');

              console.log(_this_main_atts);
              send_to_shortcode += base.validate_atts( _this_main_atts, _this_main );  // validate empty atts
            });

            send_to_shortcode += ']'; // end: main-shortcode attributes

            // multiple-shortcode each
            $('[' + cloneID + ']', '.la-dialog-load').each( function() {

              var _this_clone = $(this),
                  _clone_id   = _this_clone.data('clone-id');

              send_to_shortcode += '[' + _clone_id; // begin: multiple-shortcode

              // multiple-shortcode attributes
              $('[' + cloneAttr + ']', _this_clone.find('.la-element').not('.hidden') ).each( function() {

                var _this_multiple = $(this), _atts_multiple = _this_multiple.data('clone-atts');

                // is not attr content, add shortcode attribute else write content and close shortcode tag
                if( _atts_multiple !== 'content' ){
                  send_to_shortcode += base.validate_atts( _atts_multiple, _this_multiple ); // validate empty atts
                }else if ( _atts_multiple === 'content' ){
                  send_to_shortcode += ']';
                  send_to_shortcode += _this_multiple.val();
                  send_to_shortcode += '[/'+_clone_id+'';
                }
              });

              send_to_shortcode += ']'; // end: multiple-shortcode

            });

            send_to_shortcode += '[/' + shortcode_name + ']'; // end: main-shortcode

            break;

          case 'clone_duplicate':

            // multiple-shortcode each
            $('[' + cloneID + ']', '.la-dialog-load').each( function() {

              var _this_clone = $(this),
                  _clone_id   = _this_clone.data('clone-id');

              send_to_shortcode += '[' + _clone_id; // begin: multiple-shortcode

              // multiple-shortcode attributes
              $('[' + cloneAttr + ']', _this_clone.find('.la-element').not('.hidden') ).each( function() {

                var _this_multiple = $(this),
                    _atts_multiple = _this_multiple.data('clone-atts');


                // is not attr content, add shortcode attribute else write content and close shortcode tag
                if( _atts_multiple !== 'content' ){
                  send_to_shortcode += base.validate_atts( _atts_multiple, _this_multiple ); // validate empty atts
                }else if ( _atts_multiple === 'content' ){
                  send_to_shortcode += ']';
                  send_to_shortcode += _this_multiple.val();
                  send_to_shortcode += '[/'+_clone_id+'';
                }
              });

              send_to_shortcode += ']'; // end: multiple-shortcode

            });

            break;

          default:

            send_to_shortcode += '[' + shortcode_name;

            $('[' + ruleAttr + ']', '.la-dialog-load .la-element:not(.hidden)').each( function() {

              var _this = $(this), _atts = _this.data('atts');

              // is not attr content, add shortcode attribute else write content and close shortcode tag
              if( _atts !== 'content' ){
                send_to_shortcode += base.validate_atts( _atts, _this ); // validate empty atts
              }else if ( _atts === 'content' ){
                send_to_shortcode += ']';
                send_to_shortcode += _this.val();
                send_to_shortcode += '[/'+shortcode_name+'';
              }

            });

            send_to_shortcode += ']';

            break;

        }

        if( shortcode_target ) {
          var $textarea = $shortcode_button.next();
          $textarea.val( base.insertAtChars( $textarea, send_to_shortcode ) ).trigger('change');
        } else {
          base.send_to_editor( send_to_shortcode, editor_id );
        }

        deploy_atts = null;

        $dialog.dialog( 'close' );

      });

      // cloner button
      var cloned = 0;
      $dialog.on('click', '#shortcode-clone-button', function( e ) {

        e.preventDefault();

        // clone from cache
        var cloned_el = shortcode_clone.clone().hide();

        cloned_el.find('input:radio').attr('name', '_nonce_' + cloned);

        $('.la-shortcode-clone:last').after( cloned_el );

        // add - remove effects
        cloned_el.slideDown(100);

        cloned_el.find('.la-remove-clone').show().on('click', function( e ) {

          cloned_el.slideUp(100, function(){ cloned_el.remove(); });
          e.preventDefault();

        });

        // reloadPlugins
        cloned_el.LA_FRAMEWORK_DEPENDENCY('sub');
        cloned_el.LA_FRAMEWORK_RELOAD_PLUGINS();
        cloned++;

      });

    };

    base.validate_atts = function( _atts, _this ) {

      var el_value;

      if( _this.data('check') !== undefined && deploy_atts === _atts ) { return ''; }

      deploy_atts = _atts;

      if ( _this.closest('.pseudo-field').hasClass('hidden') === true ) { return ''; }
      if ( _this.hasClass('pseudo') === true ) { return ''; }

      if( _this.is(':checkbox') || _this.is(':radio') ) {
        el_value = _this.is(':checked') ? _this.val() : '';
      } else {
        el_value = _this.val();
      }

      if( _this.data('check') !== undefined ) {
        el_value = _this.closest('.la-element').find('input:checked').map( function() {
          return $(this).val();
        }).get();
      }

      if( el_value !== null && el_value !== undefined && el_value !== '' && el_value.length !== 0 ) {
        return ' ' + _atts + '="' + el_value + '"';
      }

      return '';

    };

    base.insertAtChars = function( _this, currentValue ) {

      var obj = ( typeof _this[0].name !== 'undefined' ) ? _this[0] : _this;

      if ( obj.value.length && typeof obj.selectionStart !== 'undefined' ) {
        obj.focus();
        return obj.value.substring( 0, obj.selectionStart ) + currentValue + obj.value.substring( obj.selectionEnd, obj.value.length );
      } else {
        obj.focus();
        return currentValue;
      }

    };

    base.send_to_editor = function( html, editor_id ) {

      var tinymce_editor;

      if ( typeof tinymce !== 'undefined' ) {
        tinymce_editor = tinymce.get( editor_id );
      }

      if ( tinymce_editor && !tinymce_editor.isHidden() ) {
        tinymce_editor.execCommand( 'mceInsertContent', false, html );
      } else {
        var $editor = $('#'+editor_id);
        $editor.val( base.insertAtChars( $editor, html ) ).trigger('change');
      }

    };

    // run initializer
    base.init();
  };
  // ======================================================

  // ======================================================
  // LA_FRAMEWORK COLORPICKER
  // ------------------------------------------------------
  if( typeof Color === 'function' ) {

    // adding alpha support for Automattic Color.js toString function.
    Color.fn.toString = function () {

      // check for alpha
      if ( this._alpha < 1 ) {
        return this.toCSS('rgba', this._alpha).replace(/\s+/g, '');
      }

      var hex = parseInt( this._color, 10 ).toString( 16 );

      if ( this.error ) { return ''; }

      // maybe left pad it
      if ( hex.length < 6 ) {
        for (var i = 6 - hex.length - 1; i >= 0; i--) {
          hex = '0' + hex;
        }
      }

      return '#' + hex;

    };

  }

  $.LA_FRAMEWORK.PARSE_COLOR_VALUE = function( val ) {

    var value = val.replace(/\s+/g, ''),
        alpha = ( value.indexOf('rgba') !== -1 ) ? parseFloat( value.replace(/^.*,(.+)\)/, '$1') * 100 ) : 100,
        rgba  = ( alpha < 100 ) ? true : false;

    return { value: value, alpha: alpha, rgba: rgba };

  };

  $.fn.LA_FRAMEWORK_COLORPICKER = function() {

    return this.each(function() {

      var $this = $(this);

      // check for rgba enabled/disable
      if( $this.data('rgba') !== false ) {

        // parse value
        var picker = $.LA_FRAMEWORK.PARSE_COLOR_VALUE( $this.val() );

        // wpColorPicker core
        $this.wpColorPicker({

          // wpColorPicker: clear
          clear: function() {
            $this.trigger('keyup');
          },

          // wpColorPicker: change
          change: function( event, ui ) {

            var ui_color_value = ui.color.toString();

            // update checkerboard background color
            $this.closest('.wp-picker-container').find('.la-alpha-slider-offset').css('background-color', ui_color_value);
            $this.val(ui_color_value).trigger('change');

          },

          // wpColorPicker: create
          create: function() {

            // set variables for alpha slider
            var a8cIris       = $this.data('a8cIris'),
                $container    = $this.closest('.wp-picker-container'),

                // appending alpha wrapper
                $alpha_wrap   = $('<div class="la-alpha-wrap">' +
                                  '<div class="la-alpha-slider"></div>' +
                                  '<div class="la-alpha-slider-offset"></div>' +
                                  '<div class="la-alpha-text"></div>' +
                                  '</div>').appendTo( $container.find('.wp-picker-holder') ),

                $alpha_slider = $alpha_wrap.find('.la-alpha-slider'),
                $alpha_text   = $alpha_wrap.find('.la-alpha-text'),
                $alpha_offset = $alpha_wrap.find('.la-alpha-slider-offset');

            // alpha slider
            $alpha_slider.slider({

              // slider: slide
              slide: function( event, ui ) {

                var slide_value = parseFloat( ui.value / 100 );

                // update iris data alpha && wpColorPicker color option && alpha text
                a8cIris._color._alpha = slide_value;
                $this.wpColorPicker( 'color', a8cIris._color.toString() );
                $alpha_text.text( ( slide_value < 1 ? slide_value : '' ) );

              },

              // slider: create
              create: function() {

                var slide_value = parseFloat( picker.alpha / 100 ),
                    alpha_text_value = slide_value < 1 ? slide_value : '';

                // update alpha text && checkerboard background color
                $alpha_text.text(alpha_text_value);
                $alpha_offset.css('background-color', picker.value);

                // wpColorPicker clear for update iris data alpha && alpha text && slider color option
                $container.on('click', '.wp-picker-clear', function() {

                  a8cIris._color._alpha = 0;
                  $alpha_text.text('').trigger('change');
                  $alpha_slider.slider('option', 'value', 100).trigger('slide');

                });

                // wpColorPicker default button for update iris data alpha && alpha text && slider color option
                $container.on('click', '.wp-picker-default', function() {

                  var default_picker = $.LA_FRAMEWORK.PARSE_COLOR_VALUE( $this.data('default-color') ),
                      default_value  = parseFloat( default_picker.alpha / 100 ),
                      default_text   = default_value < 1 ? default_value : '';

                  a8cIris._color._alpha = default_value;
                  $alpha_text.text(default_text);
                  $alpha_slider.slider('option', 'value', default_picker.alpha).trigger('slide');

                });

                // show alpha wrapper on click color picker button
                $container.on('click', '.wp-color-result', function() {
                  $alpha_wrap.toggle();
                });

                // hide alpha wrapper on click body
                $la_body.on( 'click.wpcolorpicker', function() {
                  $alpha_wrap.hide();
                });

              },

              // slider: options
              value: picker.alpha,
              step: 1,
              min: 0,
              max: 100

            });
          }

        });

      } else {

        // wpColorPicker default picker
        $this.wpColorPicker({
          clear: function() {
            $this.trigger('keyup');
          },
          change: function( event, ui ) {
            $this.val(ui.color.toString()).trigger('change');
          }
        });

      }

    });

  };
  // ======================================================

  // ======================================================
  // ON WIDGET-ADDED RELOAD FRAMEWORK PLUGINS
  // ------------------------------------------------------
  $.LA_FRAMEWORK.WIDGET_RELOAD_PLUGINS = function() {
    $(document).on('widget-added widget-updated', function( event, $widget ) {
      $widget.LA_FRAMEWORK_RELOAD_PLUGINS();
      $widget.LA_FRAMEWORK_DEPENDENCY();
    });
  };

  // ======================================================
  // TOOLTIP HELPER
  // ------------------------------------------------------
  $.fn.LA_FRAMEWORK_TOOLTIP = function() {
    return this.each(function() {
      var placement = ( la_is_rtl ) ? 'right' : 'left';
      if( $(this).data('position') ) {
        placement = $(this).data('position');
      }
      $(this).cstooltip({html:true, placement:placement, container:'body', trigger: 'hover'});
    });
  };

  $.fn.LA_FRAMEWORK_AUTOCOMPLETE = function() {
    return this.each(function() {
      var ac    = $( this ),
          time  = false,
          query = ac.data('query');

      // Keyup input and send ajax
      $( '> input', ac ).on( 'keyup', function() {
        clearTimeout( time );
        var val     = $( this ).val(),
            results = $( '.ajax_items', ac );

        if ( val.length < 2 ) {
          results.slideUp();
          $( '.fa-codevz', ac ).removeClass( 'fa-spinner fa-pulse' );
          return;
        }
        $( '.fa-codevz', ac ).addClass( 'fa-spinner fa-pulse' );

        time = setTimeout( function() {
          $.ajax({
            type: "GET",
            url: ajaxurl,
            data: $.extend( query, {s: val} ),
            success: function( data ) {
              results.html( data ).slideDown();
              $( '.fa-codevz', ac ).removeClass( 'fa-spinner fa-pulse' );
            },
            error: function( xhr, status, error ) {
              results.html( '<div>' + error + '</div>' ).slideDown();
              $( '.fa-codevz', ac ).removeClass( 'fa-spinner fa-pulse' );
              console.log( xhr, status, error );
            }
          });
        }, 1000 );
      });

      // Choose item from ajax results
      $( '.ajax_items', ac ).on('click', 'div', function() {
        var id    = $( this ).data('id'),
            title = $( this ).html(),
            target,
            name;

        if ( $( '.multiple', ac ).length ) {
          target = 'append';
          name = query.elm_name + '[]';
        } else {
          target = 'html';
          name = query.elm_name;
        }

        $( '> input', ac ).val('');
        $( '.ajax_items' ).slideUp();
        if ( $( '#' + id, ac ).length ) {
          return;
        }
        $( '.selected_items', ac )[ target ]( '<div id="' + id + '"><input name="' + name + '" value="' + id + '" /><span> ' + title + '<i class="fa fa-remove"></i></span></div>' );
      });

      // Remove selected items
      $( '.selected_items', ac ).on('click', '.fa-remove', function() {
        $( this ).parent().parent().detach();
      });

      $( '.la-autocomplete, .ajax_items' ).on( 'click', function(e) {
        e.stopPropagation();
      });

      $( 'body' ).on( 'click', function(e) {
        $( '.ajax_items' ).slideUp();
      });

    });
  };

  // ======================================================
  // RELOAD FRAMEWORK PLUGINS
  // ------------------------------------------------------
  $.fn.LA_FRAMEWORK_RELOAD_PLUGINS = function() {
    return this.each(function() {
      $('.chosen', this).LA_FRAMEWORK_CHOSEN();
      $('.la-field-image-select', this).LA_FRAMEWORK_IMAGE_SELECTOR();
      $('.la-field-image', this).LA_FRAMEWORK_IMAGE_UPLOADER();
      $('.la-field-gallery', this).LA_FRAMEWORK_IMAGE_GALLERY();
      $('.la-field-sorter', this).LA_FRAMEWORK_SORTER();
      $('.la-field-upload', this).LA_FRAMEWORK_UPLOADER();
      $('.la-field-typography', this).LA_FRAMEWORK_TYPOGRAPHY();
      $('.la-field-color-picker', this).LA_FRAMEWORK_COLORPICKER();
      $('.la-help', this).LA_FRAMEWORK_TOOLTIP();
      $('.la-tip', this).LA_FRAMEWORK_TOOLTIP();
      $('.la-autocomplete', this).LA_FRAMEWORK_AUTOCOMPLETE();
      $('.la-field-slider', this).LA_FRAMEWORK_SLIDER();
    });
  };

  $.LA_FRAMEWORK.SEARCH_FIELD = function(){
    $('<input id="la_searchbox" type="search" placeholder="Search for option(s)" />').insertBefore('.la-header fieldset .la-save');
    $('#la_searchbox').css('margin-left', '30px');
    $.expr[':'].Contains = function(a, i, m) {
      return $(a).text().toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
    };

    $('#la_searchbox').on('keyup search', function() {
      var w = $(this).val();
      if (w) {
        $('.la-body').addClass('la-show-all la-active-search');
        $('.la-expand-all').hide();
        $('.la-title h4').closest('.la-element').hide();
        $('.la-title h4:Contains('+w+')').closest('.la-element').show();
      } else {
        $('.la-body').removeClass('la-show-all la-active-search');
        $('.la-expand-all').show();
        $('.la-title h4').closest('.la-element').removeAttr('style');
      }
    });

  };

  $.fn.LA_FRAMEWORK_SLIDER = function() {
    return this.each(function() {
      var dis    = $( this ),
          input  = $( 'input', dis ),
          slider = $( '.la-slider > div', dis ),
          data   = input.data( 'slider' ),
          val    = input.val() || 0,
          step   = data.step || 1,
          min    = data.min || 0,
          max    = data.max || 200;

      slider.slider({
        range: "min",
        value: parseInt( val ),
        step: step,
        min: parseInt( min ),
        max: parseInt( max ),
        slide: function( e, o ) {
          input.val( o.value + data.unit ).trigger( 'change' );
        }
      });

      input.keyup( function() {
        slider.slider( "value" , parseInt( input.val() ) );
      });

    });
  };

  // ======================================================
  // JQUERY DOCUMENT READY
  // ------------------------------------------------------
  $(document).ready( function() {
    $('.la-framework').LA_FRAMEWORK_TAB_NAVIGATION();
    $('.la-header').LA_FRAMEWORK_STICKYHEADER();
    $('.la-reset-confirm, .la-import-backup').LA_FRAMEWORK_CONFIRM();
    $('.la-content, .wp-customizer, .widget-content, .la-taxonomy').LA_FRAMEWORK_DEPENDENCY();
    $('.la-field-group').LA_FRAMEWORK_GROUP();
    $('.la-save').LA_FRAMEWORK_SAVE();
    $('.la-taxonomy').LA_FRAMEWORK_TAXONOMY();
    $('.la-field-ace_editor').LA_FRAMEWORK_ACE();
    $('.la-framework, #widgets-right').LA_FRAMEWORK_RELOAD_PLUGINS();
    $.LA_FRAMEWORK.ICONS_MANAGER();
    $.LA_FRAMEWORK.SHORTCODE_MANAGER();
    $.LA_FRAMEWORK.WIDGET_RELOAD_PLUGINS();
    $.LA_FRAMEWORK.SEARCH_FIELD();

    $('.la-field-slider').LA_FRAMEWORK_SLIDER();

  });

})( jQuery, window, document );


(function($) {
  "use strict";

  /*
   *   Get hidden field values
   *---------------------------------------------------*/
  function get_responsive_values_in_input(t) {
    var mv = t.find('.lastudio-responsive-value').val(),
        counter = 0;
    if (mv != "") {
      var vals = mv.split(";");
      $.each(vals, function(i, vl) {
        if (vl != "") {
          t.find('.la-responsive-input').each(function() {
            var that        = $(this),
                splitval    = vl.split(":");
            if( that.attr('data-id') == splitval[0] ) {
              var mval = splitval[1].split( that.attr('data-unit') );
              that.val(mval[0]);
              counter++;
            }
          })
        }
      });

      if(counter>1) {
        t.find('.simplify').attr('la-toggle', 'expand');
        t.find('.la-responsive-item.optional, .lastudio-unit-section').show();
      }
      else {
        t.find('.simplify').attr('la-toggle', 'collapse');
        t.find('.la-responsive-item.optional, .lastudio-unit-section').hide();
      }
    }
    else {
      var i=0;      // set default - Values
      t.find(".la-responsive-input").each(function() {
        var that = $(this),
            d    = that.attr('data-default');
        if(d!=''){
          that.val(d);
          i++;
        }
      });
      if(i<=1) {    // set default - Collapse
        t.find('.simplify').attr('la-toggle', 'collapse');
        t.find('.la-responsive-item.optional, .lastudio-unit-section').hide();
      }
    }
  }
  /*
   *   Set hidden field values
   *---------------------------------------------------*/
  function set_responsive_values_in_hidden(t) {
    var new_val = '';
    t.find('.la-responsive-input').each(function() {
      var that    =   $(this),
          unit    =   that.attr('data-unit'),
          ival    =   that.val();
      if ($.isNumeric(ival)) {
        new_val += that.attr('data-id') + ':' + ival + unit + ';';
      }
    });
    t.find('.lastudio-responsive-value').val(new_val);
  }

  $(document).ready(function(){

    $(document)
        .on('vc_param.la_columns', '.lastudio-responsive-wrapper',  function(e){
          get_responsive_values_in_input($(this));
          set_responsive_values_in_hidden($(this));
        })
        .on('click', '.simplify', function(e){
          var $this   = $(this).closest('.lastudio-responsive-wrapper'),
              status  = $(this).attr('la-toggle');
          switch(status) {
            case 'expand':
              $this.find('.simplify').attr('la-toggle', 'collapse');
              $this.find('.la-responsive-item.optional, .lastudio-unit-section').hide();
              break;
            case 'collapse':
              $this.find('.simplify').attr('la-toggle', 'expand');
              $this.find('.la-responsive-item.optional, .lastudio-unit-section').show();
              break;
            default:
              $this.find('.simplify').attr('la-toggle', 'collapse');
              $this.find('.la-responsive-item.optional, .lastudio-unit-section').hide();
              break;
          }
        })
        /* On change - input / select */
        .on('change', '.la-responsive-input', function(e){
          set_responsive_values_in_hidden($(this).closest('.lastudio-responsive-wrapper'));
        });

    $('.elm-datetime').on('show', function(e){
      e.preventDefault();
      return false;
    }).datetimepicker();

    $('.lastudio-responsive-wrapper').trigger('vc_param.la_columns');

    $(document).on('click', '.la-field-fieldset.la-fieldset-toggle > .la-title', function(){
      $(this).toggleClass('active');
    })
  })

})(jQuery);
