$(document).ready(function () {
    drawTable();
    // When the table draw the columns
    table.fnSettings().aoRowCallback.push({
        "fn": function (nRow, aData, iDisplayIndex) {
            // Create Mission link
            $('td:eq(0)', nRow).html(
                $('<a/>', {
                    href: missionsUrl + '/' + aData['id'],
                    text: aData['name']
                })[0].outerHTML
                + (aData['archived'] ?  ' ' +
                $('<span/>', {
                    class: 'label label-warning label-as-badge',
                    text: validationTr
                })[0].outerHTML : '')
            );
            $('td:eq(1)', nRow).html(
                sessionTr[aData['session']]
            );

            $('td:eq(2)', nRow).html(
                lengthTr[aData['length']]
            );

            type_mission_id = aData['type_mission'].id;
            $('td:eq(3)', nRow).html(typeMissionsTr[type_mission_id-1]);
            if (aData.user != null) {
                $('td:eq(4)', nRow).html(
                    aData.user['firstName'] + ' ' + aData.user['lastName']
                )
            }
        }
    });
});
