var activeMenu = null;
$(document).ready(function () {
    $('.side-nav a').click(function () {
        var li = $(this).parent();
        if (li.hasClass('active')) {
            li.removeClass('active');
        } else {
            li.addClass('active');
            if (activeMenu !== null) {
                activeMenu.removeClass('active');
                activeMenu.find('ul.in').collapse('hide');
            }
            activeMenu = li;
        }
    });
});