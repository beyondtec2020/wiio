( function($) {
  'use strict';
$(function(e) {

var partnersCarouselAlt = $('#partners-alt');
/*-------------------------------------------------------------------------------
	  Smooth scroll to anchor
	-------------------------------------------------------------------------------*/
	var navbar=$('.js-navbar');
	var navbarAffixHeight=80
	$('.js-target-scroll').on('click', function(e) {
		var target = $(this.hash);
		if (target.length) {
			$('html,body').animate({
				scrollTop: (target.offset().top - navbarAffixHeight + 1)
			}, 1000);
			return false;
		}
	});
	
/*------------------------------------------------------------------
	Header Style 2 menu-toggle-bar
	-------------------------------------------------------------------*/
	$('.menu-toggle-bar').on('click', function(e) {
		   $(".navbar-collapse").toggleClass("shownav");
	});
	
/*------------------------------------------------------------------
	latest_listing_slider-Slider
	-------------------------------------------------------------------*/
	$('#latest_listing_slider .owl-carousel').owlCarousel({
    loop:true,
    margin:15,
    nav:false,
	autoplay:true,
	dots:false,
    autoplayTimeout:5000,
    responsive:{
        0:{items:1},
		600:{items:3},
		900:{items:4},
        1200:{items:1}
    }
	})
/*------------------------------------------------------------------
	Category-Slider
	-------------------------------------------------------------------*/
	$('#category_slider .owl-carousel').owlCarousel({
    loop:true,
    margin:15,
    nav:true,
	autoplay:true,
    autoplayTimeout:5000,
    responsive:{
        0:{items:1},
		600:{items:3},
		900:{items:4},
        1200:{items:6}
    }
	})
	
/*------------------------------------------------------------------
	Category-Slider-2
	-------------------------------------------------------------------*/
	$('#category_slider2 .owl-carousel').owlCarousel({
    loop:true,
    margin:30,
    nav:true,
	dots:false,
	autoplay:true,
    autoplayTimeout:5000,
    responsive:{
        0:{items:1},
		600:{items:2},
		900:{items:3},
        1200:{items:4}
    }
	})
	
	// Partners carousel alt
        if (partnersCarouselAlt.length) {
            partnersCarouselAlt.owlCarousel({
                autoplay: true,
                loop: true,
                margin: 10,
                dots: false,
                nav: false,
                navText: [
                    "<i class='fa fa-angle-left'></i>",
                    "<i class='fa fa-angle-right'></i>"
                ],
                responsive: {
                    0: {items: 1},
                    479: {items: 2},
                    768: {items: 2},
                    991: {items: 3},
                    1024: {items: 3},
                    1280: {items: 3}
                }
            });
        }
	
/*------------------------------------------------------------------
	Popular-Listings
	-------------------------------------------------------------------*/
	$('#popular_listing_slider .owl-carousel').owlCarousel({
    loop:true,
    margin:15,
    nav:true,
	dots:false,
	autoplay:true,
    autoplayTimeout:5000,
    responsive:{
        0:{items:1},
        700:{items:2}, 
		1200:{items:4}
    }
	})

/*------------------------------------------------------------------
	Recent-Listings
	-------------------------------------------------------------------*/
	$('#recent_listing_slider .owl-carousel').owlCarousel({
    loop:true,
    margin:15,
    nav:true,
	dots:false,
	autoplay:true,
    autoplayTimeout:5000,
    responsive:{
        0:{items:1},
        700:{items:2}, 
		1200:{items:3}
    }
	})
/*------------------------------------------------------------------
	Testimonial-Slider
	-------------------------------------------------------------------*/
	$('#testimonial_slider .owl-carousel').owlCarousel({
    loop:true,
    margin:0,
    nav:true,
	autoplay:true,
    autoplayTimeout:5000,
    responsive:{
        0:{items:1},
        1000:{items:1}
    }
	})
/*------------------------------------------------------------------
	Testimonial-Slider
	-------------------------------------------------------------------*/
	$('#testimonial_slider2 .owl-carousel').owlCarousel({
    loop:true,
    margin:0,
	dots:false,
    nav:true,
	autoplay:true,
    autoplayTimeout:5000,
    responsive:{
        0:{items:1},
        1000:{items:1}
    }
	})

/*------------------------------------------------------------------
	Listing-Gallery-Slider
	-------------------------------------------------------------------*/
	$('#listing_img_slider .owl-carousel').owlCarousel({
    loop:true,
    margin:0,
    nav:true,
	dots:false,
	autoplay:true,
    autoplayTimeout:5000,
    responsive:{
        0:{items:1},
		400:{items:2},
		768:{items:3},
        992:{items:4}
    }
	})
	
	/*------------------------------------------------------------------
	Listing-Gallery-Slider
	-------------------------------------------------------------------*/
	$('#listing_img_slider2 .owl-carousel').owlCarousel({
    loop:true,
    margin:0,
    nav:false,
	dots:true,
	autoplay:true,
    autoplayTimeout:5000,
    responsive:{
        0:{items:1},
		400:{items:1},
		768:{items:1},
        992:{items:1},
    }
	})
	

/*-------------------------------------------------------------------------------
		Dashboard-Navigation
	-------------------------------------------------------------------------------*/
	$('#dashboard-responsive-nav-trigger').on('click', function(e) {
		   $("#dashboard-nav").toggle("show");
	});
	
$(function() {
    $('#navigation li.menu-item-has-children .arrow').click(function(e) {
        e.stopPropagation();
		var $el = $(this).siblings('ul.sub-menu').slideToggle();
    });
        $('#navigation li.menu-item-has-children .arrow').click(function(e) {
        e.stopImmediatePropagation();  
    });
});	


	
/*------------------------------------------------------------------
	back to top
	-------------------------------------------------------------------*/
 var top = $('#back-top');
	top .hide();
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				top .fadeIn();
			} else {
				top .fadeOut();
			}
		});
		$('#back-top a').on('click', function(e) {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});	 


});
})(jQuery);