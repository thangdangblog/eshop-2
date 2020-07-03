class Common {
    constructor() {
        this.initEvents();
    }
    /**
     * Khởi tạo các sự kiện
     */
    initEvents(){
        //Show-Hide nút scroll to top
        $(window).scroll(this.showHideButtonScroll);

        //Sự kiện chuyển lên đầu trang
        $(".scroll-to-top").click(this.scrollToTop);
    }

    /**
     * Sự kiện cuộn lên đầu trang
     */
    scrollToTop(){
        $("body,html").animate({
            scrollTop: 0
        },400);
    }

    /**
     * Sự kiện thay đổi button scroll top khi thay đổi vị trí scrollbar
     */
    showHideButtonScroll(){
        let scrollHeight = $(window).scrollTop();
        if(scrollHeight > 300){
            $(".scroll-to-top").addClass("d-block");
            $(".scroll-to-top").removeClass("d-none");
        }else{
            $(".scroll-to-top").addClass("d-none");
            $(".scroll-to-top").removeClass("d-block");
        }
    }
}

$( document ).ready(function() {
    var common = new Common();
});