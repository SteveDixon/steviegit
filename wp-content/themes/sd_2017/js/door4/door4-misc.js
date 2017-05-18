// Scrollstop and scrollstart

(function(){
 
    var special = jQuery.event.special,
        uid1 = 'D' + (+new Date()),
        uid2 = 'D' + (+new Date() + 1);
 
    special.scrollstart = {
        setup: function() {
 
            var timer,
                handler =  function(evt) {
 
                    var _self = this,
                        _args = arguments;
 
                    if (timer) {
                        clearTimeout(timer);
                    } else {
                        evt.type = 'scrollstart';
                        jQuery.event.dispatch.apply(_self, _args);
                    }
 
                    timer = setTimeout( function(){
                        timer = null;
                    }, special.scrollstop.latency);
 
                };
 
            jQuery(this).bind('scroll', handler).data(uid1, handler);
 
        },
        teardown: function(){
            jQuery(this).unbind( 'scroll', jQuery(this).data(uid1) );
        }
    };
 
    special.scrollstop = {
        latency: 300,
        setup: function() {
 
            var timer,
                    handler = function(evt) {
 
                    var _self = this,
                        _args = arguments;
 
                    if (timer) {
                        clearTimeout(timer);
                    }
 
                    timer = setTimeout( function(){
 
                        timer = null;
                        evt.type = 'scrollstop';
                        jQuery.event.dispatch.apply(_self, _args);
 
                    }, special.scrollstop.latency);
 
                };
 
            jQuery(this).bind('scroll', handler).data(uid2, handler);
 
        },
        teardown: function() {
            jQuery(this).unbind( 'scroll', jQuery(this).data(uid2) );
        }
    };
 
})();





// Scrolls to things... very handy

function scrollToElement(selector, time, verticalOffset) {
	
	time = typeof(time) != 'undefined' ? time : 1000;
	verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
	element = jQuery(selector);
	offset = element.offset();
	offsetTop = offset.top + verticalOffset;
	jQuery('html, body').animate({
		scrollTop: offsetTop
	}, time);
	
}; // function scrollToElement(selector, time, verticalOffset) {

jQuery(document).ready(function(){
	
	
	// Handles the scrolling to a Gravity form with errors....

	if (jQuery('.gform_wrapper.gform_validation_error').length > 0) {

		scrollToElement('.gform_wrapper.gform_validation_error', 500, -250); 
	
	} // if (jQuery('.gform_wrapper.gform_validation_error').length > 0) {
		
		
	jQuery('div.careers_intro_links a.view_vacancies').click(function(event) {
		
		event.preventDefault();
		
		scrollToElement('div.flexible_content.flexible_content_vacancies', 500, 0);
		
	}); // jQuery('div.careers_intro_links a.view_vacancies').click(function() {
		

}); // jQuery(document).ready(function(){
	
// Work item show videos

jQuery(document).ready(function(){
	
	if (jQuery('.campaign_media_item.video').length > 0) {
		
		jQuery('.campaign_media_item.video .play_button').click(function(){
		
			$this = jQuery(this);
			$this.addClass('hidden');
			$this.siblings('.video_background_image').addClass('hidden');
			$this.siblings('.video_container').removeClass('hidden');
			
		});
		
	}
	
});



// Video player fade out
	
jQuery(document).ready(function(){

	$("span.play_icon").click(function() {
		
		$(this).parent('div.play_controls_overlay').fadeOut(500, function() { $(this).remove(); });
	
		$(this).parent('div.play_controls_overlay').siblings('div.info_overlay').fadeOut(500, function() { $(this).remove(); });

	});

}); // jQuery(document).ready(function(){
	
	
	

// Mobile menu functionality

