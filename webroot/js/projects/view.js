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

            if (aData.type_missions != null) {
                var type_missions = '';
                $(aData.type_missions).each(function (i, v) {
                    type_missions += typeMissionsTr[v.id - 1] + ', ';
                });
                $('td:eq(3)', nRow).html(type_missions.slice(0, -2));
            }
            if (aData.user != null) {
                $('td:eq(4)', nRow).html(
                    aData.user['firstName'] + ' ' + aData.user['lastName']
                )
            }
        }
    });
});