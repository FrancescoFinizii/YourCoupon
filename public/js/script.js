$(window).on("load", function() {
    activeCurrentPage();
    switchStyle();

    $("#navbar-toggler").click(function() {
        $("#main-nav-link").toggleClass("responsive");
        $("#main-nav-link-btn").toggleClass("responsive");
    })
})


$(window).on("resize", function() {
    switchStyle();
})


function activeCurrentPage() {
    let pageTitle = document.title;
    $("#main-nav .nav-link").each(function() {
        if ($(this).text() === pageTitle) {
            $(this).addClass('active');
        }
    });
    $("#main-nav .btn-rect").each(function() {
        if ($(this).text() === pageTitle) {
            $(this).addClass('active');
        }
    });
}


function switchStyle() {
    if (window.innerWidth <= 880) {
        $('#btn-login').removeClass('btn btn-blue').addClass('nav-link')
        $('#btn-signup').removeClass('btn btn-light').addClass('nav-link')
        $('#btn-logout').removeClass('btn btn-blue').addClass('nav-link')
    }
    else {
        $('#btn-login').removeClass('nav-link').addClass('btn btn-blue')
        $('#btn-signup').removeClass('nav-link').addClass('btn btn-light')
        $('#btn-logout').removeClass('nav-link').addClass('btn btn-blue')
    }
}
