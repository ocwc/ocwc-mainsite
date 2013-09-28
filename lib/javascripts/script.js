jQuery(document).ready(function($) {

	if ( $(".rslides").length > 0 ) {
	    $(".rslides").responsiveSlides({
	    	speed: 2000,
	    	timeout: 6000,
	    	pause: true
	    });
	}
});