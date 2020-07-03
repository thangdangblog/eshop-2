class Home {

    constructor() {
        this.initEvent();
        this.initLibrary();
    }

    /**
     * Khởi tạo các module của các thư viện
     */
    initLibrary(){
        this.initCarouselHeader();
        this.initCarouselSalePrice();
    }

    /**
     * Khởi tạo các sự kiện
     */
    initEvent(){
        //Chuyển Slide
        $('#carousel-custom-dots .owl-dot').click(this.changeSlideHeader);
    }

    /**
     * Chức năng chuyển slide carousel header khi nhấn vào các dots
     */
    changeSlideHeader(){
        let owl = $('.slide-home.owl-carousel');
        owl.trigger('to.owl.carousel', [$(this).index(), 300]);
    }

    /**
     * Khởi tạo carousel slide của header
     */
    initCarouselHeader(){
        //Slide Product 1
        $(".slide-home").owlCarousel({
            items: 1,
            loop: true,
            dots: true,
            nav: true,
            navText: "",
            dotsContainer: '#carousel-custom-dots'
        });
    }

    /**
     * Khởi tạo carousel slide của giảm giá
     */
    initCarouselSalePrice(){
        $(".show-product").owlCarousel({
            items: 5,
            loop: true,
            dots: true,
            nav: true,
            navText: "",
        });
    }
}

jQuery( document ).ready(function($) {
    var home = new Home();
});