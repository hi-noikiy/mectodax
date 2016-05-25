/* Theme Blossom - Custom scripts */
jQuery(document).ready(function($) {
	'use strict';
	var screenRes = $(window).width(),
		screenHeight = $(window).height(),
		html = $('html');

	$('select, input[type="text"], input[type="email"], input[type="url"], input[type="password"], input[type="search"], textarea').each(function() {
		$(this).addClass('form-control');
	})

	
	$('#primary input[type="submit"]').each(function() {
		$(this).addClass('btn');
	})

	/* RESPONSIVE NAVIGATION */
    var Mobile_Menu = function() {
        jQuery(".site-navigation ul .mega-menu").hide();

        var mmenu = jQuery(".site-navigation#primary-navigation").clone();
        mmenu.attr("id", "mobile-menu").removeClass().appendTo("#site-branding .container");
        mmenu.find('.mega-menu').remove();

        jQuery('<a href="#mobile-menu" class="mmenu-link" id="tb-responsive-nav-trigger"><i class="fa fa-navicon"></i></a>').prependTo("#site-branding .container");
        mmenu.mmenu({
           "offCanvas": {
              "position": "right",
              "zposition": "front"
           },
           "extensions": [
              "theme-dark"
           ],
           "navbars": [
              {
                 "position": "top",
                 "content": [
                    "searchfield"
                 ]
              },
              {
                 "position": "top",
                 "content": [
                    "prev",
                    //"title",
                    "close"
                 ]
              },
           ]
        }, {
            classNames: {
                selected: "current-menu-item"
            }            
        });
    };
    if(screenRes < 992){
        Mobile_Menu();
    }

	// overlay menu

	$('#primary-navigation li.special.overlay a').on('click', function() {
		$("#overlay-menu").addClass('active').fadeIn();
		setTimeout(	function() {
				$('#overlay-menu-trigger').fadeIn();
				$('#overlay-menu-holder').addClass('active');
		},  100);
	});

	$('#overlay-menu-trigger').on('click', function() {

		$('#overlay-menu-trigger').fadeOut();
		$('#overlay-menu-holder').removeClass('active');
		setTimeout(function() {
			$("#overlay-menu").fadeOut().removeClass('active');
		}, 600);

	});

	// section slides
	$('.campaign_section_slide').hide();

	function campaign_section_slides_animation() {
	    $(".campaign_section_with_slides .campaign_section_slide").first().appendTo('.campaign_section_with_slides').fadeOut(2500);
	    $(".campaign_section_with_slides .campaign_section_slide").first().fadeIn(2500);    
	    setTimeout(campaign_section_slides_animation, 6500);
	}
	campaign_section_slides_animation();

	// half margin
	$(".tb-half-margin").each(function() {
		var itemHeight = $(this).innerHeight();
		var marginTop = -1 * Math.floor(itemHeight / 2);

		$(this).css('margin-top', marginTop);
	});

	// backgrounds
	$(".data-bg-hover").each(function() {
		var bg = $(this).attr('data-bg');
		var bghover = $(this).attr('data-bg-hover');

		$(this).css('background', bg);

		$(this).hover(function() {
			$(this).css('background', bghover);
		}, function() {
			$(this).css('background', bg);
		})
	});

	$(".data-color-hover").each(function() {
		var color = $(this).attr('data-color');
		var colorhover = $(this).attr('data-color-hover');
		var a_color = $(this).attr('data-a-color');
		var a_colorhover = $(this).attr('data-a-color-hover');

		$(this).css('color', color);
		$(this).children('a, .read-more, .slick-arrow').css('color', a_color);

		$(this).hover(function() {
			$(this).css('color', colorhover);
			$(this).children('a, .read-more, .slick-arrow').css('color', a_colorhover);
		}, function() {
			$(this).css('color', color);
			$(this).children('a, .read-more, .slick-arrow').css('color', a_color);
		})
	});

	$(".data-bg-hover-children").each(function() {
		var bg = $(this).attr('data-bg');
		var bghover = $(this).attr('data-bg-hover');

		$(this).children('.changing-data-attr').css('background', bg);

		$(this).hover(function() {
			$(this).children('.changing-data-attr').css('background', bghover);
		}, function() {
			$(this).children('.changing-data-attr').css('background', bg);
		})
	});

	$(".data-color-hover-children").each(function() {
		var color = $(this).attr('data-color');
		var colorhover = $(this).attr('data-color-hover');
		var a_color = $(this).attr('data-a-color');
		var a_colorhover = $(this).attr('data-a-color-hover');

		$(this).children('.changing-data-attr').css('color', color);
		$(this).children('.changing-data-attr').children('a, .read-more, .slick-arrow').css('color', a_color);

		$(this).hover(function() {
			$(this).children('.changing-data-attr').css('color', colorhover);
			$(this).children('.changing-data-attr').children('a, .read-more, .slick-arrow').css('color', a_colorhover);
		}, function() {
			$(this).children('.changing-data-attr').css('color', color);
			$(this).children('.changing-data-attr').children('a, .read-more, .slick-arrow').css('color', a_color);
		})
	});

	
	// images
	if ($('body').hasClass('animation-effect')) {
		$('#main p img[class*=" wp-image-"], #main .wp-caption img').each(function() {
			$(this).addClass('tbWow').addClass('fadeIn');
		})
	}
	// .images.

	// prettyPhoto	
	if ($('body').hasClass('usePrettyPhoto')) {
	
	$('a[href$=jpg], a[href$=png], a[href$=gif], a[href$=jpeg]').each(function()
	{
	
		if($(this).attr('rel') === undefined || $(this).attr('rel') === '')
		{
		
			if ($(this).parent().hasClass('gallery-icon')) {
				$(this).attr('rel', 'prettyPhoto[gallery]');
			} else if ($(this).attr('data-rel') == 'prettyPhoto[product-gallery]') {
				$(this).attr('rel', 'prettyPhoto[product-gallery]');
			} else {
				$(this).attr('rel', 'prettyPhoto');	
			}			
			
		} else {
			if ($(this).hasClass('scale-with-grid')) {
				$(this).attr('rel', 'prettyPhoto');	
			}			
		}
		
	});
	
	$("a[rel^='prettyPhoto'], a[data-rel^='prettyPhoto']").prettyPhoto({
			animation_speed: 'normal',
			slideshow: 4000,
			autoplay_slideshow: false,
			theme: 'pp_default'
	});
	
	} // .prettyPhoto

	/*******************************************************************************/
	// WIDGETS AND PLUGINS
	/*******************************************************************************/
	$(".widget_search label").each(function() {
		$(this).addClass('input-group').append('<span class="input-group-btn""><button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button></span>')
	});


	// WooCommerce
	$('.woocommerce-message a.wc-forward').addClass('btn').addClass('btn-tb-secondary');

	// The Events Calendar
	$('h2.entry-title span.tribe-events-list-separator-month').each(function() {
		$(this).parent().next("div.type-tribe_events").addClass("tribe-events-first");
	});
	
	// APS
	$(".aps-icon-link img").addClass("black-and-white-color");
	
	// UiToTop
	$().UItoTop({});

});

