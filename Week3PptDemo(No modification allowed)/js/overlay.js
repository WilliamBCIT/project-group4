$(document).ready(function () {
    $('#menu').hide();

    $(".hamburger-menu-icon").click(function () {
        openOverlay();
    });

    $("#menu").click(function () {
        closeOverlay();
    });
});

function openOverlay() {
    let title = document.title;
    if (title == "Home") {
        addStrikeThrough('#1');
    } else if (title == "Game Manual") {
        addStrikeThrough('#2');
    } else if (title == "Explanation") {
        addStrikeThrough('#3');
	}

    $('#menu').fadeIn();

    $(".overlay-content").children().hide();
    let links = $(".overlay-content").children();

    $(links).each(function (i) {
        $(this).delay(i * 100).fadeIn();
    });
}

function closeOverlay() {
    $('#menu').fadeOut();
}

function addStrikeThrough(id) {
    $(id).css("text-decoration", "line-through")
    $(id).css("color", "#6A7074");
    $(id).css("font-weight", "300");
}