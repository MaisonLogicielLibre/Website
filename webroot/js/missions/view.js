$(document).ready(function () {
    drawTable();
    // When the table draw the columns
    table.fnSettings().aoRowCallback.push({
        "fn": function (nRow, aData, iDisplayIndex) {
            $('td:eq(0)', nRow).html(
                $('<a />', {
                    href: userUrl + '/' + aData['user_id'],
                    text: aData.user['firstName'] + ' ' + aData.user['lastName']
                })
            );
            $('td:eq(1)', nRow).html($('<input />', {
					id: 'switchAccepted',
                    type: 'checkbox',
                    value: aData['accepted'],
                    name: 'cb-' + iDisplayIndex + '-accepted',
                    disabled: true
                })
                    .prop('checked', aData['accepted'])
            );
            $('td:eq(1)', nRow).find('input').bootstrapSwitch({
                'onText': 'Yes',
                'offText': 'No'
            })
                .on('switchChange.bootstrapSwitch', function (e, state) {
                });
            $('td:eq(2)', nRow).html($('<input />', {
					id: 'switchRejected',
                    type: 'checkbox',
                    value: aData['rejected'],
                    name: 'cb-' + iDisplayIndex + '-rejected',
                    disabled: true
                })
                    .prop('checked', aData['rejected'])
            );
            $('td:eq(2)', nRow).find('input').bootstrapSwitch({
                'onText': 'Yes',
                'offText': 'No'
            })
                .on('switchChange.bootstrapSwitch', function (e, state) {
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
            stateValue: state
        },
        success: function (data) {
            data = $.parseJSON(data);
            if (data[0] == "error") {
                $('#content').prepend('<div role="alert" class="alert alert-dismissible fade in alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>' + data[1] + '</div>');
            } else {
                $('#content').prepend('<div role="alert" class="alert alert-dismissible fade in alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>' + data[1] + '</div>');
            }
        }
    })
}