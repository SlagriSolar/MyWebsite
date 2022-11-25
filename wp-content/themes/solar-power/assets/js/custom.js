jQuery(function($){
	"use strict";
	jQuery('.main-menu-navigation > ul').superfish({
		delay:       500,                            
		animation:   {opacity:'show',height:'show'},  
		speed:       'fast'                        
	});
});

function solar_power_resmenu() {

  /* First and last elements in the menu */
  var solar_power_firstTab = jQuery('.main-menu-navigation ul:first li:first a');
  var solar_power_lastTab  = jQuery('.sidebar .closebtn'); /* Cancel button will always be last */

  jQuery(".resToggle").click(function(e){
    e.preventDefault();
    e.stopPropagation();
    jQuery('body').addClass("mobilemenu-open");
    solar_power_firstTab.focus();
  });

  jQuery(".sidebar .closebtn").click(function(e){
    e.preventDefault();
    e.stopPropagation();
    jQuery('body').removeClass("mobilemenu-open");
    jQuery(".resToggle").focus();
  });

  /* Redirect last tab to first input */
  solar_power_lastTab.on('keydown', function (e) {
    if (jQuery('body').hasClass('mobilemenu-open'))
    if ((e.which === 9 && !e.shiftKey)) {
      e.preventDefault();
      solar_power_firstTab.focus();
    }
  });

  /* Redirect first shift+tab to last input*/
  solar_power_firstTab.on('keydown', function (e) {
    if (jQuery('body').hasClass('mobilemenu-open'))
    if ((e.which === 9 && e.shiftKey)) {
      e.preventDefault();
      solar_power_lastTab.focus();
    }
  });

  /* Allow escape key to close menu */
  jQuery('.sidebar').on('keyup', function(e){
    if (jQuery('body').hasClass('mobilemenu-open'))
    if (e.keyCode === 27 ) {
      jQuery('body').removeClass('mobilemenu-open');
      solar_power_lastTab.focus();
    };
  });
}

jQuery(document).ready(function () {

	solar_power_resmenu();

// 	window.solar_power_currentfocus=null;
// 	solar_power_checkfocusdElement();
// 	var solar_power_body = document.querySelector('body');
// 	solar_power_body.addEventListener('keyup', solar_power_check_tab_press);
// 	var solar_power_gotoHome = false;
// 	var solar_power_gotoClose = false;
// 	window.solar_power_mobileMenu=false;
//  	function solar_power_checkfocusdElement(){
// 	 	if(window.solar_power_currentfocus=document.activeElement.className){
// 		 	window.solar_power_currentfocus=document.activeElement.className;
// 	 	}
//  	}
// 	function solar_power_check_tab_press(e) {
// 		"use strict";
// 		// pick passed event or global event object if passed one is empty
// 		e = e || event;
// 		var activeElement;

// 		if(window.innerWidth < 999){
// 			if (e.keyCode == 9) {
// 				if(window.solar_power_mobileMenu){
// 					if (!e.shiftKey) {
// 						if(solar_power_gotoHome) {
// 							jQuery( ".main-menu-navigation ul:first li:first a:first-child" ).focus();
// 						}
// 					}
// 					if (jQuery("a.closebtn.responsive-menu").is(":focus")) {
// 						solar_power_gotoHome = true;
// 					} else {
// 						solar_power_gotoHome = false;
// 					}

// 			}else{

// 					if(window.solar_power_currentfocus=="resToggle"){
// 						jQuery( "" ).focus();
// 					}
// 				}
// 			}
// 		}
// 		if (e.shiftKey && e.keyCode == 9) {
// 			if(window.innerWidth < 999){
// 				if(window.solar_power_currentfocus=="header-search"){
// 					jQuery(".resToggle").focus();
// 				}else{
// 					if(window.solar_power_mobileMenu){
// 						if(solar_power_gotoClose){
// 							jQuery("a.closebtn.responsive-menu").focus();
// 						}
// 						if (jQuery( ".main-menu-navigation ul:first li:first a:first-child" ).is(":focus")) {
// 							solar_power_gotoClose = true;
// 						} else {
// 							solar_power_gotoClose = false;
// 					}
				
// 				}else{

// 					if(window.solar_power_mobileMenu){
// 					}
// 				}

// 				}
// 			}
// 		}
// 	 	solar_power_checkfocusdElement();
// 	}
});

(function( $ ) {
	jQuery(document).ready(function() {
		var owl = jQuery('#our-features .owl-carousel');
			owl.owlCarousel({
				nav: true,
				autoplay:true,
				autoplayTimeout:2000,
				autoplayHoverPause:true,
				loop: true,
				navText : ['<i class="fa fa-lg fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-lg fa-chevron-right" aria-hidden="true"></i>'],
				responsive: {
				  0: {
				    items: 1
				  },
				  600: {
				    items: 2
				  },
				  1000: {
				    items: 3
				}
			}
		})
	})
})( jQuery );

(function( $ ) {

	$(window).scroll(function(){
	  var sticky = $('.sticky-menubox'),
	      scroll = $(window).scrollTop();

	  if (scroll >= 100) sticky.addClass('fixed-menubox');
	  else sticky.removeClass('fixed-menubox');
	});

})( jQuery );