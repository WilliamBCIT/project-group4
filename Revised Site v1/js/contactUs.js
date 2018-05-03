let windowHeight = 0;
let navHeight = 0;

$(document).ready(function () {
    navHeight = $('nav').outerHeight();
    windowHeight = $(window).outerHeight();
});

$(window).on('resize', function() {
    navHeight = $('nav').outerHeight();
})
