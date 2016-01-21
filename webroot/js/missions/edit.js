$(document).ready(function () {
    $('select[name=type_mission_id]').change(function() {
      var index = $(this).find(':selected').val();
      var div = $(this).parent();
      hideInformation(div);
      switch(index) {
        case '1':
            console.log('Called');
            showInformation(div, infoIntern);
            break;
        case '3':
            showInformation(div, infoMaster);
            break;
        case '4':
            showInformation(div, infoCapstone);
            break;
        default:
            break;
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