jQuery(document).ready(function(){

	// Drop the menu buttons in...

	$('ul#menu-mobile-menu li.menu-item-has-children > a').append('<span class="submenu_trigger"><i class="fa fa-angle-right"></i></span>');
	
	$('ul#menu-mobile-menu ul.sub-menu').prepend('<li class="back_trigger"><i class="fa fa-angle-left"></i> <span class="label">Back</span></li>');

	$("a#mobile_menu_trigger").click(function(e) {
		
		e.preventDefault(); // Prevent default behaviour
		
		$('div#global_wrapper').toggleClass('mobile-menu-active');
		
		$('ul#menu-mobile-menu li.menu-item-has-children').removeClass('active');
		
		$("div#global_wrapper").removeClass (function (index, css) { return (css.match (/(^|\s)visible-menu-sublevel-\S+/g) || []).join(' '); });

	}); // $("a#mobile_menu_trigger").click(function() {

	$("div#mobile_menu_off_menu_click_layer").click(function(e) {
		
		e.preventDefault(); // Prevent default behaviour
		
		$('div#global_wrapper').removeClass('mobile-menu-active');
		
		$('ul#menu-mobile-menu li.menu-item-has-children').removeClass('active');
		
		$("div#global_wrapper").removeClass (function (index, css) { return (css.match (/(^|\s)visible-menu-sublevel-\S+/g) || []).join(' '); });

	}); // $("div#mobile_menu_off_menu_click_layer").click(function(e) {
		
		
	$("div#mobile_menu li.menu-item-has-children > a > span.submenu_trigger").click(function(e) {
		
		e.preventDefault(); // Prevent default behaviour

		$(this).closest('li.menu-item-has-children').toggleClass('active');

		// Remove all existing mobile menu level visibility classes
		
		$("div#global_wrapper").removeClass (function (index, css) { return (css.match (/(^|\s)visible-menu-sublevel-\S+/g) || []).join(' '); });

		// Calculate the correct level visibility class and add it
		
		var mobile_menu_sublevel_visibility_class = 'visible-menu-sublevel-' + $(this).parents('li.menu-item-has-children').length;
		
		$('div#global_wrapper').addClass(mobile_menu_sublevel_visibility_class);

	}); // $("div#mobile_menu li.menu-item-has-children > span.submenu_trigger").click(function(e) {
		


	$("li.back_trigger").click(function(e) {

		$(this).closest('li.menu-item-has-children').toggleClass('active');

		// Remove all existing mobile menu level visibility classes
		
		$("div#global_wrapper").removeClass (function (index, css) { return (css.match (/(^|\s)visible-menu-sublevel-\S+/g) || []).join(' '); });
		
		// Calculate the correct level visibility class and add it

		var mobile_menu_sublevel_visibility_class = 'visible-menu-sublevel-' + ($(this).parents('li.menu-item-has-children').length - 1);
		
		$('div#global_wrapper').addClass(mobile_menu_sublevel_visibility_class);

	}); // $("div#mobile_menu li.menu-item-has-children > span.submenu_trigger").click(function(e) {



}); // jQuery(document).ready(function(){



// Adding an arrow to the main menu items that have a sub-menu

jQuery(document).ready(function(){

	$('ul#header_menu ul.sub-menu li.menu-item-has-children > a').append('<span class="has_children_arrow"><i class="fa fa-angle-right"></i></span>');

}); // jQuery(document).ready(function(){

	
/* Concertina */

