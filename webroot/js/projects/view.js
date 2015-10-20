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
                })
            );
            if (aData.user != null) {
                $('td:eq(1)', nRow).html(
                    aData.user['firstName'] + ' ' + aData.user['lastName']
                )
            }
        }
    });
});