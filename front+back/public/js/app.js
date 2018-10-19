$(function() {
    
    /*MENU*/
    $("#btn_menu").click(function(){
        
        if($(".main_menu").hasClass("menu_active")){
            $(".main_menu").removeClass("menu_active");
            $(".fa-bars").removeClass("hide");
            $(".fa-times").addClass("hide");
        }
        else{
            $(".main_menu").addClass("menu_active");
            $(".fa-bars").addClass("hide");
            $(".fa-times").removeClass("hide");
        }
    });

    $("main").click(function(){

        if($(".main_menu").hasClass("menu_active")){
            $(".main_menu").removeClass("menu_active");
            $(".fa-bars").removeClass("hide");
            $(".fa-times").addClass("hide");
        }
        else{
        }
    });

});
