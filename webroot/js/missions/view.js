$(document).ready(function () {
    drawTable();
    table.fnSettings().aoRowCallback.push({
        "fn": function (nRow, aData, iDisplayIndex) {
            $('td:eq(0)', nRow).html(
                $('<a />', {
                    href: userUrl + '/' + aData.user['id'],
                    text: aData.user['firstName'] + ' ' + aData.user['lastName']
                })
            );
        }
    });
});