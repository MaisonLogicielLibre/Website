$(document).ready(function () {
    $('#menu ul').hide();
    $('#menu ul').children('.current').parent().show();
});

$('#menu-toggle').click(function (e) {
    e.preventDefault();
    $('#wrapper').toggleClass('toggled');
});

$('#menu-toggle-2').click(function (e) {
    e.preventDefault();
    $('#wrapper').toggleClass('toggled-2');
    $('#menu ul').hide();
});