// Shrink navbar and logo

    $(document).on('scroll', function() {
        if ($(document).scrollTop() > 100) {
            $('.fixed-header').addClass('navbar-shrink');
			$('.pt-fixed').addClass('pt-shrink');
            $('.logo').addClass('logo-shrink');
        } else {
            $('.fixed-header').removeClass('navbar-shrink');
			$('.pt-fixed').removeClass('pt-shrink');
            $('.logo').removeClass('logo-shrink');
        }
    });