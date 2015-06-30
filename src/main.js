$(function() {
    start();
    resize();
});

function start() {
    $(window).resize(resize);

    $("#main_nav_menu").on("click", function (pEvent) {
        $("#menu_main").removeClass("hidden");
    });

    $("#btn_mainBack").on("click", function (pEvent) {
        $("#menu_main").addClass("hidden");
    });

    $("#btn_conseils").on("click", function (pEvent) {
        $("#menu_conseils").removeClass("hidden");
    });

    $("#btn_conseilsBack").on("click", function (pEvent) {
        $("#menu_conseils").addClass("hidden");
    });

    $("#btn_prestations").on("click", function (pEvent) {
        $("#menu_prestations").removeClass("hidden");
    });

    $("#btn_prestationsBack").on("click", function (pEvent) {
        $("#menu_prestations").addClass("hidden");
    });
    
    $("#btn_submit").on("click", function (pEvent) {
        $("#form").submit();
    });
}

function resize() {
    var marges;

    if ($(window).width() <= 1115) {
        $("#main_content img").css({
            "width"     : "850px",
            "height"    : "460px"
        });

        $("#main_nav_phone").addClass("hidden");

        $("#icon").css({
            "width" : "160px",
            "height": "160px"
        });

        $("header nav img").css({
            "height": "160px"
        });

        $(".queleque").css({
            "margin-left"   : "40px",
            "margin-right"  : "40px"
        });
    } else if ($(window).width() <= 1220) {
        $("#main_content img").css({
            "width"     : "480px",
            "height"    : "270px"
        });

        $("#main_nav_phone").addClass("hidden");

        $("#icon").css({
            "width"     : "120px",
            "height"    : "120px"
        });

        $("header nav img").css({
            "height": "120px"
        });

        $(".queleque").css({
            "margin-left"   : "0px",
            "margin-right"  : "0px"
        });
    } else {
        $("#main_content img").css({
            "width"     : "380px",
            "height"    : "230px"
        });

        $("#main_nav_phone").removeClass("hidden");

        $("#icon").css({
            "width" : "80px",
            "height": "80px"
        });

        $("header nav img").css({
            "height": "80px"
        });

        $(".queleque").css({
            "margin-left"   : "0px",
            "margin-right"  : "0px"
        });
    }
}