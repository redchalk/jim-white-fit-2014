//this clears form fields when focused 	
$(document).ready(function () {
	
	// Hide Social Menu on load
    $('#social-menu').hide();
	$('.child-submenu').hide();
	$('.section-submenu').hide();
	
	
	$('#social-menu-toggle').click(function () {     	       
        $("#social-menu").slideToggle(300);
        return false;
    });
    
    $('#page-title-menu').click(function () {     	       
        $(".child-submenu").slideToggle(300);
        return false;
    });
    
    $('#section-title-menu').click(function () {     	       
        $(".section-submenu").slideToggle(300);
        return false;
    });
		
	$('.clearme').one("focus", function() {
	$(this).val("");
	});
	
	// Mobile Services Toggle Open / Close
	$(".accordion-toggle").click(function () {
		$(this).next(".information").slideToggle(300);
	});

	// Settings for bxSliders
	
	/* homepage */
	$('.homepage').bxSlider({video: true,useCSS: false, pager:false, captions:true});	
	$('.home-clients').bxSlider({useCSS: true, pager:false});	
	$('.home-coaches').bxSlider({slideWidth:300, pager:false, minSlides:1, maxSlides:6, moveSlides:1});
	
	$('.restaurants').bxSlider({useCSS: true, pager:false});
	
	
	// Turn off Stellar on mobile devices
	
	var isMobile = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function() {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    };

    if( !isMobile.any() ){
        $(window).stellar();
    }
    
    var links = $('.restaurant-nav').find('div');
    htmlbody = $('html,body');

    function goToByScroll(dataslide) {
        htmlbody.animate({
            scrollTop: $('.accordion-toggle[data-slide="' + dataslide + '"]').offset().top
        }, 2000, 'easeInOutQuint');
    }
    
    links.click(function (e) {
        e.preventDefault();
        dataslide = $(this).attr('data-slide');
        goToByScroll(dataslide);
    });

});
	
