jQuery( document ).ready(function($) {
    var header =  new Header();
});

class Header {
    constructor() {
        this._initEvent();
    }

    _initEvent(){
        $(".search-menu i").click(this.searchProduct);
    }

    /**
     * Thực hiện click Icon sẽ thực hiện tìm kiếm
     */
    searchProduct(){
        $("#searchform").submit();
    }

}