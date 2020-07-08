class Product{

    /**
     * Hàm khởi tạo
     */
    constructor(){
        this.initEvents();
        this.initLibrary();
    }

    /**
     * Khởi tạo nhúng các thư viện
     */
    initLibrary(){
        this.initThumbnailProductCarousel();
        this.initProductRelatedCarousel();
        this.initZoomThumbnailProduct();
    }

    /**
     * Khởi tạo các sự kiện
     */
    initEvents(){
        $('#carousel-custom-dots .owl-dot').click(this.changeSlideFearturedProduct);
    }

    /**
     * Sự kiện chuyển slide trong trang sản phẩm
     */
    changeSlideFearturedProduct(){
        let owl = $('.owl-carousel');
        $('#carousel-custom-dots .owl-dot').removeClass("active-carosel");
        owl.trigger('to.owl.carousel', [$(this).index(), 300]);
        $(this).addClass("active-carosel");
    }


    /**
     * Khởi tạo Thumbnail Carosel
     */
    initThumbnailProductCarousel(){
        $(".owl-carousel-product").owlCarousel({
            items: 1,
            dots: true,
        });
    }

    /**
     * Khởi tạo Related Product Carosel
     */
    initProductRelatedCarousel(){
        // Carousel related
        $(".related-carosel").owlCarousel({
            items: 2,
            dots: true,
            loop:true,
            responsive: {
                768:{
                    items: 3
                },
                990:{
                    items: 4
                },
                1200:{
                    items: 5
                }
            }
        });
    }

    /**
     * Khởi tạo thư viện Zoom cho Thumbnail sản phẩm
     */
    initZoomThumbnailProduct(){
        //Zoom Image
        $(".woocommerce-product-gallery__wrapper > div a").zoom({
            on: 'mouseover',
            url: $(this).attr("href")
        });
    }
}

jQuery( document ).ready(function($) {
    var product = new Product();
});