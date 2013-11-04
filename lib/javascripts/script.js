jQuery(document).ready(function($) {

	if ( $(".rslides").length > 0 ) {
	    $(".rslides").responsiveSlides({
	    	speed: 2000,
	    	timeout: 4000,
	    	pause: true,
	    	pager: true,
	    	namespace: 'rslider-buttons'
	    });
	}
});