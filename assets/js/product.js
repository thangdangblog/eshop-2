jQuery( document ).ready(function($) {
    var owl = $('.owl-carousel');

    $(".plus-value").click(function(){
        $(".input-text.qty").val(+$(".input-text.qty").val() + 1);
    });
    $(".minus-value").click(function(){
        $(".input-text.qty").val(+$(".input-text.qty").val() - 1);
        if($(".input-text.qty").val() < 1){
            $(".input-text.qty").val(1);
        }
    });

    //Zoom Image
    $(".woocommerce-product-gallery__wrapper > div a").zoom({
        on: 'mouseover',
        url: $(this).attr("href")
    });

    //Carosel
    $(".owl-carousel-product").owlCarousel({
        items: 1,
        dots: true,
    });

    $('#carousel-custom-dots .owl-dot').click(function () {
        $('#carousel-custom-dots .owl-dot').removeClass("active-carosel");
        owl.trigger('to.owl.carousel', [$(this).index(), 300]);
        $(this).addClass("active-carosel");
    });
})