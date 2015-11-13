$(document).ready(function () {
    drawTable();
    table.fnFilter('0', 4);
    // When the table draw the columns
    table.fnSettings().aoRowCallback.push({
        "fn": function (nRow, aData, iDisplayIndex) {
            $('td:eq(0)', nRow).html(
                $('<a />', {
                    href: orgUrl + '/' + aData['id'],
                    text: aData['name']
                })
            );
            $('td:eq(1)', nRow).html(
                $('<a/>', {
                    href: aData['website'],
                    text: aData['website'],
                    target: '_blank'
                })
            );
            $('td:eq(3)', nRow).html($('<input />', {
                    type: 'checkbox',
                    value: aData['isRejected'],
                    name: 'cb-' + iDisplayIndex + '-rejected'
                })
                    .prop('checked', aData['isRejected'])
            );
            $('td:eq(3)', nRow).find('input').bootstrapSwitch({
                'onText': 'Yes',
                'offText': 'No'
            })
                .on('switchChange.bootstrapSwitch', function (e, state) {
                    sendNewState(this, state)
                });
            $('td:eq(2)', nRow).html($('<input />', {
                    type: 'checkbox',
                    value: aData['isValidated'],
                    name: 'cb-' + iDisplayIndex + '-validated',
                    disabled: aData['isValidated']
                })
                    .prop('checked', aData['isValidated'])
            );
            $('td:eq(2)', nRow).find('input').bootstrapSwitch({
                'onText': 'Yes',
                'offText': 'No'
            })
                .on('switchChange.bootstrapSwitch', function (e, state) {
                    sendNewState(this, state);
                    $(this).bootstrapSwitch('toggleDisabled')
                });
        }
    });
});

function sendNewState(e, state) {
    row = table.fnGetData($(e).parents('tr').index());
    $.ajax({
        url: ajaxUrl,
        type: "post",
        data: {
            id: row['id'],
            state: $(e).parents('td').index(),
            stateValue: + state
        },
        success: function (data) {
            data = $.parseJSON(data);
            $('#container-fluid').prepend($('<div/>', {
                class: 'row',
                html: $('<div/>', {
                    class: 'col-lg-12 col-md-12 col-sm-12 col-xs-12',
                    html: $('<div/>', {
                        class: 'fade in alert alert-dismissible ' + (data[0] == "error" ? 'alert-danger' : 'alert-success'),
                        role: 'alert',
                        html: $('<button/>', {
                            class: 'close',
                            'aria-label': 'Close',
                            'data-dismiss': 'alert',
                            'type': 'button',
                            html: $('<span/>', {
                                'aria-hidden': true,
                                html: '×'
                            })
                        })
                    }).append(data[1])
                })
            }));
        }
    })
}