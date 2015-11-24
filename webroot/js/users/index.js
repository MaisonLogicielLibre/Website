$(document).ready(function () {
    drawTable();
    table.fnSettings().aoRowCallback.push({
        "fn": function (nRow, aData, iDisplayIndex) {
            $('td:eq(0)', nRow).html(
                $('<a />', {
                    href: userUrl + '/' + aData['id'],
                    text: aData['username']
                })
            );
            $('td:eq(3)', nRow).html(
                $('<span />', {
                    text: (aData.university ? aData.university.name : notSpecifiedTr)
                })
            );
            var htmlOrg = '';
            $(aData.owners).each(function (i, v) {
                htmlOrg += $('<a/>', {
                    href: orgUrl + '/' + v.id,
                    text: v.name
                })[0].outerHTML;
                htmlOrg += ', ';
            });
            $('td:eq(4)', nRow).html(
                htmlOrg.slice(0, -2) //Remove the (last) comma
            );
            $('td:eq(5)', nRow).html(
                $('<span />', {
                    text: (aData.isStudent ? yesTr : noTr)
                })
            );
        }
    });
});