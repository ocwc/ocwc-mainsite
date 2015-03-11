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

    $('.show_more').on('click', function(){
        $(this).next(':hidden').show();
        $(this).find(':hidden').show();
        $(this).hide();

        return false;
    });

    /* navigation menu */
    var ww = document.body.clientWidth;
    if (ww < 640) {
        $(".menu > li > a").click(function() {
            $(this).parent("li").toggleClass('hover');
            return false;
        });
    } else {
        $('.menu li').hover(function() {
            $(this).addClass('hover');
        }, function() {
            $(this).removeClass('hover');
        });
    }

    $('.toggle-menu').click(function(){
        $('.menu').toggle();
    });

    $('.js-course-show-full-description').click(function(event) {
        $(this).parent('.js-course-description-short').hide();
        $(this).parent().siblings('.js-course-description-full').show();

        return true;
    });

});