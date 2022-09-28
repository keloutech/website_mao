(function($){
  "use strict";
  
  jQuery(document).ready(function () { 
  // post grid
  if ( $('#masonry-loop').length ) {
      //set the container that Masonry will be inside of in a var
      var container = document.querySelector('#masonry-loop');
      //create empty var msnry
      var msnry;
      // initialize Masonry after all images have loaded
      imagesLoaded( container, function() {
          msnry = new Masonry( container, {
              itemSelector: '.masonry-entry'
          });
      });
  } 
  
    
    // wpxon js 
    $('.comment-reply-link').addClass('base-color pull-right');
    $('#cancel-comment-reply-link').addClass('base-color pull-right');
    $('#commentform').addClass('input-form');
    $('#wpxon-main-menu .sub-menu,#wpxon-mobile-menu .sub-menu').addClass('dropdown');
    $('#wpxon-mobile-menu .menu-item-has-children > a').addClass('has-submenu');
    $('#wpxon-mobile-menu .menu-item-has-children > a').append('<i class="fa fa-angle-down"></i>'); 
     
    // Mobile Menu 
    $('.mobile-background-nav .has-submenu').on('click',function(e) {
        e.preventDefault();
        var $this = $(this);
        if ($this.next().hasClass('menu-show')) {
            $this.next().removeClass('menu-show');
            $this.next().slideUp(350);
        } else {
            $this.parent().parent().find('li .dropdown').removeClass('menu-show');
            $this.parent().parent().find('li .dropdown').slideUp(350);
            $this.next().toggleClass('menu-show');
            $this.next().slideToggle(350);
        }
    });
    $('.mobile-menu-close i').on('click',function(){
         $('.mobile-background-nav').removeClass('in');
    }); 
    $('#humbarger-icon').on('click',function(e){
          e.preventDefault();
         $('.mobile-background-nav').toggleClass('in');
    });  
 
  });      
})(jQuery);