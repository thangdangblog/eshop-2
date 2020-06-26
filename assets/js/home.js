jQuery( document ).ready(function($) {
    var owl = $('.owl-carousel');

    //Slide Product 1
    $(".slide-home").owlCarousel({
        items: 1,
        loop: true,
        dots: true,
        nav: true,
        navText: "",
        dotsContainer: '#carousel-custom-dots'
    });


    //Slide product 2
    $(".show-product").owlCarousel({
        items: 5,
        loop: true,
        dots: true,
        nav: true,
        navText: "",
    });

    $('#carousel-custom-dots .owl-dot').click(function () {
        owl.trigger('to.owl.carousel', [$(this).index(), 300]);
    });




});