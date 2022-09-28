// JavaScript Document
jQuery(document).ready(function() {
	
	var yepzaViewPortWidth = '',
		yepzaViewPortHeight = '';

	function yepzaViewport(){

		yepzaViewPortWidth = jQuery(window).width(),
		yepzaViewPortHeight = jQuery(window).outerHeight(true);	
		
		if( yepzaViewPortWidth > 1200 ){
			
			jQuery('.main-navigation').removeAttr('style');
			
			var yepzaSiteHeaderHeight = jQuery('.site-header').outerHeight();
			var yepzaSiteHeaderWidth = jQuery('.site-header').width();
			var yepzaSiteHeaderPadding = ( yepzaSiteHeaderWidth * 2 )/100;
			var yepzaMenuHeight = jQuery('.menu-container').height();
			
			var yepzaMenuButtonsHeight = jQuery('.site-buttons').height();
			
			var yepzaMenuPadding = ( yepzaSiteHeaderHeight - ( (yepzaSiteHeaderPadding * 2) + yepzaMenuHeight ) )/2;
			var yepzaMenuButtonsPadding = ( yepzaSiteHeaderHeight - ( (yepzaSiteHeaderPadding * 2) + yepzaMenuButtonsHeight ) )/2;
		
			
			jQuery('.menu-container').css({'padding-top':yepzaMenuPadding});
			jQuery('.site-buttons').css({'padding-top':yepzaMenuButtonsPadding});
			
			
		}else{

			jQuery('.menu-container, .site-buttons, .header-container-overlay, .site-header').removeAttr('style');

		}	
	
	}

	jQuery(window).on("resize",function(){
		
		yepzaViewport();
		
	});
	
	yepzaViewport();


	jQuery('.site-branding .menu-button').on('click', function(){
				
		if( yepzaViewPortWidth > 1200 ){

		}else{
			jQuery('.main-navigation').slideToggle();
		}				
		
				
	});	

		
	
});		