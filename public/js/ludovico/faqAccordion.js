$(document).ready(function() {
    $(".faq-accordion").on("click", function() {
        $(this).toggleClass('active');
        // Toggle the display of the panel
        var risposta = $(this).next();
        risposta.slideToggle(200);
    });
});
