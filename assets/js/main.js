jQuery(document).ready(function ($) {
    //Scroll to top
    $(window).scroll(() => {
        let scrollHeight = $(window).scrollTop();
        if(scrollHeight > 300){
            $(".scroll-to-top").addClass("d-block");
            $(".scroll-to-top").removeClass("d-none");
        }else{
            $(".scroll-to-top").addClass("d-none");
            $(".scroll-to-top").removeClass("d-block");
        }
    });

    $(".scroll-to-top").click(function(){
        $("body,html").animate({
            scrollTop: 0
        },400);
    });
});