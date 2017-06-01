// Custom Scripts for Primal Template //

jQuery(function($) {
    "use strict";


/* --------- Wow Init ------ */

  new WOW().init();



/*----- Preloader ----- */

    $(window).load(function() {
  		setTimeout(function() {
        $('#loading').fadeOut('slow', function() {
        });
      }, 150);
    });


/* ------ Lightcase ----- */

jQuery(document).ready(function($) {
		$('a[data-rel^=lightcase]').lightcase();
	});


    /*----------------------------
    ------- Isotope Init -------
    -----------------------------*/

    $( window ).load(function() {

    var $container = $('.portfolio-container');
    $container.isotope({
    	filter: '*',
    });

    $('.portfolio-filter a').on('click', function () {
    	$('.portfolio-filter .active').removeClass('active');
    	$(this).addClass('active');

    	var selector = $(this).attr('data-filter');
    	$container.isotope({
    			filter: selector,
    			animationOptions: {
    					duration: 500,
    					animationEngine: "jquery"
    			}
    	});
    	return false;
    });

    });

});
