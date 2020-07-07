class Quantity {

    constructor() {
        this.initEvents();
    }

    /**
     * Khởi tạo sự kiện
     */

    initEvents(){
        //Bắt sự kiện tăng số lượng
        $(document).on("click",".plus-value",this.incrementQuantity);

        //Bắt sự kiện giảm số lượng
        $(document).on("click",".minus-value",this.redutionQuantity);

    }

    /**
     * Tăng số lượng sản phẩm
     */
    incrementQuantity = (e)  => {
        //Hiển thị cập nhật nút cập nhật
        this.changeButtonUpdateCart();

        //Thực hiện thay đổi số lượng
        let btnClicked =  $(e.target);
        let id_input = $(btnClicked).attr("data-id");
        $(id_input).val(+$(id_input).val() + 1);
    }

    /**
     * Giảm số lượng sản phẩm
     */
    redutionQuantity = (e) => {
        //Hiển thị cập nhật nút cập nhật
        this.changeButtonUpdateCart();

        //Thực hiện thay đổi số lượng
        let btnClicked =  $(e.target);
        let id_input = $(btnClicked).attr("data-id");
        $(id_input).val(+$(id_input).val() - 1);
        if($(id_input).val() < 1){
            $(id_input).val(1);
        }
    }

    /**
     * Hiển thị nút cập nhật nếu số lượng thay đổi
     */
    changeButtonUpdateCart(){
        $("button[name=update_cart]").prop("disabled",false);
    }
}

$( document ).ready(function() {
    var quantity =  new Quantity();
});