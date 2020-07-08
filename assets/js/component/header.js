jQuery( document ).ready(function($) {
    var header =  new Header();
});

class Header {
    constructor() {
        this.initEvent();
    }

    initEvent(){
        $(".search-menu i").click(this.searchProduct);

        // Mở rộng menu
        $(".icon-expand-menu").click(this.showMenuMobile);

        // Thu hẹp menu
        $(".background-filter").click(this.hideMenuMobile);
    }

    /**
     * Thực hiện click Icon sẽ thực hiện tìm kiếm
     */
    searchProduct(){
        $("#searchform").submit();
    }

    /**
     * Hiển thị menu mobile khi nhấn vào mở rộng menu
     */
    showMenuMobile(){
        $(".sidebar-menu").css("left","0");
        //Hiển thị background filter
        $(".background-filter").css("display",'block');
    }

    /**
     * Thực hiện tắt menu mobile khi nhấn ra ngoài menu
     */
    hideMenuMobile(){
        $(".sidebar-menu").css("left","-250px");
        $(".background-filter").css("display",'none');
    }

}