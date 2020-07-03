class Quantity {

    constructor() {
        this.initEvents();
    }

    /**
     * Khởi tạo sự kiện
     */

    initEvents(){
        $(".plus-value").click(this.incrementQuantity);
        $(".minus-value").click(this.redutionQuantity);
    }

    /**
     * Tăng số lượng sản phẩm
     */
    incrementQuantity() {
        let id_input = $(this).attr("data-id");
        $(id_input).val(+$(id_input).val() + 1);
    }

    /**
     * Giảm số lượng sản phẩm
     */
    redutionQuantity() {
        let id_input = $(this).attr("data-id");
        $(id_input).val(+$(id_input).val() - 1);
        if($(id_input).val() < 1){
            $(id_input).val(1);
        }
    }
}

$( document ).ready(function() {
    var quantity =  new Quantity();
});