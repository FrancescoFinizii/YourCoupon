// function to change style of main-nav-menu

function openMainNav() {
    let x = document.getElementById("main-nav-link");
    let y = document.getElementById("main-nav-link-btn");
    if (x.className === "main-nav-link") {
        x.className += " responsive";
        y.className += " responsive";
    } else {
        x.className = "main-nav-link";
        y.className = "main-nav-link-btn";
    }
    let link = x.getElementsByClassName("nav-link");
    switch(document.title) {
        case "Login":
            link[4].className += " active";
            break;
        case "Registration":
            link[5].className += " active";
            break;
    }
}


function switchStyle() {
    if (window.innerWidth <= 880) {
        $('#btn-blue').removeClass('btn btn-blue').addClass('nav-link')
        $('#btn-light').removeClass('btn btn-light').addClass('nav-link')
    } else {
        $('#btn-blue').removeClass('nav-link').addClass('btn btn-blue')
        $('#btn-light').removeClass('nav-link').addClass('btn btn-light')
    }
}

$(window).resize(switchStyle)

$(document).ready(switchStyle)

