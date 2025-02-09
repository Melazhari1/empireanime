
(function($, window, document, undefined) {
    'use strict';
			
    // Back to top button

    if ($('#back-to-top , #back-to-home').length) {
        var scrollTrigger = 100, // px
            backToTop = function() {
                var scrollTop = $(window).scrollTop();
                if (scrollTop > scrollTrigger) {
                    $('#back-to-top , #back-to-home').addClass('show');
                } else {
                    $('#back-to-top , #back-to-home').removeClass('show');
                }
            };
        backToTop();
        $(window).on('scroll', function() {
            backToTop();
        });
        $('#back-to-top').on('click', function(e) {
            e.preventDefault();
            $('html,body').animate({
                scrollTop: 0
            }, 700);
        });
    }

	// Toggle open and close sidenav
	
	$('.toggle-open-close-right').click(function() {
		$("#zettaiwp-sidenav").toggleClass("sidenav-w-right");
    });

    // Add custom classes to predefined targets	
    
    $('.wpcf7-form-control').addClass('border-class');
	$('.wpcf7 input[type="submit"], .wpcf7 input[type="button"], .wpuf-submit-button').addClass('btn btn-custom btn-sm btn-block');
	$('.updated').addClass('alert alert-success');	  
			
	// Navbar collapse
	
	$('.navbar-collapse a').click(function(){
	  $(".navbar-collapse").collapse('hide');
	});	
	

})(jQuery, window, document);