$(document).ready(function () {
    // Initialise switch button on load
    $('#organizations tr').each(function () {
        $(this).find('td:eq(2) input').bootstrapSwitch({
            'onText': 'Yes',
            'offText': 'No'
        });
        $(this).find('td:eq(3) input').bootstrapSwitch({
            'onText': 'Yes',
            'offText': 'No'
        });
    });

    // When the table draw the columns
    table.fnSettings().aoRowCallback.push({
        "fn": function (nRow, aData, iDisplayIndex) {
            $('td:eq(3)', nRow).html($('<input />', {
                type: 'checkbox',
                value: aData['isRejected'],
                name: 'cb-'+iDisplayIndex+'-rejected'
            })
                .prop('checked', aData['isRejected'])
            );
            $('td:eq(3)', nRow).find('input').bootstrapSwitch({
                'onText': 'Yes',
                'offText': 'No'
            });
            $('td:eq(2)', nRow).html($('<input />', {
                type: 'checkbox',
                value: aData['isValidated'],
                name: 'cb-'+iDisplayIndex+'-validated'
            })
                .prop('checked', aData['isValidated'])
            );
            $('td:eq(2)', nRow).find('input').bootstrapSwitch({
                'onText': 'Yes',
                'offText': 'No'
            });
        }
    });
});