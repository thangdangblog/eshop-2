jQuery( document ).ready(function($) {

    $(".aside-item").click(function(){
        if($(this).hasClass("active-fillter")){
            $(".aside-item .list-item-search").css("display","none");
            $(this).removeClass("active-fillter")
        }else{
            $(".active-fillter").removeClass("active-fillter");
            //Remove all menu is active
            $(".aside-item .list-item-search").css("display","none");
            //Get data-id of element just clicked
            let id = $(this).attr("data-id");
            $(id).css("display","block");
            $(this).addClass("active-fillter")
        }
    });

    $(".item-search-variable").click(function(){
        if($(this).find(".checkbox-item").hasClass("checked")){
            $(this).find(".checkbox-item").removeClass("checked");
        }else{
            $(this).find(".checkbox-item").addClass("checked");
        }
    });

});