jQuery(function () {

	jQuery('.conc-default').children('.conc-trigger').addClass('conc-active'); // if a concertina has class .conc-default it is open as default
	
	jQuery('.conc-default').children('.conc-content').show(); // trigger the concertina to change when clicked

	jQuery(".conc-trigger").click( function(e) {

		e.preventDefault(); // Prevent default behaviour

		if (jQuery(this).hasClass('conc-active')) { // on click if this has a class of active

			jQuery(this).removeClass('conc-active'); // remove active class first, we are collapsing

			jQuery(this).closest('.conc-scope').children('.conc-content').slideUp(); // find closest conc-scope, then traverse to children, and collapse

		} else { // i.e. it doesn't have a class of active...
	
			jQuery(this).addClass('conc-active');

			if (jQuery(this).closest('.conc-scope').hasClass('conc-exclusive')) { // for when we don't want more than one concertina open at once. if the closest element that has class conc-scope also has class conc exclusive close all open concertinas

				if (jQuery('.conc-active')) {
					
					jQuery('.conc-active').removeClass('conc-active');
					
				} // if (jQuery('.conc-active')) { - deactivate current

				jQuery('.conc-content').slideUp(); // hide all open concertina content

				jQuery(this).addClass('conc-active'); // add class of active to the .conc-trigger that was clicked

				jQuery(this).closest('.conc-scope').children('.conc-content').slideDown(); // open the appropriate .conc-content
	
			} else {

				jQuery(this).closest('.conc-scope').children('.conc-content').slideDown(); // find the closest conc-scope, and traverse to children, then reveal with a slide down
	
			} // if (jQuery(this).closest('.conc-scope').hasClass('conc-exclusive')) {
			
		} // if (jQuery(this).hasClass('conc-active')) {
	
	}); // jQuery(".conc-trigger").click( function(e) {

}); // jQuery(function () {
	
	
	
	
// ----------------------------------------------------------------------------------------------------------

// Flexslider

jQuery(window).load(function() {
  jQuery('.slideshow').flexslider({
	animation: "fade",
	animationLoop: true,
	controlNav: true,
	directionNav: false,
	slideshowSpeed: 5000,
	animationSpeed: 300,
  });
});



// ----------------------------------------------------------------------------------------------------------

// Inview

$(document).ready(function(){
	
    $('div.test_block').bind('inview', function (event, visible) {
		
		if (visible == true) {
		
			$(this).addClass('inview');
		
		} else {
		
			$(this).removeClass('inview');
		
		}; // if (visible == true) {
	  
    }); // $('div.cabbages').bind('inview', function (event, visible) {
	
}); // $(document).ready(function(){
	
	

// ----------------------------------------------------------------------------------------------------------

// Isotope
	
	
jQuery(function() {
	
	var $container = $('.isotope_wrapper');
	
	$container.isotope({
	
		itemSelector: '.isotope_item',
		layoutMode: 'masonry',
		masonry: {
			columnWidth: '.grid-sizer',
		}
		
	}); // $container.isotope({
	
	$container.imagesLoaded( function() {
	  $container.isotope('layout');
	});

	// filter items on button click
		
	$('ul.isotope_filters > li > a').off('click').on('click', function(e) {
		
		// Prevent Default Behaviour
		e.preventDefault();

		// Remove selection attributes & classes
		$('ul.isotope_filters > li').find('a').removeClass('active');
		
		$(this).addClass('active');
	
		var filterValue = $(this).attr('data-filter');

		$container.isotope({
		
			filter: filterValue,
			itemSelector: '.isotope_item',
			layoutMode: 'masonry',
			masonry: {
				columnWidth: '.grid-sizer',
			}
			
		}); // $container.isotope({

	}); // $('ul.isotope_filters > li > a').off('click').on('click', function(e) {

}); // jQuery(function() {	


// ----------------------------------------------------------------------------------------------------------

// Matchheight
		
jQuery(function() {
	
    jQuery('.matchheight-01').matchHeight();
	
	jQuery('div.dd_workshops div.workshop_program.wysiwyg div.lead_segment').matchHeight();

}); // jQuery(function() {


// ----------------------------------------------------------------------------------------------------------

// Slick

$(document).ready(function(){

	$('div.slick_container').slick({
	
		arrows: false,
		slidesToShow: 6,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 2000,
		speed: 800,
		responsive: [
						{
							breakpoint: 1025,
							settings: {
								slidesToShow: 4,
							}
						},
						{
							breakpoint: 641,
							settings: {
								slidesToShow: 2,
							}
						}
					]



	}); // $('div.slick_container').slick({

}); // $(document).ready(function(){


// ----------------------------------------------------------------------------------------------------------

// Watermark

jQuery(document).ready(function(){

	jQuery('input#s').watermark('Search...');
	
	jQuery('input#input_1_1').watermark('start typing...');

}); // jQuery(document).ready(function(){


