jQuery( document ).ready(function($) {
    var header =  new Header();
});

class Header {
    constructor() {
        this.initEvent();

        //Create expand button
        this.createExpandButton();
    }

    initEvent(){
        $(".search-menu i").click(this.searchProduct);

        // Mở rộng menu
        $(".icon-expand-menu").click(this.showMenuMobile);

        // Thu hẹp menu
        $(".background-filter").click(this.hideMenuMobile);

        // Expand child Menu
        $(document).on('click','.expand-button',this.expandSubMenu)
    }

    /**
     * Mở rộng menu con
     */
    expandSubMenu = (event) => {
        const currentClick = $(event.target);
        if($(currentClick).parent().parent().find('> .sub-menu').hasClass('expaned-menu')){
            $(currentClick).parent().parent().find('> .sub-menu').removeClass('expaned-menu');
            $(currentClick).removeClass('fa-minus');
            $(currentClick).addClass('fa-plus');
        }else{
            $(currentClick).parent().parent().find('> .sub-menu').addClass('expaned-menu');
            $(currentClick).removeClass('fa-plus');
            $(currentClick).addClass('fa-minus');
        }

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

    /**
     * Tạo nút mở rộng menu mobile
     */
    createExpandButton(){
        const html = '<div class="expand-button"><i class="fas fa-plus"></i></div>';
        $('.eshop-header-mobile .menu-item-has-children').append(html);
    }

}