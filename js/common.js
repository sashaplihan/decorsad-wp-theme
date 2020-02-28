jQuery(document).ready(function($) {
    //Инициализация карусели
    $('.owl-carousel').owlCarousel({
        loop: true,
        items: 1,
        smartSpeed: 700,
        nav: true,
        navText: ['<i class="fa fa-angle-double-left" aria-hidden="true"></i>', '<i class="fa fa-angle-double-right" aria-hidden="true"></i>'],
        autoHeight: true,
        autoplay: true
    });

    //Button up
    $(window).scroll(function() {
        if ($(this).scrollTop() > $(this).height()) {
            $('.top').addClass('active');
        } else {
            $('.top').removeClass('active');
        }
    });
    $('.top').click(function() {
        $('html, body').stop().animate({scrollTop: 0}, 'slow', 'swing');
    });

})

jQuery(document).ready(function() {
    jQuery('.toggle-nav').click(function(e) {
        jQuery('.menu.main ul').slideToggle(500);

        e.preventDefault();
    });

});