/* SMOOTH SCROLLING */
jQuery(document).ready(function($) {
	'use strict';

    $('.scroll').bind('click',function(event){
        var $anchor = $(this); 
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1000);
        event.preventDefault();
    });
});


/* LAZY LOAD */
jQuery(window).load(function() {
	'use strict';

	jQuery('body').addClass('loaded');
});

/*
|--------------------------------------------------------------------------
| UItoTop jQuery Plugin 1.2 by Matt Varone
| http://www.mattvarone.com/web-design/uitotop-jquery-plugin/
|--------------------------------------------------------------------------
*/
(function($){
	'use strict';

	$.fn.UItoTop = function(options) {

 		var defaults = {
    			text: '',
    			min: 200,
    			inDelay:600,
    			outDelay:400,
      			containerID: 'toTop',
    			containerHoverID: 'toTopHover',
    			scrollSpeed: 1200,
    			easingType: 'linear'
 		    },
            settings = $.extend(defaults, options),
            containerIDhash = '#' + settings.containerID,
            containerHoverIDHash = '#'+settings.containerHoverID;
		
		$('body').append('<a href="#page" id="'+settings.containerID+'" class="fa fa-chevron-up">'+settings.text+'</a>');
		$(containerIDhash).hide().on('click.UItoTop',function(){
			$('html, body').animate({scrollTop:0}, settings.scrollSpeed, settings.easingType);
			$('#'+settings.containerHoverID, this).stop().animate({'opacity': 0 }, settings.inDelay, settings.easingType);
			return false;
		})
		.prepend('<span id="'+settings.containerHoverID+'"></span>')
		.hover(function() {
				$(containerHoverIDHash, this).stop().animate({
					'opacity': 1
				}, 600, 'linear');
			}, function() { 
				$(containerHoverIDHash, this).stop().animate({
					'opacity': 0
				}, 700, 'linear');
			});
					
		$(window).scroll(function() {
			var sd = $(window).scrollTop();
			if(typeof document.body.style.maxHeight === "undefined") {
				$(containerIDhash).css({
					'position': 'absolute',
					'top': sd + $(window).height() - 50
				});
			}
			if ( sd > settings.min ) 
				$(containerIDhash).fadeIn(settings.inDelay);
			else 
				$(containerIDhash).fadeOut(settings.Outdelay);
		});
};
})(jQuery);


/*******************************************************************************/
// VIEWPORT
/*******************************************************************************/	
(function($){
	'use strict';
	
	$.fn.isOnScreen = function(){
	    
	    var win = $(window);
	    
	    var viewport = {
	        top : win.scrollTop(),
	        left : win.scrollLeft()
	    };
	    viewport.right = viewport.left + win.width();
	    viewport.bottom = viewport.top + win.height();
	    
	    var bounds = this.offset();
	    bounds.right = bounds.left + this.outerWidth();
	    bounds.bottom = bounds.top + this.outerHeight();
	    
	    return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
	    
	};
})(jQuery);