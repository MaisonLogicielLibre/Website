$(document).ready(function () {
    $('input[name*=type_missions]').change(function () {
        var div = $(this).parents().closest('.checkbox');
        if ($(this).attr('id') == 'type-missions-ids-1') {
            if ($(this).is(':checked')) {
                showInformation(div, infoIntern);
            } else {
                hideInformation(div);
            }
        }
        if ($(this).attr('id') == 'type-missions-ids-3') {
            if ($(this).is(':checked')) {
                showInformation(div, infoMaster);
            } else {
                hideInformation(div);
            }
        }
        if ($(this).attr('id') == 'type-missions-ids-4') {
            if ($(this).is(':checked')) {
                showInformation(div, infoCapstone);
            } else {
                hideInformation(div);
            }
        }
    });
});

function showInformation(div, text) {
    $('<div />', {
            class: 'alert alert-dismissible fade in alert-info',
            role: 'alert',
            html: $('<button />', {
                type: 'button',
                class: 'close',
                'data-dismiss': 'alert',
                'aria-label': 'Close',
                'html': $('<span />', {
                    'aria-hidden': true,
                    html: '×'
                })
            }),
            css: {'display':'block','opacity':0, 'margin-top':'10px'}
        }
    ).append(text).appendTo(div).animate({opacity: 1})
}

function hideInformation(div) {
    var alert  = div.find('.alert');
    alert.fadeOut('slow', function () {alert.remove();});
}