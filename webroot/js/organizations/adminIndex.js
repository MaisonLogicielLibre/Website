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